<?php
class SubCategoria {
    private $idSubCategoria;
    private $nomeSubCategoria;
    private $fotoSubCategoria;
  
  
    private $Categoria ;
    
    public function __construct()
    {
        $this->Categoria = new Categoria();
    }

    public function getIdSubCategoria() {
        return $this->idSubCategoria;
    }
    public function getNomeSubCategoria() {
        return $this->nomeSubCategoria;
    }
    public function getFotoSubCategoria() {
        return $this->fotoSubCategoria;
    }
    public function getCategoria() {
        return $this->Categoria;
    }
    public function setIdSubCategoria($idSubCategoria) {
        $this->idSubCategoria = $idSubCategoria;
    }
    public function setNomeSubCategoria($nomeSubCategoria) {
        $this->nomeSubCategoria = $nomeSubCategoria;
    }
    public function setFotoSubCategoria($fotoSubCategoria) {
        $this->fotoSubCategoria = $fotoSubCategoria;
    }
    public function setCategoria($Categoria) {
        $this->Categoria = $Categoria;
    }
}

?>
