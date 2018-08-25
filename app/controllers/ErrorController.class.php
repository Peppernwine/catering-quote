<?php
/**
 * Created by PhpStorm.
 * User: arthirajeev
 * Date: 8/24/2018
 * Time: 11:53 PM
 */

class ErrorController extends BaseController
{
    public function missingResource() {
        echo "Resource not found";
    }
}