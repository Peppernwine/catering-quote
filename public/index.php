<?php
require_once "header.php";
require_once "../app/bootstrap.php";

$core = new Core();
$core->handleRequest();


require_once "footer.php";
