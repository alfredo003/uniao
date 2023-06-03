<?php

include_once'../config/conexaoBD.php';
include_once'../modal/inserirUtilizador.php';

$utilizador = new utilizadores();
$nome = filter_input(INPUT_POST, 'n');
$dataNasc= filter_input(INPUT_POST, 'd');
$genero = filter_input(INPUT_POST, 'g');
$telefone = filter_input(INPUT_POST, 't');
$nomeUtil = filter_input(INPUT_POST, 'nu');
$cargo = filter_input(INPUT_POST, 'c');
$senha = filter_input(INPUT_POST, 's');
$foto = filter_input(INPUT_POST, 'f');



$utilizador ->setNome($nome);
$utilizador->setDataNasc($dataNasc);
$utilizador->setGenero($genero);
$utilizador->setTelefone($telefone);
$utilizador->setNomeUtilizador($nomeUtil);
$utilizador->setCargo($cargo);
$utilizador->setSenha($senha);
$utilizador->setFoto($foto);


$retorno=$utilizador->insert(Ligar::chamar_bd());

//DADOS ENTIDADES
 

if($retorno>0){
    echo 'sucesso';
}else{
    echo 'erro';
}
