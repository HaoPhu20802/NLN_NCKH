@extends('admin_layout')
@section('admin_content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách ngành</li>
        <li class="breadcrumb-item"><a href="#">Thêm ngành</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Thêm thông tin Ngành</h3> 
            <form action="{{URL::to('/save-major')}}" method="post">
                <div class="tile-body">
                    <div class="row" >
                        {{csrf_field()}}
                        <div class="form-group col-md-3">
                            <label class="control-label">Chọn khoa</label>
                            <select name="faculty" class="form-control" id="exampleSelect2" required>
                                <option>-- Chọn khoa --</option>
                                @foreach($faculty as $key => $data)
                                <option value="{{$data->khoa_id}}">{{$data->khoa_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Tên Ngành</label>
                            <input class="form-control" type="text" name="major_name">
                        </div>
                    </div>
                    <button  type="submit" name="add_major" data-toggle="modal" data-target="#ModalUP" class="btn btn-save" title="Sửa">Thêm thông tin ngành</button>
                        <a class="btn btn-cancel" href="{{URL::to('/all-major')}}">Quay lại</a>
                </div>
            </form>
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