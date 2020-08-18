<?php
require_once '../includes/config.php';
require_once '../includes/connection.php';

$sqlQuery = "INSERT INTO accounts (account_name, account_email, account_phone, account_title, account_created) VALUE (:name, :email, :phone, :title, :created)";
$stmt = connection()->prepare($sqlQuery);

$stmt->bindParam(":name", $param_name);
$stmt->bindParam(":email", $param_email);
$stmt->bindParam(":phone", $param_phone);
$stmt->bindParam(":title", $param_title);
$stmt->bindParam(":created", $param_created);

$param_name    = $_POST['name'];
$param_email   = $_POST['email'];
$param_phone   = $_POST['phone'];
$param_title   = $_POST['title'];
$param_created = date('Y-m-d H:i:s');

$stmt->execute();

header('Location:'.URLROOT.'/views/accounts.php');
