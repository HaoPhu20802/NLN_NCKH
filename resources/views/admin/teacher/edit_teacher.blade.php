@extends('admin_layout')
@section('admin_content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="{{URL::to('/all-teacher')}}">Danh sách giảng viên</a></li>
        <li class="breadcrumb-item"><a href="#">Chỉnh sửa giảng viên viên</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        @foreach ($edit_teacher as $key => $data_teacher)
        <div class="tile">
            <h3 class="tile-title">Chỉnh sửa thông tin giảng viên</h3> 
            <form action="{{URL::to('/update-teacher/'.$data_teacher->teacher_id)}}" method="post">
            <div class="tile-body">
                <div class="row" >
                    {{csrf_field()}}
                    <div class="form-group col-md-4">
                        <label class="control-label">Mã cán bộ</label>
                        <input class="form-control" type="text" value="{{$data_teacher->teacher_id}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Họ và tên</label>
                        <input class="form-control" name="ten" type="text" value="{{$data_teacher->teacher_name}}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Ngày sinh</label>
                        <input class="form-control" value="{{$data_teacher->teacher_ngaysinh}}" name="date" type="date">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Giới tính</label>
                        <select name="gt" class="form-control" id="exampleSelect2" required>
                            <?php if($data_teacher->teacher_gioitinh == "Nữ"): ?>
                                <option value="Nữ" selected>Nữ</option>
                                <option value="Nam">Nam</option>
                            <?php else: ?>
                                <option value="Nữ">Nữ</option>
                                <option value="Nam" selected>Nam</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Ngạch viên chức</label>
                        <input class="form-control" name="vienchuc" value="{{$data_teacher->teacher_ngachvienchuc}}" type="text" required>
                    </div>
                    <div class="form-group  col-md-4">
                        <label class="control-label">Trình độ chuyên môn</label>
                        <input class="form-control" name="chuyenmon" value="{{$data_teacher->teacher_trinhdo}}" type="text" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label">Khoa</label>
                        <select name="khoa" class="form-control" id="exampleSelect2" required>
                            <option>-- Chọn khoa --</option>
                            @foreach($khoa as $key => $data)
                            @if($data->khoa_id == $data_teacher->khoa_id)
                                <option selected value="{{$data->khoa_id}}">{{$data->khoa_ten}}</option>
                            @else
                                <option value="{{$data->khoa_id}}">{{$data->khoa_ten}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>
                <button  type="submit" name="update_sv" class="btn btn-primary" title="Sửa">Cập nhật thông tin sinh viên</button>
                    <a class="btn btn-cancel" href="{{URL::to('/all-teacher')}}">Hủy bỏ</a>
            </div>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection