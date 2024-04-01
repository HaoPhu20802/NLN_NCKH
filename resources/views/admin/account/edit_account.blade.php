@extends('admin_layout')
@section('admin_content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách tài khoản</li>
        <li class="breadcrumb-item"><a href="#">Chỉnh sửa tài khoản</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        @if($edit_account)
            <div class="tile">
                <h3 class="tile-title">Chỉnh sửa thông tin tài khoản</h3> 
                <form action="{{URL::to('/update-account/'.$edit_account->user_id)}}" method="post" enctype="multipart/form-data">
                    <div class="tile-body">
                        <div class="row" >
                            {{csrf_field()}}
                            <div class="form-group col-md-12">
                                <label class="control-label">Email</label>
                                <input class="form-control" type="text" value="{{$edit_account->user_email}}" name="email">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Password</label>
                                <input class="form-control" type="password" value="{{$edit_account->user_password}}" name="password" readonly>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Ảnh đại diện</label>
                                <input class="form-control" type="file" value="{{$edit_account->user_image}}" name="img" >
                                <img src="{{URL::to('public/uploads/imgUser/'.$edit_account->user_image)}}" height="100px" width="100px">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Phân quyền</label>
                                <input class="form-control" type="text" value="{{$edit_account->user_role}}" name="role" >
                            </div>
                        </div>
                        <button  type="submit" name="update_account" class="btn btn-save" title="Sửa">Cập nhật thông tin khoa</button>
                            <a class="btn btn-cancel" href="{{URL::to('/all-account')}}">Hủy bỏ</a>
                    </div>
                </form>
            </div>
        @endif
    </div>
</div>
@endsection
