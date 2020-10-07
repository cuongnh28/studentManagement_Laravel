<!DOCTYPE html>
<html lang="vi">
<head>
    @extends('Layout.header')
    @section('content')
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        .container
        {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container" style="margin-left: 20px; margin-bottom: 15px">
<h1>Sửa tin nhắn</h1>
<form action="{{route('editedMessage')}}" name="editMessage" method="post">
    @csrf
    @csrf
    <div>
        <textarea required name="message" style="width:100%" rows="5" cols="50">{{$getMessageByID[0]->message}}</textarea>
    </div><br>
    <input type="text" name="id" value="{{$getMessageByID[0]->id}}" hidden> <br>
    <div>
        <button type="submit" class="btn btn-primary" name="send">Gửi</button>
    </div>
</form>
@if(Session::has('success'))
    <br><p style="color: #5cb85c"><strong>{{Session::get('success')}}</strong></p>
@elseif(Session::has('error'))
    <br><p style="color: #ff0000"><strong>{{Session::get('error')}}</strong></p>
@endif
</body>
</div>
@endsection
</html>
