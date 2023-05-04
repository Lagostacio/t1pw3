<?php

require("twig_carregar.php");
require("./models/Usuario.php");



if($_SERVER['REQUEST_METHOD']=='POST'){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $dados = [$nome,$email,$senha];
    
    $usuario = new Usuario();
    $usuario->inserir($dados);

    header("location:login.php");
    die;

}



echo $twig->render('cadastro.html',[]);
