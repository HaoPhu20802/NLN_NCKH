@extends('welcome')
@section('content')
<div class="row" style="border:1px solid #ddd; max-width:1100px; margin-left:180px;">
    <article class="col-sm-12">
        <div class="product-dtl" style="text-align:center;">
            <b style="font-size: 1.4em;">THÔNG TIN CHI TIẾT ĐỀ TÀI</b>
        </div>
        <div class="product-dtl">
            <h5>Thông tin chung </h5>
        </div>
        <div class="tile">
            <div class="tile-body">
                <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" id="sampleTable">
                    
                    <thead>
                        <tr>
                            <th colspan="3"><b>Tên đề tài:</b> {{$detail_topic->topic->topic_name}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>Người thực hiện:</b> {{$detail_topic->student->student_name}}</td>
                            <td colspan="2"><b>MSSV:</b> {{$detail_topic->student->student_id}}</td>
                        </tr>
                        <tr>
                            <td><b>Ngành:</b> {{$detail_topic->student->student_name}}</td>
                            <td colspan="2"><b>Khóa học: </b> {{$detail_topic->student->student_id}}</td>
                        </tr>
                        <tr>
                            <td><b>Người hướng dẫn:</b> {{$detail_topic->student->student_name}}</td>
                            <td colspan="2"><b>Mã CB: </b> {{$detail_topic->student->student_id}}</td>
                        </tr>
                        <tr>
                            <td><b>Lĩnh vực nghiên cứu:</b> {{$detail_topic->topic->topic_linhvuc}}</td>
                            <td><b>Ngày bắt đầu:</b> {{$detail_topic->topic->topic_start}}</td>
                            <td><b>Ngày kết thúc:</b> {{$detail_topic->topic->topic_end}}</td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Trạng thái:</b> {{$detail_topic->topic->topic_status}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </article>
    <div class="product-info-tabs">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description"
                    role="tab" aria-controls="description" aria-selected="true">Tóm tắt đề tài</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel"
                aria-labelledby="description-tab">
                {{$detail_topic->detailtopic_abtract}}
            </div>
        </div>
    </div>
    <div class="product-info-tabs">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description"
                    role="tab" aria-controls="description" aria-selected="true">Đánh giá đề tài</a>
            </li>
        </ul>
        @php
            $user_id = session('user_id');
        @endphp
        @if($user_id)
        <div class="col-md-12" >
            <form>
                <label class="control-label">Bình luận</label>
                <div class="form-group"> 
                    <input type="hidden" name="user_id" value="{{session('user_id')}}">
                    <textarea name="comment" class="form-control comment_content" rows="3"></textarea> 
                    <button type="button" class="btn btn-primary mt-2 send-comment">Gửi bình luận</button> 
                </div>
                <div id="notify_comment"></div>
            </form>
        </div>
        @endif
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel"
                aria-labelledby="description-tab">
                <form id="commentForm">
                    @csrf
                    <input type="hidden" name="topic_id" value="{{$detail_topic->topic->topic_id}}">
                    <div id="comment_show"></div>
                </form>
                
            </div>
        </div>
    </div>
    <div class="product-info-tabs">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Một số đề tài tương tự</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <ul class="list-group list-group-flush" style="margin-top:10px">
                    <table style="width:100%">
                        <tr>
                            <th>Tên đề tài</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Lĩnh vực</th>
                            <th>Hành động</th>
                        </tr>
                        @foreach($recommendedTopics as $topic)
                        <tr>
                            <td>{{ $topic->topic_name }}</td>
                            <td>{{ $topic->topic_start }}</td>
                            <td>{{ $topic->topic_end }}</td>
                            <td>{{ $topic->topic_linhvuc }}</td>
                            <td>
                                <a href="{{ route('detail_topic', ['topic_id' => $topic->topic_id]) }}">Xem chi tiết</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </ul>
            </div>
        </div>
    </div>    
</div>
@endsection