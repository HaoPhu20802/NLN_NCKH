@extends('admin_layout')
@section('admin_content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách khoa viên</li>
        <li class="breadcrumb-item"><a href="#">Chỉnh sửa khoa</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        @foreach($edit_faculty as $key => $edit_value)
            <div class="tile">
                <h3 class="tile-title">Chỉnh sửa thông tin khoa</h3> 
                <form action="{{URL::to('/update-faculty/'.$edit_value->khoa_id)}}" method="post">
                    <div class="tile-body">
                        <div class="row" >
                            {{csrf_field()}}
                            <div class="form-group col-md-4">
                                <label class="control-label">ID khoa</label>
                                <input class="form-control" type="text" value="{{$edit_value->khoa_id}}" name="faculty_id" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Tên khoa</label>
                                <input class="form-control" type="text" value="{{$edit_value->khoa_ten}}" name="faculty_name" >
                            </div>
                        </div>
                        <button  type="submit" name="update_faculty"  class="btn btn-save " title="Sửa">Cập nhật thông tin khoa</button>
                            <a class="btn btn-cancel" href="{{URL::to('/all-faculty')}}">Hủy bỏ</a>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection