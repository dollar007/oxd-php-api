<?php

namespace oxdrp;
require_once __DIR__ . '/../src/oxdrp/Autoload.php';

session_start();
$get_authorization_url = new Get_authorization_url('../');
$get_authorization_url->setRequestOxdId($_SESSION['oxd_id']);

$get_authorization_url->request();

echo $get_authorization_url->getResponseAuthorizationUrl();

