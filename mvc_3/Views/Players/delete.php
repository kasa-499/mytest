<?php
$enable_referer = 'index.php'; 
if (!strstr($_SERVER['HTTP_REFERER'],"index.php") )
{
    header('location:'.$enable_referer);
}
require_once(ROOT_PATH . 'Controllers/PlayerController.php');
$player = new PlayerController();
$player->delete();
header('Location: index.php');
exit(); 
?>
