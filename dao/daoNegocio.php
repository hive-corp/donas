<?php
    require_once "global.php";

    class daoCategoria {
        
        public static function cadastrar($Negocio){
            $connection = Conexao::conectar();

            $queryInsert = "INSERT tbNegocio(idNegocio, nomeNegocio, nomeUsuarioNegocio, idVendedora, logradouroNegocio, 
                            cidadeNegocio, estadoNegocio, bairroNegocio, numeroNegocio, complementoNegocio, cepNegocio, statusNegocio)
                            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $Negocio->getNomeNegocio());
            $prepareStatement->bindValue(2, $Negocio->getNomeUsuarioNegocio());
            $prepareStatement->bindValue(3, $Negocio->getVendedora()->getIdVendedora());
            $prepareStatement->bindValue(4, $Negocio->getLogradouroNegocio());
            $prepareStatement->bindValue(5, $Negocio->getCidadeNegocio());
            $prepareStatement->bindValue(6, $Negocio->getEstadoNegocio());
            $prepareStatement->bindValue(7, $Negocio->getBairroNegocio());
            $prepareStatement->bindValue(8, $Negocio->getNumeroNegocio());
            $prepareStatement->bindValue(9, $Negocio->getComplementoNegocio());
            $prepareStatement->bindValue(10, $Negocio->getCepNegocio());
            $prepareStatement->bindValue(11, $Negocio->getStatusNegocio());

            $prepareStatement->execute();
        }

        public static function deletar($Negocio){
            $connection = Conexao::conectar();

            $queryInsert = "DELETE tbNegocio WHERE idNegocio = ?";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $Negocio->getIdNegocio());

            $prepareStatement->execute();
        }

        public static function editar($Negocio){
            $connection = Conexao::conectar();

            $queryInsert = "UPDATE tbNegocio
                            SET nomeNegocio = ?, nomeUsuarioNegocio = ?, idVendedora = ?, logradouroNegocio = ?, 
                            cidadeNegocio = ? , estadoNegocio = ?, bairroNegocio = ?, numeroNegocio = ? complementoNegocio = ?, 
                            cepNegocio = ?, statusNegocio = ?
                            WHERE idNegocio = ?";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $Negocio->getNomeNegocio());
            $prepareStatement->bindValue(2, $Negocio->getNomeUsuarioNegocio());
            $prepareStatement->bindValue(3, $Negocio->getVendedora()->getIdVendedora());
            $prepareStatement->bindValue(4, $Negocio->getLogradouroNegocio());
            $prepareStatement->bindValue(5, $Negocio->getCidadeNegocio());
            $prepareStatement->bindValue(6, $Negocio->getEstadoNegocio());
            $prepareStatement->bindValue(7, $Negocio->getBairroNegocio());
            $prepareStatement->bindValue(8, $Negocio->getNumeroNegocio());
            $prepareStatement->bindValue(9, $Negocio->getComplementoNegocio());
            $prepareStatement->bindValue(10, $Negocio->getCepNegocio());
            $prepareStatement->bindValue(11, $Negocio->getStatusNegocio());
            $prepareStatement->bindValue(12, $Negocio->getIdNegocio());


            $prepareStatement->execute();
        }

         public static function editarLogo($Negocio){
            $connection = Conexao::conectar();

            $queryInsert = "UPDATE tbNegocio
                            SET logoNegocio = ?
                            WHERE idNegocio = ?";
            
            $prepareStatement = $connection->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $Negocio->getLogoNegocio());
            $prepareStatement->bindValue(2, $Negocio->getIdNegocio());

            $prepareStatement->execute();
        }

        public static function listar(){
            $connection = Conexao::conectar();

            $querySelect = "SELECT * FROM tbNegocio";

            $resultado = $connection->prepare($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;

        }
    }
?>