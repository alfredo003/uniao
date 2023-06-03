<?php


class baptismo{
  private $inserir = "INSERT INTO baptismo(congregacao,livroN,pastor,data) VALUES (?,?,?,?)";
  private $congregacao;
  private $livroN;
  private $pastor;
  private $data;
  
  
  function getCongregacao() {
      return $this->congregacao;
  }

  function getLivroN() {
      return $this->livroN;
  }

  function getPastor() {
      return $this->pastor;
  }

  function getData() {
      return $this->data;
  }

  function setCongregacao($congregacao) {
      $this->congregacao = $congregacao;
  }

  function setLivroN($livroN) {
      $this->livroN = $livroN;
  }

  function setPastor($pastor) {
      $this->pastor = $pastor;
  }

  function setData($data) {
      $this->data = $data;
  }

public function inserir(PDO $con){
    $stmt = $con->prepare($this->inserir);
    $stmt->execute(
            array(
            $this->getCongregacao(),
            $this->getLivroN(),
            $this->getPastor(),
            $this->getData()
                
             
              
            )
            );
    
            return $con->lastInsertId();
}
  
}

