<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');

// Define o nome do arquivo PDF para download
$nomeArquivo = 'relatorio.pdf';

// Saída do PDF para o navegador
$mpdf->Output($nomeArquivo, 'D');
exit();
?>
