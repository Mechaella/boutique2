<?php
include 'db-config.php';

$get_id=$_REQUEST['name'];

$name= $_POST['name'];
$color= $_POST['color'];
$size= $_POST['size'];
$price= $_POST['price'];
$stocks= $_POST['stocks'];

$sql = "UPDATE products SET name ='$name', color ='$color', size ='$size', price ='$price', stocks ='$stocks' WHERE name = '$get_id' ";

$conn->exec($sql);
echo "<script>alert('Successfully Update The Product!'); window.location='update.php'</script>";


?>



