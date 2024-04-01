<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Topic;
use App\Models\DetailTopic;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Account;
use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;


use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\Tokenization\WordTokenizer;
use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\NearestNeighbors\KNearestNeighbors;


class TopicController extends Controller
{
    // Hàm xác thực đăng nhập
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    // Hàm hiển thị danh sách tất cả đề tài
    public function all_topic(){
        
        $all_topic = Topic::orderBy('topic_id','DESC')->get();
        return view('admin.topic.all_topic')->with(compact('all_topic')); 
    }

   
    public function detail_topic($topic_id){
        // Lấy tóm tắt của đề tài cụ thể từ cơ sở dữ liệu
        $detail_topic = DetailTopic::where('topic_id', $topic_id)->first();
        $summary = $detail_topic->detailtopic_abtract;
    
        // Xây dựng mô hình và gợi ý các đề tài tương tự
        $recommendedTopics = $this->recommendSimilarTopics($summary, $topic_id);
    
        // Truyền $recommendedTopics vào view
        return view('admin.topic.detail_topic', compact('detail_topic', 'recommendedTopics'));
    }
    
    

    public function all_comment(){
        $all_comment = Comment::orderBy('comment_id','DESC')->get();

        return view('admin.comment.all_comment')->with(compact('all_comment'));
        
    }


    public function send_comment(Request $request){
        $topic_id = $request->topic_id;
        $comment_content = $request->comment_content;
        $user_id = $request->user_id; 
        $comment = new Comment();
        $comment->topic_id = $topic_id;
        $comment->user_id = $user_id; 
        $comment->comment_noidung = $comment_content; // Lưu nội dung bình luận
        $comment->save(); // Lưu bình luận vào cơ sở dữ liệu
    }


    public function load_comment(Request $request){
        $topic_id = $request->topic_id; // Lấy topic_id từ request
        $comments = Comment::where('topic_id', $topic_id)->get();
        $output = '';
        foreach($comments as $key => $comment){
            $user_email = $comment->account->user_email;
            $user_image = $comment->account->user_image;
            $image_url = URL::to('public/uploads/imgUser/' . $user_image);
            $output .= '
            <div class="row style_comment">
                <div class="col-md-2">   
                    <img width="30%" height="100%" src="' . $image_url . '" alt="" class="img img-responsive img-thumbnail">
                </div>
                <div class="col-md-10">
                    <p style="color:red;">' . $user_email . '</p>
                    <p style="color:#000;">' . $comment->comment_date . '</p>
                    <p>' . $comment->comment_noidung . '</p>
                    <a href="#" class="reply-btn" data-comment-id="' . $comment->id . '">Trả lời</a>
                    <div class="reply-form" style="display:none;" data-comment-id="' . $comment->id . '">
                        <textarea class="form-control reply-content" rows="2"></textarea>
                        <button type="button" class="btn btn-primary mt-2 send-reply">Gửi trả lời</button>
                    </div>
                </div>
            </div>';
        }
        return $output;
    }
    

    private function recommendSimilarTopics($inputSummary, $currentTopicId){
        // Lấy tất cả các đề tài từ cơ sở dữ liệu, loại bỏ đề tài hiện tại
        $topics = DetailTopic::where('topic_id', '!=', $currentTopicId)->get();

        // Tạo mảng tóm tắt từ các đề tài
        $summaries = $topics->pluck('detailtopic_abtract')->toArray();

        // Khởi tạo vectorizer và transformer
        $vectorizer = new TokenCountVectorizer(new WordTokenizer());
        $transformer = new TfIdfTransformer();

        // Huấn luyện vectorizer
        $vectorizer->fit($summaries);
        // Biến đổi tóm tắt thành vectơ
        $vectorizer->transform($summaries);

        // Biến đổi tóm tắt đầu vào thành vectơ
        $inputVector = $vectorizer->transform([$inputSummary]);

        // Sử dụng K-nearest neighbors để tìm các đề tài gần nhất
        $knn = new KNearestNeighbors($k = 3);
        $knn->train($summaries, array_keys($topics->pluck('topic_id')->toArray()));
        $neighborIndices = $knn->nearestNeighbors($inputVector);

        // Lấy thông tin đề tài gợi ý
        $recommendedTopics = [];
        foreach ($neighborIndices as $index) {
            $recommendedTopics[] = $topics[$index];
        }

        return $recommendedTopics;
    }

}
