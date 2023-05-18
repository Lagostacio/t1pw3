<?php

require("twig_carregar.php");
require("./models/Model.php");
require("./models/Usuario.php");



if($_SERVER['REQUEST_METHOD']=='POST'){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $usuario = new Usuario();
    $usuario->inserir([
        "nome"=>$nome,
        "email"=>$email,
        "senha"=>$senha
    ]);

    header("location:login.php");
    die;

}



echo $twig->render('cadastro.html',["titulo"=>"Cadastro"]);
