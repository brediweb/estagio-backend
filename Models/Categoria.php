<?php
class Categoria {
    private $pdo;

    public function __construct($pdo) {
        // Inicializa a conexão com o banco de dados
        $this->pdo = $pdo;
    }

    public function getAll() {
        // Recupera todas as categorias do banco de dados
        $queryResult = $this->pdo->query('SELECT * FROM categorias');
        return $queryResult->fetchAll(PDO::FETCH_ASSOC);  // Retorna as categorias como array associativo
    }
}
