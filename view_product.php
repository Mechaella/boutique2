<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("location: login.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Product</title>
  <link rel="stylesheet" href="viewStyle.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<style>
  body{
    background-image: url(background.jpg);
     background-repeat: no-repeat;
     background-attachment: fixed;
      background-size: 100% 100%;
  }
table {
  margin-top: 50px;
  border:none;
  width: 1250px;
}
label {
  font-size:18px;
  color:black;
    font-weight: bold;
    font-family: cursive;
}
h2 {
  color:Blue;
  text-align:center;
}
th {
  color: black;
  font-size:20px;
  font-family: cursive;
  background-color: lightgrey;
  text-align: center;
}
  a{
  text-decoration: none;
  color: black;
  margin-left: 30px;
  font-size: 20px;
}
a:hover{
  color: blue;
}
.btn {
  padding: 8px 12px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.btn.edit {
  background-color: #ffc107;
}
.btn.delete {
  background-color: #dc3545;
}
</style>
 <br>
    <a href="home.php">[Go Back]</a>
  

  <div class="text"><h2>View Product</h2></div>

  <div class="container">
    <table border="1" cellspacing="5" cellpadding="5" width="100%">
      <thead>
        <tr>
          <th>NAME</th>
          <th>SIZE</th>
          <th>COLOR</th>
          <th>PRICE</th>
          <th>STOCKS</th>
        </tr>
      </thead>
      <tbody>

<?php
include_once("db-config.php");

$result = mysqli_query($mysqli, "SELECT * FROM products");

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['size']; ?></td>
          <td><?php echo $row['color']; ?></td>
          <td><?php echo $row['price']; ?></td>
          <td><?php echo $row['stocks']; ?></td>
        </tr>
<?php
    }
}
?>
      </tbody>
    </table>
  </div>
</body>
</html>