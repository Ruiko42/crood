<?php
require_once 'connect.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Products List</title>
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
            margin-bottom: 20px;
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
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>
