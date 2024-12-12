<?php
// Inclui a conexão com o banco e o controller
require '../config/db.php';
require '../Controllers/ProdutoController.php';

// Cria o controlador de produtos com a conexão PDO
$controller = new ProdutoController($pdo);

// Captura a ação e o ID (se fornecidos)
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

// Direciona para o método correspondente no controller
switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        if ($id) $controller->edit($id);
        break;
    case 'delete':
        if ($id) $controller->delete($id);
        break;
    default:
        $controller->index();
        break;
}
