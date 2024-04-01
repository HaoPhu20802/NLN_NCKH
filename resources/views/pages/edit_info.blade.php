@extends('welcome')
@section('content')
@if($edit_info)
<div class="info">
    <form method="post" action="{{URL::to('/update-info/'.$edit_info->user_id)}}" enctype="multipart/form-data">
        <div class="row">
            {{csrf_field()}}
            <div class="col-lg-8">
                <div class="product-dtl">
                    <b style="font-size: 1.4em; margin-left:250px">Chỉnh sửa tài khoản</b>
                </div>
                <div class="product-dtl">
                    <b>Quản lý thông tin hồ sơ để bảo mật tài khoản</b>
                </div>
                <div class="panel-body">
                    <div class="form">
                        <table class="form-input">
                            <tr>
                                <td>
                                    <label for="firstname">Email</label>
                                </td>
                                <td class="col-lg-9">
                                    <input class="form-control" id="firstname" name="email" type="text" value="{{$edit_info->user_email}}" readonly>
                                </td>
                            </tr>
                            <tr style="margin-bottom: 10px;">
                                <td>
                                    <label for="firstname">Mật khẩu hiện tại</label>
                                </td>
                                <td class="col-lg-9">
                                    <input class="form-control" id="firstname" name="password" type="password" required>
                                </td>
                            </tr>
                            <tr style="margin-bottom: 10px;">
                                <td>
                                    <label for="firstname">Mật khẩu mới</label>
                                </td>
                                <td class="col-lg-9">
                                    <input class="form-control" id="firstname" name="newpassword" type="password" required>
                                </td>
                            </tr>
                            <tr style="margin-bottom: 10px;">
                                <td>
                                    <label for="firstname">Xác nhận mật khẩu</label>
                                </td>
                                <td class="col-lg-9">
                                    <input class="form-control" id="firstname" name="newpassword1" type="password" required>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    @if (session('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="form-group" style="text-align:center;">
                                        <div style="margin-top:10px;">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-default" style="background-color:rgb(121, 128, 128);" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table> 
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div>
                    <label for="firstname" style="font-size: 1.4em;font-weight:bold;">Hình ảnh người dùng</label>
                </div>
                <div>
                  <img src="{{URL::to('public/uploads/imgUser/'.$edit_info->user_image)}}" alt="" sizes="" srcset="" class="img-user">
                  <input class="form-control input" type="file" value="{{$edit_info->user_image}}" style="width:235px; margin-bottom:5px;" name="img">
                </div>
            </div>
        </div>
    </form>
</div>
@endif

@endsection