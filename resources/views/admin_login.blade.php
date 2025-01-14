
<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Đăng nhập quản trị | Website quản trị v2.0</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/main.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
	
</head>

<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset('public/backend/images/team.jpg')}}" alt="IMG">
            </div>
            <!--=====TIÊU ĐỀ======-->
            <div class="login100-form validate-form">
                <span class="login100-form-title">
                    <b>ĐĂNG NHẬP HỆ THỐNG QUẢN TRỊ</b>
                </span>
                <!--=====FORM INPUT TÀI KHOẢN VÀ PASSWORD======-->
                <form action="{{URL::to('/admin-dashboard')}}" method="POST">
                    {{csrf_field() }}
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" placeholder="Tài khoản quản trị" name="admin_email"
                            id="username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class='bx bx-user'></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input autocomplete="off" class="input100" type="" placeholder="Mật khẩu"
                            name="admin_password" id="password-field">
                        <span toggle="#password-field" class="bx fa-fw bx-hide field-icon click-eye"></span>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class='bx bx-key'></i>
                        </span>
                    </div>
					<?php
						$message = Session::get('message');
						if($message){
							echo '<span class="text-alert" style="color:red;">'.$message.'</span>';
							Session::put('message',null);
						}
					?>

                    <!--=====ĐĂNG NHẬP======-->
                    <div class="container-login100-form-btn">
                        <input type="submit" value="Đăng nhập " name="login">
                    </div>
                    <!--=====LINK TÌM MẬT KHẨU======-->
                    <div class="text-right p-t-12">
                        <a class="txt2" href="/forgot.html">
                            Bạn quên mật khẩu?
                        </a>
                    </div>
                </form>
               
                <!--=====FOOTER======-->
                <div class="text-center p-t-70 txt2">
                    Phần mềm quản lý đề tài <i class="far fa-copyright" aria-hidden="true"></i>
                    {{-- <script type="text/javascript">document.write(new Date().getFullYear());</script> <a
                        class="txt2" href="https://www.facebook.com/truongvo.vd1503/"> Code bởi Trường </a> --}}
                </div>
            </div>
        </div>
    </div>
</div>

    <!--Javascript-->
    {{-- <script src="{{asset('public/backend/js/main.js')}}"></script> --}}
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <script src="{{asset('public/backend/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('public/backend/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('public/backend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/backend/vendor/select2/select2.min.js')}}"></script>
    <script type="text/javascript">
        //show - hide mật khẩu
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text"
            } else {
                x.type = "password";
            }
        }
        $(".click-eye").click(function () {
            $(this).toggleClass("bx-show bx-hide");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
</body>

</html>