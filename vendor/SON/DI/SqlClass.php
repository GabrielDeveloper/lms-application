<?php

namespace SON\DI;

abstract class SqlClass {
    
  protected $db;
  protected $table;
  public $colums;
  public $valid;


    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->map();
    }
    
    
    public function addCollum($colTable, $col, $type, $key = false, $auto = false){
        
        $this->colums['colTabel'][] = $colTable;
        $colTable = explode('.', $colTable);
        $this->colums['col'][] = $col;
        $this->colums['Tp'][] = $type;
        $this->colums['Key'][] = $key;
        $this->colums['AI'][] = $auto;
        
    }
    
    private function map(){
       $atual = get_class($this);
       $singleClassName = str_replace("App\\Models\\", "", $atual);
       $this->$singleClassName();
    }

    

    public function select(){
        
       $query = 'SELECT '.(implode(', ',$this->colums['colTabel'])).' FROM '.$this->table;
       for ($i = 0; $i < count($this->colums['col']); $i++) {
           if (!empty($this->{$this->colums['col'][$i]})) {
               if ($this->colums['Tp'][$i] == 'INTEGER'){
                   $cond[] = $this->colums['colTabel'][$i]." = ".(int) $this->{$this->colums['col'][$i]};
               }else{
                   $cond[] = $this->colums['colTabel'][$i]." = '".$this->{$this->colums['col'][$i]}."'";
               }
                   
           }
       }
       if($cond)
          $query .= " WHERE ".implode (' AND ', $cond).";";
       
       $select = $this->db->query($query);
       return $select;
       
    }
    
    
    public function insert(){
        
        $query = 'INSERT INTO '.$this->table;
        
        $cols = " (";
        $valores = "(";
        
        for ($i = 0; $i < count($this->colums['col']);$i++){
            if ($this->colums['AI'][$i] == true)
                continue;
            
            if (!empty($this->{$this->colums['col'][$i]})){
                
                $cols       .= $this->colums['col'][$i];
                $valores    .= '"'.$this->{$this->colums['col'][$i]}.'"';
                
                if((count($this->colums['col'])-1) > $i){
                    $cols       .= ',';
                    $valores    .= ',';
                }
            } else {
                new \Exception("Erro ao inserir coluna vazia");
                die("erro");
            }
        }
        
        $cols .= ")";
        $valores .= ")";
        
        $query .= $cols." VALUES ".$valores;
        $this->valid = $this->db->query($query);
        return $this->valid;
        
    }
    
    
}
