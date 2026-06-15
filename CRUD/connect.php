<?php 
$connect = mysqli_connect('localhost', 'root', '', 'products');

if (!$connect) {
    die('Error connect to database: ' . mysqli_connect_error());
}
