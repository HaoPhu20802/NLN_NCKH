<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nghiên cứu khoa học</title>
    <link rel="shortcut icon" href="{{asset('public/frontend/images/Logo_Dai_hoc_Can_Tho.svg.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('public/frontend/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/tailwind.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<header style="background: url({{ asset('public/frontend/images/2.jpg') }}); background-size: cover;">
    <div class="logo">
        <img src="{{asset('public/frontend/images/Logo_Dai_hoc_Can_Tho.svg.png')}}" alt="" sizes="" srcset="" width="100px" height="100px">
    </div>
    <div class="nav flex-column custom-nav">
        <ul>
            <li><a href="#" style="color:#fff; font-weight:bold; font-size:1em">CHƯƠNG TRÌNH QUẢN LÝ TRỰC TUYẾN</a></li>
            <li><a href="#" style="color:yellow; font-weight:bold; margin-left:50px">ĐỀ TÀI - DỰ ÁN KHOA HỌC</a></li>
        </ul>
    </div>
</header>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{URL::to('/')}}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/topic')}}">Đề tài nghiên cứu</a>
                </li>
                @php
                    $user_role = session('user_role');
                @endphp
                @if($user_role && $user_role == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL::to('/topic-register')}}">Đăng ký đề tài</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/topic-proposal')}}">Đề xuất đề tài</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/topic-details')}}">Liên hệ</a>
                </li>
            </ul>
            <div class="navbar-text">
                <ul class="navbar-nav">
                    <form action="{{URL::to('/tim-kiem')}}" method="post" style="margin-top:10px;">
                        {{csrf_field()}}
                        <li class="nav-item">
                            <input type="text" name="keywords" style="color:#000;" placeholder="Tên đề tài">
                            <input type="submit" value="Tìm kiếm" name="search-topic" style="margin-right: 10px; background-color:#1cb626;">
                        </li>
                    </form>
                    <li class="nav-item dropdown">
                        @if(session('user_email')) <!-- Kiểm tra xem người dùng đã đăng nhập chưa -->
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ session('user_name') }} <!-- Hiển thị email của người dùng đã đăng nhập -->
                            </a>
                            <img src="{{ asset('public/uploads/imgUser/' . session('user_image')) }}" alt="" sizes="" srcset="" class="images"> <!-- Hiển thị hình ảnh của người dùng đã đăng nhập -->
                            <ul class="dropdown-menu" aria-labelledby="show-emp">
                                <li><a class="dropdown-item" href="{{URL::to('/edit-info/'.session('user_id'))}}">Chỉnh sửa thông tin</a></li>
                                <li><a class="dropdown-item" href="{{URL::to('/logout-home')}}">Đăng xuất</a></li>
                            </ul>
                        @else
                            <a class="nav-link" href="#" id="show-emp" data-toggle="modal" data-target="#ModalUP">Đăng nhập</a>
                        @endif
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
</nav>
<main>
    @yield('content')
</main>
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <div>
            <a href="" class="me-4 text-reset"><i class="fab fa-facebook-f"></i></a>
            <a href="" class="me-4 text-reset"><i class="fab fa-twitter"></i></a>
            <a href="" class="me-4 text-reset"><i class="fab fa-google"></i></a>
            <a href="" class="me-4 text-reset"><i class="fab fa-instagram"></i></a>
            <a href="" class="me-4 text-reset"><i class="fab fa-linkedin"></i></a>
            <a href="" class="me-4 text-reset"><i class="fab fa-github"></i></a>
        </div>
    </section>
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4"><i class="fas fa-gem me-3"></i>Company name</h6>
                    <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">Products</h6>
                    <p><a href="#!" class="text-reset">Angular</a></p>
                    <p><a href="#!" class="text-reset">React</a></p>
                    <p><a href="#!" class="text-reset">Vue</a></p>
                    <p><a href="#!" class="text-reset">Laravel</a></p>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">Useful links</h6>
                    <p><a href="#!" class="text-reset">Pricing</a></p>
                    <p><a href="#!" class="text-reset">Settings</a></p>
                    <p><a href="#!" class="text-reset">Orders</a></p>
                    <p><a href="#!" class="text-reset">Help</a></p>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                    <p><i class="fas fa-envelope me-3"></i> info@example.com</p>
                    <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                    <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
</footer>

<div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="loginForm" action="{{ route('checkLogin') }}" method="POST"> <!-- Sửa đường dẫn action -->
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="title">Đăng nhập</div>
                                <div class="form-group">
                                    <label class="control-label" style="font-weight:bold; margin: 10px 5px">Email</label>
                                    <input class="form-control" type="text" name="user_email" id="user_email">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" style="font-weight:bold; margin: 10px 5px">Password</label>
                                    <input class="form-control" type="password" name="user_password" id="user_password">
                                </div>
                                <span id="loginError" class="text-alert" style="color:red;"></span> 
                                <br>
                                <div class="form-group col-md-9">
                                    <button class="login" type="submit">Đăng nhập</button>
                                    <a class="cancel"  href="">Hủy bỏ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{asset('public/frontend/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.min copy.js')}}"></script>
<script src="{{asset('public/frontend/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.dataTables.min.js')}}"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#sampleTable').DataTable({
            searching: false 
        });
    });
</script>
<script>
    $(document).ready(function() {
    $('#loginForm').submit(function(event) {
        event.preventDefault(); // Ngăn chặn việc gửi form một cách thông thường
        
        var formData = $(this).serialize(); // Thu thập dữ liệu từ form
        
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function(response) {
                // Xử lý kết quả trả về từ máy chủ
                if (response.success) {
                    // Đăng nhập thành công, thực hiện các hành động khác tại đây
                    // Ví dụ: ẩn modal
                    $('#ModalUP').modal('hide');
                    // Hiển thị thông báo thành công (nếu cần)
                    // Cập nhật giao diện trên trang (nếu cần)
                    window.location.reload();
                } else {
                    // Hiển thị thông báo lỗi trên trang modal
                    $('#loginError').text(response.message);
                }
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi nếu có
                console.error(xhr.responseText);
            }
        });
    });
});

</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var cancelButton = document.querySelector('.cancel');
        
        // Lưu trữ URL của trang hiện tại
        var currentUrl = window.location.href;

        cancelButton.addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ a
            window.location.href = currentUrl; // Chuyển hướng đến URL đã lưu trữ
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
    load_comment(); 

    function load_comment(){
        var  topic_id = $('input[name="topic_id"]').val();
        $.ajax({
            url: "{{url('/load-comment')}}",
            method: "POST",
            data: {topic_id: topic_id, _token: "{{ csrf_token() }}"},
            success: function(data){
                $('#comment_show').html(data);
            }
        });
    }
    $('.send-comment').click(function(){
        var topic_id = $('input[name="topic_id"]').val();
        var comment_content = $('.comment_content').val();
        var user_id = $('input[name="user_id"]').val();
        var token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ url('/send-comment') }}",
            method: "POST",
            data: {topic_id: topic_id, comment_content: comment_content, user_id: user_id, _token: token},
            success: function(data){
                $('#notify_comment').html('<p class="text text-success">Thêm bình luận thành công</p>');
                load_comment(); // Gọi hàm load_comment() sau khi thêm bình luận thành công
                $('.comment_content').val(''); // Xóa nội dung bình luận sau khi gửi thành công
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Hiển thị thông báo lỗi nếu cần
            }
        });
    });
    $(document).ready(function() {
    // Sự kiện click cho nút "Trả lời"
        $(document).on('click', '.reply-btn', function(e) {
            e.preventDefault();
            var commentId = $(this).data('comment-id');
            // Hiển thị khung trả lời tương ứng
            $('.reply-form[data-comment-id="' + commentId + '"]').toggle();
        });

        // Xử lý sự kiện khi người dùng gửi trả lời
        $(document).on('click', '.send-reply', function(e) {
            e.preventDefault();
            var commentId = $(this).closest('.reply-form').data('comment-id');
            var replyContent = $(this).siblings('.reply-content').val();

            // Thực hiện xử lý gửi trả lời, có thể gửi dữ liệu bằng Ajax tới server
            // Gửi cả commentId và replyContent để biết là trả lời bình luận nào và nội dung là gì
        });
    });

});

</script>    

</body>
</html>

