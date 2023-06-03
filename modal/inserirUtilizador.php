<?php

class utilizadores {
  
    private $inserirUtil = "INSERT INTO utilizador(nome,DataNasc,genero,telefone,nomeUtil,senha,idfuncao,foto) VALUES (?,?,?,?,?,?,?,?)";
    private $nome;
    private $dataNasc;
    private $genero;
    private $telefone;
    private $nomeUtilizador;
    private $senha;
    private $cargo;
    private $foto;
    
    function getNome() {
        return $this->nome;
    }

    function getDataNasc() {
        return $this->dataNasc;
    }

    function getGenero() {
        return $this->genero;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getNomeUtilizador() {
        return $this->nomeUtilizador;
    }

    function getSenha() {
        return $this->senha;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getFoto() {
        return $this->foto;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDataNasc($dataNasc) {
        $this->dataNasc = $dataNasc;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setNomeUtilizador($nomeUtilizador) {
        $this->nomeUtilizador = $nomeUtilizador;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }


    public function insert(PDO $con) {
    $stmt = $con->prepare($this->inserirUtil);
    $stmt->execute(   
        array(
            $this->getNome(),
            $this->getDataNasc(),
            $this->getGenero(),
            $this->getTelefone(),
            $this->getNomeUtilizador(),
            $this->getSenha(),
            $this->getCargo(),
            $this->getFoto()
        ));
    
return $con->lastInsertId();
}
}