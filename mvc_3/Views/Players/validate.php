<?php
session_start();
$errors = ["","","","","","","","",""];
$err="";
$pattern = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/";

if(isset($_POST)){
    if (!is_numeric($_POST["uniform_num"])){
        $errors[0] = "背番号は数字で入力してください。";
        $err = "err";
    }
    if(empty(preg_replace("/( | )/","",($_POST["p_name"])))){
        $errors[1] = "名前は必須項目です。";
        $err = "err";
    }
    if(empty(preg_replace("/( | )/", "",($_POST["club"])))){
        $errors[2] = "所属は必須項目です。";
        $err = "err";
    }
    if(empty(preg_replace("/( | )/", "",($_POST["birth"])))){
        $errors[3] = "誕生日は必須項目です。";
        $err = "err";
    } else {
    if(!preg_match($pattern,$_POST["birth"])){
        $errors[4] = "正確な年月日を入力してください。";
        $err = "err";
    }
    }
    if(empty(preg_replace("/( | )/", "",($_POST["height"])))){
        $errors[5] = "身長は必須項目です。";
        $err = "err";
    }else {
    if(!is_numeric($_POST["height"])){
        $errors[6] = "身長は数字で入力してください。";
        $err = "err";
    }
    }
    if(empty(preg_replace("/( | )/", "",($_POST["weight"])))){
        $errors[7] = "体重は必須項目です。";
        $err = "err";
    }else {
    if(!is_numeric($_POST["weight"])){
        $errors[8] = "体重は数字で入力してください。";
        $err = "err";
    }
    }
}
?>
