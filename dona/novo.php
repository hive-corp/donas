<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo produto/serviço</title>

        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div id="user-new">
        <nav id="nav">
            <div id="nav-list">
                <a href="index.php" class="nav-link">
                    <i class="bi bi-house-door"></i>
                    <span>
                        Home
                    </span>
                </a>
                <a href="encomendas.php" class="nav-link">
                    <i class="bi bi-grid"></i>
                    <span>
                        Painel
                    </span>
                </a>
                <a href="notificacoes.php" class="nav-link">
                    <i class="bi bi-bell"></i> <span>
                        Notificações
                    </span>
                </a>
                <a href="conversas.php" class="nav-link">
                    <i class="bi bi-chat"></i>
                    <span>
                        Conversas
                    </span>
                </a>
                <a href="configuracoes.php" class="nav-link">
                    <img src="" id="foto-usuario">
                    <i class="bi bi-person"></i>
                    <span>
                        Configurações
                    </span>
                </a>
            </div>
            <a id="new-product" href="novo.php" class="button">
                <i class="bi bi-plus-lg"></i>
                <span>Criar novo anúncio</span>
            </a>
            <div id="user-info">
                <a href="../">
                    <img src="../assets/img/users/donas/acucarcanela.png" id="foto-info">
                </a>
                <div id="info-user">
                    <div id="nome-user">
                        Açúcar e Canela
                    </div>
                    <div id="nick-user">
                        @acucarcanela
                    </div>
                </div>
                <div class="dropup-center dropup">
					<button id="options-user" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-three-dots-vertical"></i>
					</button>
					<ul class="dropdown-menu dropdown-menu-end dropdown-sobe">
						<li>
							<a class="dropdown-item" href="../">
								<i class="bi bi-box-arrow-right"></i>
								Sair
							</a>
						</li>
						<li>
							<a class="dropdown-item" href="#" data-theme-toggle="dark">
								<i class="bi bi-moon"></i>
								Modo noturno
							</a>
						</li>
					</ul>
				</div>
            </div>
        </nav>
        <main id="main">
            <!-- <img src="../assets/img/rosas.svg" class="rosa-fundo"> -->
            <div id="main-title">
                Novo produto ou serviço
            </div>
            <div id="content">
                <form action="" method='post' id="new-form">
                    <div id="imagens-form">
                        <label for="foto-principal">
                            <img src="../assets/img/foto.png" id="preview-foto">
                            <input type="file" name="foto-principal" id="foto-principal">
                        </label>
                        <div class="input">
                            <label for="">Outras fotos</label>
                            <div id="fotos-new">
                                <div id="fotos">
                                </div>
                                <label id="adicionar-foto">
                                    <i class="bi bi-plus-lg"></i>
                                    <input type="file" name="fotos" multiple accept="image/*">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div id="info-form">
                        <div class="input">
                            <label for="nome">Nome</label>
                            <div class="input-wrapper">
                                <input type="text" name="nome" id="nome">
                            </div>
                        </div>
                        <div class="input">
                            <label for="tipo-new">Tipo</label>
                            <select name="tipo-new" id="tipo-new" class="select-filtro">
                                <option selected>Tipo</option>
                                <option value="1">Produto</option>
                                <option value="2">Serviço</option>
                            </select>
                        </div>
                        <div class="input">
                            <label for="preco">Preço</label>
                            <div class="input-wrapper">
                                <input type="text" name="preco" id="preco">
                            </div>
                        </div>
                        <div class="input">
                            <label>Categorias</label>
                            <div id="categorias-new">
                                <div id="categorias">
                                </div>
                                <select name="tipo" id="select-categoria" class="select-filtro">
                                    <option selected>Nova categoria</option>
                                    <option value="1">Artesanato</option>
                                    <option value="2">Culinária</option>
                                    <option value="3">Manicure</option>
                                    <option value="4">Roupas</option>
                                    <option value="5">Joias</option>
                                    <option value="6">Livros</option>
                                </select>
                            </div>
                        </div>
                        <div class="input">
                            <label for="email">Descrição</label>
                            <div class="input-wrapper">
                                <textarea name="" id="" cols="30" rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="button button-square" id="salvar">
                        Salvar Informação
                    </button>
                </form>
            </div>
            <!-- <img src="../assets/img/rosas.svg" class="rosa-fundo"> -->
        </main>
    </div>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script> -->
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>

    <script>
        var configuracoes = document.querySelectorAll('.nav-link')[4],
            configIcon = document.querySelectorAll('.nav-link i')[4],
            fotoUsuario = document.querySelector('#foto-usuario'),
            selectCategoria = document.querySelector('#select-categoria'),
            categorias = document.querySelector('#categorias'),
            fotos = document.querySelector('#fotos'),
            fotoPrincipal = document.querySelector('#foto-principal'),
            fotoPreview = document.querySelector('#preview-foto'),
            adicionarFotoInput = document.querySelector('#adicionar-foto input'),
            html = document.querySelector('html')

if (localStorage.getItem('theme') == 'dark') {
    html.classList.add('dark')
}

        selectCategoria.addEventListener('change', e => {

            let newCategoria = document.createElement('div')
            newCategoria.setAttribute('class', 'categoria')
            newCategoria.innerText = selectCategoria.options[selectCategoria.selectedIndex].text

            let newInput = document.createElement('input')
            newInput.setAttribute('type', 'hidden')
            newInput.name = "categorias[]"
            newInput.value = selectCategoria.selectedIndex

            if (selectCategoria.selectedIndex === 0) return

            let categoryExists = false;

            let inputs = document.querySelectorAll('#categorias input')
            inputs.forEach(item => {
                if (item.value == selectCategoria.selectedIndex) {
                    categoryExists = true
                }
            })

            if (!categoryExists) {
                categorias.append(newCategoria)
                categorias.append(newInput)
            }
            selectCategoria.selectedIndex = 0
            categoryExists = false
        })

        function previewFile() {
            var file = fotoPrincipal.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                fotoPreview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }

        function adicionarFoto() {
            var file = adicionarFotoInput.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {

                let img = document.createElement('img')
                img.setAttribute('class', 'foto')
                img.src = reader.result

                fotos.append(img)
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }

        fotoPrincipal.addEventListener('change', previewFile)
        adicionarFotoInput.addEventListener('change', adicionarFoto)

        window.onload = () => {
            if (localStorage.getItem('imagemPerfil') === null) {
                configIcon.style.display = 'inline-block'
                fotoUsuario.style.display = "none"
            } else {
                fotoUsuario.src = localStorage.getItem('imagemPerfil')
            }
        }
    </script>
</body>

</html>