<?php

namespace SON\Init;

abstract class Bootstrap {
    
    private $routes;


    public function __construct() {
        $this->initRoutes();
        
            $this->run($this->getUrl());
    }
    
    abstract protected function initRoutes(); 
    
    public function setRoutes($routes){
        $this->routes = $routes;
    }
    
    protected function run($url){
        
        
        
        array_walk($this->routes, function ($route) use ($url){
            
            if ($url == $route['route']){
                $class = "App\\Controllers\\".ucfirst($route['controller']);
                
                $controller = new $class;
                $controller->$route['action']();
            }
        });
        
    }

    protected function getUrl(){
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    
}
