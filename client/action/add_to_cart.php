<?php
// Include database connection
require_once "../include/connection.php";

if (isset($_POST['add_cart'])) {
    // Validate and sanitize inputs
    $productName = trim($_POST['product_title']);
    $productPrice = floatval($_POST['product_price']);
    $productImage = trim($_POST['product_image']);
    $quantity = 1;

    // ✅ Use prepared statement to prevent SQL injection
    $selectCart = "SELECT * FROM carts WHERE name = ?";
    $stmt = $conn->prepare($selectCart);
    $stmt->bind_param("s", $productName);
    $stmt->execute();
    $result = $stmt->get_result();  // ✅❤️ Correct way to get results

    
        // ✅ Insert into cart using a prepared statement
        $insert = "INSERT INTO carts (name, price, image, quality) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insert);
        $stmt->bind_param("sdsi", $productName, $productPrice, $productImage, $quantity);

        if ($stmt->execute()) {
            $message = "Product added to cart";
        } else {
            $message = "Error adding product: " . $conn->error;
        }
    

    // Close statement
    $stmt->close();

    // ✅ Redirect or display message
    // echo "<script>alert('$message'); window.location.href='../shop.php';</script>";
    header("Location: ../shop.php?message=$message");
}
?>
