<?php

    class Anuncio{

        private $idAnuncio ;
        private $nomeAnuncio ;
        private $descricaoAnuncio ;
        private $valorAnuncio ;
        private $estrelasAnuncio ;
        private $imagemPrincipalAnuncio ;
        private $tipoAnuncio ;
        
        private $Negocio;
        public function __construct()
        {
            $Negocio = new Negocio();
        }

        public function getIdAnuncio() {
            return $this->idAnuncio;
        }
        public function getNomeAnuncio() {
            return $this->nomeAnuncio;
        }
        public function getDescricaoAnuncio() {
            return $this->descricaoAnuncio;
        }
        public function getValorAnuncio() {
            return $this->valorAnuncio;
        }
        public function getEstrelasAnuncio() {
            return $this->estrelasAnuncio;
        }
        public function getImagemPrincipalAnuncio() {
            return $this->imagemPrincipalAnuncio;
        }
        public function getTipoAnuncio() {
            return $this->tipoAnuncio;
        }
        public function getNegocio() {
            return $this->Negocio;
        }
        public function setIdAnuncio($idAnuncio) {
            $this->idAnuncio = $idAnuncio;
        }
        public function setNomeAnuncio($nomeAnuncio) {
            $this->nomeAnuncio = $nomeAnuncio;
        }
        public function setDescricaoAnuncio($descricaoAnuncio) {
            $this->descricaoAnuncio = $descricaoAnuncio;
        }
        public function setValorAnuncio($valorAnuncio) {
            $this->valorAnuncio = $valorAnuncio;
        }
        public function setEstrelasAnuncio($estrelasAnuncio) {
            $this->estrelasAnuncio = $estrelasAnuncio;
        }
        public function setImagemPrincipalAnuncio($imagemPrincipalAnuncio) {
            $this->imagemPrincipalAnuncio = $imagemPrincipalAnuncio;
        }
        public function setTipoAnuncio($tipoAnuncio) {
            $this->tipoAnuncio = $tipoAnuncio;
        }
        public function setNegocio($Negocio) {
            $this->Negocio = $Negocio;
        }
    }


?>