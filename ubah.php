<?php

session_start();

if( !isset($_SESSION["login"]) ){
header("Location: login.php");
    exit;
}
require'functions.php';
$id=$_GET["id"];


$mhs=query("SELECT*FROM mahasiswa WHERE Id=$id")[0];


// //sql
$conn=mysqli_connect("localhost","root","","latihanweb");


//pemisah
if ( isset($_POST [ "submit"])){
    //ambil data dari setiap elemen
if(ubah($_POST)>0){
 echo"

 <script>
 alert('Selmat Data Berhasil Di Ubah!!!');
 document.location.href='index.php';
</script> 
 ";
}else{
    echo"
    <script>
        alert('Selmat Data Berhasil Di Gagal!!!');
        document.location.href='index.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e50c83e75c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/ubah.css" />
    <title>menu tambah</title>
</head>
<body>
<img class="wave" src="img/bg.png"" />
<!-- konten -->
<div class="container">
      <div class="img">
        <img src="img/editing.svg" />
      </div>
      <div class="login-content">
        <form action="" method="post" enctype="multipart/form-data"  >
        <input type="hidden" name="id" value="<?= $mhs["id"];?>" >
        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"];?>" >
          <img src="img/<?= $mhs['gambar']?>" id="profile" />
          <h2 class="title">Ubah Data Anda</h2>
          <div class="input-div pass">
<!--   <h1>Tambah Data Mahasiswa</h1>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"];?>" >
    <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"];?>" >
    <ul>
        
                <li><label for="gambar">GAMBAR : </label><br>
                <img src="img/<?= $mhs['gambar']?>" width="200" alt=""><br>
                <input type="file" name="gambar" id="gambar"></li>
                <li>
        <li><label for="nrp">NRP : </label><input type="text" name="nrp" id="nrp" value="<?= $mhs["nrp"];?>"></li>
        <li><label for="nama">NAMA : </label><input type="text" name="nama" id="nama" value="<?= $mhs["nama"];?>"></li>
        <li><label for="email">EMAIL : </label><input type="text" name="email" id="email" value="<?= $mhs["email"];?>"></li>
        <li><label for="jurusan">JURUSAN : </label><input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"];?>"></li>
            <button type="submit" name="submit" >Ubah Data!</button>
        </li>
    </ul>
</form> -->
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
              <input type="text" class="input" name="nrp" id="nrp" value="<?= $mhs["nrp"];?>"/>
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
            <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <h5>Nama</h5>
              <input type="text" class="input" name="nama" value="<?= $mhs["nama"];?>"/>
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="div">
              <h5>E-mail</h5>
              <input type="email" class="input" name="email" value="<?= $mhs["email"];?>" />
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
                value="<?= $mhs["jurusan"];?>"
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
                value="<?= $mhs["deskripsi"];?>"
              />
            </div>
          </div>
          <input type="submit" class="btn" name="submit" />
        </form>
      </div>
    </div>
<!-- end konten -->
<script>
      const image = document.getElementById("profile"),
        input = document.getElementById("gambar");


      input.addEventListener("change", () => {
        image.src = URL.createObjectURL(input.files[0]);
      });
      </script>
<script type="text/javascript" src="js/main.js"></script>c
<script type="text/javascript" src="js/ubah.js"></script>
</body>
</html>