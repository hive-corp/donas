<?php
    require_once "global.php";

    class daoPedidoServico {
        
        public static function criar($PedidoServico){
            $connection = Conexao::conectar();

            $queryInsert = "INSERT tbPedidoServico(statusPedidoServico, valorTotal, dataServicoMarcado, idAnuncio, idCliente)
                            VALUES (?,?,?,?,?)";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $PedidoServico->getStatusPedidoServico());
            $prepareStatement->bindValue(2, $PedidoServico->getValorTotal());
            $prepareStatement->bindValue(3, $PedidoServico->getDataServicoMarcado());
            $prepareStatement->bindValue(4, $PedidoServico->getAnuncio()->getIdAnuncio());
            $prepareStatement->bindValue(5, $PedidoServico->getCliente()->getIdCliente());

            $prepareStatement->execute();
        }

        public static function deletar($PedidoServico){
            $connection = Conexao::conectar();

            $queryInsert = "DELETE FROM tbPedidoServico WHERE idPedidoServico = ?";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $PedidoServico->getIdPedidoServico());

            $prepareStatement->execute();
        }

        public static function editar($PedidoServico){
            $connection = Conexao::conectar();

            $queryInsert = "UPDATE tbPedidoServico
                            SET statusPedidoServico = ?, valorTotal = ?, dataServicoContratado = ?, dataServicoMarcado = ?, idAnuncio = ?, idCliente = ?
                            WHERE idPedidoServico = ?";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $PedidoServico->getStatusPedidoServico());
            $prepareStatement->bindValue(2, $PedidoServico->getValorTotal());
            $prepareStatement->bindValue(3, $PedidoServico->getDataServicoContratado());
            $prepareStatement->bindValue(4, $PedidoServico->getDataServicoMarcado());
            $prepareStatement->bindValue(5, $PedidoServico->getAnuncio()->getIdAnuncio());
            $prepareStatement->bindValue(6, $PedidoServico->getCliente()->getIdCliente());
            $prepareStatement->bindValue(7, $PedidoServico->getIdPedidoServico());
            

            $prepareStatement->execute();
        }

        public static function cancelar($PedidoServico){
            $connection = Conexao::conectar();

            $queryInsert = "UPDATE tbPedidoServico
                            SET statusPedidoServico = 2
                            WHERE idPedidoServico = ?";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $PedidoServico->getIdPedidoServico());

            $prepareStatement->execute();
        }

        public static function finalizar($PedidoServico){
            $connection = Conexao::conectar();

            $queryInsert = "UPDATE tbPedidoServico
                            SET statusPedidoServico = 3
                            WHERE idPedidoServico = ?";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $PedidoServico->getIdPedidoServico());

            $prepareStatement->execute();
        }

        public static function listar(){
            $connection = Conexao::conectar();

            $querySelect = "SELECT tbPedidoServico.*, nomeAnuncio, imagemPrincipalAnuncio FROM tbPedidoServico
                            INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoServico.idAnuncio";

            $resultado = $connection->prepare($querySelect);
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public static function listarPedidosCliente($id){
            $connection = Conexao::conectar();

            $querySelect = "SELECT tbPedidoServico.*, nomeAnuncio, imagemPrincipalAnuncio FROM tbPedidoServico
                            INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoProduto.idAnuncio
                            WHERE idCliente = ? AND statusPedidoProduto = 1";

            $resultado = $connection->prepare($querySelect);
            $resultado->bindValue(1, $id);
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public static function listarPedidosVendedora($id){
            $connection = Conexao::conectar();

            $querySelect = "SELECT tbPedidoServico.*, nomeCliente, nomeUsuarioCliente, fotoCliente, nomeAnuncio, imagemPrincipalAnuncio FROM tbPedidoServico
                            INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoServico.idAnuncio
                            INNER JOIN tbCliente ON tbCliente.idCliente = tbPedidoServico.idCliente
                            WHERE idVendedora = ?
                            LIMIT 10";

            $resultado = $connection->prepare($querySelect);
            $resultado->bindValue(1, $id);
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public static function listarPedidosAnuncio($id){
            $connection = Conexao::conectar();

            $querySelect = "SELECT tbPedidoServico.*, nomeCliente, nomeUsuarioCliente, fotoCliente, nomeAnuncio, imagemPrincipalAnuncio FROM tbPedidoServico
                            INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoServico.idAnuncio
                            INNER JOIN tbCliente ON tbCliente.idCliente = tbPedidoServico.idCliente
                            WHERE tbAnuncio.idAnuncio = ?";

            $resultado = $connection->prepare($querySelect);
            $resultado->bindValue(1, $id);
            $resultado->execute();
            $lista = $resultado->fetchAll();

            return $lista;
        }

        public static function listarPedidosAtivosVendedora($id){
            $connection = Conexao::conectar();

            $querySelect = "SELECT tbPedidoServico.*, nomeCliente, nomeUsuarioCliente, fotoCliente, nomeAnuncio, imagemPrincipalAnuncio FROM tbPedidoServico
                            INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoServico.idAnuncio
                            INNER JOIN tbCliente ON tbCliente.idCliente = tbPedidoServico.idCliente
                            WHERE idVendedora = ? AND statusPedidoServico = 1";

            $resultado = $connection->prepare($querySelect);
            $resultado->bindValue(1, $id);
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public static function consultaTemPedidos($PedidoServico){
            $connection = Conexao::conectar();

            $querySelect = "SELECT COUNT(idPedidoServico) FROM tbPedidoServico WHERE idAnuncio = ? AND idCliente = ?";
    
            $resultado = $connection->prepare($querySelect);

            $resultado->bindValue(1, $PedidoServico->getAnuncio()->getIdAnuncio());
            $resultado->bindValue(2, $PedidoServico->getCliente()->getIdCliente());    
            $resultado->execute();
            $count = $resultado->fetch()[0];
            
            return $count!=0;
        }

        public static function contarPedidosHoje($id){
            $connection = Conexao::conectar();

            $querySelect = "SELECT COUNT(idPedidoServico) FROM tbPedidoServico
                        INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoServico.idAnuncio
                        WHERE idVendedora = ? AND DATE(dataEncomenda) = CURDATE();";
    
            $resultado = $connection->prepare($querySelect);

            $resultado->bindValue(1, $id);
            $resultado->execute();
            $count = $resultado->fetch()[0];
            
            return $count;
        }

        public static function contarPedidosEsteMes($id){
            $connection = Conexao::conectar();

            $querySelect = "SELECT COUNT(idPedidoServico) FROM tbPedidoServico
                        INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoServico.idAnuncio
                        WHERE idVendedora = ? AND MONTH(dataServicoContratado) = MONTH(CURDATE()) AND YEAR(dataServicoContratado) = YEAR(CURDATE());";
    
            $resultado = $connection->prepare($querySelect);

            $resultado->bindValue(1, $id);
            $resultado->execute();
            $count = $resultado->fetch()[0];
            
            return $count;
        }

        public static function consultaTemPedidoAtivo($PedidoServico){
            $connection = Conexao::conectar();

            $querySelect = "SELECT COUNT(idPedidoServico) FROM tbPedidoServico WHERE idAnuncio = ? AND idCliente = ? AND statusPedidoServico = 1";
    
            $resultado = $connection->prepare($querySelect);
            $resultado->bindValue(1, $PedidoServico->getAnuncio()->getIdAnuncio());
            $resultado->bindValue(2, $PedidoServico->getCliente()->getIdCliente());
            $resultado->execute();

            $count = $resultado->fetch()[0];
            
            return $count!=0;
        }

        public static function foiFinalizada($PedidoServico){
            $connection = Conexao::conectar();

            $querySelect = "SELECT COUNT(idPedidoServico) FROM tbPedidoServico WHERE idAnuncio = ? AND idCliente = ? AND statusPedidoServico = 3";
    
            $resultado = $connection->prepare($querySelect);
            $resultado->bindValue(1, $PedidoServico->getAnuncio()->getIdAnuncio());
            $resultado->bindValue(2, $PedidoServico->getCliente()->getIdCliente());
    
            $resultado->execute();
            $count = $resultado->fetch()[0];
            
            return $count!=0;
        }
    }
?>
