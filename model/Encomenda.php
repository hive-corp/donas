<?php
class Encomenda {
    private $idEncomenda;
    private $statusEncomenda;
    private $codigoRastreio;
    private $valorEncomenda;
    private $dataEncomenda;

    private $Anuncio ;
    public function __construct()
    {
        $Anuncio = new Anuncio();
    }

    private $Cliente ;
    public function __construct()
    {
        $Cliente = new Cliente();
    }

    public function getIdEncomenda() {
        return $this->idEncomenda;
    }
    public function getStatusEncomenda() {
        return $this->statusEncomenda;
    }
    public function getCodigoRastreio() {
        return $this->codigoRastreio;
    }
    public function getValorEncomenda() {
        return $this->valorEncomenda;
    }
    public function getDataEncomenda() {
        return $this->dataEncomenda;
    }
    public function getAnuncio() {
        return $this->Anuncio;
    }
    public function getCliente() {
        return $this->Cliente;
    }
    public function setIdEncomenda($idEncomenda) {
        $this->idEncomenda = $idEncomenda;
    }
    public function setStatusEncomenda($statusEncomenda) {
        $this->statusEncomenda=$statusEncomenda;
    }
    public function setCodigoRastreio($codigoRastreio) {
        $this->codigoRastreio=$codigoRastreio;
    }
    public function setValorEncomenda($valorEncomenda) {
        $this->valorEncomenda=$valorEncomenda;
    }
    public function setDataEncomenda($dataEncomenda) {
        $this->dataEncomenda=$dataEncomenda;
    }
    public function setAnuncio($Anuncio) {
        $this->Anuncio=$Anuncio;
    }
    public function setCliente($Cliente) {
        $this->Cliente=$Cliente;
    }
}

?>