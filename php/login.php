<?php
session_start();

if( isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}

require 'functions.php';

if ( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT *FROM login WHERE username = '$username'");

    //cek username
    if ( mysqli_num_rows($result) === 1 ) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row["password"]) ) {
          
          // set session
          $_SESSION["login"] = true;  

          header("Location: index.php");
            exit;
        }

    }
    $error = true;

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
    <title>Jhoni Login</title>
</head>
<body>
  <!-- Navbar -->
  <div class="navbar-fixed">
    <nav class="#00bfa5 teal accent-4">
    <div class="container">
      <div class="nav-wrapper">
        <a href="../index.php" class="brand-logo">JhonyDesign.com</a>
      </div>
    </div>
    </nav>
  </div>
  <br><br>
<div class="bungkus">
<div class="container   ">
<div class="card center">
<h4 class="light grey-text text-darken-4">Jhoni Login</h4>
<hr style="width : 300px">
<?php if ( isset( $error )) : ?>
<p style ="color:red; font-style: italic;">Username / Password Salah !</p>

<?php endif;?>
<form action="" method="POST">

    <ul>
        <li>
            <label for="username">Username :</label>
            <input type="text" placeholder="Enter Username" name="username" id="username" autocomplete="off">
        </li>

        <li>
            <label for="password">Password :</label>
            <input type="password"  placeholder="Enter Password" name="password" id="password" autocomplete="off">
        </li>
        <br>
        <li>
            <button class="waves-effect waves-light btn-small" type="submit" name="login">Login !</button>
        </li>
    </ul>

</form>
<br>
</div>
</div>
</div>
<br><br><br>
<footer class="White darken-4 foot center">
  <h6>2020 All Rights Reserved by Miftahur Rizki & Anto</h6>
</footer>
</body>
</html>