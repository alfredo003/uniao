<?php

class Login {

  
    private $user_name;
    private $pass_word;
    private $estado;


    function getUser_name() {
        return $this->user_name;
    }

    function getPass_word() {
        return $this->pass_word;
    }

    function getEstado() {
        return $this->estado;
    }

 
    function setUser_name($user_name) {
        $this->user_name = $user_name;
    }

    function setPass_word($pass_word) {
        $this->pass_word = $pass_word;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    public function select_utilizador_login(PDO $connexao) {
        $nasa = $connexao->prepare('SELECT * FROM utilizador WHERE nomeUtil = :user AND senha= :senha');
        $nasa->bindParam(':user', $this->user_name, PDO::PARAM_STR);
        $nasa->bindParam(':senha', $this->pass_word, PDO::PARAM_STR);
        $nasa->execute();
        $result = $nasa->fetch(PDO::FETCH_ASSOC);
      
        return ($result['user'] === $this->getUser_name() and $result['senha'] === $this->getPass_word()) ? 'sucesso' : 'erro';
    }

    public function select_utilizador_dados(PDO $connexao) {
        $nasa = $connexao->prepare('SELECT * FROM utilizador WHERE nomeUtil = :user AND senha= :senha');
        $nasa->bindParam(':user', $this->user_name, PDO::PARAM_STR);
        $nasa->bindParam(':senha', $this->pass_word, PDO::PARAM_STR);
        $nasa->execute();
        $result = $nasa->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

}
