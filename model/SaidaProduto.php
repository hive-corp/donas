<?php
class SaidaProduto {
    private $idSaidaProduto ;
    private $dataSaidaProduto ;
    private $qtdSaidaProduto ;

    private $Anuncio ;
    
    public function __construct()
    {
        $this->Anuncio = new Anuncio();
    }

    public function getIdSaidaProduto () {
        return $this->idSaidaProduto ;
    }
    public function getDataSaidaProduto() {
        return $this->dataSaidaProduto;
    }
    public function getQtdSaidaProduto() {
        return $this->qtdSaidaProduto;
    }
    public function getAnuncio() {
        return $this->Anuncio;
    }
    public function setIdSaidaProduto ($idSaidaProduto ) {
        $this->idSaidaProduto=$idSaidaProduto ;
    }
    public function setDataSaidaProduto($dataSaidaProduto) {
        $this->dataSaidaProduto=$dataSaidaProduto;
    }
    public function setQtdSaidaProduto($qtdSaidaProduto) {
        $this->qtdSaidaProduto=$qtdSaidaProduto;
    }
    public function setAnuncio($Anuncio) {
        $this->Anuncio=$Anuncio;
    }
}

?>
