<?php
require_once '../lib/config.php';

session_start();
//setcookie("user_name", "", time()-3600);
//setcookie("user_pwd", "", time()-3600);
//setcookie("uid", "", time()-3600);
//setcookie("user_email", "", time()-3600);

//删除登录session login信息
$PHPSESSID = $_COOKIE['PHPSESSID'];
$sessionLogin = new \Ss\User\SessionLogin($PHPSESSID);
$sessionLogin->DelSessionArray();

header("Location:login.php");
exit;