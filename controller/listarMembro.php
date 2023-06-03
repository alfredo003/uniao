<?php

require_once '../modal/inserirMembros.php';
require_once '../config/conexaoBD.php';

$ouvintes = new Membros();
echo $ouvintes->listagemOuvintes(ligar::chamar_bd());


