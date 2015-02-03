<?php

require_once '../vendor/autoload.php';

$init = new \App\Init();



/*class index {
   
    private $routes;


    public function __construct() {
        $this->setRoutes();
    }
    
    public function setRoutes(){
        
        $ar = ["route"=>"/", "controller"=>'index', "action"=>'index'];
    }
    
    public function getUrl(){
        return $_SERVER['REQUEST_URI'];
    }
    
    
    
}

$index = new index;
echo $index->getUrl();*//*
try{
$con = new \PDO('mysql:host=localhost;dbname=testes;','root', 'root');
if($con){
    echo 'conectou';
}
} catch (PDOException $e){
    
    echo $e->getMessage();
}
$teste = $con->query('SELECT * FROM artigos')->fetchAll();
foreach ($teste as $artigo){
    echo $artigo['titulo'].'<br>';
}

$mysqli = new mysqli("localhost" , "" , "" , "testes");
if ($mysqli == true)
  echo "Tudo OK";
else
  echo "Um erro ocorreu: <br />" . $mysqli->error();

$con = new \PDO('mysql:host=localhost;dbname=testes;','root', 'root');
$teste = $con->query('SELECT * FROM artigos');
foreach ($teste as $artigo){
    echo $artigo['titulo'].'<br>';
}*/