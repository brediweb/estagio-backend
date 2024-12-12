// Função para excluir produto usando AJAX
function excluirProduto(id) {
    if (confirm("Tem certeza de que deseja excluir este produto?")) {
        const xhr = new XMLHttpRequest();  // Cria uma nova requisição AJAX
        xhr.open('GET', `index.php?action=delete&id=${id}`, true);  // Define o tipo de requisição e a URL com parâmetros
        xhr.onload = function() {  // Executa quando a resposta é carregada
            if (xhr.status === 200) {  // Verifica se a resposta foi bem-sucedida (status 200)
                alert("Produto excluído com sucesso!");
                location.reload();  // Recarrega a página para atualizar a lista de produtos
            } else {
                alert("Erro ao excluir produto!");  // Mostra uma mensagem de erro se a requisição falhar
            }
        };
        xhr.send();  // Envia a requisição AJAX
    }
}



