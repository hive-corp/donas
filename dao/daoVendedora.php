<?php
require_once "global.php";

class daoVendedora
{

    public static function cadastrar($Vendedora)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbVendedora(nomeVendedora, emailVendedora, senhaVendedora, dtNascVendedora, statusVendedora, nomeNegocioVendedora,
                            nomeUsuarioNegocioVendedora, bioNegocioVendedora, logNegocioVendedora, cidadeNegocioVendedora, estadoNegocioVendedora,
                            bairroNegocioVendedora, numNegocioVendedora, compNegocioVendedora, cepNegocioVendedora, cnpjNegocioVendedora,
                            nivelNegocioVendedora, telefoneNegocioVendedora, idCategoria)
                            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindvalue(1, $Vendedora->getNomeVendedora());
        $prepareStatement->bindvalue(2, $Vendedora->getEmailVendedora());
        $prepareStatement->bindvalue(3, $Vendedora->getSenhaVendedora());
        $prepareStatement->bindvalue(4, $Vendedora->getDtNascVendedora());
        $prepareStatement->bindvalue(5, $Vendedora->getStatusVendedora());
        $prepareStatement->bindvalue(6, $Vendedora->getNomeNegocioVendedora());
        $prepareStatement->bindvalue(7, $Vendedora->getNomeUsuarioNegocioVendedora());
        $prepareStatement->bindvalue(8, $Vendedora->getBioNegocioVendedora());
        $prepareStatement->bindvalue(9, $Vendedora->getLogNegocioVendedora());
        $prepareStatement->bindvalue(10, $Vendedora->getCidadeNegocioVendedora());
        $prepareStatement->bindvalue(11, $Vendedora->getEstadoNegocioVendedora());
        $prepareStatement->bindvalue(12, $Vendedora->getBairroNegocioVendedora());
        $prepareStatement->bindvalue(13, $Vendedora->getNumNegocioVendedora());
        $prepareStatement->bindvalue(14, $Vendedora->getCompNegocioVendedora());
        $prepareStatement->bindvalue(15, $Vendedora->getCepNegocioVendedora());
        $prepareStatement->bindvalue(16, $Vendedora->getCnpjNegocioVendedora());
        $prepareStatement->bindvalue(17, $Vendedora->getNivelNegocioVendedora());
        $prepareStatement->bindvalue(18, $Vendedora->getTelefoneNegocioVendedora());
        $prepareStatement->bindvalue(19, $Vendedora->getCategoria()->getIdCategoria());

        $prepareStatement->execute();
    }

    public static function deletar($Vendedora)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE FROM tbVendedora WHERE idVendedora = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindvalue(1, $Vendedora->getIdVendedora());

        $prepareStatement->execute();
    }

    public static function editarVendedora($Vendedora)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbVendedora
                            SET nomeVendedora = ?, emailVendedora = ?, senhaVendedora = ?, dtNascVendedora = ?, statusVendedora = ?
                            WHERE idVendedora = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindvalue(1, $Vendedora->getNomeVendedora());
        $prepareStatement->bindvalue(2, $Vendedora->getEmailVendedora());
        $prepareStatement->bindvalue(3, $Vendedora->getSenhaVendedora());
        $prepareStatement->bindvalue(4, $Vendedora->getDtNascVendedora());
        $prepareStatement->bindvalue(5, $Vendedora->getStatusVendedora());

        $prepareStatement->bindValue(6, $Vendedora->getIdVendedora());
        $prepareStatement->execute();
    }

    public static function editarNegocio($Vendedora)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbVendedora
                            SET nomeNegocioVendedora = ?,
                            nomeUsuarioNegocioVendedora = ?, bioNegocioVendedora = ?, logNegocioVendedora = ?, cidadeNegocioVendedora = ?, estadoNegocioVendedora = ?,
                            bairroNegocioVendedora = ?, numNegocioVendedora = ?, compNegocioVendedora = ?, cepNegocioVendedora = ?, cnpjNegocioVendedora = ?,
                            nivelNegocioVendedora = ?, telefoneNegocioVendedora = ?, idCategoria = ?
                            WHERE idVendedora = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindvalue(1, $Vendedora->getNomeNegocioVendedora());
        $prepareStatement->bindvalue(2, $Vendedora->getNomeUsuarioNegocioVendedora());
        $prepareStatement->bindvalue(3, $Vendedora->geBioNegocioVendedora());
        $prepareStatement->bindvalue(4, $Vendedora->getLogNegocioVendedora());
        $prepareStatement->bindvalue(5, $Vendedora->getCidadeNegocioVendedora());
        $prepareStatement->bindvalue(6, $Vendedora->getEstadoNegocioVendedora());
        $prepareStatement->bindvalue(7, $Vendedora->getBairroNegocioVendedora());
        $prepareStatement->bindvalue(8, $Vendedora->getNumNegocioVendedora());
        $prepareStatement->bindvalue(9, $Vendedora->getCompNegocioVendedora());
        $prepareStatement->bindvalue(10, $Vendedora->getCepNegocioVendedora());
        $prepareStatement->bindvalue(11, $Vendedora->getCnpjNegocioVendedora());
        $prepareStatement->bindvalue(12, $Vendedora->getNivelNegocioVendedora());
        $prepareStatement->bindvalue(13, $Vendedora->getTelefoneNegocioVendedora());
        $prepareStatement->bindvalue(14, $Vendedora->getCategoria()->getIdCategoria());

        $prepareStatement->bindValue(15, $Vendedora->getIdVendedora());

        $prepareStatement->execute();
    }

    public static function editarFoto($Vendedora)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbVendedora
                            SET fotoVendedora = ?
                            WHERE idVendedora = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Vendedora->getFotoVendedora());
        $prepareStatement->bindValue(2, $Vendedora->getIdVendedora());

        $prepareStatement->execute();
    }

    public static function editarFotoNegocio($Vendedora)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbVendedora
                            SET fotoNegocioVendedora = ?
                            WHERE idVendedora = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Vendedora->getFotoNegocioVendedora());
        $prepareStatement->bindValue(2, $Vendedora->getIdVendedora());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbVendedora";
        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarRevisao()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT *, nomeCategoria FROM tbVendedora
                        INNER JOIN tbCategoria ON tbVendedora.idCategoria = tbCategoria.idCategoria
                        WHERE statusVendedora = 0";
        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function consultarIdPorEmail($Vendedora)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT idVendedora FROM tbVendedora
                            WHERE emailVendedora = ?');
        $stmt->bindValue(1, $Vendedora->getEmailVendedora());
        $stmt->execute();
        $id = $stmt->fetch()[0];

        return $id;
    }

    public static function consultarIdPorNomeUsuario($Vendedora)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT idVendedora FROM tbVendedora
                            WHERE nomeUsuarioNegocioVendedora = ?');
        $stmt->bindValue(1, $Vendedora->getNomeUsuarioNegocioVendedora());
        $stmt->execute();
        $id = $stmt->fetch()[0];

        return $id;
    }

    public static function consultarPorNomeUsuario($Vendedora)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT * FROM tbVendedora
                            WHERE nomeUsuarioNegocioVendedora = ?');
        $stmt->bindValue(1, $Vendedora->getNomeUsuarioNegocioVendedora());
        $stmt->execute();
        $dados = $stmt->fetch();

        return $dados;
    }

    public static function verificaLogin($Vendedora)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT COUNT(idVendedora) FROM tbVendedora
                            WHERE emailVendedora = ? AND senhaVendedora = ?');
        $stmt->bindValue(1, $Vendedora->getEmailVendedora());
        $stmt->bindValue(2, $Vendedora->getSenhaVendedora());
        $stmt->execute();

        $count = $stmt->fetch()[0];

        return $count;
    }

    public static function consultaStatus($Vendedora)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT statusVendedora FROM tbVendedora
                            WHERE emailVendedora = ? AND senhaVendedora = ?');
        $stmt->bindValue(1, $Vendedora->getEmailVendedora());
        $stmt->bindValue(2, $Vendedora->getSenhaVendedora());
        $stmt->execute();

        $status = $stmt->fetch()[0];

        return $status;
    }

    public static function consultaLogin($Vendedora)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT idVendedora, nomeVendedora, emailVendedora, fotoVendedora, senhaVendedora, dtNascVendedora, statusVendedora, nomeNegocioVendedora,
                                    nomeUsuarioNegocioVendedora, bioNegocioVendedora, fotoNegocioVendedora, logNegocioVendedora, cidadeNegocioVendedora, estadoNegocioVendedora,
                                    bairroNegocioVendedora, numNegocioVendedora, compNegocioVendedora, cepNegocioVendedora, cnpjNegocioVendedora,
                                    nivelNegocioVendedora, telefoneNegocioVendedora, idCategoria FROM tbVendedora
                                    WHERE emailVendedora = ? AND senhaVendedora = ?');
        $stmt->bindValue(1, $Vendedora->getEmailVendedora());
        $stmt->bindValue(2, $Vendedora->getSenhaVendedora());
        $stmt->execute();

        $dados = $stmt->fetchAll();

        $n = count($dados);
        if ($n == 1)
            return $dados[0];
        else
            return 0;
    }

    public static function verificaCnpj($cnpj)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idVendedora) FROM tbVendedora WHERE cnpjNegocioVendedora LIKE ?");
        $stmt->bindValue(1, $cnpj);
        $stmt->execute();

        $count = $stmt->fetch()[0];

        return $count;
    }
    public static function verificaEmail($email)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idVendedora) FROM tbVendedora WHERE emailVendedora LIKE ?");
        $stmt->bindValue(1, $email);
        $stmt->execute();

        $count = $stmt->fetch()[0];

        return $count;
    }
    public static function verificaNomeUsuario($username)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idVendedora) FROM tbVendedora WHERE nomeUsuarioNegocioVendedora LIKE ?");
        $stmt->bindValue(1, $username);
        $stmt->execute();

        $count = $stmt->fetch()[0];

        return $count;
    }

    public static function pesquisaVendedora($search)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT nomeNegocioVendedora as name, fotoNegocioVendedora as foto, nomeUsuarioNegocioVendedora as username FROM tbVendedora
                                    WHERE nomeUsuarioNegocioVendedora LIKE ? OR nomeNegocioVendedora LIKE ?
                                    LIMIT 5");
        $stmt->bindValue(1, '%' . $search . '%');
        $stmt->bindValue(2, '%' . $search . '%');
        $stmt->execute();

        $dados = $stmt->fetchAll();

        return $dados;
    }

    public static function contarVendedora($Vendedora)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idVendedora) FROM tbVendedora");
        $stmt->execute();

        $countVendedora = $stmt->fetchAll();

        return $countVendedora;
    }

    public static function contarVendBloq($Vendedora)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idVendedora) FROM tbVendedora WHERE statusVendedora = 2");
        $stmt->execute();

        $countVendBloq = $stmt->fetchAll();

        return $countVendBloq;
    }

    public static function permitirVendedora($Vendedora)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("UPDATE tbVendedora
                                    SET statusVendedora = 1
                                    WHERE idVendedora = ?");
        $stmt->bindValue(1, $Vendedora->getIdVendedora());
        $stmt->execute();

        $countVendBloq = $stmt->fetchAll();

        return $countVendBloq;
    }

    public static function topVendedoras($Vendedora)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT nomeVendedora, fotoVendedora, nomeNegocioVendedora, fotoNegocioVendedora, COUNT(idEncomenda) FROM tbVendedora
                                     INNER JOIN tbAnuncio
                                     ON tbVendedora.idVendedora = tbAnuncio.idVendedora
                                     INNER JOIN tbEncomenda
                                     ON tbAnuncio.idAnuncio = tbEncomenda.idAnuncio
                                     ORDER BY COUNT(idEncomenda)");
        $stmt->execute();

        $topVend = $stmt->fetchAll();

        return $topVend;
    }

    public static function qtdVendas($Vendedora)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idEncomenda) FROM tbEncomenda");
        $stmt->execute();

        $topVend = $stmt->fetchAll();

        return $topVend;
    }
}
