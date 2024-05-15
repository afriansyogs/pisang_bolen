<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <h1>Hi {{ Auth::user()->name }}</h1><br>
        <div class="col-md-8">
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
        </div>
</body>
</html>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
