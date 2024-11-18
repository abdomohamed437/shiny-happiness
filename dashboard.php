<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $image = $_FILES['product_image'];

    if ($image['error'] === 0) {
        $image_path = 'uploads/' . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $image_path);

        $product_data = $product_name . "," . $price . "," . $image_path . "\n";
        file_put_contents('products.txt', $product_data, FILE_APPEND);
        echo "<p>تم إضافة المنتج بنجاح!</p>";
    } else {
        echo "<p>حدث خطأ أثناء رفع الصورة!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>لوحة تحكم إضافة المنتجات</h1>
    <form action="dashboard.php" method="post" enctype="multipart/form-data">
        <label>اسم المنتج:</label>
        <input type="text" name="product_name" required>
        <label>السعر:</label>
        <input type="text" name="price" required>
        <label>صورة المنتج:</label>
        <input type="file" name="product_image" required>
        <button type="submit">إضافة المنتج</button>
    </form>
    <a href="logout.php">تسجيل الخروج</a>
</body>
</html>
