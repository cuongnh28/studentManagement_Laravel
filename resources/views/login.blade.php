<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
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
</head>
<body>
<div class="form">
    <h1>Đăng nhập</h1>
    <form action="{{ route('login') }}" method="post" name="login">
        @csrf
        <input type="text" name="username" placeholder="Tên đăng nhập" required />
        <input type="password" name="password" placeholder="Mật khẩu" required />
        <input name="submit" type="submit" value="Đăng nhập" />
    </form>
</div>
</body>
</html>
