<?php
include_once "functions.php";

$app = new \Slim\Slim();

$body = $app->request->getBody();
$body1 = json_decode($body);

deleteTask($body1);


?>