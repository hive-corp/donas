<?php
class Seguidor {
    private $idSeguidor ;
    private $Vendedora ;
    private $Cliente ;
    
    public function __construct()
    {
        $this->Vendedora = new Vendedora();
        $this->Cliente = new Cliente();
    }

    public function getIdSeguidor() {
        return $this->idSeguidor;
    }
    public function getVendedora() {
        return $this->Vendedora;
    }
    public function getCliente() {
        return $this->Cliente;
    }
    public function setIdSeguidor($idSeguidor) {
        $this->idSeguidor=$idSeguidor;
    }
    public function setVendedora($Vendedora) {
        $this->Vendedora=$Vendedora;
    }
    public function setCliente($Cliente) {
        $this->Cliente=$Cliente;
    }
}

?>
