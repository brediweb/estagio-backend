<?php
class Categoria {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $queryResult = $this->pdo->query('SELECT * FROM categorias');
        return $queryResult->fetchAll(PDO::FETCH_ASSOC); //Retorna o resultado da query como array
    }
}
