<?php

    class Cliente{
        private $idCliente;
        private $nomeCliente;
        private $nomeUsuarioCliente;
        private $emailCliente;
        private $senhaCliente;
        private $dtNascCliente;
        private $fotoCliente;
        private $cidadeCliente;
        private $estadoCliente;
        private $logradouroCliente;
        private $bairroCliente;
        private $numeroCliente;
        private $complementoCliente;
        private $cepCliente;

        
        public function getIdCliente() {
            return $this->idCliente;
        }
        public function getNomeCliente() {
            return $this->nomeCliente;
        }
        public function getNomeUsuarioCliente() {
            return $this->nomeUsuarioCliente;
        }
        public function getEmailCliente() {
            return $this->emailCliente;
        }
        public function getSenhaCliente() {
            return $this->senhaCliente;
        }
        public function getDtNascCliente() {
            return $this->dtNascCliente;
        }
        public function getFotoCliente() {
            return $this->fotoCliente;
        }
        public function getCidadeCliente() {
            return $this->cidadeCliente;
        }
        public function getEstadoCliente() {
            return $this->estadoCliente;
        }
        public function getLogradouroCliente() {
            return $this->logradouroCliente;
        }
        public function getBairroCliente() {
            return $this->bairroCliente;
        }
        public function getNumeroCliente() {
            return $this->numeroCliente;
        }
        public function getComplementoCliente() {
            return $this->complementoCliente;
        }
        public function getCepCliente() {
            return $this->cepCliente;
        }
        public function setIdCliente($idCliente) {
            $this->idCliente=$idCliente;
        }
        public function setNomeCliente($nomeCliente) {
            $this->nomeCliente=$nomeCliente;
        }
        public function setNomeUsuarioCliente($nomeUsuarioCliente) {
            $this->nomeUsuarioCliente=$nomeUsuarioCliente;
        }
        public function setEmailCliente($emailCliente) {
            $this->emailCliente=$emailCliente;
        }
        public function setSenhaCliente($senhaCliente) {
            $this->senhaCliente=$senhaCliente;
        }
        public function setDtNascCliente($dtNascCliente) {
            $this->dtNascCliente=$dtNascCliente;
        }
        public function setFotoCliente($fotoCliente) {
            $this->fotoCliente=$fotoCliente;
        }
        public function setCidadeCliente($cidadeCliente) {
            $this->cidadeCliente=$cidadeCliente;
        }
        public function setEstadoCliente($estadoCliente) {
            $this->estadoCliente=$estadoCliente;
        }
        public function setLogradouroCliente($logradouroCliente) {
            $this->logradouroCliente=$logradouroCliente;
        }
        public function setBairroCliente($bairroCliente) {
            $this->bairroCliente=$bairroCliente;
        }
        public function setNumeroCliente($numeroCliente) {
            $this->numeroCliente=$numeroCliente;
        }
        public function setComplementoCliente($complementoCliente) {
            $this->complementoCliente=$complementoCliente;
        }
        public function setCepCliente($cepCliente) {
            $this->cepCliente=$cepCliente;
        }
    }
    ?>