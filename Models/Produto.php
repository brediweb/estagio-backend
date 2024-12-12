<?php
class Produto {
    private $pdo;

    public function __construct($pdo) {
        // Inicializa a conexão com o banco de dados
        $this->pdo = $pdo;
    }

    public function getAll() {
        // Recupera todos os produtos, fazendo join com categorias
        $queryResult = $this->pdo->query('SELECT p.id, p.nome, p.preco, c.titulo AS categoria
                                   FROM produtos p
                                   JOIN categorias c ON p.categoria_id = c.id');
        return $queryResult->fetchAll(PDO::FETCH_ASSOC);  // Retorna os produtos como array associativo
    }

    public function create($nome, $preco, $categoria_id) {
        // Insere um novo produto no banco de dados
        $queryResult = $this->pdo->prepare('INSERT INTO produtos (nome, preco, categoria_id) VALUES (?, ?, ?)');
        return $queryResult->execute([$nome, $preco, $categoria_id]);  // Executa a query com os dados do produto
    }

    public function findById($id) {
        // Recupera um produto específico pelo ID
        $queryResult = $this->pdo->prepare('SELECT * FROM produtos WHERE id = ?');
        $queryResult->execute([$id]);
        return $queryResult->fetch(PDO::FETCH_ASSOC);  // Retorna o produto encontrado
    }

    public function update($id, $nome, $preco, $categoria_id) {
        // Atualiza os dados de um produto
        $queryResult = $this->pdo->prepare('UPDATE produtos SET nome = ?, preco = ?, categoria_id = ? WHERE id = ?');
        return $queryResult->execute([$nome, $preco, $categoria_id, $id]);  // Executa a query de atualização
    }

    public function delete($id) {
        // Deleta um produto pelo ID
        $queryResult = $this->pdo->prepare('DELETE FROM produtos WHERE id = ?');
        return $queryResult->execute([$id]);  // Executa a query de exclusão
    }
}
