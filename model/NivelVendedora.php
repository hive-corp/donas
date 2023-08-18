<?php

    class NivelVendedora{

        private $idNivelVendedora  ;
        private $nomeNivelVendedora  ;

      

        public function getIdNivelVendedora(){
            return $this->idNivelVendedora ;
        }
        public function getNomeNivelVendedora(){
            return $this->nomeNivelVendedora;
        }
        public function setIdNivelVendedora($idNivelVendedora ){
            $this->idNivelVendedora =$idNivelVendedora ;
        }

        public function setNomeNivelVendedora ($nomeNivelVendedora){
            $this->nomeNivelVendedora=$nomeNivelVendedora;
        }
    }


?>