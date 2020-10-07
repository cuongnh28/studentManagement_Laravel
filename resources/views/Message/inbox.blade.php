<!DOCTYPE html>
<html lang="vi">
<head>
@extends('Layout.header')
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
        <h1 style="text-align: center;">Tin nhắn đã nhận</h1> <br><br><br>
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
<div class="container" style="margin-left: 20px; margin-bottom: 15px">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th width=150>Người gửi</th>
            <th width=150>Người nhận</th>
            <th width=600>Nội dung</th>
            <th width=300>Thời gian</th>
            <th width=120>Action</th>
            <th width=100>Action</th>
        </tr>
        </thead>
        @foreach($inbox as $key=>$message)
            <tr>
                <td width=150>{{$message->sender}}</td>
                <td width=150>{{$message->receiver}}</td>
                <td width=600>{{$message->message}}</td>
                <td width=300>{{$message->create_at}}</td>
                <td width=120><button class="btn btn-primary" onclick="window.location='{{ route('message', $message->sender) }}'">Trả lời</button></td>
                <td width=100><button class="btn btn-danger" onclick="window.location='{{ route("deleteMessage", $message->id) }}'">Xóa</button></td>
            </tr>
        @endforeach
        {{session(['check' => 'inbox'])}}
        <tbody>
        </tbody>
    </table>
</div>
</body>
@if(Session::has('success'))
    <br><p style="color: #5cb85c"><strong>{{Session::get('success')}}</strong></p>
@elseif(Session::has('error'))
    <br><p style="color: #ff0000"><strong>{{Session::get('error')}}</strong></p>
@endif
@endsection
</html>
