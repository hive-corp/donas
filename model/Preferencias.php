<?php
class Preferencias {
    private $idPreferencias ;
    private $Categoria ;
    private $Cliente ;
    
    public function __construct()
    {
        $this->Categoria = new Categoria();
        $this->Cliente = new Cliente();
    }

    public function getIdPreferencias() {
        return $this->idPreferencias;
    }
    public function getCategoria() {
        return $this->Categoria;
    }
    public function getCliente() {
        return $this->Cliente;
    }
    public function setIdPreferencias($idPreferencias) {
        $this->idPreferencias=$idPreferencias;
    }
    public function setCategoria($Categoria) {
        $this->Categoria=$Categoria;
    }
    public function setCliente($Cliente) {
        $this->Cliente=$Cliente;
    }
}

?>
