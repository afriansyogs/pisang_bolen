<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    <h1>Hi {{ Auth::user()->name }}</h1><br>
    <div class="form-group">
        <h1>Name</h1>
        <h2>{{ $user->name }}</h2>
    </div><br>
    <div class="form-group">
        <h1>Number Phone</h1>
        <h2>{{ $user->name }}</h2>
    </div><br>
    <div class="form-group">
        <h1>Email</h1>
        <h2>{{ $user->email }}</h2>
    </div>
</body>
</html>
