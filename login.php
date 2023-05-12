<?php

require('twig_carregar.php');
require("./models/Model.php");
require("./models/Usuario.php");


$erro = $_GET['erro'] ?? false;

if($_SERVER['REQUEST_METHOD']=="POST"){
    //var_dump($_POST);die;

    
    $nome = $_POST['nome'] ?? false ;
    $senha = $_POST['senha'] ?? false ;

    if($nome && $senha){

        $usuario = new Usuario();
        $usuario = $usuario->getAll([
            "nome"=>$nome,
            "senha"=>$senha
        ]);

        if($usuario){
            session_start();   
            $_SESSION['id'] = $usuario[0]['id'];
            $_SESSION['nome'] = $usuario[0]['nome'];
            $_SESSION['senha'] = $usuario[0]['senha'];
            $_SESSION['email'] = $usuario[0]['email'];
            
            header("location:main.php");
            die;
        }
        
    }
        
    $erro = 400;

}

$erro = $erro==403 ? 'Tu não tens autorização pra entrar aí, piá!' : $erro;
$erro = $erro==400 ? 'Bad request' : $erro;

echo $twig->render('login.html',[
    "erro"=>$erro
]);
