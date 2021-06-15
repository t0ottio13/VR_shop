<?php
  // var_dump($_GET);
  // exit;
  include('../functions.php');
  $user_id = $_GET["user_id"];
  $pdo = connect_to_db();
  $sql = 'SELECT * FROM users_table WHERE user_id= :user_id';

  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
  $status = $stmt->execute();

  if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
  } else {
    // 一つのデータをとってくる
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
  }

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー管理画面（編集画面）</title>
</head>

<body>
  <form action="users_update.php" method="POST">
    <fieldset>
      <legend>ユーザー管理画面（編集画面）</legend>
      <a href="users_read.php">一覧画面</a>
      <div>
        username: <input type="text" name="username" value="<?=$record['user_name']?>">
      </div>
      <div>
        password: <input type="password" name="password" value="<?=$record['password']?>">
      </div>
      <div>
        email: <input type="email" name="email" value="<?=$record['email']?>">
      </div>
      <div>
        <input type="hidden" name="user_id" value="<?=$record['user_id']?>" >
      </div>
      <div>
        <button>submit</button>
      </div>

    </fieldset>
  </form>

</body>

</html>