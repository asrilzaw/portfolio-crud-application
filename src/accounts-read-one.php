<?php
require_once '../includes/connection.php';

$sqlQuery = "SELECT * FROM accounts WHERE account_id = :id";
$stmt = connection()->prepare($sqlQuery);

$stmt->bindParam(":id", $param_id);
$param_id = $_GET['detail'];

$stmt->execute();
$account = $stmt->fetch(PDO::FETCH_ASSOC);
