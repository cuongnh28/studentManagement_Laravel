<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Challenge</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
@if(session('level')==0)
    <h2>Thêm Challenge</h2>
    <form class="w3-container" action="{{ route('challengeUpload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="w3-container">
            <input class="w3-input w3-border" required="true" style="width:100%;" type="file" name="fileUpload" value="">
        </div><br/>
        <div class="w3-container">
            <label for="suggest">Suggestion</label>
            <textarea class="w3-input w3-border" required="true" name="suggest" style="width:100%" rows="5" cols="50" placeholder="Write your suggest.."></textarea>
        </div><br/>
        <div class="w3-container">
            <input class="w3-button w3-right w3-teal" type="submit" name="up" value="Upload">
        </div>
    </form>
@endif
<h2>Your Challenge</h2>
<table class="styled-table">
    <thead>
    <tr>
        <th width="200">STT</th>
        <th width="200">Your Hint</th>
        <th width="50"></th>
    </tr>
    </thead>
    <tbody>
    <?php $stt = 1; ?>
    @foreach ($challenges as $challenge)
        <tr>
            <td width="200">{{$stt++}}</td>
            <td width="200">{{ $challenge->suggest }}</td>
            @if(session('level')==1)
            <td width="50"><a href="{{ route('challengeSolveView', $challenge->filename) }}" class="w3-button w3-white w3-border w3-round-large">Submit</a></td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
