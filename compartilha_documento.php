<?php

require("verifica_login.php");
require("twig_carregar.php");

require("models/Documento.php");
require("models/Usuario.php");
require("models/Usuarios_documentos.php");

$id_documento = $_GET['id'];
$Documento = new Documento();
$Usuario = new Usuario();
$Usr_doc = new Usuarios_documento();

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    var_dump($_POST);
    echo "<br>";
    $usuarios= [];
    $pv = '';
    foreach(array_keys($_POST) as $post){
        $chave =substr($post,-1);
        $usuarios[$chave]['permissao'] = $pv == $chave ? 1 : 0;
        $pv = $chave;
        
    }

    foreach($usuarios as $id => $usuario){
        $p = $usuario['permissao'];
        
        $Usr_doc->inserir([
            "id_usuario"=>$id,
            "id_documento"=>$id_documento,
            "editar"=>$p,
            "excluir"=>$p
            
        ]);
    }

    header("location:documentos.php");
    die;

}




$documento = $Documento->getById($id_documento);

$usuarios = $Usuario->getAll(["id"=>$id_usuario],"!=");




echo $twig->render('compartilha_documento.html',[
    "titulo"=>"Compartilhar Documento",
    "documento"=>$documento,
    "usuarios"=>$usuarios,
]);