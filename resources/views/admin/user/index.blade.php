<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach ($users as $user)
    <h1 class="mb-0">{{ $user->name }}</h1>
    <h1 class="mb-0">{{ $user->number }}</h1>
    <h1 class="mb-0">{{ $user->email }}</h1>  
    
    @endforeach
</body>
</html>