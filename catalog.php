<?php
include 'database.php';

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Каталог товаров</title>
</head>
<body>
    <h1>Каталог товаров</h1>
    <?php if (empty($products)): ?>
        <p>Каталог пуст.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($products as $product): ?>
                <li>
                    Название: <?= htmlspecialchars($product['name']) ?>, 
                    Категория: <?= htmlspecialchars($product['category']) ?>, 
                    Цена: <?= htmlspecialchars($product['price']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <a href="add.php">Добавить товар</a> | 
    <a href="search.php">Поиск товара</a> | 
    <a href="filter.php">Фильтрация товаров по категории</a>
</body>
</html>
