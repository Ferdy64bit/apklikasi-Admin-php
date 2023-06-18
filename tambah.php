<?php
session_start();

if( !isset($_SESSION["login"]) ){
header("Location: login.php");
    exit;
}
require'functions.php';
// //sql
$conn=mysqli_connect("localhost","root","","latihanweb");


//pemisah
if ( isset($_POST [ "submit"])){
//     //ambil data dari setiap elemen
// var_dump($_POST);
// var_dump($_FILES);


if(tambah($_POST)>0){
 echo"

 <script>
 alert('Selmat Data Berhasil Di Tambahakan!!!');
 document.location.href='index2.php';
</script> 
 ";
}else{
    echo"
    <script>
        alert('Maaf Data Gagal Di Tambahkan!!!');
        document.location.href='tambah.php';
    </script>";
}


//cek data sql
// if( mysqli_affected_rows($conn)>0 ){
//     echo"Selamat Anda Berhasil";
// }else{
//  echo"Maaf Sedang Terjadi kesalahan Pada Server Kami";
// }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu tambah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e50c83e75c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/tambah.css">
</head>
<body>
<img class="wave" src="img/bg.png"" />
    <!-- konten -->
    <div class="container">
      <div class="img">
        <img src="img/undraw_coffee_with_friends_3cbj.svg" />
      </div>
      <div class="login-content">
        <form action="" method="post" enctype="multipart/form-data"  >
          <img src="img/avatar.svg" id="profile" />
          <h2 class="title" style="font-size: 2.3em;" >Tambah Data Baru</h2>
          <div class="input-div pass">
            <div class="i">
            <i class="fa-solid fa-image"></i>
            </div>
            <div class="div">
            <label for="gambar" >Gambar</label>
              <input
                type="file"
                class="input"
                name="gambar"
                accept="image/jpeg, image/png, image/jpg, image/img,"
                id="gambar"
                placeholder="gambar"
              />
            </div>
          </div>
          <div class="input-div one">
            <div class="i">
            <i class="fa-solid fa-sitemap"></i>
            </div>
            <div class="div">
              <h5 for="username" >Nama Bagian</h5>
              <input type="text" class="input" name="nrp" id="nrp" required/>
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
            <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <h5>Nama</h5>
              <input type="text" class="input" name="nama" required />
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
            <i class="fa-solid fa-sitemap"></i>
            </div>
            <div class="div">
              <h5 for="password" >Posisi Sekarang</h5>
              <input
                type="text"
                class="input"
                name="jurusan"
                id="password"
                required
              />
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
            <i class="fa-sharp fa-solid fa-quote-left"></i>
            </div>
            <div class="div">
              <h5 for="password2" >Moto Hidup</h5>
              <input
                type="text"
                class="input"
                name="deskripsi"
                id="deskripsi"
                required
              />
            </div>
          </div>
          <input type="submit" class="btn" name="submit" />
          <a href="index2.php">skip!</a>
        </form>
      </div>
    </div>
    <script>
      const image = document.getElementById("profile"),
        input = document.getElementById("gambar");


      input.addEventListener("change", () => {
        image.src = URL.createObjectURL(input.files[0]);
      });
      </script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>