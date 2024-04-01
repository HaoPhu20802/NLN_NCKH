@extends('admin_layout')
@section('admin_content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách sinh viên</li>
        <li class="breadcrumb-item"><a href="#">Thêm sinh viên</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Thêm thông tin sinh viên</h3> 
            <form action="{{URL::to('/save-student')}}" method="post">
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
                    <div class="form-group  col-md-3">
                        <label class="control-label">Niên khóa</label>
                        <input class="form-control" name="nk"  type="text" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label">Ngành</label>
                        <select name="major" class="form-control" id="exampleSelect2" required>
                            <option>-- Chọn ngành --</option>
                            @foreach($majors as $major)
                                <option value="{{$major->nganh_id}}">{{$major->nganh_ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <button  type="submit" name="add_sv" data-toggle="modal" data-target="#ModalUP" class="btn btn-save" title="Sửa">Thêm thông tin sinh viên</button>
                    <a class="btn btn-cancel" href="{{URL::to('/all-student')}}">Quay lại</a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
