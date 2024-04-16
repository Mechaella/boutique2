<?php
session_start();

//ACCESSED ONLY AFTER LOGGING IN
//IF USER EMAIL NOT AVAILABLE IN SESSION, REDIRECT USER TO LOGIN PAGE
if (!isset($_SESSION["email"])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ALL USERS</title>
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
    <!-- <img src="Bayambang.png" width="60px" style="float: right"> -->
    
    <li class="nav-item">
      <a class="nav-link active" href="home.php">HOME</a>
    </li>

    <li class="nav-item">
      <a class="a1" href="logout.php"> LOGOUT </a>
    </li>
</nav>

<br><br><br>
<style>
      table,
      th,
      td {
        padding: 10px;
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
      }
      h1{
        text-align: center;
        font-family: Comic Sans MS;
      }
      table{
        margin-left: 400px;
      }
      th{
        font-family: Comic Sans MS;
      }
    </style>
    <div class="content">
        <div class="wrap">
            <table class="full"> 
<h1><label>ALL USERS</label></h1>

<tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Date of Birth</th>
    <th>Contact Number</th>
    <th>Address</th>
</tr>
<?php
include_once("db-config.php");
$result = mysqli_query($mysqli, "SELECT * FROM users");
if($result == TRUE){
    $count = mysqli_num_rows($result);
    if($count > 0)
        while ($row = mysqli_fetch_assoc($result)){
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $date_of_birth = $row['date_of_birth'];
            $contact_number = $row['contact_number'];
            $address = $row['address'];
            ?>
            <tr>
                <td>
                    <?php 
                    echo $first_name;

                    ?>
                </td>

                <td>
                    <?php
                    echo $last_name;
                    ?>
                </td>

                <td>
                    <?php
                    echo $email;
                    ?>
                </td>

                <td>
                    <?php
                    echo $date_of_birth;
                    ?>
                </td>


                <td>
                    <?php
                    echo $contact_number;
                    ?>
                </td>


                <td>
                    <?php
                    echo $address;
                    ?>
                </td>

            </tr>
            <?php
        }
}else{

}
?>
            </table>

            <style>
.footer {
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: transparent;
  color: white;
  text-align: center;
}
</style>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<div class="footer">
  <p>© 2021 All Right Reserved</p>
</div>
</body>
</html>