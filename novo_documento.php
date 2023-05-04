<?php

require("twig_carregar.php");


if($_SERVER['REQUEST_METHOD']=='POST' && !$_FILES['documento']['error']){

    
    $nome = $_FILES['documento']['name'];
    move_uploaded_file($_FILES['documento']['tmp_name'],"./documentos/{$nome}");
    
    var_dump($_POST);var_dump($_FILES);
    die;
}



echo $twig->render("novo_documento.html",[]);