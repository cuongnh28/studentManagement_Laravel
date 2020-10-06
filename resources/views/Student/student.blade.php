<!DOCTYPE html>
<html lang="vi">
<head>
    <title>CSS Website Layout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
        }

        /* Style the header */
        .header {
            background-color: #f1f1f1;
            padding: 5px;
            text-align: center;
        }

        /* Style the top navigation bar */
        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        /* Style the topnav links */
        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Change color on hover */
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>Student Management</h1>
</div>

<div class="topnav">
    <a href="studentView.php">Trang chủ</a>
    <a href="{{ route('editStudent', session('id'))}}">Sửa thông tin</a>
    <a href="{{route('listUsers')}}">Xem danh sách người dùng</a>
    <a href="{{route('assignment')}}">Bài tập</a>
    <a href="{{route('challenge')}}">Challenge</a>
    <a href="{{route('inbox', session('username'))}}">Hộp thư đến</a>
    <a href="{{route('outbox', session('username'))}}">Hộp thư đi</a>
    <a href="{{url('logout')}}">Đăng xuất</a>
</div>
</body>
<div class="container">
    @yield('content')
</div>
</html>
