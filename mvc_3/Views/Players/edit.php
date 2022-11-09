<?php
if(!isset($_POST['edit'])){
    header('Location: login.php');
}
require_once(ROOT_PATH . "Controllers/PlayerController.php");
if(isset($_POST['update'])){
    require_once(ROOT_PATH.'Views/Players/validate.php');
}
$player = new PlayerController();
$params = $player->edit();
$country_id = $params['player'][0]['country_id'];
$uniform_num = $params['player'][0]['uniform_num'];
$position = $params['player'][0]['position'];
$p_name = $params['player'][0]['p_name'];
$c_name = $params['player'][0]['c_name'];
$club = $params['player'][0]['club'];
$birth = $params['player'][0]['birth'];
$height = $params['player'][0]['height'];
$weight = $params['player'][0]['weight'];
$country = $params['Countries'][$country_id - 1]['name'];
if(isset($_POST['update'])){
  $country_id = $_POST['id'];
  $uniform_num = $_POST['uniform_num'];
  $position = $_POST['position'];
  $p_name = $_POST['p_name'];
  $c_name = $_POST['name'];
  $club = $_POST['club'];
  $birth = $_POST['birth'];
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  $country = $_POST['name'];
}
function h($value) {
    return htmlspecialchars($value, ENT_QUOTES);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>オブジェクト指向 - 選手一覧</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<script src="/js/epop.js"></script>
<body>

<div class="con_box">
    <h2>■選手情報編集</h2>
    <form action="edit.php?id=<?=$params['player'][0]['p_id']?>" method="POST" onsubmit="return editEndSubmit()">
        <p>背番号</p>
        <p class="e_msg"><?php if (isset($errors[0])){ echo $errors[0]; } ?></p>
        <input type="text" name="uniform_num" id="uniform_num" value=<?php echo h($uniform_num); ?>>
        <p>ポジション(プルダウン)</p>
        <select name='position'>
        <option value="MF" <?php if ( $position === 'MF' ) { echo ' selected'; } ?>>MF</option> 
        <option value="GK" <?php if ( $position === 'GK' ) { echo ' selected'; } ?>>GK</option>
        <option value="DF" <?php if ( $position === 'DF' ) { echo ' selected'; } ?>>DF</option>
        <option value="FW" <?php if ( $position === 'FW' ) { echo ' selected'; } ?>>FW</option>
        </select>
        <p><span>必須</span>名前</p>
        <p class="e_msg"><?php if (isset($errors[1])){ echo $errors[1]; } ?></p>
        <input type="text" name="p_name" id="p_name" value=<?php echo h($p_name) ?>>
        <p><span>必須</span>所属</p>
        <p class="e_msg"><?php if (isset($errors[2])){ echo $errors[2]; } ?></p>
        <input type="text" name="club" id="club" value=<?php echo h($club) ?>>
        <p><span>必須</span>誕生日</p>
        <p class="e_msg"><?php if (isset($errors[3])){ echo $errors[3]; if (isset($errors[4])){ echo $errors[4]; }} ?></p>
        <input type="text" name="birth" id="birth" value=<?php echo h($birth) ?>>
        <p><span>必須</span>身長</p>
        <p class="e_msg"><?php if (isset($errors[5])){ echo $errors[5]; } if (isset($errors[6])){ echo $errors[6]; }?></p>
        <input type="text" name="height" id="height" value=<?php echo h($height) ?>>
        <p><span>必須</span>体重</p>
        <p class="e_msg"><?php if (isset($errors[7])){ echo $errors[7]; } if (isset($errors[8])){ echo $errors[8]; }?></p>
        <input type="text" name="weight" id="weight" value=<?php echo h($weight) ?>>
        <p>国(プルダウン)</p>
        <select name='name'>
        <?php
        foreach ($params['Countries'] as $name) {
            $selected = '';
            if($country == $name['name']) {
                $selected = ' selected';
            }
            echo '<option value="'.$name['name'].'"'.$selected.'>'.$name['name'].'</option>';
        }
        ?>
        </select>
        <input type="submit" name="confirm" value="送信" class="botton" id="submit" >
        <script src="/js/delete.js"></script>
        <input type="hidden" name="update" value="update">
        <input type="hidden" name="edit" value="edit">
        <input type="hidden" name="id" value="<?php echo $params['player']['0']['p_id'] ?>">
    </form>
</div>
<?php
 if(isset($_POST['update']) && $err == ""){
    $player->update($_POST['id'], $uniform_num, $position, $p_name, $player->nameToCountriesId($country), $club, $birth, $height, $weight);
    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}
?>

<div class="aa"><a href="index.php">選手一覧へ戻る</a></div>
</body>

</html>