<?php
session_start();

if( !isset($_SESSION["login"]) ){
        // header("Location: login.php");
     header("Location: login.php");
    
    exit;
}
//koneksi ke database
require'functions.php';

//pagination 
$jumlahDataPerhalaman=6;
$jumlahData = count(query("SELECT*FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = (isset($_GET['halaman'])) ? $_GET ['halaman'] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanAktif)-$jumlahDataPerhalaman;


//WHERE nrp='2104030051';
$mahasiswa = query("SELECT*FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");

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
    <link rel="stylesheet" href="css/index.css">

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
              <a class="nav-link  active" href="index.php">Anggota</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index3.php">Beranda</a>
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

<!--lay out start -->

    <!--header-->
    <style>
@import url("https://fonts.googleapis.com/css2?family= Poppins :ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,900 & display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  background: #000000;
  color: #ffffff;
  font-family: "Poppins", sans-serif;
}
a {
  text-decoration: none;
}
        header {
  width: 100%;
  height: 100vh;
  position: relative;
  display: flex;
  flex-direction: column;
  background: url("https://pps.whatsapp.net/v/t61.24694-24/317663881_483345193942585_8499434628779986136_n.jpg?ccb=11-4&oh=01_AdS-9jzypfMMo2mA4oKsjL-D9badx8zB8bMElxgmrEf0KA&oe=643CF044");
  background-size: cover;
  background-position: center;
}

header:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 60vh;
  bottom: 0;
  left: 0;
  background: linear-gradient(to top, rgb(0, 0, 0), rgba(0, 0, 0, 0));
}

nav,
.header-bottom {
  display: flex;
  justify-content: space-between;
  padding: 2rem;
  position: relative;
}

.logo a {
  color: #ffffff;
  font-size: 2rem;
}

.btn-sign-up {
  padding: 0.7rem 2rem;
  background: #000000;
  color: #ffffff;
  font-weight: 500;
  border-radius: 50px;
  -webkit-border-radius: 50px;
  -moz-border-radius: 50px;
  -ms-border-radius: 50px;
  -o-border-radius: 50px;
  transition: 1s;
  -webkit-transition: 1s;
  -moz-transition: 1s;
  -ms-transition: 1s;
  -o-transition: 1s;
}

.btn-sign-up:hover {
  background-color: #ffffff;
  color: #000000;
}

.header-title {
  margin: auto auto;
  font-size: 5rem;
  position: relative;
  font-weight: 700;
  letter-spacing: 2px;
  font-family: "Kaushan Script", sans-serif;
  font-style: italic;
  color: red;
}

.today-date {
  font-size: 2rem;
  font-weight: 500;
}

.today-date span {
  font-size: 1.5rem;
}

.social-media {
  display: flex;
  list-style: none;
  width: 350px;
  justify-content: space-between;
  align-items: center;
}

.social-media li a {
  color: #ffffff;
}

/* about section*/

#about {
  width: 100%;
  padding: 2rem;
}

.about-container {
  width: 900px;
  margin: auto;
}

.image-gallery {
  display: flex;
  width: 100%;
  min-height: 300px;
  justify-content: space-between;
  margin-bottom: 2rem;
}

.image-box {
  width: 22%;
  height: 250px;
  position: relative;
}

.image-box img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  position: absolute;
  transition: 0.3s;
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
  -ms-transition: 0.3s;
  -o-transition: 0.3s;
}

.image-box:nth-child(odd) {
  align-self: flex-end;
}

.image-box img:hover {
  opacity: 0.5;
}
.cutie {
  position: absolute;
  bottom: -7%;
  left: 50%;
  font-style: italic;
  font-weight: 500;
}
.about-info {
  text-align: center;
  font-size: 1rem;
  line-height: 1.5rem;
}
/* smartphone */
@media screen and (max-width: 576px) and (min-width: 300px) {
  header {
    width: 100%;
    height: 50vh;
    position: relative;
    background-position: center;
  }

  header:before {
    content: "";
    position: absolute;
    width: 100%;
    height: 40vh;
    bottom: 0;
    left: 0;
  }
  nav,
.header-bottom {
  display: flex;
  justify-content: space-between;
  padding: 1.4rem;
  position: relative;
}
  .logo a {
  font-size: 1rem;

}
.btn-sign-up {
  padding:0;
  font-weight: 500;
}

.btn-sign-up:hover {
  background-color: #ffffff;
  color: #000000;
}

.today-date {
  font-size: 1rem;
  font-weight: 500;
}

.today-date span {
  font-size: 0.9rem;
}

.social-media {
  font-size: 1rem;
  display: flex;
  list-style: none;
  width: 500px;
  justify-content: space-between;
  align-items: center;
}

.social-media li a {
  color: #ffffff;
}

#about {
  width: 100%;
  padding: 0;
}
.about-container {
  width: 350px;
  margin: auto;
  padding: 0;
}

.image-gallery {
  display: flex;
  width: 100%;
  min-height: 300px;
  justify-content: space-between;
  margin-bottom: 3rem;
}

.image-box {
  width: 22%;
  height: 250px;
  position: relative;
}
.image-box img {
  width: 100%;
  height: 50%;
}

.cutie {
  bottom: 35%;
  left: 50%;
}
footer {
  width: 100%;
  padding: 1rem 1rem;
  text-align: center;
}
h2 i {
  color: brown;
}

footer i {
  color: firebrick;
}

}
/* END */

/* TABLET */
@media screen and (max-width: 900px) and (min-width: 590px) { 

  header {
  width: 100%;
  height: 70vh;
  position: relative;
  background-position: center;
}

header:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 40vh;
  bottom: 0;
  left: 0;}

  #about {
  width: 100%;
  padding: 0;
}
.about-container {
  width: 750px;
  padding: 0;
}

.image-gallery {
  width: 100%;
  min-height: 300px;
  margin-bottom: 3rem;
}

.image-box {
  width: 22%;
  height: 250px;
  position: relative;
}
.image-box img {
  width: 100%;
  height: 100%;
}

.cutie {
  bottom: -15%;
  left: 50%;
}
}


/* footer */

footer {
  width: 100%;
  padding: 1.5rem 1rem;
  text-align: center;
}
h2 i {
  color: brown;
}

footer i {
  color: firebrick;
}
      </style>
<!-- end style -->
    <header class="mt-5" >
        <nav class="">
            <h1 class="logo">
                <a href="/">List Anggota </a>
            </h1>
        </nav>
        <div class="header-title"></div>
        <div class="header-bottom">
            <p class="today-date">2020 / 01 <span>/27 </span> </p>
            <ul class="social-media">
                <li><a href="https://www.instagram.com/dignitygeneration_622/">instagram</a></li>
                <li><a href="https://api.whatsapp.com/send?phone=6281213968141&text=%0ATEXT%20%3A">whatsapp</a></li>
                <li><a href="#">tiktok</a></li>
            </ul>
        </div>
    </header>

<!--about-->
<section id="about">
    <div class="about-container">
        <div class="image-gallery">
            <div class="image-box">
                <img src="img/1.jpg" alt="image">
                <h2 class="cutie"> K </h2>
            </div>
            <div class="image-box">
                <img src="img/2.jpg" alt="image">
                <h2 class="cutie"> E </h2>
            </div>
            <div class="image-box">
                <img src="img/3.png" alt="image">
                <h2 class="cutie"> <i class="fa-solid fa-camera-retro" style="color: #ffffff;"></i></h2>
            </div>
            <div class="image-box">
                <img src="img/4.jpg" alt="image">
                <h2 class="cutie"> 2 </h2>
            </div>
            <div class="image-box">
                <img src="img/5.png" alt="image">
                <h2 class="cutie"> 1 </h2>
            </div>
        </div>
        <div class="about-info">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, eaque accusamus natus magnam sit dicta perspiciatis voluptatem rem obcaecati ducimus doloribus, harum eius error consectetur ullam reiciendis possimus? Animi, cumque!
        </div>
    </div>
</section>

<!--footer-->
<footer>
<h2><i class="fa fa-heart"></i>made in : mister x<i class="fa fa-heart"></i></h2>
Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, quae eius? Natus, repellendus itaque iure, voluptate asperiores voluptatibus nesciunt veniam amet at neque quasi fugit illum architecto sapiente obcaecati quas! <i class="fa fa-heart"></i> malika kecap bango :v
</footer>

<!-- lay Out end -->


    <!-- navigasi -->
<div class="fluid-container mt-5">
    <div class="scroll">
        <?php if($halamanAktif > 1 ) : ?>
        <a href="?halaman= <?= $halamanAktif - 1;?>"> &laquo;</a>
        <?php endif;?>
        
        <?php for($i = 1; $i<= $jumlahHalaman; $i++) : ?>
            <?php if($i==$halamanAktif): ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color:red;"><?=$i; ?></a>
            <?php else: ?>
                <a href="?halaman=<?= $i; ?>"><?=$i; ?></a>
            <?php endif;?>
        <?php endfor;?>
        
        <?php if($halamanAktif < $jumlahHalaman ) : ?>
        <a href="?halaman= <?= $halamanAktif + 1;?>" > &raquo;</a>
        <?php endif;?>
    </div>
    <div class="tambah mt-5" >
        <a href="tambah.php" class="btn-sign-up">Tambah Data</a>
    </div>
</div>


<!-- konten card -->
<div class="container text-dark">
    <div class="row mt-3">
        <div class="col">
            <h1 style="color:#ffffff;" >Daftar Mahasiswa</h1>
        </div>
    </div>
    <div class="row">
<?php $i=1; ?>
        <?php foreach($mahasiswa as $row): ?>
<div class="col-md-4">
            <div class="card mb-3">
            <img src="img/<?= $row['gambar']; ?>" class="card-img-top" alt="..." width="400"height="400">
                <div class="card-body">
                    <h5 class="card-title">Nama : <?= $row['nama']; ?></h5>
                    <h5 class="card-title">E-mail : <?= $row['email']; ?> </h5>
                    <p class="card-text">Bagian : <?= $row['nrp']; ?></p>
                    <p class="card-text">Jurusan : <?= $row['jurusan']; ?></p>
                    <p class="card-text">Moto Hidup : <?= $row['deskripsi']; ?></p>
                    <a class="btn btn-primary" href="ubah.php?id=<?= $row["id"];?>">Ubah</a>
                    <a class="btn btn-primary" href="hapus.php?id=<?= $row["id"];?>" onclick=" return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini'); ">Hapus</a>
                </div>
            </div>
        </div>
        <?php $i++; ?>
    <?php endforeach;?>
    </div>
</div>

<!-- footer next -->

<div class="footer bg-dark text-dark mt-5" id="sasar" >
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
</div>
<!-- end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="js/main.js"></script> -->

</body>
</html>