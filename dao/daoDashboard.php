<?php
require_once "global.php";
class daoDashboard
{
    public static function graficoCresPlataforma()
    {
        $connection = Conexao::conectar();

        $query = "SELECT MONTH(dataCadastro) AS mes, COUNT(*) AS total
                  FROM (
                      SELECT dataCadastro FROM tbcliente
                      UNION ALL
                      SELECT dataCadastro FROM tbvendedora
                  ) AS cadastros
                  WHERE dataCadastro >= NOW() - INTERVAL 12 MONTH
                  GROUP BY mes
                  ORDER BY mes";

        $resultado = $connection->query($query);

        $dados = [];
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $dados[] = $row['total'];
        }

        return $dados;
    }
}
