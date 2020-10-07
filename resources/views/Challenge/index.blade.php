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
<h2>Your Challenge</h2>
<table class="table-bordered">
    <thead>
    <tr>
        <th width="100">STT</th>
        <th width="800">Gợi ý</th>
        @if(session('level') == 1)
        <th width="100"></th>
        @endif
    </tr>
    </thead>
    <tbody>
    <?php $stt = 1; ?>
    @foreach ($challenges as $challenge)
        <tr>
            <td width="100">{{$stt++}}</td>
            <td width="800">{{ $challenge->suggest }}</td>
            @if(session('level')==1)
{{--            <td width="50"><a href="{{ route('challengeSolveView', $challenge->filename) }}" class="w3-button w3-white w3-border w3-round-large">Submit</a></td>--}}
                <td width="100"><button type="submit" class="btn btn-primary" name="send" onclick="window.location='{{route('challengeSolveView', $challenge->filename)}}'">Trả lời</button></td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
</div>
<div id="footer"> Copyright &copy;2020 by hongcuongnguyen </div>
</body>
</html>
@endsection
