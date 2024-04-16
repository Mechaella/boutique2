<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("location: login.php");
    exit();
}

include_once("db-config.php");

// Check if product ID is provided
if (!isset($_GET['id'])) {
    echo "Product ID not provided.";
    exit();
}

$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Product not found.";
    exit();
}

$product = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $stocks = $_POST['stocks'];

    // Update product details in the database
    $update_query = "UPDATE products SET name='$name', size='$size', color='$color', price='$price', stocks='$stocks' WHERE id=$id";

    if (mysqli_query($mysqli, $update_query)) {
        header("location: view_products.php"); // Redirect to view products page after successful update
        exit();
    } else {
        echo "Error updating product: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="viewStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <br>
    <a href="home.php">[Go Back]</a>

    <div class="text">
        <h2>Edit Product</h2>
    </div>

    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $product['name']; ?>"><br>
            <label>Size:</label>
            <input type="text" name="size" value="<?php echo $product['size']; ?>"><br>
            <label>Color:</label>
            <input type="text" name="color" value="<?php echo $product['color']; ?>"><br>
            <label>Price:</label>
            <input type="text" name="price" value="<?php echo $product['price']; ?>"><br>
            <label>Stocks:</label>
            <input type="text" name="stocks" value="<?php echo $product['stocks']; ?>"><br>
            <button type="submit" class="btn btn-success">Save Changes</button>
        </form>
    </div>
</body>
</html>
