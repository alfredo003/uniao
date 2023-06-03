<?php

session_start();
include_once '../config/conexaoBD.php';
include_once '../modal/ClassLogin.php';

$lg = new Login();

$user = filter_input(INPUT_POST, 'util');
$pass = filter_input(INPUT_POST, 'senha');

$lg->setUser_name($user);
$lg->setPass_word($pass);
$res = $lg->select_utilizador_login(Ligar::chamar_bd());
if ($res === 'sucesso') {
    $dados = $lg->select_utilizador_dados(Ligar::chamar_bd());
  
    $_SESSION['nome'] = $dados['nome'];
    $_SESSION['senha'] =$dados['senha'];
} else {
    session_abort();
}

echo $res;
