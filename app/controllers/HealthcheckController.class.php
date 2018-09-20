<?php
/**
 * Created by PhpStorm.
 * User: arthirajeev
 * Date: 9/18/2018
 * Time: 2:27 PM
 */

class HealthCheckController
{
    public function init(){
        http_response_code(200);
    }
}