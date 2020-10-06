<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Trang đăng bài tập</title>
    <style>
        .button-submit{
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
            text-align: center;
        }
        *{
            box-sizing: border-box;
        }
        body{
            margin: 0;
        }
    </style>
</head>
<body>
@if(session('level')==0)
<h2>Đăng bài tập</h2>
<form action="{{route('storeAssignment')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <br><input type="file" name="fileUpload" value="">
    <input type="submit" name="upload" value="Upload">
</form>
@endif
<br><br><div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th width=950>Danh sách bài tập</th>
            <th width=550><b>Hành động</b></th>
        </tr>
        </thead>
        <tbody>
        @foreach($allfiles as $file)
            <tr>
                <td><a href="{{ route('downloadAssignment', $file->getFileName())}}">{{$file->getFileName()}}</a></td>
                @if(session('level')==1)
                    <th><button class="button-submit" onclick="window.location='{{route('submitAnswer')}}'">Nộp bài</button></th>
                @else
                    <th><button class="button-submit" onclick="window.location='{{route('listAnswer')}}'">Bài làm</button></th>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
