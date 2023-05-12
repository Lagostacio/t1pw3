<?php

require("verifica_login.php");
require("twig_carregar.php");
require("models/Documento.php");

$id_documento = $_GET['id'];

$Documento = new Documento();

$documento = $Documento->getById($id_documento);

echo $twig->render('compartilha_documento.html',[
    "titulo"=>"Compartilhar Documento",
    "documento"=>$documento,
]);