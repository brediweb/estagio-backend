<?php
class Produto {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $queryResult = $this->pdo->query('SELECT p.id, p.nome, p.preco, c.titulo AS categoria
                                   FROM produtos p
                                   JOIN categorias c ON p.categoria_id = c.id');
        return $queryResult->fetchAll(PDO::FETCH_ASSOC); //Retorna o resultado da query como array
    }

    public function create($nome, $preco, $categoria_id) {
        $queryResult = $this->pdo->prepare('INSERT INTO produtos (nome, preco, categoria_id) VALUES (?, ?, ?)');
        return $queryResult->execute([$nome, $preco, $categoria_id]);
    }

    public function findById($id) {
        $queryResult = $this->pdo->prepare('SELECT * FROM produtos WHERE id = ?');
        $queryResult->execute([$id]);
        return $queryResult->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $nome, $preco, $categoria_id) {
        $queryResult = $this->pdo->prepare('UPDATE produtos SET nome = ?, preco = ?, categoria_id = ? WHERE id = ?');
        return $queryResult->execute([$nome, $preco, $categoria_id, $id]);
    }

    public function delete($id) {
        $queryResult = $this->pdo->prepare('DELETE FROM produtos WHERE id = ?');
        return $queryResult->execute([$id]);
    }
}
