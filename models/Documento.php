<?php

require('Model.php');


class Documento extends Model {

    public $tabela = "documentos";
    public $campos = '(nome)';
    public $prepare = "(?)";


}