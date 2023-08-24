<?php
class NotifcCliente {
    private $idNotifcCliente ;
    private $statusPedido ;

    private $Vendedora ;
    public function __construct()
    {
        $Vendedora = new Vendedora();
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
    public function getVendedora() {
        return $this->Vendedora;
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
    public function setVendedora($Vendedora) {
        $this->Vendedora=$Vendedora;
    }
    public function setCliente($Cliente) {
        $this->Cliente=$Cliente;
    }
}

?>
