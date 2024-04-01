@extends('admin_layout')
@section('admin_content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item active"><a href="#"><b>Danh sách đề tài</b></a></li>
    </ul>
    <div id="clock"></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table id="sampleTable">
                    
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
                        <thead>
                            <tr>
                                <th colspan="3">Tóm tắt đề tài</th>
                            </tr>
                        </thead>
                        <tr>
                            <td colspan="3">{{$detail_topic->detailtopic_abtract}}</td>
                        </tr>
                    </tbody>
                   
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
