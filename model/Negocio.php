<?php

    class Negocio{

        private $idNegocio ;
        private $nomeNegocio ;
        private $nomeUsuarioNegocio ;
        private $logoNegocio ;

        private $Vendedora ;
        public function __construct()
        {
            $Vendedora = new Vendedora();
        }

        private $logradouroNegocio ;
        private $cidadeNegocio ;
        private $estadoNegocio ;
        private $bairroNegocio ;
        private $numeroNegocio ;
        private $complementoNegocio ;
        private $cepNegocio ;
        private $statusNegocio ;

        public function getIdNegocio(){
            return $this->idNegocio;
        }
        public function getNomeNegocio(){
            return $this->nomeNegocio;
        }
        public function getNomeUsuarioNegocio(){
            return $this->nomeUsuarioNegocio;
        }
        public function getLogoNegocio(){
            return $this->logoNegocio;
        }
        public function getVendedora(){
            return $this->Vendedora;
        }
        public function getLogradouroNegocio(){
            return $this->logradouroNegocio;
        }
        public function getCidadeNegocio(){
            return $this->cidadeNegocio;
        }
        public function getEstadoNegocio(){
            return $this->estadoNegocio;
        }
        public function getBairroNegocio(){
            return $this->bairroNegocio;
        }
        public function getNumeroNegocio(){
            return $this->numeroNegocio;
        }
        public function getComplementoNegocio(){
            return $this->complementoNegocio;
        }
        public function getCepNegocio(){
            return $this->cepNegocio;
        }
        public function getStatusNegocio(){
            return $this->statusNegocio;
        } 
        public function setIdNegocio($idNegocio){
            $this->idNegocio=$idNegocio;
        }
        public function setNomeNegocio($nomeNegocio){
            $this->nomeNegocio=$nomeNegocio;
        }
        public function setNomeUsuarioNegocio($nomeUsuarioNegocio){
            $this->nomeUsuarioNegocio=$nomeUsuarioNegocio;
        }
        public function setLogoNegocio($logoNegocio){
            $this->logoNegocio=$logoNegocio;
        }
        public function setVendedora($Vendedora){
            $this->Vendedora=$Vendedora;
        }
        public function setLogradouroNegocio($logradouroNegocio){
            $this->logradouroNegocio=$logradouroNegocio;
        }
        public function setCidadeNegocio($cidadeNegocio){
            $this->cidadeNegocio=$cidadeNegocio;
        }
        public function setEstadoNegocio($estadoNegocio){
            $this->estadoNegocio=$estadoNegocio;
        }
        public function setBairroNegocio($bairroNegocio){
            $this->bairroNegocio=$bairroNegocio;
        }
        public function setNumeroNegocio($numeroNegocio){
            $this->numeroNegocio=$numeroNegocio;
        }
        public function setComplementoNegocio($complementoNegocio){
            $this->complementoNegocio=$complementoNegocio;
        }
        public function setCepNegocio($cepNegocio){
            $this->cepNegocio=$cepNegocio;
        }
        public function setStatusNegocio($statusNegocio){
            $this->statusNegocio=$statusNegocio;
        } 
    }


?>