<?php
class Avaliacao {
    private $idAvaliacao ;
    private $conteudoAvaliacao ;
    private $estrelasAvaliacao ;
   
    private $Anuncio ;
    private $Cliente ;
    
    public function __construct()
    {
        $this->Anuncio = new Anuncio();
        $this->Cliente = new Cliente();
    }

    public function getIdAvaliacao() {
        return $this->idAvaliacao;
    }
    public function getConteudoAvaliacao() {
        return $this->conteudoAvaliacao;
    }
    public function getEstrelasAvaliacao() {
        return $this->estrelasAvaliacao;
    }
    public function getAnuncio() {
        return $this->Anuncio;
    }
    public function getCliente() {
        return $this->Cliente;
    }

    public function setIdAvaliacao($idAvaliacao) {
        $this->idAvaliacao=$idAvaliacao;
    }
    public function setConteudoAvaliacao($conteudoAvaliacao) {
        $this->conteudoAvaliacao=$conteudoAvaliacao;
    }
    public function setEstrelasAvaliacao($estrelasAvaliacao) {
        $this->estrelasAvaliacao=$estrelasAvaliacao;
    }
    public function setAnuncio($Anuncio) {
        $this->Anuncio=$Anuncio;
    }
    public function setCliente($Cliente) {
        $this->Cliente=$Cliente;
    }
}

?>
