<?php

    class Vendedora{

        private $idVendedora;
        private $nomeVendedora;
        private $emailVendedora;
        private $senhaVendedora;
        private $dtNascVendedora;
        private $fotoVendedora;
        private $statusVendedora;
        private $nomeNegocioVendedora;
        private $nomeUsuarioNegocioVendedora;
        private $fotoNegocioVendedora;
        private $logNegocioVendedora;
        private $cidadeNegocioVendedora;
        private $estadoNegocioVendedora;
        private $bairroNegocioVendedora;
        private $numNegocioVendedora;
        private $compNegocioVendedora;
        private $cepNegocioVendedora;
        private $cnpjNegocioVendedora;
        private $nivelNegocioVendedora;
        private $Categoria;

        public function __construct()
        {
            $this->Categoria = new Categoria();
        }

        public function getIdVendedora(){
            return $this->idVendedora;
        }
        public function getNomeVendedora(){
            return $this->nomeVendedora;
        }
        public function getEmailVendedora(){
            return $this->emailVendedora;
        }
        public function getSenhaVendedora(){
            return $this->senhaVendedora;
        }
        public function getDtNascVendedora(){
            return $this->dtNascVendedora;
        }
        public function getFotoVendedora(){
            return $this->fotoVendedora;
        }
        public function getStatusVendedora(){
            return $this->statusVendedora;
        }
        public function getNomeNegocioVendedora(){
            return $this->nomeNegocioVendedora;
        }
        public function getNomeUsuarioNegocioVendedora(){
            return $this->nomeUsuarioNegocioVendedora;
        }
        public function getFotoNegocioVendedora(){
            return $this->fotoNegocioVendedora;
        }
        public function getLogNegocioVendedora(){
            return $this->logNegocioVendedora;
        }
        public function getCidadeNegocioVendedora(){
            return $this->cidadeNegocioVendedora;
        }
        public function getEstadoNegocioVendedora(){
            return $this->estadoNegocioVendedora;
        }
        public function getBairroNegocioVendedora(){
            return $this->bairroNegocioVendedora;
        }
        public function getNumNegocioVendedora(){
            return $this->numNegocioVendedora;
        }
        public function getCompNegocioVendedora(){
            return $this->compNegocioVendedora;
        }
        public function getCepNegocioVendedora(){
            return $this->cepNegocioVendedora;
        }
        public function getCnpjNegocioVendedora(){
            return $this->cnpjNegocioVendedora;
        }
        public function getNivelNegocioVendedora(){
            return $this->nivelNegocioVendedora;
        }
        public function getCategoria(){
            return $this->Categoria;
        }

        public function setIdVendedora($idVendedora){
            $this->idVendedora=$idVendedora;
        }
        public function setNomeVendedora($nomeVendedora){
            $this->nomeVendedora=$nomeVendedora;
        }
        public function setEmailVendedora($emailVendedora){
            $this->emailVendedora=$emailVendedora;
        }
        public function setSenhaVendedora($senhaVendedora){
            $this->senhaVendedora=$senhaVendedora;
        }
        public function setDtNascVendedora($dtNascVendedora){
            $this->dtNascVendedora=$dtNascVendedora;
        }
        public function setFotoVendedora($fotoVendedora){
            $this->fotoVendedora=$fotoVendedora;
        }
        public function setStatusVendedora($statusVendedora){
            $this->statusVendedora=$statusVendedora;
        }
        public function setNivelNegocioVendedora($nivelNegocioVendedora){
            $this->nivelNegocioVendedora=$nivelNegocioVendedora;
        }
        public function setNomeNegocioVendedora($nomeNegocioVendedora){
            $this->nomeNegocioVendedora=$nomeNegocioVendedora;
        }
        public function setNomeUsuarioNegocioVendedora($nomeUsuarioNegocioVendedora){
            $this->nomeUsuarioNegocioVendedora=$nomeUsuarioNegocioVendedora;
        }
        public function setFotoNegocioVendedora($fotoNegocioVendedora){
            $this->fotoNegocioVendedora=$fotoNegocioVendedora;
        }
        public function setLogNegocio($logNegocioVendedora){
            $this->logNegocioVendedora=$logNegocioVendedora;
        }
        public function setCidadeNegocioVendedora($cidadeNegocioVendedora){
            $this->cidadeNegocioVendedora=$cidadeNegocioVendedora;
        }
        public function setEstadoNegocioVendedora($estadoNegocioVendedora){
            $this->estadoNegocioVendedora=$estadoNegocioVendedora;
        }
        public function setBairroNegocioVendedora($bairroNegocioVendedora){
            $this->bairroNegocioVendedora=$bairroNegocioVendedora;
        }
        public function setNumNegocioVendedora($numNegocioVendedora){
            $this->numNegocioVendedora=$numNegocioVendedora;
        }
        public function setCompNegocioVendedora($compNegocioVendedora){
            $this->compNegocioVendedora=$compNegocioVendedora;
        }
        public function setCepNegocioVendedora($cepNegocioVendedora){
            $this->cepNegocioVendedora=$cepNegocioVendedora;
        }
        public function setCnpjNegocioVendedora($cnpjNegocioVendedora){
            $this->cnpjNegocioVendedora=$cnpjNegocioVendedora;
        }
        public function setCategoria($Categoria){
            $this->Categoria=$Categoria;
        }
    }
