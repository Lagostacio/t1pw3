<?php

require('twig_carregar.php');
require("verifica_login.php");




//renderiza a main
echo $twig->render('main.html',[
    "titulo"=>"Main",
    "nome"=>$nome,
    "senha"=>$senha,
    "email"=>$email,
]);

    