<?php

    class Vendedora{

        private $idVendedora ;
        private $nomeVendedora ;
        private $nomeUsuarioVendedora ;
        private $emailVendedora ;
        private $senhaVendedora ;
        private $cpfVendedora ;

        private $NivelVendedora ;
        public function __construct()
        {
            $NivelVendedora = new NivelVendedora();
        }

        private $fotoVendedora ;
        private $statusVendedora ;

        public function getIdVendedora(){
            return $this->idVendedora;
        }
        public function getNomeVendedora(){
            return $this->nomeVendedora;
        }
        public function getNomeUsuarioVendedora(){
            return $this->nomeUsuarioVendedora;
        }
        public function getEmailVendedora(){
            return $this->emailVendedora;
        }
        public function getSenhaVendedora(){
            return $this->senhaVendedora;
        }
        public function getCpfVendedora(){
            return $this->cpfVendedora;
        }
        public function getNivelVendedora(){
            return $this->NivelVendedora;
        }
        public function getFotoVendedora(){
            return $this->fotoVendedora;
        }
        public function getStatusVendedora(){
            return $this->statusVendedora;
        }
        public function setIdVendedora($idVendedora){
            $this->idVendedora=$idVendedora;
        }
        public function setNomeVendedora($nomeVendedora){
            $this->nomeVendedora=$nomeVendedora;
        }
        public function setNomeUsuarioVendedora($nomeUsuarioVendedora){
            $this->nomeUsuarioVendedora=$nomeUsuarioVendedora;
        }
        public function setEmailVendedora($emailVendedora){
            $this->emailVendedora=$emailVendedora;
        }
        public function setSenhaVendedora($senhaVendedora){
            $this->senhaVendedora=$senhaVendedora;
        }
        public function setCpfVendedora($cpfVendedora){
            $this->cpfVendedora=$cpfVendedora;
        }
        public function setNivelVendedora($NivelVendedora){
            $this->NivelVendedora=$NivelVendedora;
        }
        public function setFotoVendedora($fotoVendedora){
            $this->fotoVendedora=$fotoVendedora;
        }
        public function setStatusVendedora($statusVendedora){
            $this->statusVendedora=$statusVendedora;
        }
    }


?>