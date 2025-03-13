<?php


namespace app\core;


class Route
{
    /**
     * default controller name
     */
    const DEFAULT_CONTROLLER = 'index';

    /**
     * default action name
     */
    const DEFAULT_ACTION = 'index';

    /**
     * Parse url path for the controller and action
     */
    static public function init() : void
    {
        $controllerName = self::DEFAULT_CONTROLLER;
        $actionName = self::DEFAULT_ACTION;
        $urlPath = $_SERVER['REQUEST_URI'];
        if(strpos($urlPath,'?')){
            $urlSearchComponents = explode('?', $urlPath);
            $urlPath = $urlSearchComponents[0];
        }
        $urlComponents = explode('/', $urlPath);
        $urlComponents = array_values(array_filter($urlComponents, function($component){
            return !empty($component);
        }));
        if(count($urlComponents)>2){
            self::notFound();
        }
        array_walk($urlComponents, function(&$urlComponent){
            $urlComponent = strtolower($urlComponent);
        });
        if(!empty($urlComponents[0])){
            $controllerName = $urlComponents[0];
        }
        if(!empty($urlComponents[1])){
            $actionName = $urlComponents[1];
        }
        $controllerClassName = 'app\controllers\\' . ucfirst($controllerName) . 'Controller';
        if(!class_exists($controllerClassName)){
            self::notFound();
        }
        $controller = new $controllerClassName();
        if(!($controller instanceof controllable)){
            throw new \InvalidArgumentException('Controller must be type of controllable');
        }
        if(!method_exists($controller, $actionName)){
            self::notFound();
        }
        $request = new Request();
        $controller->$actionName($request);
    }

    /**
     * Send status 404
     * @return never
     */
    static public function notFound() : never
    {
        $response = new Response();
        $response->status(404);
        exit();
    }

    /**
     * create an url string with controller and action
     * @param string $controller
     * @param string $action
     * @return string
     */
    static public function url(string $controller = self::DEFAULT_CONTROLLER, string $action = self::DEFAULT_ACTION){
        return '/' . strtolower($controller) . '/' . strtolower($action);
    }

//    static public function url(string $controller = null, string $action = null){
//        if(is_null($controller)){
//            return '/';
//        }else{
//            $controller = strtolower($controller);
//            if (is_null($action)) {
//                return '/' . $controller;
//            } else {
//                return '/' . $controller . '/' . strtolower($action);
//            }
//        }
//    }
}