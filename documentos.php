<?php

require("twig_carregar.php");
require('verifica_login.php');

require("./models/Documento.php");

$id_usuario = $id;

$doc = new Documento();
$documentos = $doc->getDocs($id_usuario);


echo $twig->render("documentos.html",[
    "titulo"=>"Documentos",
    "documentos"=>$documentos,
    //"documentos"=>null
]);