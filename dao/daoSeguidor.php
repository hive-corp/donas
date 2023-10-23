require_once "global.php";

class daoSeguidor
{

    public static function cadastrar($Seguidor)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbSeguidor(idCliente, idVendedora)
            VALUES (?, ?)";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindvalue(1, $Seguidor->getCliente()->getIdCliente());
        $prepareStatement->bindvalue(2, $Seguidor->getVendedora()->getIdVendedora());

        $prepareStatement->execute();
    }

    public static function deletar($Seguidor)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE tbSeguidor WHERE idSeguidor = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindvalue(1, $Seguidor->getIdSeguidor());

        $prepareStatement->execute();
    }

    public static function editar($Seguidor)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbSeguidor
                            SET idCliente = ?, idVendedora = ?
                            WHERE idSeguidor = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Seguidor->getCliente()->getIdCliente());
        $prepareStatement->bindValue(2, $Seguidor->getVendedora()->getIdVendedora());
        $prepareStatement->bindValue(3, $Seguidor->getIdSeguidor());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbSeguidor

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }
