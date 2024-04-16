<!DOCTYPE html>
<html>
<head>
  <title>Add Product</title>
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
    a{
  text-decoration: none;
  color: black;
  margin-left: 30px;
  font-size: 20px;
}
a:hover{
  color: blue;
}
  </style>
<br>
  <a href="home.php"> [Go Back] </a>

  <style>
    .group1{
    display: inline-flex;
}
.input1{
    padding-right: 1%;
    width: 370px;
}

.group2{
    display: inline-flex;
}

.input2{
    padding-right: 1%;
    width: 450px;
}

.group3{
    width: 650px;
}
h2{
  margin-top: 100px;
  margin-left: 750px;
  margin-bottom: 30px;
}
  </style>

  <div class="text"><h2>Add Product</h2></div>

  <div class="container">
    
    <form method="POST">

      <div class="form-group">

        <div class="group1">

          <div class="input1">
            <label for="name">PRODUCT NAME:</label>
            <input type="text" class="form-control" id="name" placeholder="Product Name" name="name">
          </div>

          <div class="input1">
            <label for="price">PRICE:</label>
            <input type="text" class="form-control" id="price" placeholder="Price" name="price">
          </div>

          <div class="input1">
            <label for="stocks">STOCKS:</label>
            <input type="text" class="form-control" id="stocks" placeholder="Stocks" name="stocks">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="group2">
          <div class="input2">
            <label for="size">Size:</label>
            <input type="text" class="form-control" id="size" placeholder="size" name="size">
          </div>

      <div class="form-group">
        <div class="group3">
          <label for="color">Color:</label>
          <input type="text" class="form-control" id="color" placeholder="color" name="color">
        </div>
      </div>

    </form>
  </div>
<style>
  button{
    margin-left: 500px;
  }
</style>
  <br><br>
      <button type="submit" class="btn btn-primary" name="insert_data">Add</button>
</body>
</html>



<?php
  include_once ("db-config.php");

  if (isset($_POST['insert_data'])) { 

    $name = $_POST['name'];
    $size = $_POST['size'];
    $color= $_POST['color'];
    $price = $_POST['price'];
    $stocks = $_POST['stocks'];


   $name_result = mysqli_query($mysqli, "select 'name' from table where name='$name'");
            
                
                $result   = mysqli_query($mysqli, "INSERT INTO products(name, size, color, price, stocks) VALUES('$name', '$size', '$color', '$price', '$stocks')");

                
                if ($result) {
                    echo "<br/><br/>Product is successfully Add.";
                } else {
                    echo "Adding product error. Please try again." . mysqli_error($mysqli);
                }
            
        }

?>