<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Grife do Coração</title>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
	<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="../assets/css/flickity.css" />
	<link rel="stylesheet" href="../assets/css/styles.css" />
	<link rel="stylesheet" href="../assets/bootstrap-icons-1.10.5/font/bootstrap-icons.css" />
</head>

<body>
	<div id="user-profile">
		<nav id="nav">
			<div id="nav-list">
				<a href="index.php" class="nav-link active">
					<i class="bi bi-house-door-fill"></i>
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
				<a href="conversas.php" class="nav-link">
					<i class="bi bi-chat"></i>
					<span>
						Conversas
					</span>
				</a>
				<a href="configuracoes.php" class="nav-link">
					<img src="" id="foto-usuario" />
					<i class="bi bi-person"></i>
					<span>
						Configurações
					</span>
				</a>
			</div>
			<div id="user-info">
				<a href="../">
					<img src="../assets/img/users/clientes/default-user.jpg" id="foto-info">
				</a>
				<div id="info-user">
					<div id="nome-user">
						Cliente
					</div>
					<div id="nick-user">
						@cliente
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
            <div id="main-title">
                <button class="voltar" onclick="history.back()">
                    <i class="bi bi-arrow-left"></i>
                </button>
                Grife do Coração
            </div>
			<div id="content">
                <div id="negocio-bio">
                    <div id="bio-photo">
                        <img src="../assets/img/users/donas/grifecoracao.png" alt="">
                    </div>
                    <div id="bio-info">
                        <div id="bio-name">Grife do Coração</div>
                        <div id="bio-username">@grifecoracao</div>
                        <div id="bio-desc">
                            bla bla bla grife do coração bla bla 2020
                        </div>
                        <div id="bio-options">
                            <button type="button" class="button bio-option">
                                Seguir
                            </button>
                            <button type="button" class="button bio-option">
                                Compartilhar
                                <i class="bi bi-share-fill"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div id="negocio-info">
                    <div class="negocio-information">
                        <i class="bi bi-bag"></i>
                        <span>9</span> Produtos
                    </div>
                    <div class="negocio-information">
                        <i class="bi bi-people"></i>
                        <span>9</span> Seguidores
                    </div>
                </div>
                <div id="bio-products">
                    <a class="bio-product" href="../products/produto.php">
                        <img src="../assets/img/products-services/bolo-chocolate.jpg" alt="">
                    </a>
                    <a class="bio-product" href="../products/produto.php">
                        <img src="../assets/img/products-services/bolo-laranja.jpg" alt="">
                    </a>
                    <a class="bio-product" href="../products/produto.php">
                        <img src="../assets/img/products-services/cadernos-artesanais.jpg" alt="">
                    </a>
                    <a class="bio-product" href="../products/produto.php">
                        <img src="../assets/img/products-services/conjunto-de-velas.jpg" alt="">
                    </a>
                    <a class="bio-product" href="../products/produto.php">
                        <img src="../assets/img/products-services/oleo-essencial-de-lavanda-10ml.jpg" alt="">
                    </a>
                    <a class="bio-product" href="../products/produto.php">
                        <img src="../assets/img/products-services/francesinha.jpeg" alt="">
                    </a>
                    <a class="bio-product" href="../products/produto.php">
                        <img src="../assets/img/products-services/pano-de-prato.jpg" alt="">
                    </a>
                    <a class="bio-product" href="../products/produto.php">
                        <img src="../assets/img/products-services/sabonetes.jpg" alt="">
                    </a>
                    
                    <!-- <div class="card-produto" href="../products/produto.php" aria-hidden="true">
                        <div class="img-card placeholder-glow">
                            <span class="placeholder"></span>
                        </div>
                        <div class="info-card">
                            <div class="nome-card placeholder-glow">
                                <span class="placeholder col-5"></span>
                                <span class="placeholder col-6"></span>
                            </div>
                            <div class="preco-card placeholder-glow">
                                <div class="placeholder"></div>
                            </div>
                            <div class="avaliacao-card placeholder-glow">
                                <span class="placeholder col-12"></span>
                            </div>
                            <div class="categoria-card placeholder-glow">
                                <span class="placeholder col-4"></span>
                            </div>
                            <div class="negocio-card placeholder-glow">
                                <span class="placeholder col-4 placeholder-sm"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-produto" href="../products/produto.php" aria-hidden="true">
                        <div class="img-card placeholder-glow">
                            <span class="placeholder"></span>
                        </div>
                        <div class="info-card">
                            <div class="nome-card placeholder-glow">
                                <span class="placeholder col-5"></span>
                                <span class="placeholder col-6"></span>
                            </div>
                            <div class="preco-card placeholder-glow">
                                <div class="placeholder"></div>
                            </div>
                            <div class="avaliacao-card placeholder-glow">
                                <span class="placeholder col-12"></span>
                            </div>
                            <div class="categoria-card placeholder-glow">
                                <span class="placeholder col-4"></span>
                            </div>
                            <div class="negocio-card placeholder-glow">
                                <span class="placeholder col-4 placeholder-sm"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-produto" href="../products/produto.php" aria-hidden="true">
                        <div class="img-card placeholder-glow">
                            <span class="placeholder"></span>
                        </div>
                        <div class="info-card">
                            <div class="nome-card placeholder-glow">
                                <span class="placeholder col-5"></span>
                                <span class="placeholder col-6"></span>
                            </div>
                            <div class="preco-card placeholder-glow">
                                <div class="placeholder"></div>
                            </div>
                            <div class="avaliacao-card placeholder-glow">
                                <span class="placeholder col-12"></span>
                            </div>
                            <div class="categoria-card placeholder-glow">
                                <span class="placeholder col-4"></span>
                            </div>
                            <div class="negocio-card placeholder-glow">
                                <span class="placeholder col-4 placeholder-sm"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-produto" href="../products/produto.php" aria-hidden="true">
                        <div class="img-card placeholder-glow">
                            <span class="placeholder"></span>
                        </div>
                        <div class="info-card">
                            <div class="nome-card placeholder-glow">
                                <span class="placeholder col-5"></span>
                                <span class="placeholder col-6"></span>
                            </div>
                            <div class="preco-card placeholder-glow">
                                <div class="placeholder"></div>
                            </div>
                            <div class="avaliacao-card placeholder-glow">
                                <span class="placeholder col-12"></span>
                            </div>
                            <div class="categoria-card placeholder-glow">
                                <span class="placeholder col-4"></span>
                            </div>
                            <div class="negocio-card placeholder-glow">
                                <span class="placeholder col-4 placeholder-sm"></span>
                            </div>
                        </div>
                    </div> -->
                </div>
			</div>
		</main>
	</div>

	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script> -->
	<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/flickity.pkgd.min.js"></script>
	<script src="../assets/js/script.js"></script>
	<script>
		var configuracoes = document.querySelectorAll(".nav-link")[4],
			configIcon = document.querySelectorAll(".nav-link i")[4],
			fotoUsuario = document.querySelector("#foto-usuario"),
			elem = document.querySelectorAll(".carrossel-cards")

		if (localStorage.getItem('theme') == 'dark') {
			html.classList.add('dark')
		}

		elem.forEach((item) => {
			new Flickity(item, {
				cellAlign: "left",
				prevNextButtons: false,
				pageDots: false,
				resize: false,
				contain: true,
			});
		});

		window.onload = () => {
			if (localStorage.getItem("imagemPerfil") === null) {
				configIcon.style.display = "inline-block";
				fotoUsuario.style.display = "none";
			} else {
				fotoUsuario.src = localStorage.getItem("imagemPerfil");
			}
		};
	</script>
</body>

</html>