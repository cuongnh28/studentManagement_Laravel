<!DOCTYPE html>
<html lang="vi">
<head>
    @extends('Layout.header')
    @section('content')
        <meta charset="utf-8">
        <title>Trang đăng bài tập</title>
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
    <div class="container" style="margin-left: 20px; margin-bottom: 15px">
        <h2>Đăng bài tập</h2>
        <form action="{{route('storeAssignment')}}" method="post" enctype="multipart/form-data">
            @csrf
            <br><input type="file" name="fileUpload" value="">
            <button type="submit" class="btn btn-primary" name="upload">Thêm</button>
            {{--    <input type="submit" name="upload" value="Upload">--}}
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
                            <th><button class="btn btn-success" onclick="window.location='{{route('submitAnswer')}}'">Nộp bài</button></th>
                        @else
                            <th><button class="btn btn-success" onclick="window.location='{{route('listAnswer')}}'">Bài làm</button></th>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @if(Session::has('success'))
            <p style="color: #5cb85c"><strong>{{Session::get('success')}}</strong></p>
        @elseif(Session::has('error'))
            <p style="color: #ff0000"><strong>{{Session::get('error')}}</strong></p>
        @endif
        <div id="footer"> Copyright &copy;2020 by hongcuongnguyen </div>
    </div>
</body>
</html>
@endsection
