<!DOCTYPE html>
<html lang="vi">
<head>
    @extends('Teacher.teacher')
    @section('content')
    <link rel="stylesheet" href="Css/footer.css">
    <title>Edit Student Form</title>
    <meta charset="UTF-8">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Edit Teacher</h2>
        </div>
        <div class="panel-body">
            <form action={{route('updateTeacher')}} method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{$getTeacherById[0]->username}}"
                           disabled>
                </div>
                <div class="form-group">
                    <label for="usr">Name:</label>
                    <input type="number" name="id" value="{{$getTeacherById[0]->id}}" style="display: none;">
                    <input required="true" type="text" class="form-control" id="usr" name="name" value="{{$getTeacherById[0]->name}}"
                           disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input required="true" type="email" class="form-control" id="email" name="email"
                           value="{{$getTeacherById[0]->email}}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="phone" class="form-control" id="phone" name="phone" value="{{$getTeacherById[0]->phone}}">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input required="true" type="password" class="form-control" id="password" name="password"
                           value="{{$getTeacherById[0]->password}}">
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>
</body>
@endsection
</html>
