<!DOCTYPE html>
<html lang="vi">
<head>
    @extends(session('level')==0 ? 'Teacher.teacher' : 'Student.student')
    @section('content')
    <meta charset="UTF-8">
</head>
<body>
<h1>Send message</h1>
<form action="{{route('editedMessage')}}" name="editMessage" method="post">
    {{ csrf_field() }}
    <input type="text" name="message" value="{{$getMessageByID[0]->message}}" required> <br>
    <input type="text" name="id" value="{{$getMessageByID[0]->id}}" hidden> <br>
    <input type="submit" name="submit" value="send">
</form>
</body>
@endsection
</html>
