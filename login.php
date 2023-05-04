<?php

require('twig_carregar.php');

if($_SERVER['REQUEST_METHOD']=="POST"){
    //var_dump($_POST);die;

    // pega os dados no sistema
    // valida o login
    
    $nome = $_POST['nome'] ?? false;
    $senha = $_POST['senha'] ?? false;

    //renderiza a main
    echo $twig->render('main.html',[
        "nome"=>$nome,
        "senha"=>$senha,
    ]);
    die;

}

echo $twig->render('login.html',[]);
