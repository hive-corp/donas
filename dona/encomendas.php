<?php

require_once "validador.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encomendas</title>
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon" />
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div id="user-encomenda">
        <nav id="nav">
            <div id="nav-list">
                <a href="index.php" class="nav-link">
                    <i class="bi bi-house-door"></i>
                    <span>
                        Home
                    </span>
                </a>
                <a href="encomendas.php" class="nav-link active">
                    <i class="bi bi-grid-fill"></i>
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
            <div id="main-title">
                Painel de encomendas
            </div>
            <div id="content">
                <div id="encomendas">
                    <div class="encomenda">
                        <div class="info-encomenda">
                            <img src="../assets/img/foto.png" alt="" class="foto-encomenda">
                            <div class="nome-username">
                                <div class="nome-encomenda">Claudia Alves</div>
                                <div class="username-encomenda">@claudiaalves</div>
                            </div>
                        </div>
                        <div class="dados-encomenda">
                            <div class="nome-pedido">
                                <label for="" class="form-label">Pedido</label>
                                <div class="input-wrapper">
                                    Moletom de tricô
                                </div>
                            </div>
                            <div class="data-pedido">
                                <label for="" class="form-label">Data do pedido</label>
                                <div class="input-wrapper">
                                    26/06/2023
                                </div>
                            </div>
                        </div>
                        <select name="" id="" class="select-filtro situacao-encomenda">
                            <option checked>Situação</option>
                            <option value="1">Concluído</option>
                            <option value="2">Fazendo</option>
                            <option value="3">Cancelado</option>
                        </select>
                    </div>
                    <div class="encomenda">
                        <div class="info-encomenda">
                            <img src="../assets/img/foto.png" alt="" class="foto-encomenda">
                            <div class="nome-username">
                                <div class="nome-encomenda">Claudia Alves</div>
                                <div class="username-encomenda">@claudiaalves</div>
                            </div>
                        </div>
                        <div class="dados-encomenda">
                            <div class="nome-pedido">
                                <label for="" class="form-label">Pedido</label>
                                <div class="input-wrapper">
                                    Moletom de tricô
                                </div>
                            </div>
                            <div class="data-pedido">
                                <label for="" class="form-label">Data do pedido</label>
                                <div class="input-wrapper">
                                    26/06/2023
                                </div>
                            </div>
                        </div>
                        <select name="" id="" class="select-filtro situacao-encomenda">
                            <option checked>Situação</option>
                            <option value="1">Concluído</option>
                            <option value="2">Fazendo</option>
                            <option value="3">Cancelado</option>
                        </select>
                    </div>
                </div>
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
            html = document.querySelector('html')

        if (localStorage.getItem('theme') == 'dark') {
            html.classList.add('dark')
        }

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