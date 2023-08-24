<?php
    require_once "global.php";

    class daoMensagem {
        
        public static function criar($Mensagem){
            $connection = Conexao::conectar();

            $queryInsert = "INSERT tbMensagem(idMensagem, conteudoMensagem, imagemMensagem, horaMensagem, lidoEmMensagem,
                            origemMensagem, idCliente, idVendedora)
                            VALUES (?,?,?,?,?,?,?,?)";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $Mensagem->getContudoMensagem());
            $prepareStatement->bindValue(2, $Mensagem->getImagemMensagem());
            $prepareStatement->bindValue(3, $Mensagem->getHoraMensagem());
            $prepareStatement->bindValue(4, $Mensagem->getLidoEmMensagem());
            $prepareStatement->bindValue(5, $Mensagem->getOrigemMensagem());
            $prepareStatement->bindValue(6, $Mensagem->getCliente()->getIdCliente());
            $prepareStatement->bindValue(7, $Mensagem->getVendedora()->getIdVendedora());
            
            $prepareStatement->execute();
        }

        public static function deletar($Mensagem){
            $connection = Conexao::conectar();

            $queryInsert = "DELETE tbMensagem WHERE idMensagem = ?";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $Mensagem->getIdMensagem());

            $prepareStatement->execute();
        }

        public static function editar($Mensagem){
            $connection = Conexao::conectar();

            $queryInsert = "UPDATE tbMensagem
                            SET conteudoMensagem = ?, imagemMensagem = ?, horaMensagem = ?, 
                            lidoEmMensagem = ?, origemMensagem = ?, idCliente = ?, idVendedora = ?
                            WHERE idMensagem = ?";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $Mensagem->getContudoMensagem());
            $prepareStatement->bindValue(2, $Mensagem->getImagemMensagem());
            $prepareStatement->bindValue(3, $Mensagem->getHoraMensagem());
            $prepareStatement->bindValue(4, $Mensagem->getLidoEmMensagem());
            $prepareStatement->bindValue(5, $Mensagem->getOrigemMensagem());
            $prepareStatement->bindValue(6, $Mensagem->getCliente()->getIdCliente());
            $prepareStatement->bindValue(7, $Mensagem->getVendedora()->getIdVendedora());
            $prepareStatement->bindValue(8, $Mensagem->getIdMensagem()); 

            $prepareStatement->execute();
        }

        public static function listar(){
            $connection = Conexao::conectar();

            $querySelect = "SELECT * FROM tbMensagem";

            $resultado = $connection->prepare($querySelect);
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;

        }
    }
?>