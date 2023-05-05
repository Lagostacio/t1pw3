<?php


session_start();


if(empty($_SESSION['nome']) && empty($_SESSION['senha'])){
    
    header("location:login.php?erro=403");
    die;
}


$nome = $_SESSION['nome'];
$senha = $_SESSION['senha'];
$email = $_SESSION['email'];
$id = $_SESSION['id'];