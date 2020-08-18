<?php
require_once '../includes/config.php';
require_once '../includes/connection.php';

$sqlQuery = "DELETE FROM accounts WHERE account_id = :id";
$stmt = connection()->prepare($sqlQuery);

$stmt->bindParam(":id", $param_id);
$param_id = $_GET['delete'];

$stmt->execute();

header('Location:'.URLROOT.'/views/accounts.php');
