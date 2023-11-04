<?php
class PedidoProduto {
    private $idPedidoProduto;
    private $valorTotal;
    private $qtdProdutoPedido;
    private $dataPedidoFeito;
    private $dataPedidoEntregue;
    private $statusPedidoProduto;
    

    private $Anuncio ;
    private $Cliente ;
    
    public function __construct()
    {
        $this->Anuncio = new Anuncio();
        $this->Cliente = new Cliente();
    }

    public function getIdPedidoProduto() {
        return $this->idPedidoProduto;
    }
    public function getValorTotal() {
        return $this->valorTotal;
    }
    public function getQtdProdutoPedido() {
        return $this->qtdProdutoPedido;
    }
    public function getDataPedidoFeito() {
        return $this->dataPedidoFeito;
    }
    public function getDataPedidoEntregue() {
        return $this->dataPedidoEntregue;
    }
    public function getStatusPedidoProduto() {
        return $this->statusPedidoProduto;
    }
    public function getAnuncio() {
        return $this->Anuncio;
    }
    public function getCliente() {
        return $this->Cliente;
    }
    public function setIdPedidoProduto($idPedidoProduto) {
        $this->idPedidoProduto = $idPedidoProduto;
    }
    public function setValorTotal($valorTotal) {
        $this->valorTotal = $valorTotal;
    }
    public function setQtdProdutoPedido($qtdProdutoPedido) {
        $this->qtdProdutoPedido = $qtdProdutoPedido;
    }
    public function setDataPedidoFeito($dataPedidoFeito) {
        $this->dataPedidoFeito = $dataPedidoFeito;
    }
    public function setDataPedidoEntregue($dataPedidoEntregue) {
        $this->dataPedidoEntregue = $dataPedidoEntregue;
    }
    public function setStatusPedidoProduto($statusPedidoProduto) {
        $this->statusPedidoProduto = $statusPedidoProduto;
    }
    public function setAnuncio($Anuncio) {
        $this->Anuncio = $Anuncio;
    }
    public function setCliente($Cliente) {
        $this->Cliente = $Cliente;
    }
}

?>
