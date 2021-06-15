<?php
// var_dump($_GET);
// exit();

include('../functions.php');
$pdo=connect_to_db();

$user_id=$_GET["user_id"];


$sql = "UPDATE users_table SET is_nonactive=1 WHERE user_id=:user_id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
    } else {
    header("Location:users_read.php");
    exit();
}
