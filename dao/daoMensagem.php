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
                            SET conteudoMensagem = ?, arquivoMensagem = ?, horaMensagem = ?, 
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

    public static function editarArquivo($Mensagem)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbMensagem
                            SET arquivoMensagem = ?
                            WHERE idMensagem = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Mensagem->getArquivoMensagem());
        $prepareStatement->bindValue(2, $Mensagem->getIdMensagem());

        $prepareStatement->execute();
    }

    public static function editarNomeArquivo($Mensagem)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbMensagem
                            SET nomeArquivoMensagem = ?
                            WHERE idMensagem = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Mensagem->getNomeArquivoMensagem());
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

        $querySelect = 'SELECT conteudoMensagem, arquivoMensagem, TIME_FORMAT(horaMensagem, "%H:%i") as horaMensagem, lidoEmMensagem, origemMensagem, nomeArquivoMensagem, tbCliente.fotoCliente as fotoCliente, tbVendedora.fotoNegocioVendedora as fotoVendedora FROM tbMensagem
                        INNER JOIN tbCliente ON tbCliente.idCliente = tbMensagem.idCliente
                        INNER JOIN tbVendedora ON tbVendedora.idVendedora = tbMensagem.idVendedora
                        WHERE tbMensagem.idCliente = ? AND tbMensagem.idVendedora = ?';

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

            $prepareStatementMessage = $connection->prepare("SELECT conteudoMensagem as ultimaMensagem, arquivoMensagem, origemMensagem as remetente FROM tbMensagem
                            WHERE idCliente = ? AND idVendedora = ?
                            ORDER BY idMensagem desc
                            LIMIT 1");

            $prepareStatementMessage->bindValue(1, $conversas->getCliente()->getIdCliente());
            $prepareStatementMessage->bindValue(2, $linha['id']);
            $prepareStatementMessage->execute();

            $consulta = $prepareStatementMessage->fetch(PDO::FETCH_ASSOC);

            $ultimaMensagem = !empty($consulta['ultimaMensagem']) ? $consulta['ultimaMensagem'] : '';

            if(!empty($consulta['arquivoMensagem'])){
                $extensao = strtolower(pathinfo($consulta['arquivoMensagem'],PATHINFO_EXTENSION));

                if($extensao == 'mp3'){
                    $ultimaMensagem = 'áudio';
                }else if($extensao == 'png'){
                    $ultimaMensagem = 'imagem';
                }else{
                    $ultimaMensagem = 'arquivo';
                }
            }

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
                            INNER JOIN tbCliente ON tbMensagem.idCliente = tbCliente.idCliente
                            WHERE idVendedora=?";

        $prepareStatement = $connection->prepare($querySelect);
        $prepareStatement->bindValue(1, $conversas->getVendedora()->getIdVendedora());
        $prepareStatement->execute();

        $lista = array();

        while ($linha = $prepareStatement->fetch(PDO::FETCH_ASSOC)) {

            $prepareStatementMessage = $connection->prepare("SELECT conteudoMensagem as ultimaMensagem, arquivoMensagem, origemMensagem as remetente FROM tbMensagem
                            WHERE idVendedora = ? AND idCliente = ?
                            ORDER BY idMensagem desc
                            LIMIT 1");

            $prepareStatementMessage->bindValue(1, $conversas->getVendedora()->getIdVendedora());
            $prepareStatementMessage->bindValue(2, $linha['id']);
            $prepareStatementMessage->execute();

            $consulta = $prepareStatementMessage->fetch(PDO::FETCH_ASSOC);

            $ultimaMensagem = !empty($consulta['ultimaMensagem']) ? $consulta['ultimaMensagem'] : '';
            if(!empty($consulta['arquivoMensagem'])){
                $extensao = strtolower(pathinfo($consulta['arquivoMensagem'],PATHINFO_EXTENSION));

                if($extensao == 'mp3'){
                    $ultimaMensagem = 'áudio';
                }else if($extensao == 'png'){
                    $ultimaMensagem = 'imagem';
                }else{
                    $ultimaMensagem = 'arquivo';
                }
            }
            
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

    public static function consultaTemConversa($mensagem){
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT COUNT(idMensagem) FROM tbMensagem
                                        WHERE idCliente = ? AND idVendedora = ?');
        $stmt->bindValue(1, $mensagem->getCliente()->getIdCliente());
        $stmt->bindValue(2, $mensagem->getVendedora()->getIdVendedora());
        
        $stmt->execute();

        $qtd = $stmt->fetch()[0];

        return $qtd!=0;
    }
}
