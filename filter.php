<?php
include 'database.php';

$filteredResults = [];
$category = '';

if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $stmt = $pdo->prepare("SELECT * FROM products WHERE category = ?");
    $stmt->execute([$category]);
    $filteredResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Фильтрация товаров</title>
</head>
<body>
    <h1>Фильтрация товаров по категории</h1>
    <form action="filter.php" method="get">
        <input type="text" name="category" value="<?= htmlspecialchars($category) ?>" required>
        <input type="submit" value="Фильтровать">
    </form>

    <h2>Результаты фильтрации:</h2>
    <?php if (empty($filteredResults)): ?>
        <p>Товары не найдены в указанной категории.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($filteredResults as $product): ?>
                <li>
                    Название: <?= htmlspecialchars($product['name']) ?>, 
                    Цена: <?= htmlspecialchars($product['price']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <br>
    <a href="catalog.php">Назад к каталогу</a>
</body>
</html>
