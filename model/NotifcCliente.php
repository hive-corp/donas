<?php
class NotifcCliente {
    private $idNotifcCliente  ;
    private $statusNotificacao ;
    private $tipoNotificacao ;
    private $dataNotificacao ;
    private $Denuncia  ;
    private $Anuncio ;
    private $Cliente ;
    
    public function __construct()
    {
        $this->Denuncia = new Denuncia();
        $this->Anuncio = new Anuncio();
        $this->Cliente = new Cliente();
    }

    public function getIdNotifcCliente() {
        return $this->idNotifcCliente;
    }
    public function getStatusNotificacao() {
        return $this->statusNotificacao;
    }
    public function getTipoNotificacao() {
        return $this->tipoNotificacao;
    }
    public function getDataNotificacao() {
        return $this->dataNotificacao;
    }
    public function getAnuncio() {
        return $this->Anuncio;
    }
    public function getCliente() {
        return $this->Cliente;
    }
    public function getDenuncia() {
        return $this->Denuncia;
    }
    public function setIdNotifcCliente($idNotifcCliente) {
        $this->idNotifcCliente=$idNotifcCliente;
    }
    public function setStatusNotificacao($statusNotificacao) {
        $this->statusNotificacao=$statusNotificacao;
    }
    public function setTipoNotificacao($tipoNotificacao) {
        $this->tipoNotificacao=$tipoNotificacao;
    }
    public function setDataNotificacao($dataNotificacao) {
        $this->dataNotificacao=$dataNotificacao;
    }
    public function setAnuncio($Anuncio) {
        $this->Anuncio=$Anuncio;
    }
    public function setCliente($Cliente) {
        $this->Cliente=$Cliente;
    }
    public function setDenuncia($Denuncia) {
        $this->Denuncia=$Denuncia;
    }
}

?>
