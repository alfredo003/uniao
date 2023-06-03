<?php

require_once '../modal/inserirPessoa.php';
require_once '../config/conexaoBD.php';

$pronvicia = new pessoa();
echo $pronvicia->listagemPronvicia(ligar::chamar_bd());
