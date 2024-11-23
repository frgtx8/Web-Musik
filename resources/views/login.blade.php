<!DOCTYPE html>
<html>
 <head>
  <title>
   Melodify Login
  </title>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>

 </head>
 <body>
  <div class="container">
   <img alt="Music note icon" class="logo" height="100" src="{{ asset('img/logo melodify.png') }}" width="100"/>
   <div class="title">
    Melodify
   </div>
   <form action="/login" method="POST">
    @csrf
    <div class="input-container">
        <i class="fas fa-user icon">
        </i>
        <input placeholder="Username" type="text" name="name"/>
       </div>
       <div class="input-container">
        <i class="fas fa-lock icon">
        </i>
        <input placeholder="Password" type="password" name="password"/>
       </div>
       <button class="login-button">
        Login
       </button>
    </form>

   <div class="create-account"><p>    <a href="/register">
    Buat akun baru
</a></p>

   </div>
  </div>
 </body>
</html>
