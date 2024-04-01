@extends('admin_layout')
@section('admin_content')
<div class="app-title">
  <ul class="app-breadcrumb breadcrumb side">
    <li class="breadcrumb-item active"><a href="#"><b>Danh sách sinh viên</b></a></li>
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

            <a class="btn btn-add btn-sm" href="{{URL::to('/add-student')}}" title="Thêm"><i class="fas fa-plus"></i>
              Tạo mới nhân viên</a>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i
                class="fas fa-file-upload"></i> Tải từ file</a>
          </div>

          <div class="col-sm-2">
            <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                class="fas fa-print"></i> In dữ liệu</a>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i
                class="fas fa-copy"></i> Sao chép</a>
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
              <th>ID sinh viên</th>
              <th width="150">Họ và tên</th>
              <th>Email</th>
              <th>Ngày sinh</th>
              <th>Giới tính</th>
              <th>Ngành</th>
              <th>Khoa</th>
              <th>Niên khóa</th>
              <th width="100">Tính năng</th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_student as $key => $data_student)
          <tr>
            <td>{{$data_student->student_id}}</td>
            <td>{{$data_student->student_name}}</td>
            <td>{{$data_student->user_email}}</td>
            <td>{{$data_student->student_ngaysinh}}</td>
            <td>{{$data_student->student_gioitinh}}</td>
            <td>{{$data_student->nganh_ten}}</td>
            <td>{{$data_student->khoa_ten}}</td>
            <td>{{$data_student->student_khoahoc}}</td>
            <td>
              <a href="{{URL::to('/edit-student/'.$data_student->student_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active" style="margin-right:15px;"></i></a>
                <button style="border:none" onclick="deleteRow(this, '{{URL::to('/delete-student/'.$data_student->student_id)}}')"> 
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
        text: "Bạn có chắc chắn muốn xóa ngành này?",
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