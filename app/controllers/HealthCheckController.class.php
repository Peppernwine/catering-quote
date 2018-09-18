<?php
/**
 * Created by PhpStorm.
 * User: arthirajeev
 * Date: 9/18/2018
 * Time: 2:27 PM
 */

class HealthCheckController
{
    public function init()
    {
        session_start();

        if (!isset($_SESSION['healthCheckCounter'])) {
            $_SESSION['healthCheckCounter'] = 1;
        } else {
            $_SESSION['healthCheckCounter']++;
        }

        if ($_SESSION['healthCheckCounter'] > 3) {
            http_response_code(404);
    } else
            http_response_code(200);
    }
}