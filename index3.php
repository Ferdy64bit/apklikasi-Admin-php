<?php
session_start();

if( !isset($_SESSION["login"]) ){
        // header("Location: login.php");
     header("Location: login.php");
    
    exit;
}
//koneksi ke database
require'functions.php';


if(isset($_POST["cari"])){
    $mahasiswa=cari($_POST["keyword"]);
}

// $result=mysqli_query($conn,"SELECT * FROM mahasiswa");
 
// if(!$result){
//     echo mysqli_error($conn);
// }

//ambil data dari mahasiswa(fetch)
//mysqli_fetch_row()//mengembalikan aray

// $mhs=mysqli_fetch_row($result);
// // var_dump($mhs[1]);
// while(
// $mhs=mysqli_fetch_assoc($result)){
// var_dump($mhs);
// }

// $mhs=mysqli_fetch_array($result);
// var_dump($mhs["jurusan"]);


// $mhs=mysqli_fetch_object($result);
// var_dump($mhs->email);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coba database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e50c83e75c.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" type="text/css" href="css/style.css" /> -->
    <link rel="stylesheet" href="css/index3.css">

</head>
<body>
<nav
      class="navbar navbar-expand-lg text-light navbar-dark shadow-sm fixed-top" 
      style="background-color:rgba(128, 24, 0, 1);"
    >
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img
            src="img/oop.png"
            alt=""
            width="50"
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index2.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Anggota</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  active" href="/link.html">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/link.html">Tentang</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Mode
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="logout.php" onclick=" return confirm('Apakah Anda Yakin Ingin Keluar'); ">Log Out</a>
            </li>
          </ul>
          <form class="d-flex" method="post" >
            <input
              class="form-control me-2 shadow"
              type="search"
              placeholder="Search"
              aria-label="Search"
              name="keyword"
              aria-autocomplete="off"
            />
            <button
              class="btn btn-success shadow"
              type="submit"
              style="width: 200px"
              name="cari"
            >
              Search
            </button>
          </form>
        </div>
      </div>
    </nav>
<!-- end nav -->

<!-- lay out -->
<div class="card">
    <div class="img mt-3" >
        <h1>Profil Anda</h1>
        <img src="img/2.jpg" class="card-img-top" alt="...">
    </div>
  <div class="card-body mt-4">
    <h5 class="card-title">FERDY AHMAD WINATA</h5>
    <p class="card-text">E-mail : ferdyahmadwinata@gmail.com </p>
    <p class="card-text">Bagian : Angkulat</p>
    <p class="card-text">Jurusan: apajalah bang yang penting halal</p>
    <p class="card-text">Moto Hidup : tetaplah Tersenyum Setiap hari</p>
    <a class="btn btn-primary" href="ubah.php?id=<?= $row["id"];?>">Ubah</a>
  </div>
</div>

<div class="card">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<footer class="footer bg-dark text-dark" id="sasar" >
<div class="container text-center text-black">
  <a class="cc-facebook btn btn-link"
    href="https://www.facebook.com/ferdy.selaluuye"><i class="fa fa-facebook fa-2x " aria-hidden="true"></i>
  </a>
  <a
    class="cc-twitter btn btn-link " href="https://api.whatsapp.com/send?phone=6288291864972&text="><i
      class="fa fa-whatsapp fa-2x " aria-hidden="true"></i>
  </a>
  <a class="cc-google-plus btn btn-link"
    href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=CrpPbDzFqsCXTZqKwpJlrvsZMtKDSmvfMPSBjpLfjbzqcZrLnPTdmQCtVdnXJnBBpmbQkjFJPngPnxLqgwCL"><i
      class="fa fa-google-plus fa-2x" aria-hidden="true"></i>
  </a>
  <a class="cc-instagram btn btn-link"
    href="https://www.instagram.com/ferdy_.dy/?utm_source=qr"><i class="fa fa-instagram fa-2x "
      aria-hidden="true"></i>
  </a>
</div>
<div class="text-center text-muted" style="margin-bottom: 0;" >
  <p>&copy; CreatedByOtoyCinematic<br>Whatsapp - <a class="credit" href="https://templateflip.com"
      target="_blank">+62-0882-9186-4972</a></p>
</div>
</footer>
<!-- lay Out end -->

<!--lay out start -->

<!-- end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="js/main.js"></script> -->

</body>
</html>