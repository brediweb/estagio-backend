<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="../Assets/css/style.css"> 
</head>
<body>

    <h1>Produtos</h1>



    <!-- Tabela de Produtos -->
    <table>
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
                        <a href="javascript:void(0);" onclick="excluirProduto(<?php echo $produto['id']; ?>)">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="center-links">
        <a href="index.php?action=create" class="btn btn-primary">Cadastrar Novo Produto</a>
    </div>

    <script src="../Assets/scripts/noRefreshAjax.js"></script>

</body>
</html>
