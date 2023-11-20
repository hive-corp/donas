<?php
require_once "global.php";

class daoAnuncio
{

    public static function cadastrar($Anuncio)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbAnuncio(nomeAnuncio, descricaoAnuncio, valorAnuncio, estrelasAnuncio, tipoAnuncio, qtdProduto, idVendedora, idSubCategoria)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindvalue(1, $Anuncio->getNomeAnuncio());
        $prepareStatement->bindvalue(2, $Anuncio->getDescricaoAnuncio());
        $prepareStatement->bindvalue(3, $Anuncio->getValorAnuncio());
        $prepareStatement->bindvalue(4, $Anuncio->getEstrelasAnuncio());
        $prepareStatement->bindvalue(5, $Anuncio->getTipoAnuncio());
        $prepareStatement->bindvalue(6, $Anuncio->getQtdProduto());
        $prepareStatement->bindvalue(7, $Anuncio->getVendedora()->getIdVendedora());
        $prepareStatement->bindvalue(7, $Anuncio->getSubCategoria()->getIdSubCategoria());

        $prepareStatement->execute();
    }

    public static function deletar($Anuncio)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE FROM tbAnuncio WHERE idAnuncio = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindvalue(1, $Anuncio->getIdAnuncio());

        $prepareStatement->execute();
    }

    public static function editar($Anuncio)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbAnuncio
                            SET nomeAnuncio = ?, descricaoAnuncio = ?, valorAnuncio = ?, qtdProduto = ?, idSubCategoria = ?
                            WHERE idAnuncio = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Anuncio->getNomeAnuncio());
        $prepareStatement->bindValue(2, $Anuncio->getDescricaoAnuncio());
        $prepareStatement->bindValue(3, $Anuncio->getValorAnuncio());
        $prepareStatement->bindvalue(4, $Anuncio->getQtdProduto());
        $prepareStatement->bindvalue(7, $Anuncio->getSubCategoria()->getIdSubCategoria());
        $prepareStatement->bindValue(5, $Anuncio->getIdAnuncio());

        $prepareStatement->execute();
    }

    public static function editarEstrelas($Anuncio)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbAnuncio
                            SET estrelasAnuncio = ?
                            WHERE idAnuncio = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Anuncio->getEstrelasAnuncio());
        $prepareStatement->bindValue(2, $Anuncio->getIdAnuncio());

        $prepareStatement->execute();
    }

    public static function editarFoto($Anuncio)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbAnuncio
                            SET imagemPrincipalAnuncio = ?
                            WHERE idAnuncio = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Anuncio->getImagemPrincipalAnuncio());
        $prepareStatement->bindValue(2, $Anuncio->getIdAnuncio());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbAnuncio.*, nomeCategoria, nomeNegocioVendedora, nomeUsuarioNegocioVendedora, nivelNegocioVendedora FROM tbAnuncio
                        INNER JOIN tbVendedora ON tbVendedora.idVendedora = tbAnuncio.idVendedora
                        INNER JOIN tbCategoria ON tbVendedora.idCategoria = tbCategoria.idCategoria
                        ORDER BY nivelNegocioVendedora DESC";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarAnunciosVendedora($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbAnuncio.*, nomeCategoria, nomeNegocioVendedora, nomeUsuarioNegocioVendedora, nivelNegocioVendedora FROM tbAnuncio
                        INNER JOIN tbVendedora ON tbVendedora.idVendedora = tbAnuncio.idVendedora
                        INNER JOIN tbCategoria ON tbVendedora.idCategoria = tbCategoria.idCategoria
                        WHERE tbAnuncio.idVendedora = ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function consultarId($Anuncio)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT idAnuncio FROM tbAnuncio
                            WHERE nomeAnuncio = ? AND descricaoAnuncio = ? AND idVendedora = ?');
        $stmt->bindValue(1, $Anuncio->getNomeAnuncio());
        $stmt->bindValue(2, $Anuncio->getDescricaoAnuncio());
        $stmt->bindValue(3, $Anuncio->getVendedora()->getIdVendedora());
        $stmt->execute();
        $id = $stmt->fetch()[0];

        return $id;
    }

    public static function consultarPorId($id)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT tbAnuncio.*, nomeCategoria, nomeNegocioVendedora, nomeUsuarioNegocioVendedora, nivelNegocioVendedora, fotoNegocioVendedora FROM tbAnuncio
                            INNER JOIN tbVendedora ON tbVendedora.idVendedora = tbAnuncio.idVendedora
                            INNER JOIN tbCategoria ON tbVendedora.idCategoria = tbCategoria.idCategoria
                            WHERE idAnuncio = ? ');
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $dados = $stmt->fetch();

        return $dados;
    }

    public static function consultarPorVendedoraId($anuncio)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT tbAnuncio.*, nomeCategoria, nomeNegocioVendedora, nomeUsuarioNegocioVendedora, nivelNegocioVendedora, fotoNegocioVendedora FROM tbAnuncio
                            INNER JOIN tbVendedora ON tbVendedora.idVendedora = tbAnuncio.idVendedora
                            INNER JOIN tbCategoria ON tbVendedora.idCategoria = tbCategoria.idCategoria
                            WHERE idAnuncio = ? AND tbVendedora.idVendedora = ?');
        $stmt->bindValue(1, $anuncio->getIdAnuncio());
        $stmt->bindValue(2, $anuncio->getVendedora()->getIdVendedora());
        $stmt->execute();

        $dados = $stmt->fetch();

        return $dados;
    }

    public static function consultarMelhorAvaliado($id)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT tbAnuncio.* FROM tbAnuncio
                            WHERE idVendedora = ? AND estrelasAnuncio = (SELECT MAX(estrelasAnuncio) FROM tbAnuncio WHERE idVendedora = ?)');
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $id);
        $stmt->execute();

        $dados = $stmt->fetch();

        return $dados;
    }

    public static function consultarMaisEncomendado($id)
    {
        $connection = Conexao::conectar();


        $stmt = $connection->prepare('SELECT COUNT(idPedidoProduto) as qtd, tbAnuncio.* FROM tbAnuncio
                            INNER JOIN tbPedidoProduto ON tbPedidoProduto.idAnuncio = tbAnuncio.idAnuncio
                            WHERE idVendedora = ?
                            ORDER BY qtd DESC
                            LIMIT 1');

        $stmt->bindValue(1, $id);
        $stmt->execute();

        $dados = $stmt->fetch();

        return $dados;
    }

    public static function contarAnuncio()
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idAnuncio) FROM tbAnuncio");
        $stmt->execute();

        $countAnuncio = $stmt->fetch()[0];

        return $countAnuncio;
    }

    public static function contarEstrelasAnuncioVendedora($id)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idAnuncio) FROM tbAnuncio WHERE estrelasAnuncio = 5 AND idVendedora = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $countCinco = $stmt->fetch()[0];

        $stmt = $connection->prepare("SELECT COUNT(idAnuncio) FROM tbAnuncio WHERE estrelasAnuncio = 4 AND idVendedora = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $countQuatro = $stmt->fetch()[0];

        $stmt = $connection->prepare("SELECT COUNT(idAnuncio) FROM tbAnuncio WHERE estrelasAnuncio = 3 AND idVendedora = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $countTres = $stmt->fetch()[0];

        $stmt = $connection->prepare("SELECT COUNT(idAnuncio) FROM tbAnuncio WHERE estrelasAnuncio = 2 AND idVendedora = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $countDois = $stmt->fetch()[0];

        $stmt = $connection->prepare("SELECT COUNT(idAnuncio) FROM tbAnuncio WHERE estrelasAnuncio = 1 AND idVendedora = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $countUm = $stmt->fetch()[0];

        $stmt = $connection->prepare("SELECT COUNT(idAnuncio) FROM tbAnuncio WHERE estrelasAnuncio = 0 AND idVendedora = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $countZero = $stmt->fetch()[0];

        $estrelas = [
            '0 estrelas' => $countZero,
            '1 estrela' => $countUm,
            '2 estrelas' => $countDois,
            '3 estrelas' => $countTres,
            '4 estrelas' => $countQuatro,
            '5 estrelas' => $countCinco
        ];

        return $estrelas;
    }

    public static function contarAnuncioServico($id)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idAnuncio) FROM tbAnuncio WHERE idVendedora = ? AND tipoAnuncio = 1");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $countAnuncioServico = $stmt->fetch()[0];

        return $countAnuncioServico;
    }

    public static function contarAnuncioProduto($id)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idAnuncio) FROM tbAnuncio WHERE idVendedora = ? AND tipoAnuncio = 2");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $countAnuncioProduto = $stmt->fetch()[0];

        return $countAnuncioProduto;
    }

    public static function contarAnuncioGeral($id)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idAnuncio) FROM tbAnuncio WHERE idVendedora = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $countAnuncioGeral = $stmt->fetch()[0];

        return $countAnuncioGeral;
    }

    public static function listarAnunciosPorEstrelas()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbAnuncio.*, nomeCategoria, nomeNegocioVendedora, nomeUsuarioNegocioVendedora, nivelNegocioVendedora FROM tbAnuncio
                    INNER JOIN tbVendedora ON tbVendedora.idVendedora = tbAnuncio.idVendedora
                    INNER JOIN tbCategoria ON tbVendedora.idCategoria = tbCategoria.idCategoria
                    ORDER BY estrelasAnuncio DESC, nivelNegocioVendedora DESC";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();

        $lista = $resultado->fetchAll();

        return $lista;
    }

    public static function listarAnunciosPorCategoria()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbAnuncio.*, nomeCategoria, nomeNegocioVendedora, nomeUsuarioNegocioVendedora, nivelNegocioVendedora FROM tbAnuncio
                    INNER JOIN tbVendedora ON tbVendedora.idVendedora = tbAnuncio.idVendedora
                    INNER JOIN tbCategoria ON tbVendedora.idCategoria = tbCategoria.idCategoria
                    WHERE idCategoria = ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();

        $lista = $resultado->fetchAll();

        return $lista;
    }

    public static function listarAnunciosPreferencias($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbAnuncio.*, nomeCategoria, nomeNegocioVendedora, nomeUsuarioNegocioVendedora, nivelNegocioVendedora FROM tbAnuncio
        INNER JOIN tbVendedora ON tbVendedora.idVendedora = tbAnuncio.idVendedora
        INNER JOIN tbCategoria ON tbVendedora.idCategoria = tbCategoria.idCategoria
        WHERE tbCategoria.idCategoria IN (SELECT idCategoria FROM tbPreferencias WHERE idCliente = ?)
        ORDER BY nivelNegocioVendedora DESC";

        $prepareStatement = $connection->prepare($querySelect);
        $prepareStatement->bindValue(1, $id);
        $prepareStatement->execute();

        $lista = $prepareStatement->fetchAll();

        return $lista;
    }

    public static function listarAnunciosPorContaSeguida($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbAnuncio.*, nomeCategoria, nomeNegocioVendedora, nomeUsuarioNegocioVendedora, nivelNegocioVendedora FROM tbAnuncio
                        INNER JOIN tbVendedora ON tbVendedora.idVendedora = tbAnuncio.idVendedora
                        INNER JOIN tbCategoria ON tbVendedora.idCategoria = tbCategoria.idCategoria
                        WHERE tbVendedora.idVendedora IN (SELECT idVendedora FROM tbseguidor WHERE idCliente = ?)
                        ORDER BY nivelNegocioVendedora DESC";

        $prepareStatement = $connection->prepare($querySelect);
        $prepareStatement->bindValue(1, $id);
        $prepareStatement->execute();

        $lista = $prepareStatement->fetchAll();

        return $lista;
    }


    public static function consultarMediaVendedora($id)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare(("SELECT AVG(estrelasAnuncio) FROM tbAnuncio
                                    WHERE idVendedora = ?"));
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $avg = $stmt->fetch()[0];

        return $avg;
    }
      public static function contarAnuncioVendedora($id)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idAnuncio) FROM tbAnuncio WHERE idVendedora = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $countAnuncio = $stmt->fetch()[0];

        return $countAnuncio;
    }
        public static function pesquisarAnunciosNomeDescricaoCategoria($categoria, $string)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbAnuncio.*, nomeCategoria, nomeNegocioVendedora, nomeUsuarioNegocioVendedora, nivelNegocioVendedora FROM tbAnuncio
                        INNER JOIN tbVendedora ON tbVendedora.idVendedora = tbAnuncio.idVendedora
                        INNER JOIN tbCategoria ON tbVendedora.idCategoria = tbCategoria.idCategoria
                        WHERE tbCategoria.idCategoria = ? AND nomeAnuncio LIKE ? OR descricaoAnuncio LIKE ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $categoria);
        $resultado->bindValue(2, "%".$string."%");
        $resultado->bindValue(3, "%".$string."%");
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function pesquisarAnunciosNomeDescricao($string)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbAnuncio.*, nomeCategoria, nomeNegocioVendedora, nomeUsuarioNegocioVendedora, nivelNegocioVendedora FROM tbAnuncio
                        INNER JOIN tbVendedora ON tbVendedora.idVendedora = tbAnuncio.idVendedora
                        INNER JOIN tbCategoria ON tbVendedora.idCategoria = tbCategoria.idCategoria
                        WHERE nomeAnuncio LIKE ? OR descricaoAnuncio LIKE ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, "%".$string."%");
        $resultado->bindValue(2, "%".$string."%");
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function pesquisarAnunciosCategoria($categoria)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbAnuncio.*, nomeCategoria, nomeNegocioVendedora, nomeUsuarioNegocioVendedora, nivelNegocioVendedora FROM tbAnuncio
                        INNER JOIN tbVendedora ON tbVendedora.idVendedora = tbAnuncio.idVendedora
                        INNER JOIN tbCategoria ON tbVendedora.idCategoria = tbCategoria.idCategoria
                        WHERE tbCategoria.idCategoria = ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $categoria);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public static function pesquisarTipo($tipo)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbAnuncio.*, nomeCategoria, nomeNegocioVendedora, nomeUsuarioNegocioVendedora, nivelNegocioVendedora FROM tbAnuncio
                        INNER JOIN tbVendedora ON tbVendedora.idVendedora = tbAnuncio.idVendedora
                        INNER JOIN tbCategoria ON tbVendedora.idCategoria = tbCategoria.idCategoria
                        WHERE tipoAnuncio = ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $tipo);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public static function pesquisarAnunciosNomeDescricaoCategoriaTipo($categoria, $string, $tipo)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbAnuncio.*, nomeCategoria, nomeNegocioVendedora, nomeUsuarioNegocioVendedora, nivelNegocioVendedora FROM tbAnuncio
                        INNER JOIN tbVendedora ON tbVendedora.idVendedora = tbAnuncio.idVendedora
                        INNER JOIN tbCategoria ON tbVendedora.idCategoria = tbCategoria.idCategoria
                        WHERE tbCategoria.idCategoria = ? AND tipoAnuncio = ? AND (nomeAnuncio LIKE ? OR descricaoAnuncio LIKE ?) ";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $categoria);
        $resultado->bindValue(2, $tipo);
        $resultado->bindValue(3, "%".$string."%");
        $resultado->bindValue(4, "%".$string."%");
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public static function pesquisarAnunciosNomeDescricaoTipo($tipo, $string)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbAnuncio.*, nomeCategoria, nomeNegocioVendedora, nomeUsuarioNegocioVendedora, nivelNegocioVendedora FROM tbAnuncio
                        INNER JOIN tbVendedora ON tbVendedora.idVendedora = tbAnuncio.idVendedora
                        INNER JOIN tbCategoria ON tbVendedora.idCategoria = tbCategoria.idCategoria
                        WHERE tipoAnuncio = ? AND nomeAnuncio LIKE ? OR descricaoAnuncio LIKE ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $tipo);
        $resultado->bindValue(2, "%".$string."%");
        $resultado->bindValue(3, "%".$string."%");
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public static function pesquisarCategoriaTipo($tipo, $categoria)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbAnuncio.*, nomeCategoria, nomeNegocioVendedora, nomeUsuarioNegocioVendedora, nivelNegocioVendedora FROM tbAnuncio
                        INNER JOIN tbVendedora ON tbVendedora.idVendedora = tbAnuncio.idVendedora
                        INNER JOIN tbCategoria ON tbVendedora.idCategoria = tbCategoria.idCategoria
                        WHERE tipoAnuncio = ? AND tbCategoria.idCategoria = ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $tipo);
        $resultado->bindValue(2, $categoria);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }
}
