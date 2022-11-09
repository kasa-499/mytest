<?php
require("dbconnect.php");
session_start();

if(!isset($_SESSION['join'])) {
    header('Location: signup.php');
    exit();
}
if(!empty($_POST['check'])) {
    $hash = password_hash($_SESSION['join']['password'],PASSWORD_DEFAULT);
    $statement = $db->prepare("INSERT INTO users SET country_id=?, email=?, password=?, role=?");
    $statement->execute(array(
        $_SESSION['join']['country_id'],
        $_SESSION['join']['email'],
        $hash,
        $_SESSION['join']['role']
    ));

    unset($_SESSION['join']);
    header(('Location: thank.php'));
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認画面</title>
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
</head>
<body>
    <div class="content">
        <form action="" method="POST">
            <input type="hidden" name="check" value="checked">
            <h1>入力情報の確認</h1>
            <p>ご入力情報に変更が必要な場合、変更を行ってください。</p>
            <?php if (!empty($error) && $error === "error"): ?>
                <p class="error">＊会員登録に失敗しました。</p>
            <?php endif ?>
            <hr>

            <div class="control">
                <p>権限</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php if($_SESSION['join']['role'] == 0){echo '一般ユーザー';}if($_SESSION['join']['role'] == 1){ echo '管理者';} ?></span></p>
            </div>

            <div class="control">
                <p>メールアドレス</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES); ?></span></p>
            </div>
            
            <br>
            <a href="signup.php" class="back-btn">変更する</a>
            <button type="submit" class="btn next-btn">登録する</button>
            <div class="clear"></div>
        </form>
    </div>
</body>
</html>