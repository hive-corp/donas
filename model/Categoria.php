<?php

    class Categoria{

        private $idCategoria ;
        private $nomeCategoria ;

      

        public function getIdCategoria(){
            return $this->idCategoria;
        }
        public function getNomeCategoria(){
            return $this->nomeCategoria;
        }
        public function setIdCategoria($idCategoria){
            $this->idCategoria=$idCategoria;
        }

        public function setNomeCategoria($nomeCategoria){
            $this->nomeCategoria=$nomeCategoria;
        }
    }


?>