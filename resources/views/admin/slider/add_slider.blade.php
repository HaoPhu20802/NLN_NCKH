@extends('admin_layout')
@section('admin_content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách slide</li>
        <li class="breadcrumb-item"><a href="#">Thêm slide</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Thêm slide</h3> 
            <form action="{{URL::to('/insert-slider')}}" method="post" enctype="multipart/form-data">
            <div class="tile-body">
                <div class="row" >
                    {{csrf_field()}}
                    <div class="form-group col-md-4">
                        <label class="control-label">Tên slide</label>
                        <input class="form-control" name="slider_name" type="text"  required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Hình ảnh</label>
                        <input class="form-control" name="slider_image"  type="file" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label">Hiển thị</label>
                        <select name="slider_status" class="form-control" id="exampleSelect2" required> 
                            <option value="0">Hiện</option>
                            <option value="1">Ẩn</option> 
                        </select>
                    </div>
                </div>
                <button  type="submit" name="add_slide" data-toggle="modal" data-target="#ModalUP" class="btn btn-save" >Thêm</button>
                    <a class="btn btn-cancel" href="{{URL::to('/manage-banner')}}">Hủy bỏ</a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection