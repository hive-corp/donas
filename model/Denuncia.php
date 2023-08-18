<?php

class Denuncia {
    private $idDenuncia;
    private $motivoDenuncia;
    private $descricaoDenuncia;

    private $Cliente ;
    public function __construct()
    {
        $Cliente = new Cliente();
    }

    private $Vendedora ;
    public function __construct()
    {
        $Vendedora = new Vendedora();
    }

    private $Negocio ;
    public function __construct()
    {
        $Negocio = new Negocio();
    }

    public function getIdDenuncia() {
        return $this->idDenuncia;
    }
    public function getMotivoDenuncia() {
        return $this->motivoDenuncia;
    }
    public function getDescricaoDenuncia() {
        return $this->descricaoDenuncia;
    }
    public function getCliente() {
        return $this->Cliente;
    }
    public function getVendedora() {
        return $this->Vendedora;
    }
    public function getNegocio() {
        return $this->Negocio;
    }
    public function setIdDenuncia($idDenuncia) {
        $this->idDenuncia=$idDenuncia;
    }
    public function setMotivoDenuncia($motivoDenuncia) {
        $this->motivoDenuncia=$motivoDenuncia;
    }
    public function setDescricaoDenuncia($descricaoDenuncia) {
        $this->descricaoDenuncia=$descricaoDenuncia;
    }
    public function setCliente($Cliente) {
        $this->Cliente=$Cliente;
    }
    public function setVendedora($Vendedora) {
        $this->Vendedora=$Vendedora;
    }
    public function setNegocio($Negocio) {
        $this->Negocio=$Negocio;
    }
}

?>
