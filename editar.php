<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Identifica o envio de dados do formulario e execulta o update no banco
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $categoria_id = $_POST['categoria_id'];

    $queryResult = $pdo->prepare('UPDATE produtos SET nome = ?, preco = ?, categoria_id = ? WHERE id = ?');
    $queryResult->execute([$nome, $preco, $categoria_id, $id]);

    header('Location: index.php');
    exit;
}

//obtem os dados do produto a ser editado
$id = $_GET['id'];
$queryResult = $pdo->prepare('SELECT * FROM produtos WHERE id = ?');
$queryResult->execute([$id]);
$produto = $queryResult->fetch(PDO::FETCH_ASSOC);

//obtem as categorias no banco 
$queryResult = $pdo->query('SELECT * FROM categorias');
$categorias = $queryResult->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Editar Produto</h1>
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required><br>

    <label for="preco">Preço:</label>
    <input type="text" name="preco" value="<?php echo $produto['preco']; ?>" required><br>

    <label for="categoria_id">Categoria:</label>
    <select name="categoria_id" required>
        <?php foreach ($categorias as $categoria): ?> <!-- verifica se a categoria atual é a mesma do produto sendo editado -->
            <option value="<?php echo $categoria['id']; ?>" <?php echo $categoria['id'] == $produto['categoria_id'] ? 'selected' : ''; ?>><?php echo htmlspecialchars($categoria['titulo']); ?></option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit">Atualizar</button>
</form>
