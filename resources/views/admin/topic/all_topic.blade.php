@extends('admin_layout')
@section('admin_content')
<div class="app-title">
  <ul class="app-breadcrumb breadcrumb side">
    <li class="breadcrumb-item active"><a href="#"><b>Danh sách đề tài</b></a></li>
  </ul>
  <div id="clock"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">

        <div class="row element-button">
          <div class="col-sm-2">

            <a class="btn btn-add btn-sm" href="{{URL::to('/add-teacher')}}" title="Thêm"><i class="fas fa-plus"></i>
              Tạo mới giảng viên</a>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                class="fas fa-print"></i> In dữ liệu</a>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i
                class="fas fa-file-pdf"></i> Xuất PDF</a>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                class="fas fa-trash-alt"></i> Xóa tất cả </a>
          </div>
        </div>
        <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" 
          id="sampleTable">
          <thead>
            <tr>
              <th>Tên đề tài</th>
              <th width="90px">Ngày bắt đầu</th>
              <th width="90px">Ngày kết thúc</th>
              <th>Lĩnh vực</th>
              <th width="80px">Trạng thái</th>
              <th width="80px">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_topic as $key => $data_topic)
          <tr>
            <td>{{$data_topic->topic_name}}</td>
            <td>{{$data_topic->topic_start}}</td>
            <td>{{$data_topic->topic_end}}</td>
            <td>{{$data_topic->topic_linhvuc}}</td>
            <td>{{$data_topic->topic_status}}</td>
            <td>
              <a href="{{URL::to('/detail-topic/'.$data_topic->topic_id)}}" class="active" ui-toggle-class="">Xem chi tiết</a>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  function deleteRow(r, deleteUrl) {
      var i = r.parentNode.parentNode.parentNode.rowIndex;
      swal({
        title: "Cảnh báo",
        text: "Bạn có chắc chắn muốn xóa giảng viên này?",
        buttons: ["Hủy bỏ", "Đồng ý"],
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = deleteUrl;
        }
      });
    }
  </script>

@endsection