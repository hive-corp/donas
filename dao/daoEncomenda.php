<?php
      require_once "global.php";

    class daoCategoria {
        
        public static function criar($Encomenda){
            $connection = Conexao::conectar();

            $queryInsert = "INSERT tbEncomenda(idEncomenda, statusEncomenda, valorEncomenda, dataEncomenda, idAnuncio, idCliente)
                            VALUES (?,?,?,?,?,?)";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $Encomenda->getStatusEncomenda());
            $prepareStatement->bindValue(2, $Encomenda->getValorEncomenda());
            $prepareStatement->bindValue(3, $Encomenda->getDataEncomenda());
            $prepareStatement->bindValue(4, $Encomenda->getAnuncio()->getIdAnuncio());
            $prepareStatement->bindValue(5, $Encomenda->getCliente()->getIdCliente());
            

            $prepareStatement->execute();
        }

        public static function deletar($Encomenda){
            $connection = Conexao::conectar();

            $queryInsert = "DELETE tbEncomenda WHERE idEncomenda = ?";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $Encomenda->getIdEncomenda());

            $prepareStatement->execute();
        }

        public static function editar($Encomenda){
            $connection = Conexao::conectar();

            $queryInsert = "UPDATE tbEncomenda
                            SET statusEncomenda = ?, valorEncomenda = ?, dataEncomenda = ?, idAnuncio = ?, idCliente = ?
                            WHERE idEncomenda = ?";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $Encomenda->getStatusEncomenda());
            $prepareStatement->bindValue(2, $Encomenda->getValorEncomenda());
            $prepareStatement->bindValue(3, $Encomenda->getDataEncomenda());
            $prepareStatement->bindValue(4, $Encomenda->getAnuncio()->getIdAnuncio());
            $prepareStatement->bindValue(5, $Encomenda->getCliente()->getIdCliente());
            $prepareStatement->bindValue(6, $Encomenda->getIdEncomenda());
            

            $prepareStatement->execute();
        }

        public static function listar(){
            $connection = Conexao::conectar();

            $querySelect = "SELECT * FROM tbEncomenda";

            $resultado = $connection->prepare($querySelect);
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;

        }
    }
?>
