<?php

    include_once "./model/Conexao.php";
    include_once "./model/Anuncio.php";

    class daoAnuncio{

        public static function cadastrar($Anuncio){
            $connection = Conexao::conectar();

            $queryInsert="INSERT tbAnuncio(nomeAnuncio, descricaoAnuncio, valorAnuncio, estrelasAnuncio, tipoAnuncio, idNegocio)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindvalue(1, $Anuncio->getNomeAnuncio());
            $prepareStatement->bindvalue(2, $Anuncio->getDescricaoAnuncio());
            $prepareStatement->bindvalue(3, $Anuncio->getValorAnuncio());
            $prepareStatement->bindvalue(4, $Anuncio->getEstrelasAnuncio());
            $prepareStatement->bindvalue(5, $Anuncio->getTipoAnuncio());
            $prepareStatement->bindvalue(6, $Anuncio->getNegocio()->getIdNegocio());

            $prepareStatement->execute();
        }

        public static function deletar($Anuncio){
            $connection = Conexao::conectar();

            $queryInsert = "DELETE tbAnuncio WHERE idAnuncio = ?";

            $prepareStatement = $connection->prepare($queryInsert);
            $prepareStatement->bindvalue(1, $Anuncio->getIdAnuncio());

            $prepareStatement->execute();
        }

        public static function editar($Anuncio){
            $connection = Conexao::conectar();

            $queryInsert = "UPDATE tbAnuncio
                            SET nomeAnuncio = ?, descricaoAnuncio = ?, valorAnuncio = ?, estrelasAnuncio = ?, tipoAnuncio = ?, idNegocio = ?
                            WHERE idAnuncio = ?";

            
            $prepareStatement = $connection->prepare($queryInsert) ;

            $prepareStatement->bindValue(1, $Anuncio->getNomeAnuncio());
            $prepareStatement->bindValue(2, $Anuncio->getDescricaoAnuncio());
            $prepareStatement->bindValue(3, $Anuncio->getValorAnuncio());
            $prepareStatement->bindValue(4, $Anuncio->getEstrelasAnuncio());
            $prepareStatement->bindValue(5, $Anuncio->getTipoAnuncio());
            $prepareStatement->bindValue(6, $Anuncio->getNegocio()->getIdNegocio());
            $prepareStatement->bindValue(7, $Anuncio->getIdAnuncio());

            $prepareStatement->execute();
        }

        public static function editarFoto($Anuncio){
            $connection = Conexao::conectar();

            $queryInsert = "UPDATE tbAnuncio
                            SET imagemPrincipalAnuncio = ?
                            WHERE idAnuncio = ?";
            
            $prepareStatement = $connection->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $Anuncio->getImagemPrincipalAnuncio());
            $prepareStatement->bindValue(2, $Anuncio->getIdAnuncio());

            $prepareStatement->execute();
        }

        public static function listar(){
            $connection = Conexao::conectar();

            $querySelect = "SELECT * FROM tbAnuncio";
            $resultado = $connection->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

    }

?>