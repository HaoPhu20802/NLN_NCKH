@extends('welcome')
@section('content')
<div class="row" style="border:1px solid #ddd; max-width:1100px; margin-left:180px;">
    <article class="col-sm-12">
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
                    <tr>
                    <th>Tên đề tài</th>
                    <th width="130px">Ngày bắt đầu</th>
                    <th width="130px">Ngày kết thúc</th>
                    <th>Lĩnh vực</th>
                    <th width="110px">Trạng thái</th>
                    <th width="110px">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($search_topic as $key => $data_topic)
                    <tr>
                    <td>{{$data_topic->topic->topic_name}}</td>
                    <td>{{$data_topic->topic->topic_start}}</td>
                    <td>{{$data_topic->topic->topic_end}}</td>
                    <td>{{$data_topic->topic->topic_linhvuc}}</td>
                    <td>{{$data_topic->topic->topic_status}}</td>
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