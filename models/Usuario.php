<?php

require("Model.php");

class Usuario extends Model {

    public $campos = '(nome,email,senha)';
    public $prepare = "(?,?,?)";

};