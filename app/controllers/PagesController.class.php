<?php
/**
 * Created by PhpStorm.
 * User: arthirajeev
 * Date: 8/24/2018
 * Time: 7:25 PM
 */

class PagesController extends BaseController
{
    public function about($params) {
        echo "about " . implode(",",$params);;
    }

    public function index() {
        echo "index";
    }
}