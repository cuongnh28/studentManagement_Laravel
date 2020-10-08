<!DOCTYPE html>
<html lang="vi">
<head>
    @extends('Layout.header')
    @section('content')
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <style>
            #footer{
                text-align: left;
                font-size: 80%;
                border-top: 1px solid pink;
                margin-top: 20px;
                padding: 2px 50px;
            }
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
        <title>Sửa sinh viên</title>
</head>
<body>
<div class="form">
    <h1>Sửa thông tin</h1>
    <form name="edit_student" action="{{ route('updateStudent') }}" method="post">
        @csrf
        <input type="text" name="id" value="{{$getStudentById[0]->id}}"
               hidden>
        <input type="text" name="username" placeholder="Tên đăng nhập" value="{{$getStudentById[0]->username}}"
               disabled>
        <input type="text" name="name" placeholder="Họ và tên" value="{{$getStudentById[0]->name}}"
               disabled>
        <input type="email" name="email" placeholder="Email" value="{{$getStudentById[0]->email}}">
        <input type="text" name="phone" placeholder="Số điện thoại" value="{{$getStudentById[0]->phone}}">
        <input type="password" name="password" placeholder="Mật khẩu" value="{{$getStudentById[0]->password}}"> <br><br>
        <td><button type="submit" class="btn btn-warning" name="submit">Sửa</button></td>
    </form>
    @if(Session::has('success'))
        <p style="color: #5cb85c"><strong>{{Session::get('success')}}</strong></p>
    @elseif(Session::has('error'))
        <p style="color: #ff0000"><strong>{{Session::get('error')}}</strong></p>
    @endif
</div>
<div id="footer"> Copyright &copy;2020 by hongcuongnguyen </div>
</body>
@endsection
</html>
