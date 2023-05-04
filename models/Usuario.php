<?php

require("Model.php");

class Usuario extends Model {

    public $tabela = "usuarios";
    public $campos = '(nome,email,senha)';
    public $prepare = "(?,?,?)";

};