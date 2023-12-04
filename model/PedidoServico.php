<?php
class PedidoServico {
    private $idPedidoServico;
    private $valorTotal;
    private $dataServicoContratado;
    private $dataServicoMarcado;
    private $statusPedidoServico;
    
    private $Anuncio ;
    private $Cliente ;
    
    public function __construct()
    {
        $this->Anuncio = new Anuncio();
        $this->Cliente = new Cliente();
    }

    public function getIdPedidoServico() {
        return $this->idPedidoServico;
    }
    public function getValorTotal() {
        return $this->valorTotal;
    }
    public function getDataServicoContratado() {
        return $this->dataServicoContratado;
    }
    public function getDataServicoMarcado() {
        return $this->dataServicoMarcado;
    }
    public function getStatusPedidoServico() {
        return $this->statusPedidoServico;
    }
    public function getAnuncio() {
        return $this->Anuncio;
    }
    public function getCliente() {
        return $this->Cliente;
    }
    public function setIdPedidoServico($idPedidoServico) {
        $this->idPedidoServico = $idPedidoServico;
    }
    public function setValorTotal($valorTotal) {
        $this->valorTotal = $valorTotal;
    }
    public function setDataServicoContratado($dataServicoContratado) {
        $this->dataServicoContratado = $dataServicoContratado;
    }
    public function setDataServicoMarcado($dataServicoMarcado) {
        $this->dataServicoMarcado = $dataServicoMarcado;
    }
    public function setStatusPedidoServico($statusPedidoServico) {
        $this->statusPedidoServico= $statusPedidoServico;
    }
    public function setAnuncio($Anuncio) {
        $this->Anuncio = $Anuncio;
    }
    public function setCliente($Cliente) {
        $this->Cliente = $Cliente;
    }
}

?>
