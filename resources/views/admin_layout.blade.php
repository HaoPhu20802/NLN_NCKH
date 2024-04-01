<!DOCTYPE html>
<html lang="en">

<head>
  <title>Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{asset('public/frontend/images/Logo_Dai_hoc_Can_Tho.svg.png')}}" type="image/x-icon">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('public/backend/doc/css/main.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

</head>

<body onload="time()" class="app sidebar-mini rtl">
<section id="container">
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="{{URL::to('/dashboard')}}" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="{{URL::to('/logout')}}"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="/images/hay.jpg" width="50px"
        alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><b style="text-transform: capitalize;">
            <?php
                $name = Session::get('admin_name');
                if($name){
                    echo $name;
                }
            ?></b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <li><a class="app-menu__item haha" href="phan-mem-ban-hang.html"><i class='app-menu__icon bx bx-cart-alt'></i>
          <span class="app-menu__label">Tổng quan</span></a></li>
      <li><a class="app-menu__item active" href="{{URL::to('/manage-banner')}}"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Banner</span></a></li>
      <li><a class="app-menu__item " href="{{URL::to('/all-student')}}"><i class='app-menu__icon bx bx-id-card'></i> <span
            class="app-menu__label">Quản lý sinh viên</span></a></li>
      <li><a class="app-menu__item" href="{{URL::to('/all-teacher')}}"><i class='app-menu__icon bx bx-user-voice'></i><span
            class="app-menu__label">Quản lý giảng viên</span></a></li>
      <li><a class="app-menu__item" href="{{URL::to('/all-account')}}"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý tài khoản</span></a>
      </li>
      <li><a class="app-menu__item" href="{{URL::to('/all-faculty')}}"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý khoa</span></a></li>
      <li><a class="app-menu__item" href="{{URL::to('/all-major')}}"><i class='app-menu__icon bx bx-run'></i><span
            class="app-menu__label">Quản lý ngành
          </span></a></li>
      <li><a class="app-menu__item" href="{{URL::to('/all-topic')}}"><i class='app-menu__icon bx bx-dollar'></i><span
            class="app-menu__label">Quản lý đề tài</span></a></li>
      <li><a class="app-menu__item" href="quan-ly-bao-cao.html"><i
            class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Báo cáo doanh thu</span></a>
      </li>
      <li><a class="app-menu__item" href="{{URL::to('/all-comment')}}"><i class='app-menu__icon bx bx-calendar-check'></i><span
            class="app-menu__label">Quản lý bình luận </span></a></li>
      <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Cài
            đặt hệ thống</span></a></li>
    </ul>
  </aside>
  <main class="app-content">
        <section id="main-content">
            <section class="wrapper">
                @yield('admin_content')
            </section>
        </section>
    
  </main>
  {{-- <script src="{{asset('public/backend/doc/js/jquery-3.2.1.min.js')}}"></script> --}}
  <!--===============================================================================================-->
  <script src="{{asset('public/backend/doc/js/popper.min.js')}}"></script>
  <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
  <!--===============================================================================================-->
  <script src="{{asset('public/backend/doc/js/bootstrap.min.js')}}"></script>
  <!--===============================================================================================-->
  <script src="{{asset('public/backend/doc/js/main.js')}}"></script>
  <!--===============================================================================================-->
  <script src="{{asset('public/backend/doc/js/plugins/pace.min.js')}}"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="{{asset('public/backend/doc/js/plugins/chart.js')}}"></script>
  <!--===============================================================================================-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script src="{{asset('public/backend/doc/src/jquery.table2excel.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/backend/doc/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/backend/doc/js/plugins/dataTables.bootstrap.min.js')}}"></script>

  <script src="{{asset('public/backend/src/jquery.table2excel.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <!-- Data table plugin-->
  
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
  <script type="text/javascript">
    var data = {
      labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"],
      datasets: [{
        label: "Dữ liệu đầu tiên",
        fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
        strokeColor: "rgb(255, 212, 59)",
        pointColor: "rgb(255, 212, 59)",
        pointStrokeColor: "rgb(255, 212, 59)",
        pointHighlightFill: "rgb(255, 212, 59)",
        pointHighlightStroke: "rgb(255, 212, 59)",
        data: [20, 59, 90, 51, 56, 100]
      },
      {
        label: "Dữ liệu kế tiếp",
        fillColor: "rgba(9, 109, 239, 0.651)  ",
        pointColor: "rgb(9, 109, 239)",
        strokeColor: "rgb(9, 109, 239)",
        pointStrokeColor: "rgb(9, 109, 239)",
        pointHighlightFill: "rgb(9, 109, 239)",
        pointHighlightStroke: "rgb(9, 109, 239)",
        data: [48, 48, 49, 39, 86, 10]
      }
      ]
    };
    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxb = $("#barChartDemo").get(0).getContext("2d");
    var barChart = new Chart(ctxb).Bar(data);
  </script>
  <script type="text/javascript">
    //Thời Gian
    function time() {
      var today = new Date();
      var weekday = new Array(7);
      weekday[0] = "Chủ Nhật";
      weekday[1] = "Thứ Hai";
      weekday[2] = "Thứ Ba";
      weekday[3] = "Thứ Tư";
      weekday[4] = "Thứ Năm";
      weekday[5] = "Thứ Sáu";
      weekday[6] = "Thứ Bảy";
      var day = weekday[today.getDay()];
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      nowTime = h + " giờ " + m + " phút " + s + " giây";
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = day + ', ' + dd + '/' + mm + '/' + yyyy;
      tmp = '<span class="date"> ' + today + ' - ' + nowTime +
        '</span>';
      document.getElementById("clock").innerHTML = tmp;
      clocktime = setTimeout("time()", "1000", "Javascript");

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }
    }
    var $j = jQuery.noConflict();

  </script>
</body>

</html>