<?php

include_once'../config/conexaoBD.php';
include_once'../modal/inserirPessoa.php';
include_once'../modal/inserirMembros.php';
include_once'../modal/baptismo.php';
include_once'../modal/bi.php';

$pessoa = new pessoa();
$membro = new Membros();
$bi =new bi();
$batptismo = new baptismo();

$nome = filter_input(INPUT_POST, 'n');
$pai= filter_input(INPUT_POST, 'p');
$mae = filter_input(INPUT_POST, 'ma');
$genero = filter_input(INPUT_POST, 'g');
$idProv = filter_input(INPUT_POST, 'idP');
$dataNasc = filter_input(INPUT_POST, 'dataN');
$tipo = filter_input(INPUT_POST, 'ts');
$BI = filter_input(INPUT_POST, 'B');
$BI_data = filter_input(INPUT_POST, 'BI_d');
$passado_em = filter_input(INPUT_POST, 'pass');
$residente = filter_input(INPUT_POST, 'r');
$estadoC= filter_input(INPUT_POST, 'estc');
$baptiza = filter_input(INPUT_POST, 'bat');
$localB = filter_input(INPUT_POST, 'lb');
$dataEm = filter_input(INPUT_POST, 'dataE');
$igreja= filter_input(INPUT_POST, 'ig');
$foto = filter_input(INPUT_POST, 'fot');
$tipoS = filter_input(INPUT_POST, 'ts');
$livroN = filter_input(INPUT_POST, 'li');
$pastor = filter_input(INPUT_POST, 'pb');

$bi->setNumero($BI);
$bi->setData($BI_data);
$bi->setPassado_em($passado_em);
$retorno1=$bi->inserirB(Ligar::chamar_bd());

$batptismo->setCongregacao($localB);
$batptismo->setData($dataEm);
$batptismo->setLivroN($livroN);
$batptismo->setPastor($pastor);
$retorno2=$batptismo->inserir(Ligar::chamar_bd());

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
$retorno3=$pessoa->insertP(Ligar::chamar_bd());
$membro->setIdPessoa($retorno3);
$membro->setIdCargo(1);
$membro->setIdBatismo($retorno2);
$membro->setIdBI($retorno1);
$retorno4=$membro->insert(Ligar::chamar_bd());

 

if($retorno1>0 && $retorno2>0 && $retorno3>0 && $retorno4>0){
    echo 'sucesso';
}else{
    echo 'erro';
}
