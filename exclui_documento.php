<?php

require("twig_carregar.php");
require("models/Documento.php");
$Documento = new Documento();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id_doc =  $_POST['id_doc'];
    $Documento->excluir($id_doc);
    
    header("location:documentos.php");
    die;
}

$id_doc = $_GET['id'];
$doc = $Documento->getById($id_doc);


echo $twig->render('exclui_documento.html',[

    "titulo"=>"Excluir documento",
    "documento"=>$doc,

]);