<?php
// var_dump($_POST);
// exit();

include('../functions.php');
$pdo= connect_to_db();

$user_name = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$user_id = $_POST["user_id"];



$sql = "UPDATE users_table SET user_name=:user_name, password=:password,email=:email,
updated_at=sysdate() WHERE user_id=:user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$status = $stmt->execute();

// var_dump($_POST);
// exit();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
    } else {
    header("Location:users_read.php");
    exit();
}
