<?php

class pessoa {
  private $inserirPessoa= "INSERT INTO pessoa(nome_completo,pai,mae,genero,telefone,dataNasc,estado_civil,residente,tipoSaguinio,foto,idfuncao,id_utili) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

  private $nome;
  private $pai;
  private $mae;
  private $genero;
  private $telefone;
  private $dataNasc;
  private $estdoCivil;
  private $Naturalidade;
  private $residente;
  private $tipoSaguinio;
  private $foto;
  private $idFuncao;
  private $idUtil;
  
  function getInserirPessoa() {
      return $this->inserirPessoa;
  }

  function getNome() {
      return $this->nome;
  }

  function getPai() {
      return $this->pai;
  }

  function getMae() {
      return $this->mae;
  }

  function getGenero() {
      return $this->genero;
  }

  function getTelefone() {
      return $this->telefone;
  }

  function getDataNasc() {
      return $this->dataNasc;
  }

  function getEstdoCivil() {
      return $this->estdoCivil;
  }

  function getNaturalidade() {
      return $this->Naturalidade;
  }

  function getResidente() {
      return $this->residente;
  }

  function getTipoSaguinio() {
      return $this->tipoSaguinio;
  }

  function getFoto() {
      return $this->foto;
  }

  function getIdFuncao() {
      return $this->idFuncao;
  }

  function getIdUtil() {
      return $this->idUtil;
  }

  function setInserirPessoa($inserirPessoa) {
      $this->inserirPessoa = $inserirPessoa;
  }

  function setNome($nome) {
      $this->nome = $nome;
  }

  function setPai($pai) {
      $this->pai = $pai;
  }

  function setMae($mae) {
      $this->mae = $mae;
  }

  function setGenero($genero) {
      $this->genero = $genero;
  }

  function setTelefone($telefone) {
      $this->telefone = $telefone;
  }

  function setDataNasc($dataNasc) {
      $this->dataNasc = $dataNasc;
  }

  function setEstdoCivil($estdoCivil) {
      $this->estdoCivil = $estdoCivil;
  }

  function setNaturalidade($Naturalidade) {
      $this->Naturalidade = $Naturalidade;
  }

  function setResidente($residente) {
      $this->residente = $residente;
  }

  function setTipoSaguinio($tipoSaguinio) {
      $this->tipoSaguinio = $tipoSaguinio;
  }

  function setFoto($foto) {
      $this->foto = $foto;
  }

  function setIdFuncao($idFuncao) {
      $this->idFuncao = $idFuncao;
  }

  function setIdUtil($idUtil) {
      $this->idUtil = $idUtil;
  }

    
 
public function insertP(PDO $con) {
    $stmt = $con->prepare($this->inserirPessoa);
    $stmt->execute(   
        array(
        $this->getNome(), 
        $this->getPai(),
        $this->getMae(),
        $this->getGenero(),
        $this->getTelefone(),
        $this->getDataNasc(),
        $this->getEstdoCivil(),
        $this->getNaturalidade(),
        $this->getResidente(),
        $this->getTipoSaguinio(),
        $this->getFoto(),
        $this->getIdFuncao(),
        $this->getIdUtil()
        
       
         )
);
return $con->lastInsertId();

 }



}
