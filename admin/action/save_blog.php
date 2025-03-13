<?php
// call connection
require_once "../config.php";
// Ensure "uploads" directory exists
if (!is_dir('blog')) {
    mkdir('blog', 0777, true);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image = $_FILES['image'];
    $title = $_POST['txt-title'];
    $sub_title = $_POST['txt-subtitle'];
    $link = $_POST['txt-link'];
    
   
    // Generate unique filename
    $imagePath = 'save_blog/' . time() . '_' . basename($image['name']);
    move_uploaded_file($image['tmp_name'], $imagePath);
    // Save to database
    $stmt = $conn->prepare("INSERT INTO tbl_blog (title, sub_title, link, image) VALUES (?, ?, ?, ?)");
    $stmt->execute([ $title, $sub_title, $link, $imagePath]);
    echo "Slide uploaded successfully!";
   // Redirect to index.php
   header("Location: ../index.php?p=BlogPage");
    exit();
}


?>