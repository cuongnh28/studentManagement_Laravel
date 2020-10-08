<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {font-family:Arial, Sans-Serif;}
        .clearfix:before, .clearfix:after { content: ""; display: table; }
        .clearfix:after { clear: both; }
        a {color:#0067ab; text-decoration:none;}
        a:hover {text-decoration:underline;}
        .form{width: 300px; margin: 0 auto;}
        input[type='text'], input[type='email'], input[type='password'] {width: 200px; border-radius: 2px;border: 1px solid #CCC; padding: 10px; color: #333; font-size: 14px; margin-top: 10px;}
    </style>
</head>
<body>
<div class="form">
    <br><br><h1>Đăng nhập</h1>
    <form action="{{ route('login') }}" method="post" name="login">
        @csrf
        <input type="text" name="username" placeholder="Tên đăng nhập" required />
        <input type="password" name="password" placeholder="Mật khẩu" required /><br><br>
        <button class="btn btn-primary" type="submit" name="submit">Đăng nhập</button>
    </form>
</div>
</body>
</html>
