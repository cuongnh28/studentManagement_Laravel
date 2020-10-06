<!DOCTYPE html>
<html lang="vi">
<head>
    @extends(session('level')==0 ? 'Teacher.teacher' : 'Student.student')
    @section('content')
    <meta charset="utf-8">
        <style>
            body {font-family:Arial, Sans-Serif;}
            .clearfix:before, .clearfix:after { content: ""; display: table; }
            .clearfix:after { clear: both; }
            a {color:#0067ab; text-decoration:none;}
            a:hover {text-decoration:underline;}
            .form{width: 300px; margin: 0 auto;}
            input[type='text'], input[type='email'], input[type='password'] {width: 200px; border-radius: 2px;border: 1px solid #CCC; padding: 10px; color: #333; font-size: 14px; margin-top: 10px;}
            input[type='submit']{padding: 10px 25px 8px; color: #fff; background-color: #0067ab; text-shadow: rgba(0,0,0,0.24) 0 1px 0; font-size: 16px; box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0; border: 1px solid #0164a5; border-radius: 2px; margin-top: 10px; cursor:pointer;}
            input[type='submit']:hover {background-color: #024978;}
        </style>
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
