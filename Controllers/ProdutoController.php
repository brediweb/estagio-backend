<?php
//require_once > include -> é mais adequado para evitar problemas de redefinição ou inclusão múltipla.
require_once './Models/Produto.php';
require_once './Models/Categoria.php';

class ProdutoController {
    private $produtoModel;
    private $categoriaModel;

    public function __construct($pdo) {
        $this->produtoModel = new Produto($pdo);
        $this->categoriaModel = new Categoria($pdo);
    }

    //Exibe a lista de todos os produtos
    public function index() {
        $produtos = $this->produtoModel->getAll();
        require './views/produtos/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Identifica o envio de dados do formulario e execulta a inserção no banco
            $nome = $_POST['nome'];
            $preco = $_POST['preco'];
            $categoria_id = $_POST['categoria_id'];
            $this->produtoModel->create($nome, $preco, $categoria_id);
            header('Location: /crud_estagio_bredi');
        } else {
            $categorias = $this->categoriaModel->getAll(); //obtem as categorias no banco e chama a view
            require './views/produtos/create.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $preco = $_POST['preco'];
            $categoria_id = $_POST['categoria_id'];
            $this->produtoModel->update($id, $nome, $preco, $categoria_id);
            header('Location: /crud_estagio_bredi');
        } else {
            $produto = $this->produtoModel->findById($id);
            $categorias = $this->categoriaModel->getAll();
            require './views/produtos/edit.php';
        }
    }

    public function delete($id) {
        $this->produtoModel->delete($id);
        header('Location: /crud_estagio_bredi');
    }
}
