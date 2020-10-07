<!DOCTYPE html>
<html lang="vi">
<head>
    @extends('Layout.header')
    @section('content')
    <meta charset="UTF-8">
    <title>List Student's answers</title>
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
            text-align: center;
        }
        *{
            box-sizing: border-box;
        }
        body{
            margin-left: 20px;
        }
    </style>
    <title>Bài làm của sinh viên</title>
    <div>
        <h2>Danh sách bài tập đã nộp</h2>
    </div>

    <!-- jQuery library -->
    <script src="lib/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="lib/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-left: 20px; margin-bottom: 15px">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th width=400 >Người nạp bài</th>
            <th width=300>Tên file</th>
            <th width=300>Thời gian nạp</th>
            <th width=300 >Tải về</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($submits as $sub)
            <tr>
                <td>{{ $sub->studentUsername }}</td>
                <td>{{ $sub->filename }}</td>
                <td>{{ $sub->create_at }}</td>
                <td><a href="{{ route('downloadAnswer', $sub->filename)}}">{{$sub->filename}}</a></td>            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div id="footer"> Copyright &copy;2020 by hongcuongnguyen </div>
</body>
</html>
@endsection
