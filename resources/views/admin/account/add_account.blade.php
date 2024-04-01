@extends('admin_layout')
@section('admin_content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách tài khoản</li>
        <li class="breadcrumb-item"><a href="#">Thêm tài khoản</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Thêm thông tin tài khoản</h3> 
            <form action="{{URL::to('/save-account')}}" method="post" enctype="multipart/form-data">
                <div class="tile-body">
                    <div class="row" >
                        {{csrf_field()}}
                        <div class="form-group col-md-4">
                            <label class="control-label">Email</label>
                            <input class="form-control" type="text" name="email" value="@gmail.com">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Password</label>
                            <input class="form-control" type="password" name="password">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Ảnh đại diện</label>
                            <input class="form-control" type="file" name="img">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Phân quyền</label>
                            <select name="role" class="form-control" id="exampleSelect2" required>
                                <option>-- Chọn quyền --</option>
                                <option value="0">Sinh viên</option>
                                <option value="1">Giảng viên</option>
                            </select>
                        </div>
                    </div>
                    <button  type="submit" name="add_account" data-toggle="modal" data-target="#ModalUP" class="btn btn-save" title="Sửa">Thêm thông tin ngành</button>
                        <a class="btn btn-cancel" href="{{URL::to('/all-account')}}">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection