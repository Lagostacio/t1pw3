<?php

// Nome do arquivo PDF a ser baixado
$arquivo = 'documentos/'.$_GET['documento'] ?? null;

// Verifica se o arquivo existe
if (file_exists($arquivo)) {
    // Define o tipo de conteúdo como um arquivo para download
    header('Content-Type: application/octet-stream');
    // Define o nome do arquivo que será baixado
    header('Content-Disposition: attachment; filename="' . basename($arquivo) . '"');
    // Define o tamanho do arquivo
    header('Content-Length: ' . filesize($arquivo));
    // Envia o conteúdo do arquivo para o navegador
    readfile($arquivo);
    // Encerra o script
    exit;
}
?>