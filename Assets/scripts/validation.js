// Validação do formulário de cadastro e edição
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('form');  // Seleciona o formulário na página

    form.addEventListener('submit', function(event) {
        const nome = document.querySelector('[name="nome"]');  
        const preco = document.querySelector('[name="preco"]');  
        const categoria = document.querySelector('[name="categoria_id"]');  
        
        // Validando o campo nome
        if (!nome.value.trim()) {
            alert("O nome do produto é obrigatório!");
            event.preventDefault();  // Impede o envio do formulário
        }
        // Validando o campo preço: se está vazio, não é número, ou é negativo
        else if (!preco.value.trim() || isNaN(preco.value) || parseFloat(preco.value) < 0) {
            alert("O preço do produto é obrigatório, deve ser um número válido e não pode ser negativo!");
            event.preventDefault();  // Impede o envio do formulário
        }
        // Validando se uma categoria foi selecionada
        else if (!categoria.value) {
            alert("A categoria do produto é obrigatória!");
            event.preventDefault();  // Impede o envio do formulário
        }
    });
});
