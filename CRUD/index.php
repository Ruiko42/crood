<?php
require_once 'connect.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Products List (CRUD)</title>
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
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 900px;
            margin-bottom: 30px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #444;
        }
        th {
            background: blue;
            color: white;
        }
        td {
            background: rgba(0, 0, 0, 0.85);
            color: white;
        }
        a {
            color: #ffdd67;
            text-decoration: none;
            margin-right: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
        .delete-btn {
            color: #ff6b6b;
        }
        form {
            background: rgba(0, 0, 0, 0.85);
            padding: 20px;
            max-width: 400px;
            border: 1px solid #444;
            color: white;
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
    </style>
</head>
<body>

    <h2>Список товаров</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Цена</th>
            <th>Действия</th>
        </tr>

        <?php
        $query_string = "SELECT * FROM `products`";
        $products = mysqli_query($connect, $query_string);

        while ($product = mysqli_fetch_assoc($products)) {
            ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['title']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td><?php echo $product['price']; ?>$</td>
                <td>
                    <a href="update.php?id=<?php echo $product['id']; ?>">Изменить</a>
                    <a class="delete-btn" href="vendor/delete.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Удалить этот товар?')">Удалить</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>

    <h2>Добавить новый товар</h2>
    <form action="vendor/create.php" method="post">
        <label>Название</label>
        <input type="text" name="title" required>
        
        <label>Описание</label>
        <textarea name="description" rows="4" required></textarea>
        
        <label>Цена ($)</label>
        <input type="number" name="price" min="0" required>
        
        <button type="submit">Добавить</button>
    </form>

</body>
</html>
