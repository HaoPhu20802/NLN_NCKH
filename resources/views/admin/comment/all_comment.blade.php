@extends('admin_layout')
@section('admin_content')
<div class="app-title">
  <ul class="app-breadcrumb breadcrumb side">
    <li class="breadcrumb-item active"><a href="#"><b>Danh sách bình luận</b></a></li>
  </ul>
  <div id="clock"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">

        <div class="row element-button">
          <div class="col-sm-2">

            <a class="btn btn-add btn-sm" href="{{URL::to('/add-teacher')}}" title="Thêm"><i class="fas fa-plus"></i>
              Tạo mới giảng viên</a>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                class="fas fa-print"></i> In dữ liệu</a>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i
                class="fas fa-file-pdf"></i> Xuất PDF</a>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                class="fas fa-trash-alt"></i> Xóa tất cả </a>
          </div>
        </div>
        <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" 
          id="sampleTable">
          <thead>
            <tr>
              <th>Email người gửi</th>
              <th>ID đề tài</th>
              <th>Bình luận</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_comment as $key => $data_comment)
          <tr>
            <td width="200px">{{$data_comment->account->user_email}}</td>
            <td width="400px">{{$data_comment->topic->topic_name}}</td>
            <td>{{$data_comment->comment_noidung}}</td>
            <td width="50px">
                <a href="" class="active" ui-toggle-class="">
                    Trả lời</a>
                    <button style="border:none" onclick="deleteRow(this, '{{URL::to('/delete-comment/'.$data_comment->comment_id)}}')"> 
                      <i class="fa fa-times text-danger text"></i></button>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  function deleteRow(r, deleteUrl) {
      var i = r.parentNode.parentNode.parentNode.rowIndex;
      swal({
        title: "Cảnh báo",
        text: "Bạn có chắc chắn muốn xóa giảng viên này?",
        buttons: ["Hủy bỏ", "Đồng ý"],
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = deleteUrl;
        }
      });
    }
  </script>

@endsection