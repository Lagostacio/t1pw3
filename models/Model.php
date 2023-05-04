<?php


class Model {

    private $tipo_banco = 'mysql';
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'trabweb';
    private $conex;

    public function __construct(){
                
        $this->conex = new PDO("{$this->tipo_banco}:host={$this->host};dbname={$this->dbname}", $this->user, $this->pass);

     }

     public function inserir($dados){
        
        $pdo = $this->conex;
        $query = "INSERT INTO {$this->tabela} {$this->campos} VALUES {$this->prepare}";
        $sql = $pdo->prepare($query);

        $sql->execute($dados);

        //var_dump($dados);die;
     }
};