<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー管理画面（入力画面）</title>
</head>

<body>
  <form action="users_create.php" method="POST">
    <fieldset>
      <legend> ユーザー管理画面（入力画面）</legend>
      <a href="./users_read.php">一覧画面</a>
      <div>
        username: <input type="text" name="username">
      </div>
      <div>
        password: <input type="password" name="password">
      </div>
      <div>
        email: <input type="email" name="email">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>