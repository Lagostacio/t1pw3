<?php

require("twig_carregar.php");
require("./models/Documento.php");
require('verifica_login.php');

if($_SERVER['REQUEST_METHOD']=='POST' && !$_FILES['documento']['error']){
    
    $nome = $_FILES['documento']['name'];

    
    $doc = new Documento();
    $doc->inserir([$nome]);
    
    $documento = $doc->getAll("WHERE nome = '{$nome}' ");
    
    $doc->liga_user_doc($id,$documento[0]['id']);
    move_uploaded_file($_FILES['documento']['tmp_name'],"./documentos/{$nome}");

    header("location:documentos.php");
    die;
}



echo $twig->render("novo_documento.html",[]);