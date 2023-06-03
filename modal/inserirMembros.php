<?php


class Membros{
    private $inserirMembro = "INSERT INTO membros(id_BI,id_Baptismo,id_pessoa,idCargo) VALUES (?,?,?,?)";
    private $selectOuvintes = "SELECT * FROM ouvinte";
    private $selectFuncoes = "SELECT * FROM funcoes";
    private $idPessoa;
    private $idBI;
    private $idCargo;
    private $idBatismo;
    
    function getIdPessoa() {
        return $this->idPessoa;
    }

    function getIdBI() {
        return $this->idBI;
    }

    function getIdCargo() {
        return $this->idCargo;
    }

    function getIdBatismo() {
        return $this->idBatismo;
    }

    function setIdPessoa($idPessoa) {
        $this->idPessoa = $idPessoa;
    }

    function setIdBI($idBI) {
        $this->idBI = $idBI;
    }

    function setIdCargo($idCargo) {
        $this->idCargo = $idCargo;
    }

    function setIdBatismo($idBatismo) {
        $this->idBatismo = $idBatismo;
    }

public function insert(PDO $con) {
    $stmt = $con->prepare($this->inserirMembro);
    $stmt->execute(   
        array(
           
            $this->getIdBI(),
            $this->getIdBatismo(),
            $this->getIdPessoa(),
            $this->getIdCargo()
        
            
        
        )
);
return $con->lastInsertId();

 }
 
 public function listagemOuvintes(PDO $conexao){
    	$executeQuery = $conexao->prepare($this->selectOuvintes);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }        return json_encode($resultados) ;

}

 public function listagemFuncoes(PDO $conexao){
    	$executeQuery = $conexao->prepare($this->selectFuncoes);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }        return json_encode($resultados) ;

}


    
}
