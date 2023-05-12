<?php

require("twig_carregar.php");
require('verifica_login.php');

require("./models/Documento.php");


$doc = new Documento();
$documentos = $doc->getDocs($id_usuario);




echo $twig->render("documentos.html",[
    "titulo"=>"Documentos",
    "documentos"=>$documentos,
    //"documentos"=>null
]);