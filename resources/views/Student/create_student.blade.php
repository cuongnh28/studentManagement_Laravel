<!DOCTYPE html>
<html lang="vi">
<head>
    @extends(session('level')==0 ? 'Teacher.teacher' : 'Student.student')
    @section('content')
    <meta charset="utf-8">
    <title>Thêm sinh viên</title>
    <link rel="stylesheet" href="Css/main.css"/>
</head>
<body>
<div class="form">
    <h1>Thêm Sinh Viên</h1>
    <form name="add_student" action="{{ route('storeStudent') }}" method="post">
        {{ csrf_field() }}
        <input type="text" name="username" placeholder="Tên đăng nhập" required/>
        <input type="text" name="name" placeholder="Họ và tên" required/>
        <input type="email" name="email" placeholder="Email" required/>
        <input type="text" name="phone" placeholder="Số điện thoại" required/>
        <input type="password" name="password" placeholder="Mật khẩu" required/> <br>
        <input type="submit" style="background-color:#28a745" name="submit" value="Thêm"/>
    </form>
</div>
</body>
@endsection
</html>
