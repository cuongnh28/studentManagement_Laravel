<!DOCTYPE html>
<html lang="vi">
<head>
    @extends(session('level')==0 ? 'Teacher.teacher' : 'Student.student')
    @section('content')
    <meta charset="UTF-8">
</head>
<body>
<h1>Send message</h1>
<form action="{{route('sendMessage', $receiver)}}" name="sendMessage" method="post">
    {{ csrf_field() }}
    <input type="text" name="message" placeholder="Text here" required> <br>
    <input type="submit" name="submit" value="send">
</form>
</body>
@endsection
</html>

