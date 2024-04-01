@extends('admin_layout')
@section('admin_content')
<div class="app-title">
  <ul class="app-breadcrumb breadcrumb side">
    <li class="breadcrumb-item active"><a href="#"><b>Danh sách giảng viên</b></a></li>
  </ul>
  <div id="clock"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <?php
        $message = Session::get('message');
        if($message){
            echo '<div class="alert alert-success">'.$message.'</div>';
            Session::put('message',null);
        }
      ?>
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
              <th>Mã cán bộ</th>
              <th width="150">Họ và tên</th>
              <th>Ngày sinh</th>
              <th>Giới tính</th>
              <th>Ngạch viên chức</th>
              <th>Đơn vị công tác</th>
              <th>Trình độ chuyên môn</th>
              <th width="100">Tính năng</th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_teacher as $key => $data_teacher)
          <tr>
            <td>{{$data_teacher->teacher_id}}</td>
            <td>{{$data_teacher->teacher_name}}</td>
            <td>{{$data_teacher->teacher_ngaysinh}}</td>
            <td>{{$data_teacher->teacher_gioitinh}}</td>
            <td>{{$data_teacher->teacher_ngachvienchuc}}</td>
            <td>{{$data_teacher->khoa_ten}}</td>
            <td>{{$data_teacher->teacher_trinhdo}}</td>
            <td>
              <a href="{{URL::to('/edit-teacher/'.$data_teacher->teacher_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active" style="margin-right:15px;"></i></a>
                <button style="border:none" onclick="deleteRow(this, '{{URL::to('/delete-teacher/'.$data_teacher->teacher_id)}}')"> 
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