<?php
require'functions.php';

if (isset($_POST["register"])){
if(registrasi($_POST)>0){
    echo"<script>
            alert('Selamat Anda Berhasil Ditambahkan Kembali Kemenu login');
            document.location.href='index.php';
        </script>";
    }else{
            echo mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Animated Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/e50c83e75c.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>
  <body>
    <img class="wave" src="img/bg.png" />
    <div class="container">
      <div class="img">
        <img src="img/dig.png" />
      </div>
      <div class="login-content">
        <form action="" method="post" >
          <img src="img/avatar.svg" />
          <h2 class="title">Register</h2>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <h5 for="username" >Name</h5>
              <input type="text" class="input" name="username" id="Username" required/>
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fa-solid fa-phone"></i>
            </div>
            <div class="div">
              <h5>Kontak</h5>
              <input type="text" class="input" name="kontak" required />
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="div">
              <h5>E-mail</h5>
              <input type="email" class="input" name="email" required/>
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fa-solid fa-lock-open"></i>
            </div>
            <div class="div">
              <h5 for="password" >password</h5>
              <input
                type="password"
                class="input"
                name="password"
                id="password"
                required
              />
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <h5 for="password2" >Confirm Password</h5>
              <input
                type="password"
                class="input"
                name="password2"
                id="password2"
                required
              />
            </div>
          </div>
          <input type="submit" class="btn" name="register" />
        </form>
      </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>
