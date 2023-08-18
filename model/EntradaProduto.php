<?php
class EntradaProduto {
    private $idEntradaProduto ;
    private $dataEntradaProduto ;
    private $qtdEntradaProduto ;

    private $Anuncio ;
    public function __construct()
    {
        $Anuncio = new Anuncio();
    }

    public function getIdEntradaProduto () {
        return $this->idEntradaProduto ;
    }
    public function getDataEntradaProduto() {
        return $this->dataEntradaProduto;
    }
    public function getQtdEntradaProduto() {
        return $this->qtdEntradaProduto;
    }
    public function getAnuncio() {
        return $this->Anuncio;
    }
    public function setIdEntradaProduto ($idEntradaProduto ) {
        $this->idEntradaProduto=$idEntradaProduto ;
    }
    public function setDataEntradaProduto($dataEntradaProduto) {
        $this->dataEntradaProduto=$dataEntradaProduto;
    }
    public function setQtdEntradaProduto($qtdEntradaProduto) {
        $this->qtdEntradaProduto=$qtdEntradaProduto;
    }
    public function setAnuncio($Anuncio) {
        $this->Anuncio=$Anuncio;
    }
}

?>