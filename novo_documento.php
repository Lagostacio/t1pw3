<?php

require("twig_carregar.php");
require("./models/Documento.php");
require("./models/Usuarios_documentos.php");
require('verifica_login.php');

if($_SERVER['REQUEST_METHOD']=='POST' && !$_FILES['documento']['error']){
    
    $nome = $_FILES['documento']['name'];

    
    $doc = new Documento();
    $doc->inserir([
        "nome"=>$nome
    ]);
    
    $documento = $doc->getAll(['nome'=>$nome]);
    $id_documento = $doc->getId();


    $usr_doc = new Usuarios_documento();
    
    $usr_doc->inserir([
        "id_usuario"=>$id_usuario,
        "id_documento"=>$id_documento,
        "editar"=>1,
        "excluir"=>1
    ]);

    move_uploaded_file($_FILES['documento']['tmp_name'],"./documentos/{$nome}");

    header("location:documentos.php");
    die;
}



echo $twig->render("novo_documento.html",[]);