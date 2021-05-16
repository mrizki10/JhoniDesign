<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}


require "functions.php";

//ambil data URL
$id = $_GET["id"];

//query data project berdasarkan id
$mhs = query("SELECT *FROM project WHERE id=$id")[0];



// cek tombol submit sudah di pencet atau belom
if (isset($_POST["submit"])){

    //cek apakah data berhasil diubah atau tidak
    if(ubah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php'
            </script>
        ";
    } else {
        echo "
        <script>
            alert('data Gagal diubah!');
            document.location.href = 'index.php'
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="style.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <title>Update Data Galleri</title>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar-fixed">
    <nav class="#00bfa5 teal accent-4">
    <div class="container">
      <div class="nav-wrapper">
        <a href="#home1" class="brand-logo black-text">JhonyDesign.com</a>
        <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a class="black-text" href="tambah.php">Tambah Data</a></li>
            <li><a class="black-text" href="index.php">Lihat Data</a></li>
          </ul>
      </div>
    </div>
    </nav>
  </div>

  <!-- sideNav -->

    <ul class="sidenav" id="mobile-nav">
          <li><a href="tambah.php">Tambah Data</a></li>
          <li><a href="index.php">Lihat Data</a></li>
    </ul>
        
    <!-- slider -->
  
<div class="container">
<div class = "row">

<h3 class="center light grey-text text-darken-4">Update Data Galleri</h3>
        <hr style="width : 400px">
        <br><br>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?php echo $mhs["gambar"]; ?>">
        <ul>
            <li>
                <label for="nama_project"> Nama Project </label>
                <input type="text" name="nama_project" required value="<?php echo $mhs['nama_project']; ?>">
            </li>

            <li>
                <label for="keterangan"> Keterangan </label>
                <input type="text" name="keterangan" required value="<?php echo $mhs['keterangan']; ?>">
            </li>

            <li>
                <label for="gambar"> gambar </label><br><br>
                <img src="img/<?php echo $mhs['gambar']; ?>" width="150" height="100">
                <br><br>
                <input   type="file" name="gambar">
            </li>
            <br>
            <li>
                <button class="waves-effect waves-light btn-small" type="submit" name="submit">Ubah Data !</button>
            </li>
        </ul>
    
    </form>
</div>
</div>
<footer class="center">
  <h6>2020 All Rights Reserved by Miftahur Rizki & Anto</h6>
</footer>
</body>
</html>
