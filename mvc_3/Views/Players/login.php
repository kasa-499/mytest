<?php
require("dbconnect.php");
session_start();
if(!empty($_POST)) {

    if($_POST['email'] === "") {
        $error['email'] = "blank";
    }
    if($_POST['password'] === "") {
        $error['password'] = "blank";
    }

    if(!isset($error)) {
        $users = $db->prepare('SELECT * FROM users WHERE email = ?');
        $users->execute(array(
            $_POST['email']
        ));
        $result = $users->fetch();

        if (password_verify($_POST['password'], $result['password'])) {
            $_SESSION['role'] = $result['role'];
            $_SESSION['country_id'] = $result['country_id'];
            $_SESSION['toIndex'] = "index";
            header('Location: index.php');
            exit();
        } else {
            $error['miss'] = "miss";
        }
    }

}
?>
<!DOCTYPE html>
 <html>
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>オブジェクト指向ー選手一覧</title>
     <link rel="stylesheet" type="text/css" href="/css/base.css">
 </head>
<body>
<div class="content">
  <h1>ログイン画面</h1>
  <form action="" method="post">
  <?php if (!empty($error["miss"]) && $error['miss'] === 'miss'): ?>
                    <p class="error">＊メールアドレスもしくはパスワードが間違っています</p>
  <?php endif ?>
    <div class="control">
                <label for="email">メールアドレス<span class="required">必須</span></label>
                <input id="email" type="email" name="email">
                <?php if (!empty($error["email"]) && $error['email'] === 'blank'): ?>
                    <p class="error">＊メールアドレスを入力してください</p>
                <?php endif ?>
    </div>

    <div class="control">
        <label for="password">パスワード<span class="required">必須</span></label>
        <input id="password" type="password" name="password">
        <?php if (!empty($error["password"]) && $error['password'] === 'blank'): ?>
            <p class="error">＊パスワードを入力してください</p>
        <?php endif ?>
    </div>

    <input type="submit" value="送信">
    <input type="hidden" name="login" value="login">
  </form>
</div>
<p>新規会員登録の方は<a href="signup.php">こちら</a></p>
</body>
</html>
