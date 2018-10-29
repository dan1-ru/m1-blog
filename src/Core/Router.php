<?php
namespace Blog\Core;

/**
 * Router class
 */
class Router
{

    const DEFAULT_CONTROLLER = 'Main';
    const DEFAULT_ACTION = 'index';

    /**
     * Detect controller by route and call it
     *
     * @return void
     */
    static function run()
    {
        // Default controller and action names:
        $controllerName = self::DEFAULT_CONTROLLER;
        $actionName = self::DEFAULT_ACTION;
        
        $routes = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        
        // Extract controller name
        if (!empty($routes[1])) {	
            $controllerName = $routes[1];
        }
        
        // Extract action name
        if (!empty($routes[2])) {
            $actionName = $routes[2];
        }

        $controllerName = 'Blog\\Controllers\\' . ucfirst($controllerName) . 'Controller';
        $actionName = 'action' . ucfirst($actionName);       
        $params = $_GET;

        if (class_exists($controllerName)) {
            $controller = new $controllerName;
            if (method_exists($controller, $actionName)) {
                call_user_func_array([
                    $controller,
                    $actionName
                ], $params);
                //$controller->$actionName();
            }
        }
    }
}