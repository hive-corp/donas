<?php

    class Mensagem{

        private $idMensagem ;
        private $conteudoMensagem ;
        private $horaMensagem ;
        private $lidoEmMensagem ;

        private $Cliente ;
        public function __construct()
        {
            $Cliente = new Cliente();
        }

        private $Vendedora ;
        public function __construct()
        {
            $Vendedora = new Vendedora();
        }

        private $origemMensagem;

        public function getIdMensagem() {
            return $this->idMensagem;
        }
        public function getConteudoMensagem() {
            return $this->conteudoMensagem;
        }
        public function getHoraMensagem() {
            return $this->horaMensagem;
        }
        public function getLidoEmMensagem() {
            return $this->lidoEmMensagem;
        }
        public function getCliente() {
            return $this->Cliente;
        }
        public function getVendedora() {
            return $this->Vendedora;
        }
        public function getOrigemMensagem() {
            return $this->origemMensagem;
        }
        public function setIdMensagem($idMensagem) {
            $this->idMensagem=$idMensagem;
        }
        public function setConteudoMensagem($conteudoMensagem) {
            $this->conteudoMensagem=$conteudoMensagem;
        }
        public function setHoraMensagem($horaMensagem) {
            $this->horaMensagem=$horaMensagem;
        }
        public function setLidoEmMensagem($lidoEmMensagem) {
            $this->lidoEmMensagem=$lidoEmMensagem;
        }
        public function setCliente($Cliente) {
            $this->Cliente=$Cliente;
        }
        public function setVendedora($Vendedora) {
            $this->Vendedora=$Vendedora;
        }
        public function setOrigemMensagem($origemMensagem) {
            $this->origemMensagem=$origemMensagem;
        }
    }


?>