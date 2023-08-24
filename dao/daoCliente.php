<?php
require_once "global.php";

class daoCliente
{

    public static function cadastrar($Cliente)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbCliente(nomeCliente, nomeUsuarioCliente, emailCliente, senhaCliente, dtNascCliente, cidadeCliente, estadoCliente, logradouroCliente, bairroCliente, numeroCliente, complementoCliente, cepCliente, cpfCliente)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

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
        $prepareStatement->bindvalue(13, $Cliente->getCpfCliente());

        $prepareStatement->execute();
    }

    public static function deletar($Cliente)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE tbCliente WHERE idCliente = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindvalue(1, $Cliente->getIdCliente());

        $prepareStatement->execute();
    }

    public static function editar($Cliente)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbCliente
                            SET nomeCliente = ?, nomeUsuarioCliente = ?, emailCliente = ?, senhaCliente = ?, dtNascCliente = ?, cidadeCliente = ?, estadoCliente = ?, logradouroCliente = ?, bairroCliente = ?, numeroCliente = ?, complementoCliente = ?, cepCliente = ?, cpfCliente = ?,
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

    public static function editarFoto($Cliente)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbCliente
                            SET fotoCliente = ?
                            WHERE idCliente = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Cliente->getFotoCliente());
        $prepareStatement->bindValue(2, $Cliente->getIdCliente());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbCliente";
        $resultado = $connection->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function consultarIdPorEmail($cliente)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT idCliente FROM tbCliente
                            WHERE emailCliente = ?');
        $stmt->bindValue(1, $cliente->getEmailCliente());
        $stmt->execute();
        $id = $stmt->fetch()[0];

        return $id;
    }

    public static function verificaLogin($cliente)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT COUNT(idCliente) FROM tbCliente
                            WHERE emailCliente = ? AND senhaCliente = ?');
        $stmt->bindValue(1, $cliente->getEmailCliente());
        $stmt->bindValue(2, $cliente->getSenhaCliente());
        $stmt->execute();

        $count = $stmt->fetch()[0];

        return $count;
    }

    public static function consultaLogin($cliente)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT idCliente, nomeCliente, nomeUsuarioCliente, emailCliente, senhaCliente,
                                    dtNascCliente, fotoCliente, cidadeCliente, estadoCliente, logradouroCliente, bairroCliente, numeroCliente,
                                    complementoCliente, cepCliente, cpfCliente FROM tbCliente
                                    WHERE emailCliente = ? AND senhaCliente = ?');
        $stmt->bindValue(1, $cliente->getEmailCliente());
        $stmt->bindValue(2, $cliente->getSenhaCliente());
        $stmt->execute();

        $dados = $stmt->fetchAll();

        $n = count($dados);
        if ($n == 1)
            return $dados[0];
        else
            return 0;
    }

    public static function verificaCpf($cpf)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idCliente) FROM tbCliente WHERE cpfCliente LIKE ?");
        $stmt->bindValue(1, $cpf);
        $stmt->execute();

        $count = $stmt->fetch()[0];

        return $count;
    }
    public static function verificaEmail($email)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idCliente) FROM tbCliente WHERE emailCliente LIKE ?");
        $stmt->bindValue(1, $email);
        $stmt->execute();

        $count = $stmt->fetch()[0];

        return $count;
    }
    public static function verificaNomeUsuario($username)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idCliente) FROM tbCliente WHERE nomeUsuarioCliente LIKE ?");
        $stmt->bindValue(1, $username);
        $stmt->execute();

        $count = $stmt->fetch()[0];

        return $count;
    }
}
