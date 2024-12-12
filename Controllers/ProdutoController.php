<?php
// Importação dos models necessários
require_once '../Models/Produto.php';
require_once '../Models/Categoria.php';

class ProdutoController {
    private $produtoModel;
    private $categoriaModel;

    public function __construct($pdo) {
        // Inicializa os models com a conexão PDO
        $this->produtoModel = new Produto($pdo);
        $this->categoriaModel = new Categoria($pdo);
    }

    public function index() {
        //Exibe a lista de todos os produtos        
        $produtos = $this->produtoModel->getAll();
        require '../views/produtos/index.php';
    }

    public function create() {
        // Se o formulário foi enviado, cria um novo produto
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $preco = $_POST['preco'];
            $categoria_id = $_POST['categoria_id'];
            $this->produtoModel->create($nome, $preco, $categoria_id);
            header('Location: index.php');
        } else {
            // Carrega as categorias para o formulário de criação
            $categorias = $this->categoriaModel->getAll(); 
            require '../views/produtos/create.php';
        }
    }

    public function edit($id) {
        // Se o formulário foi enviado, atualiza o produto
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $preco = $_POST['preco'];
            $categoria_id = $_POST['categoria_id'];
            $this->produtoModel->update($id, $nome, $preco, $categoria_id);
            header('Location:  index.php');
        } else {
            // Carrega o produto e as categorias para o formulário de edição
            $produto = $this->produtoModel->findById($id);
            $categorias = $this->categoriaModel->getAll();
            require '../views/produtos/edit.php';
            //:)
        }
    }

    public function delete($id) {
        // Exclui o produto com o ID fornecido
        $this->produtoModel->delete($id);
        header('Location:  index.php');
    }
}
