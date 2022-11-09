<?php 
session_start();
if(!isset($_SESSION['toIndex'])) {
    header('Location: login.php');
}
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
     <title>オブジェクト指向ー選手一覧</title>
     <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
     <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<?php if($_SESSION['role'] == 1) {
     require_once(ROOT_PATH.'Controllers/PlayerController.php');
     $player = new PlayerController();
     $params = $player->index();
?>
        <body>
            <h2>選手一覧</h2>
            <table>
                <tr>
                    <th> NO </th>
                    <th> 背番号 </th>
                    <th> ポジション </th>
                    <th> 名前 </th>
                    <th> 所属 </th>
                    <th> 誕生日 </th>
                    <th> 身長 </th>
                    <th> 体重 </th>
                    <th> 国 </th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach($params['players'] as $player): ?>
                <tr>
                    <td><?=$player['p_id'] ?></td>
                    <td><?=$player['uniform_num'] ?></td>
                    <td><?=$player['position'] ?></td>
                    <td><?=h($player['p_name']) ?></td>
                    <td><?=h($player['club']) ?></td>
                    <td><?=$player['birth'] ?></td>
                    <td><?=$player['height'] ?>cm</td>
                    <td><?=$player['weight'] ?>kg</td>
                    <td><?=$player['c_name'] ?></td>
                    <td><a class="detail" href="../view.php?id=<?= $player['p_id'] ?>">詳細</a></td>
                    <td><form method="POST" name="edit" action="./edit.php" onsubmit='return editSubmit()'><input type="hidden" name="id" value="<?= $player["p_id"]; ?>"><input type='submit' name='edit' class='db_btn1' value='編集'><input type="hidden" name="edit" value="edit"></form></td>
                    <td><form method="POST" name="delete" action="./delete.php" onsubmit='return beforeSubmit()'><input type="hidden" name="id" value="<?= $player["p_id"] ?>"><input type='submit' name='delete' class='db_btn' value='削除'></form></td>
                </tr>
                <?php endforeach; ?>
                <script src="/js/delete.js"></script>
            </table>

            <div class="paging">
                <?php
                for($i = 0; $i <= $params['pages']; $i++) {
                    if(isset($_GET['page']) && $_GET['page'] == $i) {
                        echo $i + 1;
                    } else {
                        echo "<a href='?page=".$i."'>".($i + 1)."</a>";
                    }
                }
                ?>
            </div>
        </body>
        </html>
<?php }else {
    require_once(ROOT_PATH.'Controllers/PlayerController.php');
    $player = new PlayerController();
    $params = $player->indexGeneral();
?>
<body>
     <h2>自国選手一覧</h2>
     <table>
         <tr>
             <th> NO </th>
             <th> 背番号 </th>
             <th> ポジション </th>
             <th> 名前 </th>
             <th> 所属 </th>
             <th> 誕生日 </th>
             <th> 身長 </th>
             <th> 体重 </th>
             <th> 国 </th>
             <th></th>
             <th></th>
             <th></th>
         </tr>
         <?php foreach($params['player'] as $player): ?>
         <tr>
             <td><?=$player['p_id'] ?></td>
             <td><?=$player['uniform_num'] ?></td>
             <td><?=$player['position'] ?></td>
             <td><?=h($player['p_name']) ?></td>
             <td><?=h($player['club']) ?></td>
             <td><?=$player['birth'] ?></td>
             <td><?=$player['height'] ?>cm</td>
             <td><?=$player['weight'] ?>kg</td>
             <td><?=$player['c_name'] ?></td>
             <td><a class="detail" href="../view.php?id=<?= $player['p_id'] ?>">詳細</a></td>
         </tr>
         <?php endforeach; ?>
         <script src="/js/delete.js"></script>
     </table>
 </body>
</html>

<?php } ?>