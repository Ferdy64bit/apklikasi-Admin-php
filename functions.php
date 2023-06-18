<?php

$conn = mysqli_connect("localhost","root","","latihanweb");
//ambil data mahasiswa

function query($query){
global $conn;

    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;
}
//function tambahan
function tambah($data){
    global $conn;
    //ambil data dari from tambah
    $nrp=htmlspecialchars($data["nrp"]);
    $nama=htmlspecialchars($data["nama"]);
    $email=htmlspecialchars($data["email"]);
    $jurusan=htmlspecialchars($data["jurusan"]);
    $deskripsi=htmlspecialchars($data["deskripsi"]);

    //upload gambar
    $gambar=upload();
   if (!$gambar){
    return false;
   }


$query=" INSERT INTO mahasiswa VALUES('','$nama','$nrp','$email','$jurusan','$gambar','$deskripsi')";

mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}


//functions Upload
function upload(){
    //FUNCTION UPLOAD

    $namaFile= $_FILES['gambar']['name'];
    $ukuranFile= $_FILES['gambar']['size'];
    $error= $_FILES['gambar']['error'];
    $tmpName= $_FILES['gambar']['tmp_name'];

    //PENGECEKAN 
    if($error === 4 ){
        echo"
        <script>
            alert('Masukan Gambar Terlebih Dahulu!!!');
        </script>";
        return false;
    }
//yang diupload gambar atau bkn?
$ekstensiGambarValid=['jpg','jpeg','png','img'];
$ekstensiGambar = explode('.',$namaFile);
$ekstensiGambar = strtolower(end($ekstensiGambar));
if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
echo"
<script>
    alert('Yang Anda Upload Bkn Gambar!!!');
</script>";
return false;
}
//cek ukuran gambar
if($ukuranFile > 10000000){
    echo"
    <script>
        alert('Ukuran Gambar Terlalu Besar!!!');
    </script>";
    return false;
}
//otomatis mengubah nama baru

$namaFileBaru=uniqid();
$namaFileBaru.='.';
$namaFileBaru.= $ekstensiGambar;



//lolos seleksi pengecekan
move_uploaded_file($tmpName,'img/' . $namaFileBaru);
return $namaFileBaru;

 
}






function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM mahasiswa where id =$id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    //ambil data dari from tambah

    $id=$data["id"];
    $nrp=htmlspecialchars($data["nrp"]);
    $nama=htmlspecialchars($data["nama"]);
    $email=htmlspecialchars($data["email"]);
    $jurusan=htmlspecialchars($data["jurusan"]);
    $gambarLama=htmlspecialchars($data["gambarLama"]);

    //cek apakah user pilih gmabr baru
    if ($_FILES['gambar']['error']=== 4) {
        # code...
        $gambar = $gambarLama;
    }else{
        
        $gambar= upload();
    }


 
$query="UPDATE mahasiswa SET
nrp='$nrp',
nama='$nama',
email='$email',
jurusan='$jurusan',
gambar='$gambar'
    WHERE id=$id
";

mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT*FROM mahasiswa WHERE
    nama LIKE '%$keyword%'OR
    nrp LIKE '%$keyword%'OR
    email LIKE '%$keyword%'OR
    jurusan LIKE '%$keyword%'
    ";

    return query($query);
}

//functions registrasi 

function registrasi($data){
    global $conn;
    $username = strtolower(stripcslashes($data["username"]));
    $kontak = strtolower(stripcslashes($data["kontak"]));
    $email = strtolower(stripcslashes($data["email"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2= mysqli_real_escape_string($conn,$data["password2"]);
//cek sernameudh ada belum 
$result = mysqli_query($conn,"SELECT  username FROM user WHERE username = '$username'");
if(mysqli_fetch_assoc($result)){
    echo "<script>
            alert('Maaf Username Sudah terdaftar!!')
         </script>";
         return false;
}

    //konfirmasi password
if($password !== $password2){
    echo"<script>
            alert('Maaf Password Yang Anda Masukan Salah');
        </script>";
        return false;
}

//EMAIL
$result = mysqli_query($conn,"SELECT  email FROM user WHERE email = '$email'");
if(mysqli_fetch_assoc($result)){
    echo "<script>
            alert('Maaf Email Anda Sudah Terdaftar')
         </script>";
         return false;
}

//KONTAK
$result = mysqli_query($conn,"SELECT  kontak FROM user WHERE kontak = '$kontak'");
if(mysqli_fetch_assoc($result)){
    echo "<script>
            alert('Maaf No Anda Sudah Terdaftar')
         </script>";
         return false;
}


//enkripsi password
$password = password_hash($password, PASSWORD_DEFAULT);

// tambahkan data baru ke data base 

mysqli_query($conn,"INSERT INTO user VALUES('','$username','$password','$email','$kontak')");

return mysqli_affected_rows($conn);

}

?>