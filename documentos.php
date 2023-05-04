<?php

require("twig_carregar.php");

// $doc = new Documento();
// $documentos = $doc->getAll();


echo $twig->render("documentos.html",[
    "titulo"=>"Documentos",
    "documentos"=>null
]);