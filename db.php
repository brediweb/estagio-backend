<?php
$host = 'localhost';
$dbname = 'produto_db';
$username = 'root'; // usuário padrão do MySQL no XAMPP
$password = ''; // senha padrão no XAMPP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); // Objeto interface de banco de dados
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Habilita exibição de erros
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>
