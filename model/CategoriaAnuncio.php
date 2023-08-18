<?php
class CategoriaAnuncio {
    private $idCategoriaAnuncio ;

    private $Categoria ;
    public function __construct()
    {
        $Categoria = new Categoria();
    }

    private $Anuncio ;
    public function __construct()
    {
        $Anuncio = new Anuncio();
    }

    public function getIdCategoriaAnuncio() {
        return $this->idCategoriaAnuncio;
    }
    public function getCategoria() {
        return $this->Categoria;
    }
    public function getAnuncio() {
        return $this->Anuncio;
    }
    public function setIdCategoriaAnuncio($idCategoriaAnuncio) {
        $this->idCategoriaAnuncio=$idCategoriaAnuncio;
    }
    public function setCategoria($Categoria) {
        $this->Categoria=$Categoria;
    }
    public function setAnuncio($Anuncio) {
        $this->Anuncio=$Anuncio;
    }
}

?>