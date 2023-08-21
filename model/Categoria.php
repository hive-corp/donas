<?php

    class Categoria{

        private $idCategoria ;
        private $nomeCategoria ;
        private $fotoCategoria ;

      

        public function getIdCategoria(){
            return $this->idCategoria;
        }
        public function getNomeCategoria(){
            return $this->nomeCategoria;
        }
        public function getFotoCategoria(){
            return $this->fotoCategoria;
        }
        public function setIdCategoria($idCategoria){
            $this->idCategoria=$idCategoria;
        }
        public function setNomeCategoria($nomeCategoria){
            $this->nomeCategoria=$nomeCategoria;
        }
         public function setFotoCategoria($fotoCategoria){
            $this->fotoCategoria=$fotoCategoria;
        }
    }


?>
