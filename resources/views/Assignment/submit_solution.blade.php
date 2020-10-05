<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Nộp bài làm</title>
</head>
<body>
    <h2>Nộp bài làm</h2>
    <form action="{{route('storeAnswer')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <br><input type="file" name="fileUpload" value="">
        <input type="submit" name="upload" value="Upload">
    </form>
</body>
</html>
