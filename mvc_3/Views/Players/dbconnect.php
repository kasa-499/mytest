<?php

try {
    $db = new PDO('mysql:dbname=worldcup;host=localhost;charset=utf8','root','root');
}   catch (PDOException $e) {
    echo "データベース接続エラー　：".$e->getMessage();
}
?>