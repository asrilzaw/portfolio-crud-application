<?php
require_once '../includes/connection.php';

$sqlQuery = "SELECT * FROM accounts";
$stmt = connection()->prepare($sqlQuery);

$stmt->execute();
$accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);
