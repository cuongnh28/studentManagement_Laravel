<!DOCTYPE html>
<html lang="vi">
<head>
    @extends('Layout.header')
    @section('content')
        <style>
            #footer{
                text-align: left;
                font-size: 80%;
                border-top: 1px solid pink;
                margin-top: 20px;
                padding: 2px 50px;
            }
        </style>
        <meta charset="UTF-8">
        <title> User List </title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-left: 20px; margin-bottom: 15px">
    <div class="panel panel-primary">
        <div class="panel-heading" style="text-align:center"><br>
            <strong>Danh sách người dùng</strong>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Stt</th>
                    <th>Họ & tên</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Chức vụ</th>
                    <th>Action</th>
                    @if(session('level')==0)
                        <th>Action</th>
                        <th>Action</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1; ?>
                @foreach($listusers as $key=>$user)
                    <tr>
                        <td>{{$stt++}} </td>
                        <td>{{$user->name}} </td>
                        <td>{{$user->username}} </td>
                        <td>{{$user->email}} </td>
                        <td>{{$user->phone}} </td>
                        @if($user->level==0) <td><b>{{'Teacher'}} </b></td>
                        @else <td><b>{{'Student'}} </b></td>
                        @endif
                        <td><button class="btn btn-primary" onclick="window.location='{{ route('message', $user->username) }}'">Nhắn tin</button></td>
                        @if($user->level==1 && session('level')==0)
                            <td><button class="btn btn-warning" onclick="window.location='{{ url("student/"."{$user->id}"."/edit") }}'">Sửa</button></td>
                            <td><button class="btn btn-danger" onclick="window.location='{{ url("student/"."{$user->id}"."/delete") }}'">Xóa</button></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(session('level')==0)
                <td><button class="btn btn-success" onclick="window.location='{{ url("student/create") }}'">Thêm sinh viên</button></td>
            @endif
        </div>
    </div>
    @if(Session::has('success'))
        <br><p style="color: #5cb85c"><strong>{{Session::get('success')}}</strong></p>
    @elseif(Session::has('error'))
        <br><p style="color: #ff0000"><strong>{{Session::get('error')}}</strong></p>
    @endif
</div>
<div id="footer"> Copyright &copy;2020 by hongcuongnguyen </div>
</body>
@endsection
</html>

