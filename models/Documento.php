<?php

require('Model.php');


class Documento extends Model {

    public $campos = '(nome)';
    public $prepare = "(?)";


}