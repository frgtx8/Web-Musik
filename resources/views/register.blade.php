<!DOCTYPE html>
<html>
<head>
    <title>Buat Akun Baru</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>

</head>
<body>
    <div class="container">
        <h2>Buat akun baru</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nama">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button>Register</button>
        </form>
        <p>Sudah punya akun? <a href="/login">Masuk</a></p>
    </div>
</body>
</html>
