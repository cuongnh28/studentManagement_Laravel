<!DOCTYPE html>
<html lang="vi">
<head>
    @extends(session('level')==0 ? 'Teacher.teacher' : 'Student.student')
    @section('content')
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
{{--@if(session('level')==0)    @extends('teacher')--}}
{{--@else @extends('student')--}}
{{--@endif--}}
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading" style="text-align:center"><br>
            Danh sách người dùng
{{--            Tim kiem theo ten chua lam.--}}
{{--            <form method="post">--}}
{{--                <input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;"--}}
{{--                       placeholder="Tìm kiếm theo tên">--}}
{{--            </form>--}}
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
                        <td><button class="button btn-primary" onclick="window.location='{{ route('message', $user->username) }}'">Message</button></td>
                        @if($user->level==1 && session('level')==0)
                        <td><button class="button btn-warning" onclick="window.location='{{ url("student/"."{$user->id}"."/edit") }}'">Edit</button></td>
                        <td><button class="button btn-danger" onclick="window.location='{{ url("student/"."{$user->id}"."/delete") }}'">Delete</button></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(session('level')==0)
                <td><button class="button btn-success" onclick="window.location='{{ url("student/create") }}'">Add Student</button></td>
            @endif
        </div>
    </div>
</div>
</body>
@endsection
</html>

