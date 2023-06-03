<?php

include_once'../config/conexaoBD.php';
include_once'../modal/inserirPessoa.php';

$pessoa = new pessoa();


$nome = filter_input(INPUT_POST, 'n');
$pai= filter_input(INPUT_POST, 'p');
$mae = filter_input(INPUT_POST, 'ma');
$genero = filter_input(INPUT_POST, 'g');



$pessoa->setNome($nome);
$pessoa->setPai($pai);
$pessoa->setMae($mae);
$pessoa->setGenero($genero);
$pessoa->setNaturalidade($idProv);
$pessoa->setDataNasc($dataNasc);
$pessoa->setFoto($foto);
$pessoa->setTipoSaguinio($tipoS);
$pessoa->setEstdoCivil($estadoC);
$pessoa->setResidente($residente);
$pessoa->setEstado_BT("Baptizado");
$retorno=$pessoa->insertP(Ligar::chamar_bd());

 

if($retorno1>0){
    echo 'sucesso';
}else{
    echo 'erro';
}
