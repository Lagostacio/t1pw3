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
    $v= [];
    foreach(array_keys($_POST) as $post){
        array_push($v,substr($post,-1));
    }

    $teste = array_reduce($v,function($carry,$item){
        $teste = empty($teste) ? [] : $teste;
        
        echo "carry:".$carry."item:".$item."  ";
        $teste2 = $carry != $item ? ["{$item}"=>["permissao"=>0]] : ["{$item}"=>["permissao"=>1]] ;
        var_dump ($teste2);
        echo "<br>";
        array_push($teste,$teste2);
        return $carry = $item;
    },0);

    var_dump($teste);
    die;
    $Usr_doc->inserir([
        "id_usuario"=>$id_usuario,
        "id_documento"=>$id_documento,
        "editar"=>$editar,
        "excluir"=>$excluir
        
    ]);
}




$documento = $Documento->getById($id_documento);

$usuarios = $Usuario->getAll();




echo $twig->render('compartilha_documento.html',[
    "titulo"=>"Compartilhar Documento",
    "documento"=>$documento,
    "usuarios"=>$usuarios,
]);