<?php
class SubCategoria {
    private $idSubCategoria;
    private $nomeSubCategoria;

  
  
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
    public function getCategoria() {
        return $this->Categoria;
    }
    public function setIdSubCategoria($idSubCategoria) {
        $this->idSubCategoria = $idSubCategoria;
    }
    public function setNomeSubCategoria($nomeSubCategoria) {
        $this->nomeSubCategoria = $nomeSubCategoria;
    }
    public function setCategoria($Categoria) {
        $this->Categoria = $Categoria;
    }
}

?>
