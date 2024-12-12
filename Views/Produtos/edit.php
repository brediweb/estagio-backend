<h1>Editar Produto</h1>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required><br>

    <label for="preco">Preço:</label>
    <input type="number" name="preco" step="0.01" value="<?php echo $produto['preco']; ?>" required><br>

    <label for="categoria_id">Categoria:</label>
    <select name="categoria_id" required>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?php echo $categoria['id']; ?>"
                <?php echo $categoria['id'] == $produto['categoria_id'] ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($categoria['titulo']); ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit">Atualizar</button>
</form>

<a href="index.php">Voltar à lista de produtos</a>
