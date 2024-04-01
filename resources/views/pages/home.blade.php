@extends('welcome')
@section('content')
  <div class="row gx-2">
    <div class="col">
      <div class="border" style="height: 260px; overflow: hidden;  margin: 5px;">
          <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner" style="height: 260px;">
                  @php
                       $i = 0; 
                  @endphp
                  @foreach($slider as $key => $slide)
                  @php
                      $i++;
                  @endphp
                  <div class="carousel-item  {{$i==1 ? 'active' : ''}}">
                      <img src="public/uploads/slider/{{$slide->slider_image}}" style="height: 100%; width: 100%; display: block; margin: 0px;">
                  </div>
                  @endforeach
              </div>
          </div>
      </div>
  </div>
    <div class="col">
      <div class="p-3 border" style="height: 260px; margin: 5px;">
        <div class="card">
          <div class="card-header">
            Tin nổi bật
          </div>
          <ul class="list-group list-group-flush">
            <p>sdsfdsfdsf</p>
          </ul>
        </div><br>
      </div>
    </div>
    <div class="col">
        <div class="p-3 border" style="height: 260px; margin: 5px;" >
          <div class="row g-2">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  Đăng ký đề tài
                </div>
                <ul class="list-group list-group-flush">
                  <p>sdsfdsfdsf</p>
                </ul>
              </div><br>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  Đề xuất đề tài
                </div>
                <ul class="list-group list-group-flush">
                  <p>sdsfdsfdsf</p>
                </ul>
              </div><br>
            </div>
          </div>
        </div>
      </div>
    </div><br>
    <div class="row">
      <aside class="col-sm-3">
          <!-- danh mục sản phẩm -->
          <div class="card">
            <div class="card-header" >
              Đề xuất nổi bật
            </div>
            <ul class="list-group list-group-flush">
              <p>sdsfdsfdsf</p>
            </ul>
          </div><br>
          <div class="card">
            <div class="card-header" >
              Đề tài nổi bật
            </div>
            @foreach($popular_topic as $key => $data_topic)
            <ul class="list-group list-group-flush">
              <p>{{$data_topic->topic->topic_name}}</p>
            </ul>
            @endforeach
          </div>
      </aside>
      <article class="col-sm-9">
        <div class="card">
          <h1>adaearer</h1>
          <div class="card-header">
            De
          </div>
          <ul class="list-group list-group-flush">
            <table style="width:100%">
              <tr>
                <th>Firstname</th>
                <th>Lastname</th> 
                <th>Age</th>
              </tr>
              <tr>
                <td>Jill</td>
                <td>Smith</td>
                <td>50</td>
              </tr>
            </table>
          </ul>
        </div><br><br>
        <div class="card">
          <div class="card-header">
            <h5>Đề tài nghiên cứu khoa học</h5>
          </div>
          <ul class="list-group list-group-flush">
            @foreach($all_topic as $key => $data_topic)
            <table style="width:100%">
              <tr>
                <th colspan="5">Tên đề tài: {{$data_topic->topic_name}}</th>
              </tr>
              <tr>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Lĩnh vực</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
              <tr>
                <td>{{$data_topic->topic_start}}</td>
                <td>{{$data_topic->topic_end}}</td>
                <td>{{$data_topic->topic_linhvuc}}</td>
                <td>{{$data_topic->topic_status}}</td>
                <td>
                  <a href="{{URL::to('/detail/'.$data_topic->topic_id)}}" class="active" ui-toggle-class="">Xem chi tiết</a>
                </td>
              </tr>
            </table><br>
            @endforeach
          </ul>
        </div>
      </article>
  </div>
@endsection

           