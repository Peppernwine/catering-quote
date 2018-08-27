<?php
/**
 * Created by PhpStorm.
 * User: arthirajeev
 * Date: 8/24/2018
 * Time: 1:45 AM
 */

class Core
{

    private $controllerFactory ;

    public function __construct($factory) {
        $this->controllerFactory = $factory;
    }

    private function getUrl() {
        $url = [];
        if (!empty($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url , FILTER_SANITIZE_URL);
            $url = explode('/',$url);
        }
        return $url;
    }

     private function getContoller($url, &$method, &$params) {
         $controller = 'PagesController';
         $method     = 'index';
         $params     = [];

         if (!empty($url[0])) {
             $controller = ucfirst($url[0]) . 'Controller';
             unset($url[0]);
         }

         if (!empty($url[1])) {
             $method = $url[1];
             unset($url[1]);
         }

         $params = array_values($url);

         $controllerFileName = "../app/controllers/".$controller.".class.php";

         $invalidResource = true;
         if (file_exists($controllerFileName)) {
             require_once $controllerFileName;
             if (method_exists($controller,$method)) {
                 $invalidResource = false;
             }
         }

         if ($invalidResource) {
             $controller = 'ErrorController';
             $controllerFileName = "../app/controllers/".$controller.".class.php";
             require_once $controllerFileName;
             $method = 'missingResource';
             $params = [];
         }

         //return new $controller();
         return $this->controllerFactory->createController($controller);
     }

     public function handleRequest() {
        $url = $this->getUrl();

        $method = '';
        $params = [];
        $controllerInstance = $this->getContoller($url,  $method,$params);


        call_user_func_array([$controllerInstance, $method], $params);
    }
}