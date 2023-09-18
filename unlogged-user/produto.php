<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="modal pop" id="modal-login" tabindex="-1" aria-labelledby="modal-login" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Puxa...</h1>
                </div>
                <div class="modal-body d-flex flex-column text-center">
                    <i class="bi bi-emoji-frown"></i>
                    Você precisa estar logado para acessar essa área...
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="button button-secondary" data-bs-dismiss="modal">OK</button>
                    <a class="button" href="../login.php">FAZER LOGIN</a>
                </div>
            </div>
        </div>
    </div>

    <div id="user-product">
        <nav id="nav">
            <div id="nav-list">
                <a href="index.php" class="nav-link">
                    <i class="bi bi-house-door"></i>
                    <span>
                        Home
                    </span>
                </a>
                <a href="pesquisa.php" class="nav-link">
                    <i class="bi bi-search"></i>
                    <span>
                        Pesquisa
                    </span>
                </a>
                <a href="notificacoes.php" class="nav-link">
                    <i class="bi bi-bell"></i>
                    <span>
                        Notificações
                    </span>
                </a>
				<a href="#" class="nav-link" data-bs-target="#modal-login" data-bs-toggle="modal">
                    <i class="bi bi-chat"></i>
                    <span>
                        Conversas
                    </span>
                </a>
                <a href="configuracoes.php" class="nav-link">
                    <i class="bi bi-person"></i>
                    <span>
                        Configurações
                    </span>
                </a>
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
                        <img src="../assets/img/products-services/2.png">
                    </div>
                    <div id="info-produto">
                        <div id="nome-produto">
                            Bolo de Laranja
                        </div>
                        <div id="preco-produto">
                            R$20,00
                        </div>
                        <button class="button button-square" id="encomendar" data-bs-target="#modal-login" data-bs-toggle="modal">Encomendar</button>
                        <div id="avaliacao-produto">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <div id="categoria-produto">
                            Culinária
                        </div>
                        <a href="profile.php" id="negocio-produto">
                            Por Açúcar e Canela
                        </a>
                        <div id="descricao-produto">
                            <div id="titulo-descricao">Descrição</div>
                            <div id="texto-descricao"><label for="show-descricao">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae provident vel temporibus voluptatum omnis ipsum enim quas nihil repellat similique, voluptas aut nesciunt aperiam placeat recusandae cumque, ipsam expedita blanditiis.</label>
                            </div>
                            <input type="checkbox" id="show-descricao">
                        </div>
                    </div>
                </div>
                <div id="comentarios-produto">
                    <div id="comentarios-titulo">
                        Comentarios
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
                                Achei o bolo excelente. Minha filha amou, recomendo muito!!!
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
                                Amei!!!
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
</body>

</html>