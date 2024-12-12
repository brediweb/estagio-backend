# CRUD de Produtos com Relacionamento a Categorias

## Descrição

Este projeto consiste em um sistema de CRUD (Create, Read, Update, Delete) para o gerenciamento de produtos com relacionamento a categorias. Desenvolvido em **PHP** com **MySQL**, o sistema permite cadastrar, listar, editar e excluir produtos, além de associá-los a uma categoria específica.

## Arquitetura do Projeto

O projeto foi desenvolvido seguindo a arquitetura **MVC (Model-View-Controller)**, onde:

- **Model**: Responsável pela interação com o banco de dados (consulta, inserção, atualização e exclusão de produtos e categorias).
- **View**: Responsável por exibir as páginas HTML ao usuário, como o formulário de cadastro, a listagem de produtos e o formulário de edição.
- **Controller**: Intermediário entre o Model e a View. Processa as requisições, aplica a lógica de negócio e chama as Views correspondentes.

### Estrutura de Pastas

```bash
/assets
   /css          -> Arquivos CSS (style.css)
   /scripts      -> Arquivos JavaScript (ajax.js, validation.js)
/controllers     -> Controladores do projeto (ProdutoController.php)
/models          -> Models do projeto (Produto.php, Categoria.php)
/views           -> Views do projeto (index.php, create.php, edit.php)
/routes          -> Definição das rotas da aplicação (web.php)
/config          -> Configuração de banco de dados (db.php)
/public          -> Arquivos acessíveis ao usuário final (index.php, CSS, JS)
```

### Funcionalidades

- **CRUD de Produtos**: Permite criar, listar, editar e excluir produtos.
- **Validação de Formulários**: Os formulários de cadastro e edição incluem validações de preenchimento e formato de dados.
- **Relacionamento com Categorias**: Cada produto pode ser associado a uma categoria.
- **Exclusão via AJAX**: A funcionalidade de exclusão é feita de forma assíncrona, sem recarregar a página.

## Como Fazer o Projeto Funcionar

### Pré-requisitos

- **PHP** >= 7.4
- **MySQL**
- **XAMPP ou similar** (para rodar um servidor local)
- **Composer** (se necessário para gerenciar dependências)

### Configurações Iniciais

1. **Clone o repositório** para o seu ambiente local:

   ```bash
   git clone <url-do-repositorio>
   ```

2. **Configuração do Banco de Dados**:
   - Crie um banco de dados no MySQL.
   - Execute o script de criação da tabela de **categorias**:

     ```sql
     CREATE TABLE `categorias` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `titulo` VARCHAR(190) NOT NULL,
        PRIMARY KEY (`id`)
     );
     
     INSERT INTO `categorias` (`id`, `titulo`) VALUES
     (4, 'Alimentos'),
     (5, 'Informática'),
     (2, 'Eletrodomésticos'),
     (3, 'Celulares');
     ```

   - Crie a tabela de **produtos**:

     ```sql
     CREATE TABLE `produtos` (
         `id` INT(11) NOT NULL AUTO_INCREMENT,
         `nome` VARCHAR(255) NOT NULL,
         `preco` DECIMAL(10, 2) NOT NULL,
         `categoria_id` INT(11),
         PRIMARY KEY (`id`),
         FOREIGN KEY (`categoria_id`) REFERENCES `categorias`(`id`)
     );
     ```

3. **Configuração do Arquivo de Conexão com o Banco de Dados**:
   - No arquivo **`config/db.php`**, configure suas credenciais do MySQL:

     ```php
     $host = 'localhost';
     $dbname = 'nome_do_banco_de_dados';
     $username = 'usuario_do_mysql';
     $password = 'senha_do_mysql';
     ```

4. **Rodar a Aplicação**:
   - Coloque o projeto no diretório **htdocs** do **XAMPP** (ou similar).
   - Inicie o servidor Apache e o MySQL no XAMPP.
   - Acesse o projeto via navegador: `http://localhost/nome_do_projeto/public/index.php`

### Funcionalidades Extras

- **Exclusão via AJAX**: Para tornar a experiência do usuário mais fluida, a exclusão de produtos é feita de forma assíncrona, sem recarregar a página. Ao clicar em "Excluir", a página atualiza apenas a lista de produtos.

- **Validação de Formulários com JavaScript**: O formulário de cadastro e edição de produtos inclui validação do lado do cliente para garantir que os campos obrigatórios (nome, preço, categoria) sejam preenchidos corretamente.

## Agradecimentos

Gostaria de agradecer à **Bredi** pela oportunidade de participar deste processo seletivo. Foi um desafio muito enriquecedor e me proporcionou grande aprendizado. Estou ansioso para futuras colaborações e para poder agregar ao time!

---
