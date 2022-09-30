<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/login" method="post">
    @csrf
    <p>Email : </p>
    <input type="email" name="email" data-id="email">
    <p>Password : </p>
    <input type="password" name="password" id="password" data-id="password">
    <input type="submit">
</form>
</body>
</html>
