<?php 
require_once(ROOT_PATH.'Controllers/PlayerController.php');
$player = new PlayerController();
$params = $player->view();
$goals = $player->viewGoal();
function h($value) {
    return htmlspecialchars($value, ENT_QUOTES);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>オブジェクト指向ー選手詳細</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="/js/delete.js"></script>
</head>

<body>

    <table>
        <h2>■選手詳細</h2>
        <tr><th>NO</th><td><?=$params['player']['0']['p_id'] ?></td></tr>
        <tr><th>背番号</th><td><?=$params['player']['0']['uniform_num'] ?></td></tr>
        <tr><th>ポジション</th><td><?=$params['player']['0']['position'] ?></td></tr>
        <tr><th>名前</th><td><?=h($params['player']['0']['p_name']) ?></td></tr>
        <tr><th>所属</th><td><?=h($params['player']['0']['club']) ?></td></tr>
        <tr><th>誕生日</th><td><?=$params['player']['0']['birth'] ?></td></tr>
        <tr><th>身長</th><td><?=$params['player']['0']['height'] ?></td></tr>
        <tr><th>体重</th><td><?=$params['player']['0']['weight'] ?></td></tr>
        <tr><th>国</th><td><?=$params['player']['0']['c_name'] ?></td></tr>

    </table>

    <table>
        <h2>■得点履歴</h2>
        <tr>
            <th>点数(何点目か)</th>
            <th>試合日時</th>
            <th>対戦相手</th>
            <th>ゴールタイム</th>
        </tr>
        <?php $i=1;?>
        <?php foreach($goals['goal'] as $goal): ?>
        <tr>
            <th><?php echo $i;?></th>
            <th><?=$goal['試合日時']?></th>
            <th><?=$goal['対戦相手']?></th>
            <th><?=$goal['ゴールタイム']?></th>
        <?php $i++;?>
        </tr>
        <?php endforeach;?>
    </table>
    <div class="back"><a href="javascript:history.back()">トップへ戻る</a></div>
</body>

</html>