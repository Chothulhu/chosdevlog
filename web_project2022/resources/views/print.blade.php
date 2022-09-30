<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
</head>
<body>

    @foreach (array_combine($comments, $usernames) as $comment => $username)   
        <p><b>{{$username}}:</b> {{$comment}}</p>    
    @endforeach
</body>
</html>