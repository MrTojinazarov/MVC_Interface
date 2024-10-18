<?php
session_start();
use App\App;

include 'App/Helpers/helper.php';
include 'autoload.php';
include 'web.php';

$app = new App();
echo $app->run();

?>