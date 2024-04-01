@extends('admin_layout')
@section('admin_content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="#">Danh sách giảng viên</a></li>
        <li class="breadcrumb-item"><a href="#">Thêm giảng viên</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Thêm thông tin giảng viên</h3> 
            <form action="{{URL::to('/save-teacher')}}" method="post">
            <div class="tile-body">
                <div class="row" >
                    {{csrf_field()}}
                    <div class="form-group col-md-3">
                        <label class="control-label">Email</label>
                        <input type="text" class="form-control" value="{{ $accounts->first()->user_email }}" readonly>
                        <input type="hidden" name="user" value="{{ $accounts->first()->user_id }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Họ và tên</label>
                        <input class="form-control" name="ten" type="text"  required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Ngày sinh</label>
                        <input class="form-control"  name="date" type="date">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Giới tính</label>
                        <select name="gt" class="form-control" id="exampleSelect2" required>
                            <option value="0">-- Chọn giới tính --</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Ngạch viên chức</label>
                        <input class="form-control" name="vienchuc"  type="text" required>
                    </div>
                    <div class="form-group  col-md-4">
                        <label class="control-label">Trình độ chuyên môn</label>
                        <input class="form-control" name="chuyenmon"  type="text" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label">Khoa</label>
                        <select name="khoa" class="form-control" id="exampleSelect2" required>
                            <option>-- Chọn khoa --</option>
                            @foreach($faculty as $data)
                                <option value="{{$data->khoa_id}}">{{$data->khoa_ten}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button  type="submit" name="add_gv" data-toggle="modal" data-target="#ModalUP" class="btn btn-save" title="Sửa">Thêm thông tin sinh viên</button>
                    <a class="btn btn-cancel" href="{{URL::to('/all-teacher')}}">Quay lại</a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection