<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>

    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div id="user-product">
        <nav id="nav">
            <div id="nav-list">
                <a href="index.php" class="nav-link active">
                    <i class="bi bi-house-door-fill"></i>
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
                    <img src="../<?php echo $_SESSION['foto-empresa'] ?>" id="foto-usuario">
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
                    <img src="../<?php echo $_SESSION['foto-empresa'] ?>" id="foto-info">
                </a>
                <div id="info-user">
                    <div id="nome-user">
                        <?php echo $_SESSION['nome-empresa'] ?>
                    </div>
                    <div id="nick-user">
                        @<?php echo $_SESSION['username'] ?>
                    </div>
                </div>
                <div class="dropup-center dropup">
                    <button id="options-user" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-sobe">
                        <li>
                            <a class="dropdown-item" href="../logout.php">
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
            <div id="content">
                <div id="produto">
                    <div id="foto-produto">
                        <button onclick="history.back()" id="voltar">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                        <img src="../assets/img/products-services/cadernos-artesanais.jpg">
                    </div>
                    <div id="info-produto">
                        <div id="nome-produto">
                            Cadernos artesanais
                        </div>
                        <div id="preco-produto">
                            R$20,00
                        </div>
                        <button class="button button-square" id="encomendar">Encomendar</button>
                        <div id="avaliacao-produto">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <div id="categoria-produto">
                                Artesanato
                        </div>
                        <a href="../user/profile.php" id="negocio-produto">
                            Por Cantinho da Arte
                        </a>
                        <div id="descricao-produto">
                            <div id="titulo-descricao">Descrição</div>
                            <div id="texto-descricao">
                                <label for="show-descricao">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam accusamus
                                    quisquam veniam voluptate cumque blanditiis facere illo ut sequi, similique
                                    eaque quas quis sed. Esse iusto eum dolorum odio ex!
                                </label>
                            </div>
                            <input type="checkbox" id="show-descricao">
                        </div>
                    </div>
                </div>
                <div id="comentarios-produto">
                    <div id="comentarios-titulo">
                        Comentarios
                    </div>
                    <div id="input-comentario">
                        <textarea rows="4" id="textarea-comentario"></textarea>
                        <button class="button button-square" id="enviar">Enviar</button>
                    </div>
                    <div id="comentarios">
                        <div class="comentario">
                            <img src="../assets/img/foto.png" class="foto-comentario">
                            <div class="nome-comentario">
                                Isabelle Silva
                            </div>
                            <div class="avaliacao-comentario">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="conteudo-comentario">
                                Achei o produto excelente. Agora eu consigo fazer minhas anotações, recomendo muito!!!
                            </div>
                        </div>
                        <div class="comentario">
                            <img src="../assets/img/foto.png" class="foto-comentario">
                            <div class="nome-comentario">
                                Marcela Dantas
                            </div>
                            <div class="avaliacao-comentario">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="conteudo-comentario">
                                Amei!!! Recebi ontem às 4 da tarde. A entrega foi rápida e a qualidade do caderno é
                                muito boa.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <img src="../assets/img/rosas.svg" class="rosa-fundo"> -->
        </main>

    </div>
    
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script>
        var enviarComentario = document.querySelector("#enviar"),
            conteudoInputComentario = document.querySelector("#textarea-comentario")

        enviarComentario.addEventListener("click", () => {

            let comentario = document.createElement("div")
            comentario.setAttribute("class", "comentario")

            let nome = document.createElement("div")
            nome.setAttribute("class", "nome-comentario")
            nome.innerHTML = localStorage.getItem("nome")

            let conteudo = document.createElement("div")
            conteudo.setAttribute("class", "conteudo-comentario")
            conteudo.innerHTML = conteudoInputComentario.value

            let img = document.createElement("img")
            img.setAttribute("class", "foto-comentario")
            img.src = '../assets/img/foto.png'

            let avaliacao = document.createElement("div")
            avaliacao.setAttribute("class", "avaliacao-comentario")

            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i>"

            comentario.appendChild(img)
            comentario.appendChild(nome)
            comentario.appendChild(conteudo)
            comentario.appendChild(avaliacao)

            if (conteudoInputComentario.value != "") {
                comentarios.appendChild(comentario)
            }
        })

    </script>
</body>

</html>