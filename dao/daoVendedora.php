<?php
require_once "global.php";

class daoVendedora
{

    public static function cadastrar($Vendedora)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbVendedora(nomeVendedora, emailVendedora, senhaVendedora, dtNascVendedora, statusVendedora, nomeNegocioVendedora,
                            nomeUsuarioNegocioVendedora, logNegocioVendedora, cidadeNegocioVendedora, estadoNegocioVendedora,
                            bairroNegocioVendedora, numNegocioVendedora, compNegocioVendedora, cepNegocioVendedora, cnpjNegocioVendedora,
                            nivelNegocioVendedora, idCategoria)
                            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindvalue(1, $Vendedora->getNomeVendedora());
        $prepareStatement->bindvalue(2, $Vendedora->getEmailVendedora());
        $prepareStatement->bindvalue(3, $Vendedora->getSenhaVendedora());
        $prepareStatement->bindvalue(4, $Vendedora->getDtNascVendedora());
        $prepareStatement->bindvalue(5, $Vendedora->getStatusVendedora());
        $prepareStatement->bindvalue(6, $Vendedora->getNomeNegocioVendedora());
        $prepareStatement->bindvalue(7, $Vendedora->getNomeUsuarioNegocioVendedora());
        $prepareStatement->bindvalue(8, $Vendedora->getLogNegocioVendedora());
        $prepareStatement->bindvalue(9, $Vendedora->getCidadeNegocioVendedora());
        $prepareStatement->bindvalue(10, $Vendedora->getEstadoNegocioVendedora());
        $prepareStatement->bindvalue(11, $Vendedora->getBairroNegocioVendedora());
        $prepareStatement->bindvalue(12, $Vendedora->getNumNegocioVendedora());
        $prepareStatement->bindvalue(13, $Vendedora->getCompNegocioVendedora());
        $prepareStatement->bindvalue(14, $Vendedora->getCepNegocioVendedora());
        $prepareStatement->bindvalue(15, $Vendedora->getCnpjNegocioVendedora());
        $prepareStatement->bindvalue(16, $Vendedora->getNivelNegocioVendedora());
        $prepareStatement->bindvalue(17, $Vendedora->getCategoria()->getIdCategoria());

        $prepareStatement->execute();
    }

    public static function deletar($Vendedora)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE tbVendedora WHERE idVendedora = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindvalue(1, $Vendedora->getIdVendedora());

        $prepareStatement->execute();
    }

    public static function editar($Vendedora)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbVendedora
                            SET nomeVendedora = ?, emailVendedora = ?, senhaVendedora = ?, dtNascVendedora = ?, statusVendedora = ?, nomeNegocioVendedora = ?,
                            nomeUsuarioNegocioVendedora = ?, logNegocioVendedora = ?, cidadeNegocioVendedora = ?, estadoNegocioVendedora = ?,
                            bairroNegocioVendedora = ?, numNegocioVendedora = ?, compNegocioVendedora = ?, cepNegocioVendedora = ?, cnpjNegocioVendedora = ?,
                            nivelNegocioVendedora = ?, idCategoria = ?
                            WHERE idVendedora = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindvalue(1, $Vendedora->getNomeVendedora());
        $prepareStatement->bindvalue(2, $Vendedora->getEmailVendedora());
        $prepareStatement->bindvalue(3, $Vendedora->getSenhaVendedora());
        $prepareStatement->bindvalue(4, $Vendedora->getDtNascVendedora());
        $prepareStatement->bindvalue(5, $Vendedora->getStatusVendedora());
        $prepareStatement->bindvalue(6, $Vendedora->getNomeNegocioVendedora());
        $prepareStatement->bindvalue(7, $Vendedora->getNomeUsuarioNegocioVendedora());
        $prepareStatement->bindvalue(8, $Vendedora->getLogNegocioVendedora());
        $prepareStatement->bindvalue(9, $Vendedora->getCidadeNegocioVendedora());
        $prepareStatement->bindvalue(10, $Vendedora->getEstadoNegocioVendedora());
        $prepareStatement->bindvalue(11, $Vendedora->getBairroNegocioVendedora());
        $prepareStatement->bindvalue(12, $Vendedora->getNumNegocioVendedora());
        $prepareStatement->bindvalue(13, $Vendedora->getCompNegocioVendedora());
        $prepareStatement->bindvalue(14, $Vendedora->getCepNegocioVendedora());
        $prepareStatement->bindvalue(15, $Vendedora->getCnpjNegocioVendedora());
        $prepareStatement->bindvalue(16, $Vendedora->getNivelNegocioVendedora());
        $prepareStatement->bindvalue(17, $Vendedora->getCategoria()->getIdCategoria());

        $prepareStatement->bindValue(18, $Vendedora->getIdVendedora());

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

    public static function consultaStatus($Vendedora){
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

        $stmt = $connection->prepare('SELECT idVendedora, nomeVendedora, emailVendedora, senhaVendedora, dtNascVendedora, statusVendedora, nomeNegocioVendedora,
                                    nomeUsuarioNegocioVendedora, fotoNegocioVendedora, logNegocioVendedora, cidadeNegocioVendedora, estadoNegocioVendedora,
                                    bairroNegocioVendedora, numNegocioVendedora, compNegocioVendedora, cepNegocioVendedora, cnpjNegocioVendedora,
                                    nivelNegocioVendedora, idCategoria FROM tbVendedora
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
        $stmt->bindValue(1, '%'.$search.'%');
        $stmt->bindValue(2, '%'.$search.'%');
        $stmt->execute();

        $dados = $stmt->fetchAll();

        return $dados;
    }
}
