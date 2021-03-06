<?php

namespace App;

use SON\Init\Bootstrap;

class Init extends Bootstrap{
    
    protected function initRoutes() {
        
        $ar['home'] = array('route' => '/', 'controller' => 'index', 'action' => 'index');
        $ar['empresa'] = array('route' => '/empresa', 'controller' => 'index', 'action' => 'empresa');
        $ar['edit'] = array('route' => '/edit', 'controller' => 'edit', 'action' => 'editar');
        $this->setRoutes($ar);
    }
    
    public static function getDb(){
        $db = new \PDO('mysql:host=localhost;dbname=testes','root', 'root');
        return $db;
    }
    
}
