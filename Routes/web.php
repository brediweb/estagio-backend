<?php
require './controllers/ProdutoController.php';

$pdo = require './config/db.php';
$controller = new ProdutoController($pdo);

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        if ($id) {
            $controller->edit($id);
        }
        break;
    case 'delete':
        if ($id) {
            $controller->delete($id);
        }
        break;
    default:
        $controller->index();
        break;
}
