<?php
include_once "functions.php";
$app = new \Slim\Slim();

$body = $app->request->getBody();
$body1 = json_decode($body);
$vars = $body1->{"vars"};
$user = $body1->{"username"};

finishTask($vars,$user);
?>