<!DOCTYPE html>
<html lang="vi">
<head>
@extends('Layout.header')
@section('content')
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
        </style>
</head>
<body>
<div class="container" style="margin-left: 20px; margin-bottom: 15px">
    <h2>Solve Challenge</h2>
    <form method="post" action="{{ route('challengeSolve', $folder)}}">
        @csrf
        <div class="w3-container">
            <label for="hint">Suggestion</label>
            <textarea name="hint" class="w3-input w3-border" style="width:100%" rows="3" cols="50" placeholder="{{$suggest}}" disabled></textarea>
        </div><br/>
        <div class="w3-container">
            <label for="answer">Your answer</label>
            <input required type="text" class="w3-input w3-border" style="width:100%" name="answer" placeholder="Write your answer ..">
        </div><br/>
        <div class="w3-container">
            <button type="submit" class="btn btn-primary" name="send">Trả lời</button>
        </div><br/>
    </form>
    @if(Session::has('error'))
        <br><p style="color: #ff0000"><strong>{{Session::get('error')}}</strong></p>
    @endif
    <div id="footer"> Copyright &copy;2020 by hongcuongnguyen </div>
</div>
</body>
@endsection
