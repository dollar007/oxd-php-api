<?php

namespace oxdrp;
require_once __DIR__ . '/../src/oxdrp/Autoload.php';

session_start();
echo '<br/>Get_tokens_by_code <br/>';
$get_tokens_by_code = new Get_tokens_by_code('../');

$get_tokens_by_code->setRequestOxdId($_SESSION['oxd_id']);
//getting code from redirecting url, when user allowed.
$get_tokens_by_code->setRequestCode($_GET['code']);
$get_tokens_by_code->setRequestState($_GET['state']);
$get_tokens_by_code->setRequestScopes($_GET['scope']);

$get_tokens_by_code->request();

echo '<br/>Get_user_info <br/>';
$get_user_info = new Get_user_info('../');
$get_user_info->setRequestOxdId($_SESSION['oxd_id']);
$get_user_info->setRequestAccessToken($get_tokens_by_code->getResponseAccessToken());
$get_user_info->request();
print_r($get_user_info->getResponseObject());

