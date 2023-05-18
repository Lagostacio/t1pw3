<?php

require("twig_carregar.php");
require("./models/Documento.php");
require("./models/Usuarios_documentos.php");
require('verifica_login.php');

if($_SERVER['REQUEST_METHOD']=='POST' && !$_FILES['documento']['error']){
    
    $nome = $_FILES['documento']['name'];

    $nomeSeparado = explode('.',$nome);
    $formato = array_pop($nomeSeparado);
    
    if($formato != 'pdf' && $formato != 'doc' && $formato != 'docx'){
        
        echo $twig->render("novo_documento.html",["erro"=>"Apenas arquivos nos formatos pdf, doc, ou docx","titulo"=>"Novo Documento"]);
        die;
    }
    
    $data = date('Y-m-d');
    $doc = new Documento();
    $doc->inserir([
        "nome"=>$nome,
        "data_upload"=>$data
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

    // faz o upload
    move_uploaded_file($_FILES['documento']['tmp_name'],"./documentos/{$nome}");

    header("location:documentos.php");
    die;
}



echo $twig->render("novo_documento.html",["titulo"=>"Novo Documento"]);