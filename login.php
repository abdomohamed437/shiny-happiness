<?php
session_start();
$correct_username = "admin";
$correct_password = "password123"; // يجب تعديل كلمة المرور للحماية

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $correct_username && $password === $correct_password) {
        $_SESSION['loggedin'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        echo "<p style='color:red;'>اسم المستخدم أو كلمة المرور غير صحيحة!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>تسجيل الدخول للمدير</h2>
    <form action="login.php" method="post">
        <label>اسم المستخدم:</label>
        <input type="text" name="username" required>
        <label>كلمة المرور:</label>
        <input type="password" name="password" required>
        <button type="submit">تسجيل الدخول</button>
    </form>
</body>
</html>
