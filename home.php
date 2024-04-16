<?php
session_start();


if (!isset($_SESSION["email"])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>WELCOME TO MY PAGE</title>
    <link rel="stylesheet" href="index.css" href="bootstrap/bootstrap.min.css">
</head>
<body>

    <style>
  body {
  background-image: url('background.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
  <nav class="navbar navbar-expand-lg">

  <!-- Links -->
    <img src="logo.png" width="60px" style="float: left" >
    <!-- <img src=".png" width="60px" style="float: right"> -->
    
    <li class="nav-item">
      <a class="nav-link active">HOME</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="viewdata.php"> VIEW PRODUCTS</a> 
    </li>
    <li class="nav-item">
      <a class="nav-link" href="addproduct.php"> ADD PRODUCTS</a> 
    </li> 
    <li class="nav-item">
      <a class="nav-link" href="viewuser.php"> VIEW USER</a> 
    </li>

    <li class="nav-item">
      <a class="a1" href="logout.php"> LOGOUT </a>
    </li>
</nav>

<style>
    .p1{
        text-align: center;
        font-family: Georgia, serif;
        font-size: 30px;
    }
.footer {
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: transparent;
  color: white;
  text-align: center;
}
</style>

<br><br><br><br><br><br><br>
<h2>Welcome</h2>
<h2>To</h2>
<h2>MECHA's BOUTIQUE</h2>
</body>
</html>