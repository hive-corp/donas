<?php
class NotifcVendedora {
    private $idNotifcVendedora ;
    private $statusNotificacao ;
    private $tipoNotificacao ;
    private $Vendedora  ;
    private $Anuncio ;
    private $Cliente ;
    
    public function __construct()
    {
        $this->Vendedora = new Vendedora();
        $this->Anuncio = new Anuncio();
        $this->Cliente = new Cliente();
    }

    public function getIdNotifcVendedora() {
        return $this->idNotifcVendedora;
    }
    public function getStatusNotificacao() {
        return $this->statusNotificacao;
    }
    public function getTipoNotificacao() {
        return $this->tipoNotificacao;
    }
    public function getAnuncio() {
        return $this->Anuncio;
    }
    public function getCliente() {
        return $this->Cliente;
    }
    public function getVendedora() {
        return $this->Vendedora;
    }
    public function setIdNotifcVendedora($idNotifcVendedora) {
        $this->idNotifcVendedora=$idNotifcVendedora;
    }
    public function setStatusNotificacao($statusNotificacao) {
        $this->statusNotificacao=$statusNotificacao;
    }
    public function setTipoNotificacao($tipoNotificacao) {
        $this->tipoNotificacao=$tipoNotificacao;
    }
    public function setAnuncio($Anuncio) {
        $this->Anuncio=$Anuncio;
    }
    public function setCliente($Cliente) {
        $this->Cliente=$Cliente;
    }
    public function setVendedora($Vendedora) {
        $this->Vendedora=$Vendedora;
    }
}

?>
