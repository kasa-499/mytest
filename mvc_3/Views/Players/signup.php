<?php
require_once(ROOT_PATH . "Controllers/PlayerController.php");
require("dbconnect.php");
session_start();
$player = new PlayerController();
$params = $player->signup();
if(!empty($_POST)) {
    if($_POST['email'] === "") {
        $error['email'] = "blank";
    }
    if($_POST['password'] === "") {
        $error['password'] = "blank";
    }

    if(!isset($error)) {
        $users = $db->prepare('SELECT COUNT(*) as cnt FROM users WHERE email = ?');
        $users->execute(array(
            $_POST['email']
        ));
        $record = $users->fetch();
        if($record['cnt'] > 0) {
            $error['email'] = 'duplicate';
        }
    }

    if(!isset($error)) {
        $_SESSION['join'] = $_POST;
        header('Location: register.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規会員登録</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
</head>
<body>

<div class="content">
        <form action="" method="POST">
            <h1>新規会員登録</h1>
 
            <div class="control">
                <label>
                    権限
                    <select name='role'>
                    <option value="0">一般ユーザー</option> 
                    <option value="1">管理ユーザー</option>
                    </select>
                </label>
            </div>
 
            <div class="control">
                <label for="email">メールアドレス<span class="required">必須</span></label>
                <input id="email" type="email" name="email">
                <?php if (!empty($error["email"]) && $error['email'] === 'blank'): ?>
                    <p class="error">＊メールアドレスを入力してください</p>
                <?php elseif (!empty($error["email"]) && $error['email'] === 'duplicate'): ?>
                    <p class="error">＊このメールアドレスはすでに登録済みです</p>
                <?php endif ?>
            </div>
 
            <div class="control">
                <label for="password">パスワード<span class="required">必須</span></label>
                <input id="password" type="password" name="password">
                <?php if (!empty($error["password"]) && $error['password'] === 'blank'): ?>
                    <p class="error">＊パスワードを入力してください</p>
                <?php endif ?>
            </div>

            <div class="control">
                <label>

                    国
                    <select name='country_id'>
                    <?php
                    foreach ($params['Countries'] as $name) {
                        $selected = '';
                        if($country == $name['name']) {
                            $selected = ' selected';
                        }
                        echo '<option value="'.$name['id'].'"'.$selected.'>'.$name['name'].'</option>';
                    }
                    ?>
                    </select>
                </label>
            </div>
            <div class="control">
                <button type="submit" class="btn">新規登録</button>
            </div>
        </form>
    </div>
<p>すでに登録済みの方は<a href="login.php">こちら</a></p>
</body>
</html>