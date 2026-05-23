<?php
// Verifica se as constantes já estão definidas para evitar redefinições
if (!defined('HOST')) {
    define('HOST', 'localhost');
}
if (!defined('USER')) {
    define('USER', 'root');
}
if (!defined('PASS')) {
    define('PASS', '');
}
if (!defined('BASE')) {
    define('BASE', 'clinica');
}

// Verifica se a conexão já foi criada
if (!isset($conn)) {
    $conn = new MySQLi(HOST, USER, PASS, BASE);

    // Verifica se houve erro na conexão
    if ($conn->connect_error) {
        die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
    }
}
?>
