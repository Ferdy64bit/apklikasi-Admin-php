<?php
session_start();

if( !isset($_SESSION["login"]) ){
header("Location: login.php");
    exit;
}
require'functions.php';
// //sql
$conn=mysqli_connect("localhost","root","","latihanweb");


// dfssdf
if(isset($_POST["cari"])){
    $mahasiswa=cari($_POST["keyword"]);
}

?>

<!-- POSISI HTML DISINI -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coba database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,900&family=Raleway:ital,wght@0,200;0,300;0,700;1,200;1,300;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e50c83e75c.js" crossorigin="anonymous"></script>

    <!-- <link rel="stylesheet" type="text/css" href="css/style.css" /> -->
    <link rel="stylesheet" href="css/index2.css">

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
              <a class="nav-link active" aria-current="page" href="index2.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Anggota</a>
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


   
<!-- jumbo tron -->
<div class="jumbotron mt-5">
      <div class="overlay"></div>
      <h2>DIGNITY<span> | </span>GENERATION</h2>
      <p id="reponsive" >
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium in
        repellendus repudiandae autem doloremque quis corrupti fuga obcaecati
        tenetur accusamus voluptatibus eius, error, officia doloribus quas velit
        aperiam, debitis magnam.
      </p>
    </div>
<!-- end -->

<!-- conten center -->
<div class="char text-center mt-3">
      <h1 class="display-4">SELAMAT DATANG</h1>
      <p>Di Website Resmi Dignity Generation</p>
</div>
<div class="container mt-3">
      <div class="title">
        <h1>Angkatan Ke-21 Dignity Generation</h1>
        <p>Pondok Pesantren | Darul hikmah</p>
      </div>
      <div class="hexagon">
        <div class="shape">
          <img
            src="img/abi.jpg"
            alt=""
          />
          <div class="content">
            <div>
              <h2>someoe famous</h2>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam
                dignissimos aut officiis, dolorem beatae corrupti quidem
                obcaecati doloribus laboriosam accusantium dolores provident
                tenetur consectetur voluptates natus rem minima placeat totam!
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="hexagon">
        <div class="shape">
          <img
            src="img/munir.jpg"
            alt=""
          />
          <div class="content">
            <div>
              <h2>someoe famous</h2>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam
                dignissimos aut officiis, dolorem beatae corrupti quidem
                obcaecati doloribus laboriosam accusantium dolores provident
                tenetur consectetur voluptates natus rem minima placeat totam!
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="hexagon">
        <div class="shape">
          <img
            src="img/zakikuncoroaji.jpg"
            alt=""
          />
          <div class="content">
            <div>
              <h2>someoe famous</h2>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam
                dignissimos aut officiis, dolorem beatae corrupti quidem
                obcaecati doloribus laboriosam accusantium dolores provident
                tenetur consectetur voluptates natus rem minima placeat totam!
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="hexagon">
        <div class="shape">
          <img
            src="img/omrijal.jpg"
            alt=""
          />
          <div class="content">
            <div>
              <h2>someoe famous</h2>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam
                dignissimos aut officiis, dolorem beatae corrupti quidem
                obcaecati doloribus laboriosam accusantium dolores provident
                tenetur consectetur voluptates natus rem minima placeat totam!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- content center end -->

<!-- konten -->
<section id="about">
    <div class="container mt-3">
      <div class="row text-center mb-3">
        <div class="col">
          <h2>Tentang Kami</h2>
        </div>
      </div>
      <div class="row justify-content-center fs-6 text-center">
        <div class="col-md-6">
          <p>
            HELLO VIEWRS!!. selamat datang di website angkatan pondok pesantren darul hikmah yang ke-21 Dignity Generation.
            dignity generation merupakan angkatan yang ke-21 pondok pesantren darul hikmah.
            dan Website ini kami buat guna menyalurkan inspirasi dan apresiasi guna mempererat tali silatuhrami diantara angkatan kami.
          </p>
        </div>
        <div class="col-md-6">
          <p>
            adapun beberapa alasan website ini kami buat untuk mempererat tali ssiltuhrami dan sekaligus sumber informasi
            khusus untuk angkatan kami terkait acara,teknis lapangan dan lain-lain telah diputus secara sepihak dan dalam 
            tempo yang se singkat singkatnya.
          </p>
        </div>
        <div class="col-md-6 mt-5">
          <p>
            Pekayon, 17-ramadhan-1444 
          </p>
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Wahdi_sign_vectorized.svg/983px-Wahdi_sign_vectorized.svg.png" alt="" width="100" >
          <p>atas nama dignity anang dc</p>
        </div>
      </div>
    </div>
  </section>
<!-- end content -->

<!-- kontak -->
<section id="contack">
      <div class="container-fluid" >
        <div class="row text-center">
          <div class="col">
            <h2>Contact</h2>
          </div>
        </div>
        <div class="row mb-3">
          <div class="container">
            <div class="cc-contact">
              <div class="row justify-content-center mt-3">
                <div class="col-md-12">
                  <div class="card mb-0" data-aos="zoom-in">
                    <div class="h4 text-center title">HUBUNGI SAYA</div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="card-body">
                          <form action="https://formspree.io/f/xqkjeyap" method="POST">
                            <div class="p pb-3">
                              <strong>Jangan ragu untuk menghubungi saya!!
                              </strong>
                            </div>
                            <div class="row mb-3">
                              <div class="col">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                  <input class="form-control" type="text" name="name" placeholder="Your Name"
                                    required="required" />
                                </div>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                  <input class="form-control" type="email" name="_replyto" placeholder="Your E-mail"
                                    required="required" />
                                </div>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col">
                                <div class="form-group">
                                  <textarea class="form-control" name="message" placeholder="Your Message"
                                    required="required"></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <button class="btn btn-primary" type="submit">
                                  Send
                                </button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="card-body">
                          <p class="mb-0"><strong>Alamat </strong></p>
                          <div class="col-sm-8"><a href="https://goo.gl/maps/2JYGBDGrgz9EjEtw9" class="btn-sign-up">KP
                              Tanjung Kait RT01/RW01 kec.Mauk</a></div>
                          <p class="mb-0"><strong>No. Handphone</strong></p>
                          <p class="pb-2">+62-882-9186-4972</p>
                          <p class="mb-0"><strong>Email</strong></p>
                          <p>ferdyahmadwinata@gmail.com</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
 

<!-- end kontak -->

  <!--footer-->
  <footer class="footer bg-dark text-dark mt-5" id="sasar" >
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
<!-- end -->

<!-- js lama -->

<!-- script js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/index2.js"></script>

</body>
</html>