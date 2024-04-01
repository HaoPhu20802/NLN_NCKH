@extends('admin_layout')
@section('admin_content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item active"><a href="#"><b>Danh sách slider</b></a></li>
    </ul>
    <div id="clock"></div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">

          <div class="row element-button">
            <div class="col-sm-2">

              <a class="btn btn-add btn-sm" href="{{URL::to('/add-slider')}}" title="Thêm"><i class="fas fa-plus"></i>
                Tạo mới slide</a>
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
                <th width="10"><input type="checkbox" id="all"></th>
                <th width="50">ID slide</th>
                <th>Tên slide</th>
                <th>Hình ảnh</th>
                <th>Tình trạng</th>
                <th width="100">Tính năng</th>
              </tr>
            </thead>
            <tbody>
              @foreach($all_slide as $key => $slide)
              <tr>
                  <td width="10"><input type="checkbox" name="check1" value="1"></td>
                  <td>{{$slide->slider_id}}</td>
                  <td>{{$slide->slider_name}}</td>
                  <td><img src="public/uploads/slider/{{$slide->slider_image}}" height="100px" width="300px"></td>
                  <td><span class="text-ellipsis">
                      @if($slide->slider_status==0)
                          <a href="{{URL::to('/unactive-slider/'.$slide->slider_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                      @else
                          <a href="{{URL::to('/active-slider/'.$slide->slider_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down" aria-hidden="true"></span></a>
                      @endif
                      </span></td>
                  <td>
                      <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{URL::to('/delete-slider/'.$slide->slider_id)}}" class="active" ui-toggle-class=""> 
                      <i class="fa fa-times text-danger text"></i></a>
                  </td>
              </tr>
              @endforeach
          </tbody>
          
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php
  $message = Session::get('message');
  if($message){
      
?>
<div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <!-- Nội dung form sửa -->
    <!-- Ví dụ: -->
    <form id="editForm">
      <!-- Các trường cần sửa -->
      <div class="form-group">
        <label for="khoa_ten" style="text-align:center;"><?php echo $message; ?></label>
      </div>
      <!-- Các trường khác cần sửa -->
    </form>
  </div>
</div>
</div>
</div>

<?php
Session::put('message',null);
  }
?>
  @endsection