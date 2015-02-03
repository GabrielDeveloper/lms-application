<?php

namespace App\Controllers;

use SON\Controller\Action;
use App\Models\Artigos;
use SON\DI\Container;

class Edit extends Action{
    
    public function editar(){
        
        $this->addStyle("css/bootstrap.css");
        $this->addStyle("css/dashboard.css");
        
        if (isset($_REQUEST['edit']) && $_REQUEST['id']){
            
            $artigo = Container::getClass("Artigos");
            $artigo->id = $_REQUEST['id'];
            //$artigo->titulo = $_REQUEST['titulo'];
            //$artigo->conteudo = $_REQUEST['conteudo'];
            $artigos = $artigo->select();
            
            $this->view->artigo = $artigos;
            
            $this->render('editar');
            
        }
        
        
    }
    
}
