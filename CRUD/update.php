<?php
require_once 'connect.php';

$product_id = $_GET['id'];
$product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$product_id'");
$product = mysqli_fetch_assoc($product);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактирование товара</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('ronalda.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            padding: 20px;
        }
        form {
            background: rgba(0, 0, 0, 0.85);
            padding: 20px;
            max-width: 400px;
            border: 1px solid #444;
            color: white;
            margin-top: 20px;
        }
        form input, form textarea {
            width: 100%;
            padding: 8px;
            margin: 8px 0 15px 0;
            box-sizing: border-box;
        }
        form button {
            background: blue;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        form button:hover {
            background: darkblue;
        }
        .back-link {
            color: white;
            display: inline-block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <a class="back-link" href="index.php">← Назад к списку</a>
    <h2 style="color: white; text-shadow: 1px 1px 2px black;">Редактировать товар №<?php echo $product['id']; ?></h2>

    <form action="vendor/update_core.php" method="post">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        
        <label>Название</label>
        <input type="text" name="title" value="<?php echo $product['title']; ?>" required>
        
        <label>Описание</label>
        <textarea name="description" rows="4" required><?php echo $product['description']; ?></textarea>
        
        <label>Цена ($)</label>
        <input type="number" name="price" value="<?php echo $product['price']; ?>" min="0" required>
        
        <button type="submit">Сохранить изменения</button>
    </form>

</body>
</html>
