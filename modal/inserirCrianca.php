<?php


class inserirCrianca {
    private $inserirCrianca ="INSERT INTO crianca(idPessoa, idBI, idCargo,estado) VALUES (?,?,?,?)";
    private $idPessoa;
    private $idBI;
    private $idCargo;
    private $estado;
    
    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

        
            function getIdPessoa() {
        return $this->idPessoa;
    }

    function getIdBI() {
        return $this->idBI;
    }

    function getIdCargo() {
        return $this->idCargo;
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
    
    public function inserir(PDO $con){
        $stmt = $con->prepare($this->inserirCrianca);
        $stmt->execute(
                array(
                $this->getIdBI(),
                $this->getIdCargo(),
                $this->getIdPessoa(),
              
               
                )
                );
    }


}
