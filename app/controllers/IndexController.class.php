<?php
/**
 * Created by PhpStorm.
 * User: arthirajeev
 * Date: 8/24/2018
 * Time: 7:25 PM
 */

class IndexController extends BaseController
{
    public function init() {
        $this->displayHeader();
        $this->getView('index')->display(['name' => 'Rajeev']);
        $this->displayFooter();
    }
}