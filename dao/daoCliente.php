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

        $queryInsert = "DELETE FROM tbCliente WHERE idCliente = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindvalue(1, $Cliente->getIdCliente());

        $prepareStatement->execute();
    }

    public static function editar($Cliente)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbCliente
                            SET nomeCliente = ?,
                            nomeUsuarioCliente = ?,
                            emailCliente = ?,
                            senhaCliente = ?,
                            dtNascCliente = ?,
                            cidadeCliente = ?,
                            estadoCliente = ?,
                            logradouroCliente = ?,
                            bairroCliente = ?,
                            numeroCliente = ?,
                            complementoCliente = ?,
                            cepCliente = ?,
                            cpfCliente = ?
                            WHERE idCliente = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Cliente->getNomeCliente());
        $prepareStatement->bindValue(2, $Cliente->getNomeUsuarioCliente());
        $prepareStatement->bindValue(3, $Cliente->getEmailCliente());
        $prepareStatement->bindValue(4, $Cliente->getSenhaCliente());
        $prepareStatement->bindValue(5, $Cliente->getDtNascCliente());
        $prepareStatement->bindValue(6, $Cliente->getCidadeCliente());
        $prepareStatement->bindValue(7, $Cliente->getEstadoCliente());
        $prepareStatement->bindValue(8, $Cliente->getLogradouroCliente());
        $prepareStatement->bindValue(9, $Cliente->getBairroCliente());
        $prepareStatement->bindValue(10, $Cliente->getNumeroCliente());
        $prepareStatement->bindValue(11, $Cliente->getComplementoCliente());
        $prepareStatement->bindValue(12, $Cliente->getCepCliente());
        $prepareStatement->bindValue(13, $Cliente->getCpfCliente());
        $prepareStatement->bindValue(14, $Cliente->getIdCliente());

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
        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function mudarStatusConta($statusConta)
    {
        $connection = Conexao::conectar();
    
        $queryInsert = "UPDATE tbCliente
                        SET statusConta = ?
                        WHERE idCliente = ?";  
    
        $prepareStatement = $connection->prepare($queryInsert);
    
        $prepareStatement->bindValue(1, $statusConta->getStatusConta());
        $prepareStatement->bindValue(2, $statusConta->getIdCliente()); 
    
        $prepareStatement->execute();
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

    public static function consultarIdPorNomeUsuario($cliente)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT idCliente FROM tbCliente
                                    WHERE nomeUsuarioCliente = ?
                                    LIMIT 1');
        $stmt->bindValue(1, $cliente->getNomeUsuarioCliente());
        $stmt->execute();
        $id = $stmt->fetch()[0];

        return $id;
    }

    public static function consultarPorNomeUsuario($cliente)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT * FROM tbCliente
                            WHERE nomeUsuarioCliente = ?');
        $stmt->bindValue(1, $cliente->getNomeUsuarioCliente());
        $stmt->execute();
        $dados = $stmt->fetch();

        return $dados;
    }

    public static function consultarPorEmail($cliente)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT * FROM tbCliente
                            WHERE emailCliente = ?');
        $stmt->bindValue(1, $cliente->getEmailCliente());
        $stmt->execute();
        $dados = $stmt->fetch();

        return $dados;
    }

    public static function verificaLogin($cliente)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT COUNT(idCliente) FROM tbCliente
                            WHERE emailCliente = ?');
        $stmt->bindValue(1, $cliente->getEmailCliente());
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

    public static function pesquisaCliente($search)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT nomeCliente as name, fotoCliente as foto, nomeUsuarioCliente as username FROM tbCliente
                                    WHERE nomeUsuarioCliente LIKE ? OR nomeCliente LIKE ?
                                    LIMIT 5");
        $stmt->bindValue(1, '%'.$search.'%');
        $stmt->bindValue(2, '%'.$search.'%');
        $stmt->execute();

        $dados = $stmt->fetchAll();

        return $dados;
    }

    public static function contarCliente()
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idCliente) FROM tbCliente");
        $stmt->execute();

        $countCliente = $stmt->fetch()[0];

        return $countCliente;
    }

    public static function consultaStatus($cliente)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT statusConta FROM tbcliente
                            WHERE emailCliente = ?');
        $stmt->bindValue(1, $cliente->getEmailCliente());
        $stmt->execute();

        $status = $stmt->fetch()[0];

        return $status;
    }
    public static function consultarStatus($cliente) {
        $connection = Conexao::conectar();
    
        // Verifica o status atual da vendedora
        $stmt = $connection->prepare('SELECT statusConta FROM tbcliente WHERE idCliente = ?');
        $stmt->bindValue(1, $cliente->getIdCliente()); // Corrigido para usar $vendedora->getIdConta()
        $stmt->execute();
    
        return $stmt->fetchColumn();
    }
public static function alterarStatus($cliente)
    {
        $connection = Conexao::conectar();
    
        // Altera o status da vendedora
        $stmt = $connection->prepare('UPDATE tbcliente SET statusConta = ? WHERE idCliente = ?');
        $stmt->bindValue(1, $cliente->getStatusConta());
        $stmt->bindValue(2, $cliente->getIdCliente());

        if (!$stmt->execute()) {
            echo json_encode(['error' => $stmt->errorInfo()]);
        }
    }
    public static function contarCliBloq()
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idCliente) FROM tbcliente WHERE statusConta = 0");
        $stmt->execute();

        $countVendBloq = $stmt->fetch()[0];

        return $countVendBloq;
    }
}
