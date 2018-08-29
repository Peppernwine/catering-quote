<?php
/**
 * Created by PhpStorm.
 * User: arthirajeev
 * Date: 8/28/2018
 * Time: 11:08 AM
 */

class IndexView
{
    public function display($data = []) {

        echo "Welcome " . $data['name'];
    }

}