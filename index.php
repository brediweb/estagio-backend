<?php
include 'db.php';

$queryResult = $pdo->query('SELECT p.id, p.nome, p.preco, c.titulo AS categoria
                     FROM produtos p
                     JOIN categorias c ON p.categoria_id = c.id');
$produtos = $queryResult->fetchAll(PDO::FETCH_ASSOC); //Retorna o resultado da query como array
?>

<h1>Produtos</h1>
<table border="1">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produtos as $produto): ?>
            <tr> <!-- htmlspecialchars usado para evitar injection -->
                <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                <td><?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                <td><?php echo htmlspecialchars($produto['categoria']); ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $produto['id']; ?>">Editar</a> |
                    <a href="excluir.php?id=<?php echo $produto['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="cadastrar.php">Cadastrar Novo Produto</a>
