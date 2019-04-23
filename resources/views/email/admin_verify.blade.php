<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verify</title>
</head>
<body>
    <h2>Welcome {{$user->name}}</h2>
    <p>Please Verify Your Email for Activate Your Account <a href="{{ route('admin.verify',$user->token) }}">Click Here</a></p>
<a href="{{ route('admin.verify',$user->token) }}">{{ route('admin.verify',$user->token) }}</a>
</body>
</html>