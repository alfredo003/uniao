
        <?php
    class bi{
        private $inserir ="INSERT INTO bi(Numero,passado_em,data) VALUES (?,?,?)";
        private $numero;
        private $passado_em;
        private $data;
        
        function getNumero() {
            return $this->numero;
        }

        function getPassado_em() {
            return $this->passado_em;
        }

        function getData() {
            return $this->data;
        }

        function setNumero($numero) {
            $this->numero = $numero;
        }

        function setPassado_em($passado_em) {
            $this->passado_em = $passado_em;
        }

        function setData($data) {
            $this->data = $data;
        }
        
        public function inserirB(PDO $con){
    $stmt = $con->prepare($this->inserir);
    $stmt->execute(
            array(
                 $this->getNumero(),
                 $this->getPassado_em(),
                 $this->getData()
        
         
            )
            );
    
            return $con->lastInsertId();
}
        


        
    }