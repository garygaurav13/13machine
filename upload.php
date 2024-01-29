<?php
ob_start();
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "upload";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];

    print_r($_POST);
    // Insert product data into the products table
    $sql = "INSERT INTO products (product_name, price) VALUES ('$product_name', $price)";

    if ($conn->query($sql) === TRUE) {
        $last_product_id = $conn->insert_id;

        // Handle image upload
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_path = $target_file;

                // Insert image data into the images table
                $sql = "INSERT INTO images (product_id, image_path) VALUES ($last_product_id, '$image_path')";

                if ($conn->query($sql) === TRUE) {
                    echo "Product and image information stored successfully.";
                } else {
                    echo "Error storing image: " . $conn->error;
                }
            } else {
                echo "Error uploading image.";
            }
        } else {
            echo "No image file uploaded.";
        }
    } else {
        echo "Error inserting product: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Form</title>
</head>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    <label for="product_name">Product Name:</label>
    <input type="text" name="product_name" required><br>

    <label for="price">Price:</label>
    <input type="text" name="price" required><br>

    <label for="image">Product Image:</label>
    <input type="file" name="image" accept="image/*" required><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
