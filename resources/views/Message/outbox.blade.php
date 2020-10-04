<!DOCTYPE html>
<html lang="vi">
<head>
    @extends(session('level')==0 ? 'Teacher.teacher' : 'Student.student')
    @section('content')
<style>
    .table-bordered td, .table-bordered th {
        border: 1px solid #dee2e6;
    }
    .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }
    *{
        box-sizing: border-box;
    }
    body{
        margin: 0;
    }
</style>
    <title>Hộp thư đi</title>
    <meta charset="utf-8">
    <div>
        <h1 style="text-align: center;">Tin nhắn đã gửi</h1> <br><br><br>
    </div>
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
<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th width=200>Người gửi</th>
            <th width=200>Người nhận</th>
            <th width=400>Nội dung</th>
            <th width=300>Thời gian</th>
            <th width=200>Action</th>
            <th width=200>Action</th>
        </tr>
        </thead>
        @foreach($outbox as $key=>$message)
            <tr>
            <td width=200>{{$message->sender}}</td>
            <td width=200>{{$message->receiver}}</td>
            <td width=400>{{$message->message}}</td>
            <td width=300>{{$message->create_at}}</td>
            <td width=200><button class="btn btn-warning" onclick="window.location='{{ route('editMessage', $message->id) }}'">Edit</button></td>
            <td width=200><button class="button btn-danger" onclick="window.location='{{ route("deleteMessage", $message->id) }}'">Delete</button></td>
            </tr>
        @endforeach
        <tbody>

        </tbody>
    </table>
</div>
</body>
@endsection
</html>
