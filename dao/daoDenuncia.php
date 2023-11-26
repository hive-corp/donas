<?php
require_once "global.php";

class daoDenuncia
{

    public static function cadastrar($Denuncia)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbDenuncia(motivoDenuncia, descricaoDenuncia, idCliente, idVendedora)
                            VALUES (?, ?, ?, ?)";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $Denuncia->getMotivoDenuncia());
        $prepareStatement->bindValue(2, $Denuncia->getDescricaoDenuncia());
        $prepareStatement->bindValue(3, $Denuncia->getCliente()->getIdCliente());
        $prepareStatement->bindValue(4, $Denuncia->getVendedora()->getIdVendedora());

        $prepareStatement->execute();
    }

    public static function deletar($Denuncia)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE FROM tbDenuncia WHERE idDenuncia = ?";
        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $Denuncia->getIdDenuncia());

        $prepareStatement->execute();
    }

    public static function editar($Denuncia)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbDenuncia
                            SET nomeCategoria = ?, descricaoDenuncia = ?, idCliente = ?, idVendedora = ?
                            WHERE idCategoria = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Denuncia->getNomeCategoria());
        $prepareStatement->bindValue(2, $Denuncia->getDescricaoDenuncia());
        $prepareStatement->bindValue(3, $Denuncia->getCliente()->getIdCliente());
        $prepareStatement->bindValue(4, $Denuncia->getVendedora()->getIdVendedora());
        $prepareStatement->bindValue(5, $Denuncia->getIdDenuncia());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT d.*, c.fotoCliente, c.nomeCliente, c.emailCliente, v.fotoVendedora, v.nomeVendedora, v.nomeNegocioVendedora, d.motivoDenuncia, d.dataDenuncia, d.descricaoDenuncia, d.visualizadoDenuncia
                    FROM tbdenuncia d
                    LEFT JOIN tbCliente c ON d.idCliente = c.idCliente
                    LEFT JOIN tbVendedora v ON d.idVendedora = v.idVendedora";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    //Consulta das informações da denuncia na pagina ver-mais-den.php
    public static function obterPorId($idDenuncia)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT d.*, c.fotoCliente, c.nomeCliente, c.emailCliente, c.statusConta, v.fotoVendedora, v.nomeVendedora, v.nomeNegocioVendedora,
         d.idVendedora, v.statusVendedora, d.motivoDenuncia, d.dataDenuncia, d.descricaoDenuncia, d.visualizadoDenuncia
                    FROM tbdenuncia d
                    LEFT JOIN tbCliente c ON d.idCliente = c.idCliente
                    LEFT JOIN tbVendedora v ON d.idVendedora = v.idVendedora
                    WHERE d.idDenuncia = :idDenuncia";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindParam(':idDenuncia', $idDenuncia, PDO::PARAM_INT);
        $resultado->execute();
        $denuncia = $resultado->fetch(PDO::FETCH_ASSOC);
        return $denuncia;
    }





    public static function consultaDenuncia($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbDenuncia WHERE idDenuncia = ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);
        $resultado->execute();

        $dados = $resultado->fetch();
        return $dados;
    }

    public static function consultaUltimaDenunciaCliente($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT MAX(idDenuncia) as id FROM tbDenuncia WHERE idCliente = ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);
        $resultado->execute();

        $dados = $resultado->fetch()[0];
        return $dados;
    }

    public static function contarDenuncia()
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idDenuncia) FROM tbDenuncia");
        $stmt->execute();

        $countCliente = $stmt->fetch()[0];

        return $countCliente;
    }

    //Listar as duas ultimas denuncias para a dashboard
    public static function listarUltimasDuas()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT d.*, c.fotoCliente, c.nomeCliente, c.emailCliente, v.fotoVendedora, v.nomeVendedora, v.nomeNegocioVendedora, d.idVendedora, d.motivoDenuncia, d.dataDenuncia, d.descricaoDenuncia
                    FROM tbdenuncia d
                    LEFT JOIN tbCliente c ON d.idCliente = c.idCliente
                    LEFT JOIN tbVendedora v ON d.idVendedora = v.idVendedora
                    ORDER BY d.idDenuncia DESC
                    LIMIT 2";

        $resultado = $connection->query($querySelect);
        $denuncias = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $denuncias;
    }

    //Grafico de denuncias percentual por motivo das denuncias
    public static function graficoDenuncias()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT 
                        d.motivoDenuncia,
                        COUNT(d.idDenuncia) as quantidade,
                        COUNT(d.idDenuncia) / (SELECT COUNT(*) FROM tbdenuncia) * 100 as percentual
                    FROM tbdenuncia d
                    GROUP BY d.motivoDenuncia";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $denuncias = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $connection = null;

        return $denuncias;
    }

    public static function consultarStatus($denuncia)
    {
        $connection = Conexao::conectar();

        // Verifica o status atual da vendedora
        $stmt = $connection->prepare('SELECT visualizadoDenuncia FROM tbdenuncia WHERE idDenuncia = ?');
        $stmt->bindValue(1, $denuncia->getIdDenuncia()); // Corrigido para usar $denuncia->getIdConta()
        $stmt->execute();

        return $stmt->fetchColumn();
    }
    public static function alterarStatus($denuncia)
    {
        $connection = Conexao::conectar();

        // Altera o status da vendedora
        $stmt = $connection->prepare('UPDATE tbdenuncia SET visualizadoDenuncia = ? WHERE idDenuncia = ?');
        $stmt->bindValue(1, $denuncia->getVisualizadoDenuncia());
        $stmt->bindValue(2, $denuncia->getIdDenuncia());
        $stmt->execute();
    }

}
