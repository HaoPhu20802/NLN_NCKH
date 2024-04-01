@extends('admin_layout')
@section('admin_content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách ngành</li>
        <li class="breadcrumb-item"><a href="#">Chỉnh sửa ngành</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        @foreach ($edit_major as $key => $data_major)
            <div class="tile">
                <h3 class="tile-title">Chỉnh sửa thông tin Ngành</h3> 
                <form action="{{URL::to('/update-major/'.$data_major->nganh_id)}}" method="post">
                    <div class="tile-body">
                        <div class="row" >
                            {{csrf_field()}}
                            <div class="form-group col-md-4">
                                <label class="control-label">ID Ngành</label>
                                <input class="form-control" type="text" value="{{$data_major->nganh_id}}" name="faculty_id" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Chọn khoa</label>
                                <select name="faculty" class="form-control" id="exampleSelect2" required>
                                    <option>-- Chọn khoa --</option>
                                        @foreach($faculty as $key => $data)
                                            @if($data->khoa_id == $data_major->khoa_id)
                                                <option selected value="{{$data->khoa_id}}">{{$data->khoa_ten}}</option>
                                            @else
                                                <option value="{{$data->khoa_id}}">{{$data->khoa_ten}}</option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Tên Ngành</label>
                                <input class="form-control" type="text" value="{{$data_major->nganh_ten}}" name="major_name">
                            </div>
                        </div>
                        <button class="btn btn-save" title="Sửa" id="show-emp" >Cập nhật thông tin ngành
                    </button>
                            <a class="btn btn-cancel" href="{{URL::to('/all-major')}}">Hủy bỏ</a>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection