<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>register</h1>
    <form action="/register" method="post">
        @csrf
        <label for="">Email</label>
        <input name="email" type="email">
        <label for="">Username</label>
        <input name="name" type="text">
        <label for="">Password</label>
        <input name="password" type="password">
        <button type="submit">ok</button>
    </form>
</body>
</html>
