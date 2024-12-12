<h1>Cadastrar Novo Produto</h1>

<form method="POST">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required><br>

    <label for="preco">Preço:</label>
    <input type="number" name="preco" step="0.01" required><br>

    <label for="categoria_id">Categoria:</label>
    <select name="categoria_id" required>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?php echo $categoria['id']; ?>"><?php echo htmlspecialchars($categoria['titulo']); ?></option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit">Cadastrar</button>
</form>

<a href="index.php">Voltar à lista de produtos</a>
