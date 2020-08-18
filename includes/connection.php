<?php

function connection()
{
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'portfolio_crud';

    $option = [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    try {
        $dsn = 'mysql:host=' . $hostname . ';dbname=' . $database . ';charset=utf8';
        $pdo = new PDO($dsn, $username, $password, $option);
        return $pdo;
    } catch (PDOException $exception) {
        echo 'Connection failed: ' . $exception->getMessage();
        die();
    }
}
