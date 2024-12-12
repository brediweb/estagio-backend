<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produtos</title>
    <link rel="stylesheet" href="../Assets/css/style.css"> 
</head>
</body>
    <h1>Cadastrar Novo Produto</h1>

    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" step="0.01" required><br>

        <!-- Campo para selecionar a categoria do produto -->
        <label for="categoria_id">Categoria:</label>
        <select name="categoria_id" required>
            <?php foreach ($categorias as $categoria): ?>
                <!-- Exibe as categorias disponíveis -->
                <option value="<?php echo $categoria['id']; ?>"><?php echo htmlspecialchars($categoria['titulo']); ?></option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Cadastrar</button>
    </form>
    
    <div class="center-links">
        <a href="index.php">Voltar à lista de produtos</a>
    </div>
    
    <script src="../Assets/scripts/validation.js"></script>
</body>
