<?php
require_once "global.php";

class daoMensagem
{

    public static function criar($Mensagem)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbMensagem(conteudoMensagem,
                            origemMensagem, idCliente, idVendedora)
                            VALUES (?,?,?,?)";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Mensagem->getConteudoMensagem());
        $prepareStatement->bindValue(2, $Mensagem->getOrigemMensagem());
        $prepareStatement->bindValue(3, $Mensagem->getCliente()->getIdCliente());
        $prepareStatement->bindValue(4, $Mensagem->getVendedora()->getIdVendedora());

        $prepareStatement->execute();
    }

    public static function deletar($Mensagem)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE tbMensagem WHERE idMensagem = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Mensagem->getIdMensagem());

        $prepareStatement->execute();
    }

    public static function editar($Mensagem)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbMensagem
                            SET conteudoMensagem = ?, imagemMensagem = ?, horaMensagem = ?, 
                            lidoEmMensagem = ?, origemMensagem = ?, idCliente = ?, idVendedora = ?
                            WHERE idMensagem = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Mensagem->getConteudoMensagem());
        $prepareStatement->bindValue(2, $Mensagem->getImagemMensagem());
        $prepareStatement->bindValue(3, $Mensagem->getHoraMensagem());
        $prepareStatement->bindValue(4, $Mensagem->getLidoEmMensagem());
        $prepareStatement->bindValue(5, $Mensagem->getOrigemMensagem());
        $prepareStatement->bindValue(6, $Mensagem->getCliente()->getIdCliente());
        $prepareStatement->bindValue(7, $Mensagem->getVendedora()->getIdVendedora());
        $prepareStatement->bindValue(8, $Mensagem->getIdMensagem());

        $prepareStatement->execute();
    }

    public static function editarFoto($Mensagem)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbMensagem
                            SET imagemMensagem = ?
                            WHERE idMensagem = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Mensagem->getImagemMensagem());
        $prepareStatement->bindValue(2, $Mensagem->getIdMensagem());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbMensagem";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarConversa($conversa)
    {
        $connection = Conexao::conectar();

        $querySelect = 'SELECT conteudoMensagem, imagemMensagem, TIME_FORMAT(horaMensagem, "%H:%i") as horaMensagem, lidoEmMensagem, origemMensagem FROM tbMensagem
                            WHERE idCliente = ? AND idVendedora = ?';

        $prepareStatement = $connection->prepare($querySelect);
        $prepareStatement->bindValue(1, $conversa->getCliente()->getIdCliente());
        $prepareStatement->bindValue(2, $conversa->getVendedora()->getIdVendedora());
        $prepareStatement->execute();

        $lista = $prepareStatement->fetchAll();

        return $lista;
    }

    public static function listarConversasCliente($conversas)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT DISTINCT tbVendedora.idVendedora as id, nomeNegocioVendedora as name, fotoNegocioVendedora as foto, nomeUsuarioNegocioVendedora as username FROM tbMensagem
                            INNER JOIN tbVendedora ON tbMensagem.idVendedora = tbVendedora.idVendedora
                            WHERE idCliente=?";

        $prepareStatement = $connection->prepare($querySelect);
        $prepareStatement->bindValue(1, $conversas->getCliente()->getIdCliente());
        $prepareStatement->execute();

        $lista = array();

        while ($linha = $prepareStatement->fetch(PDO::FETCH_ASSOC)) {

            $prepareStatementMessage = $connection->prepare("SELECT conteudoMensagem as ultimaMensagem, imagemMensagem, origemMensagem as remetente FROM tbMensagem
                            WHERE idCliente = ? AND idVendedora = ?
                            ORDER BY idMensagem desc
                            LIMIT 1");

            $prepareStatementMessage->bindValue(1, $conversas->getCliente()->getIdCliente());
            $prepareStatementMessage->bindValue(2, $linha['id']);
            $prepareStatementMessage->execute();

            $consulta = $prepareStatementMessage->fetch(PDO::FETCH_ASSOC);

            $ultimaMensagem = !empty($consulta['ultimaMensagem']) ? $consulta['ultimaMensagem'] : '';
            $ultimaMensagem = !empty($consulta['imagemMensagem']) ? 'imagem' : $ultimaMensagem;
            $origem = $consulta['remetente'];

            $dados = [
                'ultimaMensagem' => $ultimaMensagem,
                'remetente' => $origem
            ];

            $linha = array_merge($linha, $dados);

            $lista[] = $linha;
        }

        return $lista;
    }

    public static function listarConversasVendedora($conversas)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT DISTINCT tbCliente.idCliente as id, nomeCliente as name, fotoCliente as foto, nomeUsuarioCliente as username FROM tbMensagem
                            INNER JOIN tbCliente ON tbCliente.idCliente = tbCliente.idCliente
                            WHERE idVendedora=?";

        $prepareStatement = $connection->prepare($querySelect);
        $prepareStatement->bindValue(1, $conversas->getVendedora()->getIdVendedora());
        $prepareStatement->execute();

        $lista = array();

        while ($linha = $prepareStatement->fetch(PDO::FETCH_ASSOC)) {

            $prepareStatementMessage = $connection->prepare("SELECT conteudoMensagem as ultimaMensagem, imagemMensagem, origemMensagem as remetente FROM tbMensagem
                            WHERE idVendedora = ? AND idCliente = ?
                            ORDER BY idMensagem desc
                            LIMIT 1");

            $prepareStatementMessage->bindValue(1, $conversas->getVendedora()->getIdVendedora());
            $prepareStatementMessage->bindValue(2, $linha['id']);
            $prepareStatementMessage->execute();

            $consulta = $prepareStatementMessage->fetch(PDO::FETCH_ASSOC);

            $ultimaMensagem = !empty($consulta['ultimaMensagem']) ? $consulta['ultimaMensagem'] : '';
            $ultimaMensagem = !empty($consulta['imagemMensagem']) ? 'imagem' : $ultimaMensagem;
            $origem = $consulta['remetente'];

            $dados = [
                'ultimaMensagem' => $ultimaMensagem,
                'remetente' => $origem
            ];

            $linha = array_merge($linha, $dados);

            $lista[] = $linha;
        }

        return $lista;
    }

    public static function consultaIdUltimaMensagem($mensagem)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT MAX(idMensagem) FROM tbMensagem
                                        WHERE conteudoMensagem LIKE ? AND origemMensagem = ? AND idCliente = ? AND idVendedora = ?');
        $stmt->bindValue(1, $mensagem->getConteudoMensagem());
        $stmt->bindValue(2, $mensagem->getOrigemMensagem());
        $stmt->bindValue(3, $mensagem->getCliente()->getIdCliente());
        $stmt->bindValue(4, $mensagem->getVendedora()->getIdVendedora());
        $stmt->execute();

        $id = $stmt->fetch()[0];

        return $id;
    }
}
