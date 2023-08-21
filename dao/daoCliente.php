<?php

    include_once "./model/Cliente.php";
    include_once "./model/Conexao.php";

    class daoCliente{

        public static function cadastrar($Cliente){
            $connection = Conexao::conectar();

            $queryInsert = "INSERT tbCliente(nomeCliente, nomeUsuarioCliente, emailCliente, senhaCliente, dtNascCliente, cidadeCliente, estadoCliente, logradouroCliente, bairroCliente, numeroCliente, complementoCliente, cepCliente)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindvalue(1, $Cliente->getNomeCliente());
            $prepareStatement->bindvalue(2, $Cliente->getNomeUsuarioCliente());
            $prepareStatement->bindvalue(3, $Cliente->getEmailCliente());
            $prepareStatement->bindvalue(4, $Cliente->getSenhaCliente());
            $prepareStatement->bindvalue(5, $Cliente->getDtNascCliente());
            $prepareStatement->bindvalue(6, $Cliente->getCidadeCliente());
            $prepareStatement->bindvalue(7, $Cliente->getEstadoCliente());
            $prepareStatement->bindvalue(8, $Cliente->getLogradouroCliente());
            $prepareStatement->bindvalue(9, $Cliente->getBairroCliente());
            $prepareStatement->bindvalue(10, $Cliente->getNumeroCliente());
            $prepareStatement->bindvalue(11, $Cliente->getComplementoCliente());
            $prepareStatement->bindvalue(12, $Cliente->getCepCliente());

            $prepareStatement->execute();
        }

        public static function deletar($Cliente){
            $connection = Conexao::conectar();

            $queryInsert = "DELETE tbCliente WHERE idCliente = ?";

            $prepareStatement = $connection->prepare($queryInsert);
            $prepareStatement->bindvalue(1, $Cliente->getIdCliente());

            $prepareStatement->execute();
        }

        public static function editar($Cliente){
            $connection = Conexao::conectar();

            $queryInsert = "UPDATE tbCliente
                            SET nomeCliente = ?, nomeUsuarioCliente = ?, emailCliente = ?, senhaCliente = ?, dtNascCliente = ?, cidadeCliente = ?, estadoCliente = ?, logradouroCliente = ?, bairroCliente = ?, numeroCliente = ?, complementoCliente = ?, cepCliente = ?
                            WHERE idCliente = ?";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindvalue(1, $Cliente->getNomeCliente());
            $prepareStatement->bindvalue(2, $Cliente->getNomeUsuarioCliente());
            $prepareStatement->bindvalue(3, $Cliente->getEmailCliente());
            $prepareStatement->bindvalue(4, $Cliente->getSenhaCliente());
            $prepareStatement->bindvalue(5, $Cliente->getDtNascCliente());
            $prepareStatement->bindvalue(6, $Cliente->getCidadeCliente());
            $prepareStatement->bindvalue(7, $Cliente->getEstadoCliente());
            $prepareStatement->bindvalue(8, $Cliente->getLogradouroCliente());
            $prepareStatement->bindvalue(9, $Cliente->getBairroCliente());
            $prepareStatement->bindvalue(10, $Cliente->getNumeroCliente());
            $prepareStatement->bindvalue(11, $Cliente->getComplementoCliente());
            $prepareStatement->bindvalue(12, $Cliente->getCepCliente());
            $prepareStatement->bindvalue(13, $Cliente->getIdCliente());

            $prepareStatement->execute();
        }

        public static function editarFoto($Cliente){
            $connection = Conexao::conectar();

            $queryInsert = "UPDATE tbCliente
                            SET fotoCliente = ?
                            WHERE idCliente = ?";
            
            $prepareStatement = $connection->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $Cliente->getFotoCliente());
            $prepareStatement->bindValue(2, $Cliente->getIdCliente());

            $prepareStatement->execute();
        }

        public static function listar(){
            $connection = Conexao::conectar();

            $querySelect = "SELECT * FROM tbCliente";
            $resultado = $connection->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }
    }
?>