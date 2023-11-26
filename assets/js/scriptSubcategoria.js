// Adicione este trecho no seu script.js
function carregarCategorias() {
    fetch('../../area-restrita-adm/cadastra-subcate.php')
        .then(response => response.json())
        .then(data => {
            const categoriaDropdown = document.getElementById('categoria-subcategoria');
            categoriaDropdown.innerHTML = '';
            data.forEach(categoria => {
                const option = document.createElement('option');
                option.value = categoria.idCategoria;
                option.text = categoria.nomeCategoria;
                categoriaDropdown.appendChild(option);
            });
        })
        .catch(error => console.error('Erro ao carregar categorias:', error));
}

function cadastrarSubcategoria() {
    const nomeSubcategoria = document.getElementById('nome-subcategoria').value;
    const idCategoria = document.getElementById('categoria-subcategoria').value;

    fetch('../../area-restrita-adm/cadastra-subcate.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `nome=${nomeSubcategoria}&idCategoria=${idCategoria}`,
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Adicione aqui lógica para lidar com a resposta do servidor, se necessário
        })
        .catch(error => console.error('Erro ao cadastrar subcategoria:', error));
}

document.addEventListener('DOMContentLoaded', function() {
    carregarCategorias();
});
