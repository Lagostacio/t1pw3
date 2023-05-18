<?php

require("twig_carregar.php");
require('verifica_login.php');

require("./models/Documento.php");


// $busca['nome'] = $_GET['nome'] ?? null;

$nome = $_GET['nome'] ?? null;
$data = $_GET['data'] ?? null;
$busca = [ 
    "documentos.nome"=>$nome,
    "documentos.data_upload"=>$data
];
$doc = new Documento();

$documentos = $doc->getDocs($id_usuario,$busca);




echo $twig->render("documentos.html",[
    "titulo"=>"Documentos",
    "documentos"=>$documentos,
    "nome"=> $nome,
    "data"=> $data,
    //"documentos"=>null
]);