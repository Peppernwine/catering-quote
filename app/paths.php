<?php
/**
 * Created by PhpStorm.
 * User: arthirajeev
 * Date: 8/24/2018
 * Time: 10:48 AM
 */

DEFINE('ROOT_PATH',realpath(dirname(__FILE__)) + '/..');
DEFINE('APP_PATH',realpath(dirname(__FILE__)));

DEFINE('PUBLIC_PATH',ROOT_PATH . '/public');
DEFINE('PUBLIC_TEMP_PATH',PUBLIC_PATH . '/temp');

DEFINE('TEMPLATE_PATH',APP_PATH . '/templates');
DEFINE('VENDOR_LIB_PATH',APP_PATH . '/vendor');
DEFINE('RESOURCE_PATH',APP_PATH . '/resources');
DEFINE('LOG_PATH',APP_PATH . '/logs');
