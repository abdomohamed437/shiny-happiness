<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>عرض المنتجات</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>المنتجات المتوفرة</h1>
    <div class="product-container">
        <?php
        $products = file('products.txt', FILE_IGNORE_NEW_LINES);
        foreach ($products as $product) {
            list($name, $price, $image) = explode(",", $product);
            echo "<div class='product'>
                    <img src='$image' alt='$name'>
                    <h3>$name</h3>
                    <p>السعر: $price جنيه</p>
                </div>";
        }
        ?>
    </div>
</body>
</html>
