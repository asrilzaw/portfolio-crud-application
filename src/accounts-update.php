<?php
require_once '../includes/config.php';
require_once '../includes/connection.php';

$sqlQuery = "UPDATE accounts SET account_name = :name, account_email = :email, account_phone = :phone, account_title = :title WHERE account_id = :id";
$stmt = connection()->prepare($sqlQuery);

$stmt->bindParam(":name", $param_name);
$stmt->bindParam(":email", $param_email);
$stmt->bindParam(":phone", $param_phone);
$stmt->bindParam(":title", $param_title);
$stmt->bindParam(":id", $param_id);

$param_name  = $_POST['name'];
$param_email = $_POST['email'];
$param_phone = $_POST['phone'];
$param_title = $_POST['title'];
$param_id    = $_GET['id'];

$stmt->execute();

header('Location:'.URLROOT.'/views/accounts.php');
