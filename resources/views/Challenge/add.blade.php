<!DOCTYPE html>
<html lang="vi">
<head>
    @extends('Layout.header')
    @section('content')
        <title>Challenge</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
            .table-bordered td, .table-bordered th {
                border: 1px solid #dee2e6;
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
<div class="container">
    @if(session('level')==0)
        <form action="{{ route('challengeUpload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <input required="true" style="width:100%;" type="file" name="fileUpload" value="">
            </div><br/>
            <div>
                <label for="suggest">Suggestion</label>
                <textarea required="true" name="suggest" style="width:100%" rows="5" cols="50" placeholder="Write your suggest.."></textarea>
            </div><br/>
            <button type="submit" class="btn btn-primary" name="send">Thêm</button>
        </form>
    @endif
</div>
<div id="footer"> Copyright &copy;2020 by hongcuongnguyen </div>
</body>
</html>
@endsection
