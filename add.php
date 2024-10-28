<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $stmt = $pdo->prepare("INSERT INTO products (name, category, price) VALUES (?, ?, ?)");
    $stmt->execute([$name, $category, $price]);

    header('Location: catalog.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Добавить товар</title>
</head>
<body>
    <h1>Добавить товар</h1>
    <form method="post">
        Название: <input type="text" name="name" required><br>
        Категория: <input type="text" name="category" required><br>
        Цена: <input type="number" name="price" step="0.01" required><br>
        <input type="submit" value="Добавить">
    </form>
    <br>
    <a href="catalog.php">Назад к каталогу</a>
</body>
</html>
