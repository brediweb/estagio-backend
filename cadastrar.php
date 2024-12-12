<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Identifica o envio de dados do formulario e execulta a inserção no banco
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $categoria_id = $_POST['categoria_id'];

    $queryResult = $pdo->prepare('INSERT INTO produtos (nome, preco, categoria_id) VALUES (?, ?, ?)');
    $queryResult->execute([$nome, $preco, $categoria_id]);

    header('Location: index.php');
    exit;
}

//obtem as categorias no banco 
$queryResult = $pdo->query('SELECT * FROM categorias');
$categorias = $queryResult->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Cadastrar Produto</h1>
<form method="POST">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required><br>

    <label for="preco">Preço:</label>
    <input type="text" name="preco" required><br>

    <label for="categoria_id">Categoria:</label>
    <select name="categoria_id" required>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?php echo $categoria['id']; ?>"><?php echo htmlspecialchars($categoria['titulo']); ?></option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit">Cadastrar</button>
</form>
