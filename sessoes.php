<?php

session_start();
if (isset($_SESSION['nome'])) {

    if (isset($_SESSION['senha']) and $_SESSION['senha'] < 0) {
        session_destroy();
        header('location:./');
    }
    if (filter_input(INPUT_GET, sha1('sair')) === sha1(true)) {
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:./');
    }
}else{
    header('location:./');
}