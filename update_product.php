<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("location: login.php");
    exit();
}

include_once("db-config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $stocks = $_POST['stocks'];

    
    $update_query = "UPDATE products SET name='$name', size='$size', color='$color', price='$price', stocks='$stocks' WHERE id=$id";

    if (mysqli_query($mysqli, $update_query)) {
        
        header("location: viewdata.php");
        exit();
    } else {
        echo "Error updating product: " . mysqli_error($mysqli);
    }
} else {
    echo "Invalid request.";
}
?>