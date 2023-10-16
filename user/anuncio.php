<?php

require_once "validador.php";
require_once "global.php";

if (isset($_GET['a'])) {
    $anuncio = daoAnuncio::consultarPorId($_GET['a']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $anuncio['nomeAnuncio']?></title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
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
                <a href="#" class="nav-link mobile-hide">
					<i class="bi bi-box-seam"></i>
					<span>
						Seus pedidos
					</span>
				</a>
                <a href="notificacoes.php" class="nav-link">
                    <i class="bi bi-bell"></i>
                    <span>
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
                    <img src="../<?php echo $_SESSION['foto'] ?>" id="foto-usuario" />
                    <i class="bi bi-person"></i>
                    <span>
                        Configurações
                    </span>
                </a>
            </div>
            <div id="user-info">
                <a href="../">
                    <img src="../<?php echo $_SESSION['foto'] ?>" id="foto-info">
                </a>
                <div id="info-user">
                    <div id="nome-user">
                        <?php echo $_SESSION['nome'] ?>
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
                        <img src="../<?php echo $anuncio['imagemPrincipalAnuncio'] ?>">
                    </div>
                    <div id="info-produto">
                        <div id="nome-produto">
                        <?php echo $anuncio['nomeAnuncio'] ?>
                        </div>
                        <div id="preco-produto">
                        R$<?php echo number_format($anuncio['valorAnuncio'], 2, ',') ?>
                        </div>
                        <?php
                        if ($anuncio['nivelNegocioVendedora'] == 1) {
                        ?>
                            <button class="button button-square" id="encomendar" data-bs-target="#modal-login" data-bs-toggle="modal">Encomendar</button>
                        <?php
                        }
                        ?>
                        <div id="avaliacao-produto">
                        <?php
                            $qtdestrelas = $anuncio['estrelasAnuncio'];

                            for ($i = 0; $i < $qtdestrelas; $i++) {
                            ?>
                                <i class="bi bi-star-fill"></i>
                            <?php
                            }

                            for ($i = 0; $i < 5 - $qtdestrelas; $i++) {
                            ?>
                                <i class="bi bi-star"></i>
                            <?php
                            }
                            ?>
                        </div>
                        <div id="categoria-produto">
                        <?php echo $anuncio['nomeCategoria'] ?>
                        </div>
                        <a href="profile.php?user=<?php echo $anuncio['nomeUsuarioNegocioVendedora']?>" id="negocio-produto">
                            Por <?php echo $anuncio['nomeNegocioVendedora'] ?>
                        </a>
                        <div id="descricao-produto">
                            <div id="titulo-descricao">Descrição</div>
                            <div id="texto-descricao"><label for="show-descricao"><?php echo $anuncio['descricaoAnuncio'] ?></label>
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
                        <img src="../<?php echo $_SESSION['foto'] ?>" id="foto-comentario">
                        <div id="nome-comentario">
                            <?php echo $_SESSION['nome'] ?>
                        </div>
                        <div id="avaliacao">
                            <input value="5" name="rate" id="star5" type="radio">
                            <label title="text" for="star5"></label>
                            <input value="4" name="rate" id="star4" type="radio">
                            <label title="text" for="star4"></label>
                            <input value="3" name="rate" id="star3" type="radio">
                            <label title="text" for="star3"></label>
                            <input value="2" name="rate" id="star2" type="radio">
                            <label title="text" for="star2"></label>
                            <input value="1" name="rate" id="star1" type="radio">
                            <label title="text" for="star1"></label>
                        </div>  
                        <div class="input" id="textarea-comentario">
                            <div class="input-wrapper">
                                <textarea name="comentario" id="comentario" cols="30" rows="4" placeholder="Sua avaliação" required></textarea>
                            </div>
                        </div>
                        <div class="input input-enviar">
                            <button class="button button-square" id="enviar">Enviar</button>
                        </div>
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
    <script>
        var enviarComentario = document.querySelector("#enviar"),
            conteudoInputComentario = document.querySelector("#comentario")

        enviarComentario.addEventListener("click", () => {

            let comentario = document.createElement("div")
            comentario.setAttribute("class", "comentario")

            let nome = document.createElement("div")
            nome.setAttribute("class", "nome-comentario")
            nome.innerHTML = '<?php echo $_SESSION['nome'] ?>'

            let conteudo = document.createElement("div")
            conteudo.setAttribute("class", "conteudo-comentario")
            conteudo.innerHTML = conteudoInputComentario.value

            let img = document.createElement("img")
            img.setAttribute("class", "foto-comentario")
            img.src = '../<?php echo $_SESSION['foto'] ?>'

            let avaliacao = document.createElement("div")
            avaliacao.setAttribute("class", "avaliacao-comentario")

            let estrelas = document.getElementsByName('rate')

            estrelas.forEach(item => {
                    if (item.checked) {
                        let qtd = item.value

                        console.log(qtd)

                        if (qtd == 1) {
                            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star'></i>"
                        } else if (qtd == 2) {
                            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star'></i>"
                        } else if (qtd == 3) {
                            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star'></i>"
                        } else if (qtd == 4) {
                            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star'></i>"
                        } else if (qtd == 5) {
                            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
                            avaliacao.innerHTML += "<i class='bi bi-star-fill'></i> "
                        }
                    }
                
            })

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