<?php
session_start();
require 'db-config.php';

if(isset($_POST['deleteproduct']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['deleteproduct']);

    $query = "DELETE FROM products WHERE id='$product_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Product Deleted Successfully";
        header("Location: removeproduct.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Product Not Deleted";
        header("Location: removeproduct.php");
        exit(0);
    }
}

if(isset($_POST['updateproduct']))
{
    $id = mysqli_real_escape_string($con, $_POST['id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $size = mysqli_real_escape_string($con, $_POST['size']);
    $color = mysqli_real_escape_string($con, $_POST['color']);
    $price = mysqli_real_escape_string($con, $_POST['price']);

    $query = "UPDATE products SET name='$name', size='$size', color='$color', price='$price' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Product Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Product Not Updated";
        header("Location: home.php");
        exit(0);
    }
}


if(isset($_POST['save_product']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $size = mysqli_real_escape_string($con, $_POST['size']);
    $color = mysqli_real_escape_string($con, $_POST['color']);
    $price = mysqli_real_escape_string($con, $_POST['price']);

    $query = "INSERT INTO products (name, size, color, price) VALUES ('$name', '$size', '$color', '$price')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Product Created Successfully";
        header("Location: addproduct.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Product Not Created";
        header("Location: addproduct.php");
        exit(0);
    }
}

?>