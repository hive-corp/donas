<?php

    class Anuncio{

        private $idAnuncio ;
        private $nomeAnuncio ;
        private $descricaoAnuncio ;
        private $valorAnuncio ;
        private $estrelasAnuncio ;
        private $imagemPrincipalAnuncio ;
        private $tipoAnuncio ;
        private $qtdProduto ;

        private $Vendedora;
        public function __construct()
        {
            $this->Vendedora = new Vendedora();
        }

        private $SubCategoria;
        public function __construct()
        {
            $this->SubCategoria = new SubCategoria();
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
        public function getQtdProduto() {
            return $this->qtdProduto;
        }
        public function getVendedora() {
            return $this->Vendedora;
        }
        public function getSubCategoria() {
            return $this->SubCategoria;
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
        public function setQtdProduto($qtdProduto) {
            $this->qtdProduto = $qtdProduto;
        }
        public function setVendedora($Vendedora) {
            $this->Vendedora = $Vendedora;
        }
        public function setSubCategoria($SubCategoria) {
            $this->SubCategoria = $SubCategoria;
        }
    }


?>
