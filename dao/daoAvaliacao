require_once "global.php";

class daoAvaliacao
{

    public static function cadastrar($Avaliacao)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbAvaliacao(conteudoAvaliacao, estrelasAvaliacao, idAnuncio, isCliente)
            VALUES (?, ?, ?, ?)";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindvalue(1, $Avaliacao->getConteudoAvaliacao());
        $prepareStatement->bindvalue(2, $Avaliacao->getEstrelasAvaliacao());
        $prepareStatement->bindvalue(3, $Avaliacao->getAnuncio()->getIdAnuncio());
        $prepareStatement->bindvalue(3, $Avaliacao->getCliente()->getIdCliente());

        $prepareStatement->execute();
    }

    public static function deletar($Avaliacao)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE tbAvaliacao WHERE idAvaliacao = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindvalue(1, $Avaliacao->getIdAvaliacao());

        $prepareStatement->execute();
    }

    public static function editar($Avaliacao)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbAvaliacao
                            SET conteudoAvaliacao = ?, estrelasAvaliacao = ?, idAnuncio = ?, isCliente = ?, 
                            WHERE idAvaliacao = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Avaliacao->getConteudoAvaliacao());
        $prepareStatement->bindValue(2, $Avaliacao->getEstrelasAvaliacao());
        $prepareStatement->bindValue(6, $Avaliacao->getAnuncio()->getIdAnuncio());
        $prepareStatement->bindValue(6, $Avaliacao->getCliente()->getIdCliente());
        $prepareStatement->bindValue(7, $Avaliacao->getIdAvaliacao());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT *, nomeCliente, fotoCliente FROM tbAvaliacao
                        INNER JOIN tbCliente ON tbCliente.idCliente = tbAvaliacao.idCliente";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }
