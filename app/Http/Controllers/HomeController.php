<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use App\Models\Slider;
use App\Models\Account;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Topic;
use App\Models\DetailTopic;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status', '=', '1')->take(3)->get();
        
        $all_topic = Topic::orderBy('topic_id','DESC')->take(4)->get();

        $popular_topics = DetailTopic::orderBy('topic_views', 'DESC')->take(5)->get();

        return view('pages.home')->with('slider', $slider)->with(compact('all_topic'))->with('popular_topic', $popular_topics);
    }

    public function topic_details(){
        return view('pages.topic.topic_details');
    }


    public function home_dashboard(Request $request) {
        $user_email = $request->user_email;
        $user_password = $request->user_password;
        $user = Account::with('student', 'teacher')->where('user_email', $user_email)->first();
    
        if ($user) {

            if (Hash::check($user_password, $user->user_password)) {

                if ($user->user_role == 0 && $user->student) {

                    $student = $user->student;
                    Session::put('user_email', $user->user_email);
                    Session::put('user_id', $user->user_id);
                    Session::put('user_image', $user->user_image);
                    Session::put('user_role', $user->user_role);
                    Session::put('user_name', $student->student_name);
                    return response()->json(['success' => true]);
                } elseif ($user->user_role == 1 && $user->teacher) {

                    $teacher = $user->teacher;
                    Session::put('user_email', $user->user_email);
                    Session::put('user_id', $user->user_id);
                    Session::put('user_image', $user->user_image);
                    Session::put('user_role', $user->user_role);
                    Session::put('user_name', $teacher->teacher_name);
                    return response()->json(['success' => true]);
                } else {
   
                    return response()->json(['success' => false, 'message' => 'Bạn không có quyền truy cập.']);
                }
            } else {

                return response()->json(['success' => false, 'message' => 'Mật khẩu hoặc tài khoản sai.']);
            }
        } else {
            // User not found
            return response()->json(['success' => false, 'message' => 'Mật khẩu hoặc tài khoản sai.']);
        }
    }
    
    
    
    public function log_out(){
        Session::forget('user_email');
        Session::forget('user_id');
        Session::forget('user_image'); // Xóa session lưu hình ảnh người dùng
        Session::forget('user_role');
        Session::forget('student_info'); // Xóa session lưu thông tin sinh viên
        return redirect('/');
    }
    

    public function edit_info($user_id){
        // $this->AuthLogin();
        
        $edit_info = Account::find($user_id);
        
        if(!$edit_info) {
            abort(404); // Trả về lỗi 404 nếu không tìm thấy tài khoản
        }
        
        return view('pages.edit_info', compact('edit_info'));
    }

    public function update_info(Request $request, $user_id){
        $data = array();
        $data['user_email'] = $request->email;
    
        // Kiểm tra xem có mật khẩu mới được cung cấp không
        if ($request->has('newpassword') && $request->input('newpassword') != '') {
            // Kiểm tra xác nhận mật khẩu mới
            if ($request->input('newpassword') === $request->input('newpassword1')) {
                // Kiểm tra mật khẩu cũ của người dùng
                $old_password = $request->input('password');
                $user = Account::where('user_id', $user_id)->first();
                if (Hash::check($old_password, $user->user_password)) {
                    // Mật khẩu cũ trùng khớp, cập nhật mật khẩu mới
                    $data['user_password'] = bcrypt($request->input('newpassword')); // Hash mật khẩu mới
                } else {
                    // Mật khẩu cũ không trùng khớp, trả về thông báo lỗi
                    return back()->with('error', 'Mật khẩu hiện tại không đúng');
                }
            } else {
                // Xử lý lỗi khi xác nhận mật khẩu không khớp
                return back()->with('error', 'Xác nhận mật khẩu không khớp');
            }
        }
    
        $get_image = $request->file('img');
        if($get_image){
            $new_image = $get_image->getClientOriginalName(); // Lấy tên file mới
            $get_image->move('public/uploads/imgUser', $new_image); // Di chuyển file mới vào thư mục uploads/imgUser
            $data['user_image'] = $new_image; // Cập nhật tên hình ảnh mới vào dữ liệu
            
            // Cập nhật session user_image
            Session::put('user_image', $new_image);
        }
    
        // Thực hiện cập nhật thông tin người dùng
        Account::where('user_id', $user_id)->update($data);
    
        // Đặt thông báo và chuyển hướng người dùng
        return back()->with('message', 'Cập nhật tài khoản thành công');
    }
    


    // Topic
    public function topic(){
        $all_topic = Topic::orderBy('topic_id','DESC')->get();
        $total_topics = $all_topic->count();
        return view('pages.topic.topic')->with(compact('all_topic', 'total_topics')); 
    }
    
   
    public function detail(Request $request, $topic_id)
    {
        // Kiểm tra xem người dùng đã xem chi tiết này trước đó hay chưa
        $viewedTopics = $request->session()->get('viewed_topics', []);
    
        // Kiểm tra xem topic_id hiện tại đã được xem trước đó hay chưa
        if (!in_array($topic_id, $viewedTopics)) {
            // Nếu chưa được xem, tăng giá trị của topic_views lên một đơn vị
            DetailTopic::where('topic_id', $topic_id)->increment('topic_views');
            
            // Đánh dấu topic_id này là đã được xem
            $viewedTopics[] = $topic_id;
    
            // Lưu lại danh sách các topic đã được xem vào session
            $request->session()->put('viewed_topics', $viewedTopics);
        }
    
        // Lấy chi tiết chủ đề
        $detail_topic = DetailTopic::where('topic_id', $topic_id)->first();
        $summary = $detail_topic->detailtopic_abtract;

        // Xây dựng mô hình và gợi ý các đề tài tương tự
        $recommendedTopics = $this->recommendSimilarTopics($summary, $topic_id);

        // Truyền $recommendedTopics vào view
        return view('admin.topic.detail_topic', compact('detail_topic', 'recommendedTopics'));
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



    // seach

    public function search(Request $request){
        $keywords = $request->keywords;

        $search_topic = DetailTopic::where('detailtopic_abtract', 'like', '%' .$keywords. '%')->get();
        return view('pages.search')->with('search_topic', $search_topic);
    }

}
