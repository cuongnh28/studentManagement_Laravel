<!DOCTYPE html>
<html lang="vi">
<head>
    <style>
        #footer{
            text-align: left;
            font-size: 80%;
            border-top: 1px solid pink;
            margin-top: 20px;
            padding: 2px 50px;
            margin-left: 120px;
        }
    </style>
    <title> Webdemo VCS</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}">
    <meta charset="utf-8">
    <meta name="description" content="Học laravel">
    <meta name="author" content="hongcuongnguyen">
</head>
<body>
<div id="container">
    <div id="menu">
        <ul>
            <li> <a href="{{url('home')}}">Trang chủ</a> </li>
            @if(session('level')==0)
                <li> <a href="{{ route('editTeacher', session('id'))}}">Sửa thông tin</a> </li>
            @else
                <li> <a href="{{ route('editStudent', session('id'))}}">Sửa thông tin</a> </li>
            @endif
            <li><a href="{{route('listUsers')}}">Người dùng</a></li>
            <li><a href="{{route('assignment')}}">Bài tập</a></li>
            @if(session('level')==1)
                <li><a href="{{route('listChallenge')}}">Challenge</a></li>
            @else
                <li> <a href="#"> Challenge </a>
                    <ul class="dich-vu">
                        <li><a href="{{route('addChallenge')}}">Thêm</a></li>
                        <li><a href="{{route('listChallenge')}}">Danh sách</a></li>
                    </ul>
                </li>
            @endif
            <li> <a href="#"> Hộp thư </a>
                <ul class="dich-vu">
                    <li><a href="{{route('inbox', session('username'))}}">Thư đến</a></li>
                    <li><a href="{{route('outbox', session('username'))}}">Thư đi</a></li>
                </ul>
            </li>
            <li><a href="{{url('logout')}}">Đăng xuất</a></li>
        </ul>
    </div>
    <div id="content">
        <div id="header">
            <div id="logo"> <img src="{{asset('css/vt.png')}}"> </div>
            <div id="slogan"> Học và thực hành web laravel cơ bản </div>
        </div>
    </div>
</div>
</body>
<div id="footer"> Copyright &copy;2020 by hongcuongnguyen </div>
</html>
