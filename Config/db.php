<?php
// Configuração de conexão com o banco de dados
$host = 'localhost';  // Servidor do banco de dados
$dbname = 'produto_db';  // Nome do banco de dados
$username = 'root';  // Usuário do banco de dados
$password = '';  // Senha do banco de dados (em branco no XAMPP)

try {
    // Criação da conexão PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Habilita exceções para erros
} catch (PDOException $e) {
    // Exibe erro caso a conexão falhe
    die("Erro de conexão: " . $e->getMessage());
}
