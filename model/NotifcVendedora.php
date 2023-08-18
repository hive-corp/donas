<?php
class NotifcVendedora {
    private $idNotifcVendedora ;
    private $dataPedido ;
    private $descPedido ;

    private $Vendedora ;
    public function __construct()
    {
        $Vendedora = new Vendedora();
    }

    private $Encomenda ;
    public function __construct()
    {
        $Encomenda = new Encomenda();
    }

    public function getIdNotifcVendedora() {
        return $this->idNotifcVendedora;
    }
    public function getDataPedido() {
        return $this->dataPedido;
    }
    public function getDescPedido() {
        return $this->descPedido;
    }
    public function getVendedora() {
        return $this->Vendedora;
    }
    public function getEncomenda() {
        return $this->Encomenda;
    }
    public function setIdNotifcVendedora($idNotifcVendedora) {
        $this->idNotifcVendedora=$idNotifcVendedora;
    }
    public function setDataPedido($dataPedido) {
        $this->dataPedido=$dataPedido;
    }
    public function setDescPedido($descPedido) {
        $this->descPedido=$descPedido;
    }
    public function setVendedora($Vendedora) {
        $this->Vendedora=$Vendedora;
    }
    public function setEncomenda($Encomenda) {
        $this->Encomenda=$Encomenda;
    }
}

?>