<!DOCTYPE html>
<html lang="vi">
<head>
    @extends('Layout.header')
    @section('content')
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <style>
            #footer{
                text-align: left;
                font-size: 80%;
                border-top: 1px solid pink;
                margin-top: 20px;
                padding: 2px 50px;
            }
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
    <h1>Send message</h1>
    <form action="{{route('sendMessage', $receiver)}}" name="sendMessage" method="post">
        @csrf
        <div class="w3-container">
            <textarea class="w3-input w3-border" required="true" name="message" style="width:100%" rows="5" cols="50" placeholder="Text here"></textarea>
        </div><br>
        <div>
            <button type="submit" class="btn btn-primary" name="send">Gửi</button>
        </div>
    </form>
    @if(Session::has('success'))
        <br><p style="color: #5cb85c"><strong>{{Session::get('success')}}</strong></p>
    @elseif(Session::has('error'))
        <br><p style="color: #ff0000"><strong>{{Session::get('error')}}</strong></p>
    @endif
    <div id="footer"> Copyright &copy;2020 by hongcuongnguyen </div>
</div>
</body>
</html>
@endsection

