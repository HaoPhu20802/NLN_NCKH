@extends('admin_layout')
@section('admin_content')
<div class="app-title">
  <ul class="app-breadcrumb breadcrumb side">
    <li class="breadcrumb-item active"><a href="#"><b>Danh sách ngành</b></a></li>
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
            <a class="btn btn-add btn-sm" href="{{URL::to('/add-major')}}" title="Thêm"><i class="fas fa-plus"></i>
              Tạo mới khoa</a>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                class="fas fa-trash-alt"></i> Xóa tất cả </a>
          </div>
        </div>
        <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
          id="sampleTable">
          <thead>
            <tr>
              <th width="200">ID ngành</th>
              <th>Tên khoa</th>
              <th>Tên ngành</th>
              <th width="200">Tính năng</th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_major as $key => $data_major)
            <tr>
              <td>{{$data_major->nganh_id}}</td>
              <td>{{$data_major->khoa_ten}}</td>
              <td>{{$data_major->nganh_ten}}</td>
              <td>
                <a href="{{URL::to('/edit-major/'.$data_major->nganh_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active" style="margin-right:15px;"></i></a>
                  <button style="border:none" onclick="deleteRow(this, '{{URL::to('/delete-major/'.$data_major->nganh_id)}}')"> 
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