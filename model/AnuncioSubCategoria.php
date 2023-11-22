<?php
class AnuncioSubCategoria {
  private $idAnuncioSubCategoria;

  private $Anuncio;
  private $SubCategoria;
  
  public function __construct()
  {
      $this->Anuncio = new Anuncio();
      $this->SubCategoria = new SubCategoria();
  }

   public function getIdAnuncioSubCategoria() {
        return $this->idAnuncioSubCategoria;
    }
   public function getAnuncio() {
        return $this->Anuncio;
    }
   public function getSubCategoria() {
        return $this->SubCategoria;
    }

  public function setIdAnuncioSubCategoria($idAnuncioSubCategoria) {
        $this->idAnuncioSubCategoria=$idAnuncioSubCategoria;
    }
  public function setAnuncio($Anuncio) {
        $this->Anuncio=$Anuncio;
    }
  public function setSubCategoria($SubCategoria) {
        $this->SubCategoria=$SubCategoria;
    }
  
}
?>
