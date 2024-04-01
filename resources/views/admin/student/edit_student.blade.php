@extends('admin_layout')
@section('admin_content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="{{URL::to('/all-student')}}">Danh sách sinh viên</a></li>
        <li class="breadcrumb-item"><a href="#">Chỉnh sửa sinh viên</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        @foreach ($edit_student as $key => $data_student)
        <div class="tile">
            <h3 class="tile-title">Chỉnh sửa thông tin sinh viên</h3> 
            <form action="{{URL::to('/update-student/'.$data_student->student_id)}}" method="post">
            <div class="tile-body">
                <div class="row" >
                    {{csrf_field()}}
                    <div class="form-group col-md-4">
                        <label class="control-label">MSSV</label>
                        <input class="form-control" type="text" value="{{$data_student->student_id}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Họ và tên</label>
                        <input class="form-control" name="ten" type="text" value="{{$data_student->student_name}}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Ngày sinh</label>
                        <input class="form-control" value="{{$data_student->student_ngaysinh}}" name="date" type="date">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Giới tính</label>
                        <select name="gt" class="form-control" id="exampleSelect2" required>
                            <?php if($data_student->student_gioitinh == "Nữ"): ?>
                                <option value="Nữ" selected>Nữ</option>
                                <option value="Nam">Nam</option>
                            <?php else: ?>
                                <option value="Nữ">Nữ</option>
                                <option value="Nam" selected>Nam</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    
                    <div class="form-group  col-md-3">
                        <label class="control-label">Niên khóa</label>
                        <input class="form-control" name="nk" value="{{$data_student->student_khoahoc}}" type="text" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label">Ngành</label>
                        <select name="major" class="form-control" id="exampleSelect2" required>
                            <option>-- Chọn ngành --</option>
                            @foreach($nganh as $key => $data)
                            @if($data->nganh_id == $data_student->nganh_id)
                                <option selected value="{{$data->nganh_id}}">{{$data->nganh_ten}}</option>
                            @else
                                <option value="{{$data->nganh_id}}">{{$data->nganh_ten}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>
                <button  type="submit" name="update_sv" data-toggle="modal" data-target="#ModalUP" class="btn btn-primary" title="Sửa">Cập nhật thông tin sinh viên</button>
                    <a class="btn btn-cancel" href="{{URL::to('/all-student')}}">Hủy bỏ</a>
            </div>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection