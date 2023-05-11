<?php


class Model {

    private $tipo_banco = 'mysql';
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'trabweb';
    private $conex;
    protected $tabela;

    public function __construct(){
                

        $tbl = strtolower(get_class($this));
        $tbl .= 's';
        $this->tabela = $tbl;

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
         $query = 'INSERT INTO usuarios_documentos (id_usuario,id_documento,editar,excluir) VALUES (?,?,?,?)';
         $sql = $pdo->prepare($query);
         $sql->execute([$id_usuario,$id_doc,$editar,$excluir]);

     }

     public function getAll($condicao=false){
         
         $pdo = $this->conex;
         $query = "SELECT * FROM {$this->tabela} ";

         if($condicao)
         $query .= "WHERE ".$this->campos_sql($condicao);

         $sql = $pdo->prepare($query);
         $sql->execute($condicao);
         $dados = $sql->fetchAll(PDO::FETCH_ASSOC);

         return $dados;

     }

     public function getById($id){

        $pdo = $this->conex;
        $sql = $pdo->prepare("SELECT * FROM {$this->tabela} WHERE id = ?");
        $sql->execute([$id]);

        return $sql->fetch(PDO::FETCH_ASSOC);
     }

     public function getId(){
         $pdo = $this->conex;
         $query = "SELECT MAX(id) FROM {$this->tabela}";
         $sql = $pdo->query($query);
        $sql->fetch(PDO::FETCH_ASSOC);

     }

     public function getDocs($id){
        
         $pdo = $this->conex;
         $query = "SELECT * FROM `usuarios_documentos` INNER JOIN documentos on id_documento = documentos.id WHERE id_usuario = ?";
         $sql = $pdo->prepare($query);
         $sql->execute([$id]);
         $dados = $sql->fetchAll(PDO::FETCH_ASSOC);

         return $dados;
     }

     public function excluir($id){
         $pdo = $this->conex;
         $tbl = rtrim($this->tabela,'s');
         $query = "DELETE FROM usuarios_documentos WHERE id_{$tbl} = ?";
         $sql = $pdo->prepare($query);
         $sql->execute([$id]);


         $query = "DELETE FROM {$this->tabela} WHERE id = ?";
         $sql = $pdo->prepare($query);
         $sql->execute([$id]);

         return;
     }
     
     private function mapeia_campos($dados){
        $campos = [];
        foreach(array_keys($dados) as $campo){
             array_push($campos,"{$campo} = :{$campo}");
        } 

        return $campos;
     }
        

        private function campos_sql($dados){
           $camposSeparados = $this->mapeia_campos($dados);
           $campos = implode(' , ', $camposSeparados);

           return $campos;
       }


    };