<!DOCTYPE html>
<html lang="vi">
<head>
    @extends('Layout.header')
    @section('content')
        <meta charset="utf-8">
        <title>Nộp bài làm</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <style>
            body
            {
                margin: 0;
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
    <h2>Nộp bài làm</h2>
    <form action="{{route('storeAnswer')}}" method="post" enctype="multipart/form-data">
        @csrf
        <br><input type="file" name="fileUpload" value="">
        <button type="submit" class="btn btn-primary" name="upload">Thêm</button>
    </form>
</div>
@if(Session::has('success'))
    <p style="color: #5cb85c"><strong>{{Session::get('success')}}</strong></p>
@elseif(Session::has('error'))
    <p style="color: #ff0000"><strong>{{Session::get('error')}}</strong></p>
@endif
<div id="footer"> Copyright &copy;2020 by hongcuongnguyen </div>
</body>
</html>
@endsection
