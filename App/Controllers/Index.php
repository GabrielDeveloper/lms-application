<?php

namespace App\Controllers;

use SON\Controller\Action;
use App\Models\Artigos;
use SON\DI\Container;

class Index extends Action{
    

    public function index(){
        
        $artigo = Container::getClass("Artigos");
        
        //$artigo->titulo = "Pastor Oseas";
        //$artigo->conteudo = "Criando o conteudo do Pastor";
        //$artigo->insert();
        $artigos = $artigo->select();
        
        $this->view->artigos = $artigos;
        
        $this->addStyle("css/bootstrap.css");
        $this->addStyle("css/dashboard.css");
        $this->render('index');
        
    }

    public function empresa(){
        $this->addStyle("css/bootstrap.css");
        $this->addStyle("css/bootstrap-theme.css");
        
        $this->title = 'Empresa';
        
        $nomes[] = 'Gabriel';
        $nomes[] = 'Jhoselly';
        $this->view->teste = 'Empresa';

        $this->view->nomes =$nomes;
        $this->render('empresa');
        
        
    }
}
