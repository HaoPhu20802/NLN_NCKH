@extends('admin_layout')
@section('admin_content')
<div class="app-title">
  <ul class="app-breadcrumb breadcrumb side">
    <li class="breadcrumb-item active"><a href="#"><b>Danh sách khoa</b></a></li>
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
            <a class="btn btn-add btn-sm" href="{{URL::to('/add-faculty')}}" title="Thêm"><i class="fas fa-plus"></i>
              Tạo mới khoa</a>
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
              <th width="10"><input type="checkbox" id="all"></th>
              <th width="200">ID khoa</th>
              <th >Tên khoa</th>
              <th width="200">Tính năng</th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_faculty as $key => $cate_pro)
            <tr>
              <td width="10"><input type="checkbox" name="check1" value="1"></td>
              <td>{{$cate_pro->khoa_id}}</td>
              <td>{{$cate_pro->khoa_ten}}</td>
              <td class="table-td-center">
                <a href="{{URL::to('/edit-faculty/'.$cate_pro->khoa_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active" style="margin-right:15px;"></i></a>
                  <button style="border:none" onclick="deleteRow(this, '{{URL::to('/delete-faculty/'.$cate_pro->khoa_id)}}')"> 
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
      text: "Bạn có chắc chắn muốn xóa khoa này?",
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