<?php

namespace App\Models;

use SON\DI\SqlClass;

class Artigos extends SqlClass{
    
    protected $table = "artigos";
    
    function Artigos(){
        
        $this->addCollum('artigos.id', 'id', 'INTEGER', true, true);
        $this->addCollum('artigos.titulo', 'titulo', 'STRING');
        $this->addCollum('artigos.conteudo', 'conteudo', 'STRING');
        
    }


}
