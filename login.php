<?php
session_start();
require'functions.php';
//cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id= $_COOKIE['id'];
    $key= $_COOKIE['key'];
//ambil username berdasarkan id
$result = mysqli_query($conn ,"SELECT username FROM user WHERE id= $id");
$row= mysqli_fetch_assoc($result);
//cek cookie dan username
if($key === hash('sha256', $row['username'])){
    $_SESSION['login'] = true;
}

}
//sesion

if(isset($_SESSION["login"])){
    header("Location: index2.php");
    exit();
}

if(isset($_POST["login"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result=mysqli_query($conn,"SELECT*FROM user WHERE username ='$username'");

    // pengecekan semua username
    if(mysqli_num_rows($result)===1){
        //cek dulu passwordnya

        $row=mysqli_fetch_assoc($result);
     if(password_verify($password, $row['password'])){
            //set session terlebih dahulu
            $_SESSION["login"] = true;
            //cek remember me
            if(isset($_POST['remember'])){
                setcookie('id', $row['id'], time() + 3600);
                setcookie('key', hash('sha256',$row['username']), time() + 3600);
            }

            header("Location: tambah.php");
            exit;
     }
    }

$error=true;
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
    <img class="wave" src="img/bg.png"" />
    <div class="container">
      <div class="img">
        <img src="img/dig.png" />
      </div>
      <div class="login-content">
        <form action="" method="post">
          <img src="img/avatar.svg" />
          <h2 class="title">Welcome</h2>
		  <?php if(isset($error)) : ?>
		  <p style="color:red; font-style:italic;">username / password salah</p>
	  <?php endif; ?>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <h5>Username</h5>
              <input type="text" class="input" name="username" id="username"/>
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <h5>Password</h5>
              <style>
                
.show-hide {
  position: absolute;
  right: 15px;
  top: 50%;
  transform: translateY(-50%);
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
}

.show-hide i {
  font-size: 19px;
  cursor: pointer;
  display: none;
}

.show-hide i.hide::before {
  content: "\f070";
}
input:valid ~ .show-hide i {
  display: block;
}

              </style>
              <input type="password" class="input" name="password" id="password"/>
              <span class="show-hide">
                <i
                  class="fa-solid fa-eye-slash"
                  style="color: #afb4bb"
                  id="eyeicon"
                ></i>
              </span>
            </div>
          </div>
          <div class="input-div one">
            <div class="i">
            <i class="fa-solid fa-check-to-slot"></i>
            </div>
            <div class="div">
              <h5> <input type="checkbox" class="" name="remember" id="remember" width="500" style="margin: 5px;" />  Remember Me !</h5>
            </div>
          </div>
          
            <ul>
              <li style="display: inline-block; text-decoration: none; margin:  10px;"><a href="#">Forgot Password?</a></li>
              <li style="display: inline-block; text-decoration: none; margin:  10px;"><a href="registrasi.php">Create New Account</a></li>
            </ul>
         
          <input type="submit" class="btn" name="login" />
        </form>
      </div>
    </div>
    <script>
      
let eyeicon = document.getElementById("eyeicon");
let password = document.getElementById("password");
eyeicon.onclick = function () {
  if (password.type == "password") {
    password.type = "text";
    eyeicon.className = "fa-solid fa-eye";
  } else {
    password.type = "password";
    eyeicon.className = "fa-solid fa-eye-slash";
  }
};

    </script>
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>
