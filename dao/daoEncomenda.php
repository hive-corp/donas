<?php
    require_once "global.php";

    class daoEncomenda {
        
        public static function criar($Encomenda){
            $connection = Conexao::conectar();

            $queryInsert = "INSERT tbEncomenda(statusEncomenda, codigoRastreio, valorEncomenda, idAnuncio, idCliente)
                            VALUES (?,?,?,?, ?)";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $Encomenda->getStatusEncomenda());
            $prepareStatement->bindValue(2, $Encomenda->getCodigoRastreio());
            $prepareStatement->bindValue(3, $Encomenda->getValorEncomenda());
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

            $querySelect = "SELECT tbEncomenda.*, nomeAnuncio, imagemPrincipalAnuncio FROM tbEncomenda
                            INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbEncomenda.idEncomenda";

            $resultado = $connection->prepare($querySelect);
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public static function listarEncomendasCliente($id){
            $connection = Conexao::conectar();

            $querySelect = "SELECT tbEncomenda.*, nomeAnuncio, imagemPrincipalAnuncio FROM tbEncomenda
                            INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbEncomenda.idAnuncio
                            WHERE idCliente = ?";

            $resultado = $connection->prepare($querySelect);
            $resultado->bindValue(1, $id);
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public static function listarEncomendasVendedora($id){
            $connection = Conexao::conectar();

            $querySelect = "SELECT tbEncomenda.*, nomeCliente, nomeUsuarioCliente, fotoCliente, nomeAnuncio, imagemPrincipalAnuncio FROM tbEncomenda
                            INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbEncomenda.idAnuncio
                            INNER JOIN tbCliente ON tbCliente.idCliente = tbEncomenda.idCliente
                            WHERE idVendedora = ?";

            $resultado = $connection->prepare($querySelect);
            $resultado->bindValue(1, $id);
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public static function consultaTemEncomenda($encomenda){
            $connection = Conexao::conectar();

            $querySelect = "SELECT COUNT(idEncomenda) FROM tbEncomenda WHERE idAnuncio = ? AND idCliente = ?";
    
            $resultado = $connection->prepare($querySelect);

            $resultado->bindValue(1, $encomenda->getAnuncio()->getIdAnuncio());
            $resultado->bindValue(2, $encomenda->getCliente()->getIdCliente());    
            $resultado->execute();
            $count = $resultado->fetch()[0];
            
            return $count!=0;
        }

        public static function contarEncomendasHoje($id){
            $connection = Conexao::conectar();

            $querySelect = "SELECT COUNT(idEncomenda) FROM tbEncomenda
                        INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbEncomenda.idAnuncio
                        WHERE idVendedora = ? AND DATE(dataEncomenda) = CURDATE();";
    
            $resultado = $connection->prepare($querySelect);

            $resultado->bindValue(1, $id);
            $resultado->execute();
            $count = $resultado->fetch()[0];
            
            return $count;
        }

        public static function contarEncomendasEsteMes($id){
            $connection = Conexao::conectar();

            $querySelect = "SELECT COUNT(idEncomenda) FROM tbEncomenda
                        INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbEncomenda.idAnuncio
                        WHERE idVendedora = ? AND MONTH(dataEncomenda) = MONTH(CURDATE()) AND YEAR(dataEncomenda) = YEAR(CURDATE());";
    
            $resultado = $connection->prepare($querySelect);

            $resultado->bindValue(1, $id);
            $resultado->execute();
            $count = $resultado->fetch()[0];
            
            return $count;
        }

        public static function consultaTemEncomendaAtiva($encomenda){
            $connection = Conexao::conectar();

            $querySelect = "SELECT COUNT(idEncomenda) FROM tbEncomenda WHERE idAnuncio = ? AND idCliente = ? AND statusEncomenda == 1";
    
            $resultado = $connection->prepare($querySelect);
            $resultado->bindValue(1, $encomenda->getAnuncio()->getIdAnuncio());
            $resultado->bindValue(2, $encomenda->getCliente()->getIdCliente());
    
            $resultado->execute();
            $count = $resultado->fetch()[0];
            
            return $count!=0;
        }

        public static function foiFinalizada($encomenda){
            $connection = Conexao::conectar();

            $querySelect = "SELECT COUNT(idEncomenda) FROM tbEncomenda WHERE idAnuncio = ? AND idCliente = ? AND statusEncomenda = 3";
    
            $resultado = $connection->prepare($querySelect);
            $resultado->bindValue(1, $encomenda->getAnuncio()->getIdAnuncio());
            $resultado->bindValue(2, $encomenda->getCliente()->getIdCliente());
    
            $resultado->execute();
            $count = $resultado->fetch()[0];
            
            return $count!=0;
        }
    }
?>
