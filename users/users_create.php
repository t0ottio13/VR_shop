<?php

include('../functions.php');
$pdo = connect_to_db();

var_dump($_POST);

if (
  !isset($_POST['username']) || $_POST['username'] == '' ||
  !isset($_POST['email']) || $_POST['email'] == '' ||
  !isset($_POST['password']) || $_POST['password'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$user_name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// $dbn = 'mysql:dbname=gsacf_l05_06;charset=utf8;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// try {
//   $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//   echo json_encode(["db error" => "{$e->getMessage()}"]);
//   exit();
// }


$sql = 'INSERT INTO users_table(user_id, user_name, password, email, is_admin, is_nonactive, created_at, updated_at) VALUES(NULL, :user_name, :password, :email,0,0, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:users_input.php");
  exit();
}
