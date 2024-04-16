<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("location: login.php");
    exit();
}

include_once("db-config.php");


if (!isset($_GET['id'])) {
    echo "Product ID not provided.";
    exit();
}

$id = $_GET['id'];


$delete_query = "DELETE FROM products WHERE id=$id";

if (mysqli_query($mysqli, $delete_query)) {
    header("location: view_products.php");
    exit();
} else {
    echo "Error deleting product: " . mysqli_error($mysqli);
}
?>
