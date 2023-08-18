<?php
class NotifcCliente {
    private $idNotifcCliente ;
    private $statusPedido ;

    private $Negocio ;
    public function __construct()
    {
        $Negocio = new Negocio();
    }

    private $Cliente ;
    public function __construct()
    {
        $Cliente = new Cliente();
    }

    public function getIdNotifcCliente() {
        return $this->idNotifcCliente;
    }
    public function getStatusPedido() {
        return $this->statusPedido;
    }
    public function getNegocio() {
        return $this->Negocio;
    }
    public function getCliente() {
        return $this->Cliente;
    }
    public function setIdNotifcCliente($idNotifcCliente) {
        $this->idNotifcCliente=$idNotifcCliente;
    }
    public function setStatusPedido($statusPedido) {
        $this->statusPedido=$statusPedido;
    }
    public function setNegocio($Negocio) {
        $this->Negocio=$Negocio;
    }
    public function setCliente($Cliente) {
        $this->Cliente=$Cliente;
    }
}

?>