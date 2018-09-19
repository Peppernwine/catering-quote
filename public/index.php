<?php

require_once "../app/bootstrap.php";

$headerFunc = function() {
    require_once "header.php";
};

$footerFunc = function () {
    require_once "footer.php";
};

$core = new Core(new ControllerFactory());
$core->handleRequest($headerFunc,$footerFunc);

