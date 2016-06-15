<?php

namespace oxdRP\api;
use oxdRP\api;
session_start();
session_destroy();
$register_site = new Register_site('../');

$register_site->setRequestAcrValues(Oxd_RP_config::$acr_values);
$register_site->setRequestAuthorizationRedirectUri(Oxd_RP_config::$authorization_redirect_uri);
$register_site->setRequestRedirectUris(Oxd_RP_config::$redirect_uris);
$register_site->setRequestLogoutRedirectUri(Oxd_RP_config::$logout_redirect_uri);
$register_site->setRequestContacts(["test@test.test"]);
$register_site->setRequestClientJwksUri("");
$register_site->setRequestClientRequestUris([]);
$register_site->setRequestClientTokenEndpointAuthMethod("");
$register_site->setRequestGrantTypes(Oxd_RP_config::$grant_types);
$register_site->setRequestResponseTypes(Oxd_RP_config::$response_types);
$register_site->setRequestClientLogoutUri(Oxd_RP_config::$logout_redirect_uri);
$register_site->setRequestScope(Oxd_RP_config::$scope);

$register_site->request();

print_r($register_site->getResponseObject());

