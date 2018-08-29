<?php
/**
 * Created by PhpStorm.
 * User: arthirajeev
 * Date: 8/24/2018
 * Time: 7:25 PM
 */

class IndexController extends BaseController
{
    public function index() {
        $this->getView('index')->display(['name' => 'Rajeev']);
    }
}