<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require "functions.php";

$mahasiswa = query("SELECT *FROM project ORDER BY id DESC");

//tombol cari ditekan
if(isset($_POST["cari"]) ) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <link rel="stylesheet" href="style.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        
    <title>Jhoni Admin</title>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar-fixed">
    <nav class="#00bfa5 teal accent-4">
    <div class="container">
      <div class="nav-wrapper">
        <a class="brand-logo black-text">JhonyDesign.com</a>
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
<h3 class="center light grey-text text-darken-4">Galleri</h3>
          <hr>
<br><br>
<form action="" method="post">

    <input type="text" name="keyword" size="50" autofocus placeholder="Masukan Keyword Pencarian.." autocomplete="off">
    <button class="waves-effect waves-light btn" type="submite" name="cari">Cari!</button>
</form>
<br>
<br>
<div class="row">
<div class="col s12">
<table class="striped">
    <thread>
    <tr>
        <th>  
        No
        </th>
        <th>
        Gambar
        </th>
        <th>
        Project
        </th>
        <th>
        Keterangan
        </th>
        <td  colspan="2">
        <th  colspan="2"><p style="text-align:center">Aksi</p></th>
        </td>
    </tr>
    </thread>
<?php $no = 1 ?>
<?php foreach ($mahasiswa as $row) : ?>
 
    <tr>
        <td><?php echo $no; ?>.</td>
        <td>
            <img src="img/<?php echo $row["gambar"] ?>" width="150" height="100">
        </td>
        <td width="150" ><p style="text-align:center"><?php echo $row["nama_project"]; ?></p></td>
        <td><p style="text-align:center"><?php echo $row["keterangan"]; ?></p></td>
        <td colspan="2">
            <th><a class="waves-effect waves-light btn-small" href="ubah.php?id=<?php echo$row["id"] ?>"onclick="return confirm('yakin diubah ? ?');">Ubah</a></th> 
            <th><a class="waves-effect waves-light btn-small" href="hapus.php?id=<?php echo$row["id"] ?>" onclick="return confirm('yakin dihapus ?');">Hapus</a></th>
        </td>
    </tr>
<?php $no++; ?>
<?php endforeach; ?>
</table>
<br>
<a class="waves-effect waves-light btn" href="logout.php">logout</a>
</div>
</div>
</div>
</div>  

<footer class="center">
  <h6>2020 All Rights Reserved by Miftahur Rizki & Anto</h6>
</footer>
 
</body>
</html>
