<?php
class ImagemAnuncio {
    private $idImagemAnuncio ;
    private $enderecoImagem ;
   
    private $Anuncio ;
    
    public function __construct()
    {
        $this->Anuncio = new Anuncio();
    }

    public function getIdImagemAnuncio () {
        return $this->idImagemAnuncio ;
    }
    public function getEnderecoImagem() {
        return $this->enderecoImagem;
    }
    public function getAnuncio() {
        return $this->Anuncio;
    }
    public function setIdImagemAnuncio ($idImagemAnuncio ) {
        $this->idImagemAnuncio=$idImagemAnuncio ;
    }
    public function setEnderecoImagem($enderecoImagem) {
        $this->enderecoImagem=$enderecoImagem;
    }
    public function setAnuncio($Anuncio) {
        $this->Anuncio=$Anuncio;
    }
}

?>
