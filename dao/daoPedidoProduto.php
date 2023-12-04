<?php
require_once "global.php";

class daoPedidoProduto
{

    public static function criar($PedidoProduto)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbPedidoProduto(statusPedidoProduto, valorTotal, qtdProdutoPedido, dataPedidoEntregue, dataPedidoFeito, idAnuncio, idCliente)
                            VALUES (?,?,?,?,?,?,?)";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $PedidoProduto->getStatusPedidoProduto());
        $prepareStatement->bindValue(2, $PedidoProduto->getValorTotal());
        $prepareStatement->bindValue(3, $PedidoProduto->getQtdProdutoPedido());
        $prepareStatement->bindValue(4, $PedidoProduto->getDataPedidoEntregue());
        $prepareStatement->bindValue(5, $PedidoProduto->getDataPedidoFeito());
        $prepareStatement->bindValue(6, $PedidoProduto->getAnuncio()->getIdAnuncio());
        $prepareStatement->bindValue(7, $PedidoProduto->getCliente()->getIdCliente());

        $prepareStatement->execute();
    }

    public static function deletar($PedidoProduto)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE FROM tbPedidoProduto WHERE idPedidoProduto = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $PedidoProduto->getIdPedidoProduto());

        $prepareStatement->execute();
    }

    public static function editar($PedidoProduto)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbPedidoProduto
                            SET statusPedidoProduto = ?, valorTotal = ?, qtdProdutoPedido = ?, dataPedidoFeito = ?, idAnuncio = ?, idCliente = ?
                            WHERE idPedidoProduto = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $PedidoProduto->getStatusPedidoProduto());
        $prepareStatement->bindValue(2, $PedidoProduto->getValorTotal());
        $prepareStatement->bindValue(3, $PedidoProduto->getQtdProdutoPedido());
        $prepareStatement->bindValue(4, $PedidoProduto->getDataPedidoFeito());
        $prepareStatement->bindValue(5, $PedidoProduto->getAnuncio()->getIdAnuncio());
        $prepareStatement->bindValue(6, $PedidoProduto->getCliente()->getIdCliente());
        $prepareStatement->bindValue(7, $PedidoProduto->getIdPedidoProduto());


        $prepareStatement->execute();
    }

    public static function cancelar($PedidoProduto)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbPedidoProduto
                            SET statusPedidoProduto = 2
                            WHERE idPedidoProduto = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $PedidoProduto->getIdPedidoProduto());

        $prepareStatement->execute();
    }
    public static function cancelarAuto($idPedidoProduto)
    {
        $connection = Conexao::conectar();

        $queryUpdate = "UPDATE tbPedidoProduto
                            SET statusPedidoProduto = 2
                            WHERE idPedidoProduto = ?";

        $prepareStatement = $connection->prepare($queryUpdate);

        $prepareStatement->bindValue(1, $idPedidoProduto);

        $prepareStatement->execute();
    }


    public static function finalizar($PedidoProduto)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbPedidoProduto
                            SET statusPedidoProduto = 4
                            WHERE idPedidoProduto = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $PedidoProduto->getIdPedidoProduto());

        $prepareStatement->execute();
    }
    public static function Aceitar($dddPedidoProduto)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbPedidoProduto
                            SET statusPedidoProduto = 3
                            WHERE idPedidoProduto = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $dddPedidoProduto->getIdPedidoProduto());

        $prepareStatement->execute();
    }


    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbPedidoProduto.*, nomeAnuncio, imagemPrincipalAnuncio FROM tbPedidoProduto
                            INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoProduto.idAnuncio";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function consultarPorId($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbPedidoProduto.*, nomeAnuncio, imagemPrincipalAnuncio FROM tbPedidoProduto
                        INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoProduto.idAnuncio
                        WHERE idPedidoProduto = ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);
        $resultado->execute();
        $lista = $resultado->fetch();
        return $lista;
    }

    public static function verificarStatus($PedidoProduto)
    {
        $connection = Conexao::conectar();

        $queryInsert = "SELECT statusPedidoProduto FROM tbPedidoProduto
                            WHERE idPedidoProduto = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $PedidoProduto->getIdPedidoProduto());

        $prepareStatement->execute();
    }
    public static function listarPedidosCliente($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbPedidoProduto.*, nomeAnuncio, imagemPrincipalAnuncio FROM tbPedidoProduto
                            INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoProduto.idAnuncio
                            WHERE idCliente = ? AND statusPedidoProduto = 1 OR statusPedidoProduto = 3";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarPedidosVendedora($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbPedidoProduto.*, nomeCliente, nomeUsuarioCliente, fotoCliente, nomeAnuncio, imagemPrincipalAnuncio FROM tbPedidoProduto
                            INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoProduto.idAnuncio
                            INNER JOIN tbCliente ON tbCliente.idCliente = tbPedidoProduto.idCliente
                            WHERE idVendedora = ?
                            LIMIT 10";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarPedidosAnuncio($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbPedidoProduto.*, nomeCliente, nomeUsuarioCliente, fotoCliente, nomeAnuncio, imagemPrincipalAnuncio FROM tbPedidoProduto
                            INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoProduto.idAnuncio
                            INNER JOIN tbCliente ON tbCliente.idCliente = tbPedidoProduto.idCliente
                            WHERE tbAnuncio.idAnuncio = ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);
        $resultado->execute();
        $lista = $resultado->fetchAll();

        return $lista;
    }

    public static function listarPedidosAtivosVendedora($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbPedidoProduto.*, nomeCliente, nomeUsuarioCliente, fotoCliente, nomeAnuncio, imagemPrincipalAnuncio FROM tbPedidoProduto
                            INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoProduto.idAnuncio
                            INNER JOIN tbCliente ON tbCliente.idCliente = tbPedidoProduto.idCliente
                            WHERE idVendedora = ? AND statusPedidoProduto = 1 OR statusPedidoProduto = 3";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function consultaTemPedidos($PedidoProduto)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT COUNT(idPedidoProduto) FROM tbPedidoProduto WHERE idAnuncio = ? AND idCliente = ?";

        $resultado = $connection->prepare($querySelect);

        $resultado->bindValue(1, $PedidoProduto->getAnuncio()->getIdAnuncio());
        $resultado->bindValue(2, $PedidoProduto->getCliente()->getIdCliente());
        $resultado->execute();
        $count = $resultado->fetch()[0];

        return $count != 0;
    }

    public static function contarPedidosHoje($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT COUNT(idPedidoProduto) FROM tbPedidoProduto
                        INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoProduto.idAnuncio
                        WHERE idVendedora = ? AND DATE(dataPedidoFeito) = CURDATE() AND statusPedidoProduto = 4";

        $resultado = $connection->prepare($querySelect);

        $resultado->bindValue(1, $id);
        $resultado->execute();
        $count = $resultado->fetch()[0];

        return $count;
    }

    public static function contarPedidosEsteMes($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT COUNT(idPedidoProduto) FROM tbPedidoProduto
                        INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoProduto.idAnuncio
                        WHERE idVendedora = ? AND MONTH(dataPedidoFeito) = MONTH(CURDATE()) AND YEAR(dataPedidoFeito) = YEAR(CURDATE()) AND statusPedidoProduto = 4";

        $resultado = $connection->prepare($querySelect);

        $resultado->bindValue(1, $id);
        $resultado->execute();
        $count = $resultado->fetch()[0];

        return $count;
    }

    public static function contarPedidosEstaSemana($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT COUNT(idPedidoProduto) FROM tbPedidoProduto
                        INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoProduto.idAnuncio
                        WHERE idVendedora = ? AND WEEK(dataPedidoFeito) = WEEK(CURDATE()) AND YEAR(dataPedidoFeito) = YEAR(CURDATE()) AND statusPedidoProduto = 4";

        $resultado = $connection->prepare($querySelect);

        $resultado->bindValue(1, $id);
        $resultado->execute();
        $count = $resultado->fetch()[0];

        return $count;
    }

    public static function contarPedidosEsteAno($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT COUNT(idPedidoProduto) FROM tbPedidoProduto
                        INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoProduto.idAnuncio
                        WHERE idVendedora = ? AND YEAR(dataPedidoFeito) = YEAR(CURDATE()) AND statusPedidoProduto = 4";

        $resultado = $connection->prepare($querySelect);

        $resultado->bindValue(1, $id);
        $resultado->execute();
        $count = $resultado->fetch()[0];

        return $count;
    }

    public static function valorPedidosHoje($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT SUM(valorTotal) FROM tbPedidoProduto
                        INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoProduto.idAnuncio
                        WHERE idVendedora = ? AND DATE(dataPedidoFeito) = CURDATE() AND statusPedidoProduto = 4";

        $resultado = $connection->prepare($querySelect);

        $resultado->bindValue(1, $id);
        $resultado->execute();
        $count = $resultado->fetch()[0];

        return $count;
    }

    public static function valorPedidosEsteMes($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT SUM(valorTotal) FROM tbPedidoProduto
                        INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoProduto.idAnuncio
                        WHERE idVendedora = ? AND MONTH(dataPedidoFeito) = MONTH(CURDATE()) AND YEAR(dataPedidoFeito) = YEAR(CURDATE()) AND statusPedidoProduto = 4";

        $resultado = $connection->prepare($querySelect);

        $resultado->bindValue(1, $id);
        $resultado->execute();
        $count = $resultado->fetch()[0];

        return $count;
    }

    public static function valorPedidosEstaSemana($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT SUM(valorTotal) FROM tbPedidoProduto
                        INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoProduto.idAnuncio
                        WHERE idVendedora = ? AND WEEK(dataPedidoFeito) = WEEK(CURDATE()) AND YEAR(dataPedidoFeito) = YEAR(CURDATE()) AND statusPedidoProduto = 4";

        $resultado = $connection->prepare($querySelect);

        $resultado->bindValue(1, $id);
        $resultado->execute();
        $count = $resultado->fetch()[0];

        return $count;
    }

    public static function valorPedidosEsteAno($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT SUM(valorTotal) FROM tbPedidoProduto
                        INNER JOIN tbAnuncio ON tbAnuncio.idAnuncio = tbPedidoProduto.idAnuncio
                        WHERE idVendedora = ? AND YEAR(dataPedidoFeito) = YEAR(CURDATE()) AND statusPedidoProduto = 4";

        $resultado = $connection->prepare($querySelect);

        $resultado->bindValue(1, $id);
        $resultado->execute();
        $count = $resultado->fetch()[0];

        return $count;
    }

    public static function consultaLucro($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT SUM(tbAnuncio.valorAnuncio * tbPedidoProduto.qtdProdutoPedido) AS valorTotalVenda,
        SUM(tbAnuncio.precoCustoAnuncio * tbPedidoProduto.qtdProdutoPedido) AS valorTotalCusto FROM tbAnuncio
        JOIN tbPedidoProduto ON tbAnuncio.idAnuncio = tbPedidoProduto.idAnuncio
        WHERE idVendedora = ? AND statusPedidoProduto = 4";

        $resultado = $connection->prepare($querySelect);

        $resultado->bindValue(1, $id);
        $resultado->execute();
        $count = $resultado->fetch();

        return $count;
    }

    public static function consultaTemPedidoAtivo($PedidoProduto)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT COUNT(idPedidoProduto) FROM tbPedidoProduto WHERE idAnuncio = ? AND idCliente = ? AND statusPedidoProduto = 1 OR statusPedidoProduto = 3";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $PedidoProduto->getAnuncio()->getIdAnuncio());
        $resultado->bindValue(2, $PedidoProduto->getCliente()->getIdCliente());
        $resultado->execute();

        $count = $resultado->fetch()[0];

        return $count != 0;
    }

    public static function foiFinalizada($PedidoProduto)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT COUNT(idPedidoProduto) FROM tbPedidoProduto WHERE idAnuncio = ? AND idCliente = ? AND statusPedidoProduto = 4";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $PedidoProduto->getAnuncio()->getIdAnuncio());
        $resultado->bindValue(2, $PedidoProduto->getCliente()->getIdCliente());

        $resultado->execute();
        $count = $resultado->fetch()[0];

        return $count != 0;
    }
}
