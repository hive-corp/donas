<?php
    require_once "global.php";

    class daoVendedora{

        public static function cadastrar($Vendedora){
            $connection = Conexao::conectar();

            $queryInsert = "INSERT tbVendedora(nomeVendedora, nomeUsuarioVendedora, emailVendedora, senhaVendedora, cpfVendedora, idNivelVendedora, statusVendedora)
                            VALUES (?, ?, ?, ?, ?, ?, ?)";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindvalue(1, $Vendedora->getNomeVendedora());
            $prepareStatement->bindvalue(2, $Vendedora->getNomeUsuarioVendedora());
            $prepareStatement->bindvalue(3, $Vendedora->getEmailVendedora());
            $prepareStatement->bindvalue(4, $Vendedora->getSenhaVendedora());
            $prepareStatement->bindvalue(5, $Vendedora->getCpfVendedora());
            $prepareStatement->bindvalue(6, $Vendedora->getNivelVendedora()->getIdNivelVendedora());
            $prepareStatement->bindvalue(7, $Vendedora->getStatusVendedora());

            $prepareStatement->execute();
        }

        public static function deletar($Vendedora){
            $connection = Conexao::conectar();

            $queryInsert = "DELETE tbVendedora WHERE idVendedora = ?";

            $prepareStatement = $connection->prepare($queryInsert);
            $prepareStatement->bindvalue(1, $Vendedora->getIdVendedora());

            $prepareStatement->execute();
        }

        public static function editar($Vendedora){
            $connection = Conexao::conectar();

            $queryInsert = "UPDATE tbVendedora
                            SET nomeVendedora = ?, nomeUsuarioVendedora =?, emailVendedora = ?, senhaVendedora = ?, cpfVendedora = ?, idNivelVendedora = ?, statusVendedora = ?
                            WHERE idVendedora = ?";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindvalue(1, $Vendedora->getNomeVendedora());
            $prepareStatement->bindvalue(2, $Vendedora->getNomeUsuarioVendedora());
            $prepareStatement->bindvalue(3, $Vendedora->getEmailVendedora());
            $prepareStatement->bindvalue(4, $Vendedora->getSenhaVendedora());
            $prepareStatement->bindvalue(5, $Vendedora->getCpfVendedora());
            $prepareStatement->bindvalue(6, $Vendedora->getNivelVendedora()->getIdNivelVendedora());
            $prepareStatement->bindvalue(7, $Vendedora->getStatusVendedora());

            $prepareStatement->bindValue(8, $Vendedora->getIdVendedora());

            $prepareStatement->execute();
        }

        public static function editarFoto($Vendedora){
            $connection = Conexao::conectar();

            $queryInsert = "UPDATE tbVendedora
                            SET fotoVendedora = ?
                            WHERE idVendedora = ?";
            
            $prepareStatement = $connection->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $Vendedora->getFotoVendedora());
            $prepareStatement->bindValue(2, $Vendedora->getIdVendedora());

            $prepareStatement->execute();
        }

        public static function listar(){
            $connection = Conexao::conectar();

            $querySelect = "SELECT * FROM tbVendedora";
            $resultado = $connection->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }
    }
?>