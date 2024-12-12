<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produtos</title>
    <link rel="stylesheet" href="../Assets/css/style.css"> 
</head>
<body>
    <h1>Editar Produto</h1>

    <form method="POST">
        <!-- Campo oculto para o ID do produto -->
        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required><br>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" step="0.01" value="<?php echo $produto['preco']; ?>" required><br>

        <!-- Campo para selecionar a categoria do produto -->   
        <label for="categoria_id">Categoria:</label>
        <select name="categoria_id" required>
            <?php foreach ($categorias as $categoria): ?>
                <!-- Marca a categoria atual como selecionada -->
                <option value="<?php echo $categoria['id']; ?>"
                    <?php echo $categoria['id'] == $produto['categoria_id'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($categoria['titulo']); ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Atualizar</button>
    </form>

    <div class="center-links">
        <a href="index.php">Voltar à lista de produtos</a>
    </div>
    
    <script src="../Assets/scripts/validation.js"></script>
</body>