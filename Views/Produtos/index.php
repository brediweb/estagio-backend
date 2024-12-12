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
            <tr>
                <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                <td><?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                <td><?php echo htmlspecialchars($produto['categoria']); ?></td>
                <td>
                    <!-- Links para editar e excluir o produto, passando o ID como parâmetro -->
                    <a href="index.php?action=edit&id=<?php echo $produto['id']; ?>">Editar</a> |
                    <a href="index.php?action=delete&id=<?php echo $produto['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="index.php?action=create">Cadastrar Novo Produto</a>
