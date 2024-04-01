@extends('welcome')
@section('content')
<div class="row">
  <aside class="col-sm-3">
    <div class="app-title" style="margin-left:50px;">
       <h3>Lọc đề tài</h3>
    </div>
    <form action="" method="post" class="form-inline">
      <div class="row">
        <div class="clo-12">
          <select class="form-control" name="status">
            <option value="">Duyệt</option>
            <option value="">Chưa duyệt</option>
          </select>  
        </div>
        <div class="clo-12">
          <select class="form-control" name="linhvuc">
            <option value="">Duyệt</option>
          </select>  
        </div>
      </div>
    </form>
  </aside>
<article class="col-sm-9">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb side">
        <h3>Danh sách đề tài</h3>
      </ul>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
              id="sampleTable">
              
              <thead>
                <tr >
                  <td colspan="6">Tổng số đề tài nghiên cứu: <b>{{ $total_topics }} </b></td>
                </tr>
                <tr>
                  <th>Tên đề tài</th>
                  <th>Ngày bắt đầu</th>
                  <th>Ngày kết thúc</th>
                  <th>Lĩnh vực</th>
                  <th>Trạng thái</th>
                  <th>Hành động</th>
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
                    <a href="{{URL::to('/detail/'.$data_topic->topic_id)}}" class="active" ui-toggle-class="">Xem chi tiết</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </article>
    </div>
@endsection