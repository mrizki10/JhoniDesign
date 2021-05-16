<?php

require "functions.php";

$gambar = query("SELECT *FROM project ORDER BY id DESC");

//tombol cari ditekan
if(isset($_POST["cari"]) ) {
    $gambar = cari($_POST["keyword"]);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- My fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- My css -->
    <link rel="stylesheet" href="style.css">


    <title>JhonyDesign</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light ">
      <div class="container">
        <a class="navbar-brand">JhonyDesign.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="Layanan.html">Layanan</a>
            <a class="nav-item nav-link" href="kontak.html">Kontak</a>
            <a class="nav-item nav-link" href="about.html">About</a>
            <a class="nav-item tombol btn btn-primary" href="https://api.whatsapp.com/send?phone=08381076527">Join Us</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->
    <div class="container galery">
      <div class="row">
        <?php foreach ($gambar as $row) : ?>  
          <div class="col-md-4 col-sm-12 mb-3">
            <div class="card" >
              <img src="php/img/<?php echo $row['gambar']; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text"><?php echo $row['nama_project'] ?></p>
              </div>
            </div>            
          </div>
        <?php endforeach ; ?>
      </div>
    </div>
      <!-- Footer -->
      <div class="row footer">
        <div class="col text-center">
          <p>2020 All Rights Reserved by Miftahur Rizki & Anto</p>
        </div>
      </div>
      <!-- Akhir Footer -->
    </div>
    <!-- Akhir Container -->




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>