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

     public function liga_user_doc($id_usuario,$id_doc,$editar=1,$excluir=1){


         $pdo = $this->conex;
         $query = 'INSERT INTO usuarios_documentos (id_usuario,id_doc,editar,excluir) VALUES (?,?,?,?)';
         $sql = $pdo->prepare($query);
         $sql->execute([$id_usuario,$id_doc,$editar,$excluir]);

     }

     public function getAll($condicao=false){
         
         $pdo = $this->conex;
         $query = "SELECT * FROM {$this->tabela} ";

         if($condicao)
         $query .= $condicao;

         $sql = $pdo->query($query);
         $dados = $sql->fetchAll(PDO::FETCH_ASSOC);

         return $dados;

     }

     public function getDocs($id){
        
         $pdo = $this->conex;
         $query = "SELECT * FROM `usuarios_documentos` INNER JOIN documentos on id_doc = documentos.id WHERE id_usuario = {$id};";

         $sql = $pdo->query($query);
         $dados = $sql->fetchAll(PDO::FETCH_ASSOC);

         return $dados;
     }

};