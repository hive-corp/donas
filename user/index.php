<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Home</title>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
	<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="../assets/css/flickity.css" />
	<link rel="stylesheet" href="../assets/css/styles.css" />
	<link rel="stylesheet" href="../assets/bootstrap-icons-1.10.5/font/bootstrap-icons.css" />
</head>

<body>
	<div id="user">
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
			<div id="pesquisa">
				<div class="search-container">
					<input type="text" role="search" placeholder="Pesquisa" class="search-field" />
					<button class="search-button">
						<i class="bi bi-search"></i>
					</button>
				</div>
			</div>
			<img src="../assets/img/rosas.svg" class="rosa-fundo">

			<div id="content">
				<div class="section">
					<div class="section-title placeholder-element placeholder-glow">
						<span class="placeholder col-4"></span>
					</div>
					<div class="section-title load">Categorias</div>
					<span class="veja-mais placeholder-element placeholder-glow">
						<span class="placeholder col-4"></span>
					</span>
					<a href="pesquisa.php" class="veja-mais load"> veja mais </a>
					<div class="carrossel-cards placeholder-element">
						<div class="card-categoria" aria-hidden="true">
							<div class="img-categoria placeholder-glow">
								<span class="placeholder"></span>
							</div>
							<p class="nome-categoria placeholder-glow">
								<span class="placeholder col-3"></span>
							</p>
						</div>
						<div class="card-categoria" aria-hidden="true">
							<div class="img-categoria placeholder-glow">
								<span class="placeholder"></span>
							</div>
							<p class="nome-categoria placeholder-glow">
								<span class="placeholder col-3"></span>
							</p>
						</div>
						<div class="card-categoria" aria-hidden="true">
							<div class="img-categoria placeholder-glow">
								<span class="placeholder"></span>
							</div>
							<p class="nome-categoria placeholder-glow">
								<span class="placeholder col-3"></span>
							</p>
						</div>
						<div class="card-categoria" aria-hidden="true">
							<div class="img-categoria placeholder-glow">
								<span class="placeholder"></span>
							</div>
							<p class="nome-categoria placeholder-glow">
								<span class="placeholder col-3"></span>
							</p>
						</div>
						<div class="card-categoria" aria-hidden="true">
							<div class="img-categoria placeholder-glow">
								<span class="placeholder"></span>
							</div>
							<p class="nome-categoria placeholder-glow">
								<span class="placeholder col-3"></span>
							</p>
						</div>
						<div class="card-categoria" aria-hidden="true">
							<div class="img-categoria placeholder-glow">
								<span class="placeholder"></span>
							</div>
							<p class="nome-categoria placeholder-glow">
								<span class="placeholder col-3"></span>
							</p>
						</div>
						<div class="card-categoria" aria-hidden="true">
							<div class="img-categoria placeholder-glow">
								<span class="placeholder"></span>
							</div>
							<p class="nome-categoria placeholder-glow">
								<span class="placeholder col-3"></span>
							</p>
						</div>
					</div>
					<div class="carrossel-cards load">
						<a class="card-categoria" href="pesquisa.php">
							<div class="img-categoria">
								<img src="../assets/img/categories/artesanato.svg" alt="Artesanato" />
							</div>
							<p class="nome-categoria">Artesanato</p>
						</a>
						<a class="card-categoria" href="pesquisa.php">
							<div class="img-categoria">
								<img src="../assets/img/categories/culinaria.svg" alt="Culinária" />
							</div>
							<p class="nome-categoria">Culinária</p>
						</a>
						<a class="card-categoria" href="pesquisa.php">
							<div class="img-categoria">
								<img src="../assets/img/categories/manicure.svg" alt="Manicure" />
							</div>
							<p class="nome-categoria">Manicure</p>
						</a>
						<a class="card-categoria" href="pesquisa.php">
							<div class="img-categoria">
								<img src="../assets/img/categories/roupas.svg" alt="Roupas" />
							</div>
							<p class="nome-categoria">Roupas</p>
						</a>
						<a class="card-categoria" href="pesquisa.php">
							<div class="img-categoria">
								<img src="../assets/img/categories/joias.svg" alt="Joias" />
							</div>
							<p class="nome-categoria">Joias</p>
						</a>
						<a class="card-categoria" href="pesquisa.php">
							<div class="img-categoria">
								<img src="../assets/img/categories/livro.svg" alt="Livros" />
							</div>
							<p class="nome-categoria">Livros</p>
						</a>
						<a class="card-categoria" href="pesquisa.php">
							<div class="img-categoria">
								<img src="../assets/img/categories/beleza.svg" alt="Beleza" />
							</div>
							<p class="nome-categoria">Beleza</p>
						</a>
					</div>
				</div>
				<div class="section">
					<div class="section-title placeholder-element placeholder-glow">
						<span class="placeholder col-4"></span>
					</div>
					<div class="section-title load">Para você</div>
					<span class="veja-mais placeholder-element placeholder-glow">
						<span class="placeholder col-4"></span>
					</span>
					<a href="pesquisa.php" class="veja-mais load"> veja mais </a>
					<div class="carrossel-cards placeholder-element">
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
					</div>
					<div class="carrossel-cards load">
						<a class="card-produto" href="../products/produto.php">
							<div class="img-card">
								<img src="../assets/img/products-services/cadernos-artesanais.jpg" />
							</div>
							<div class="info-card">
								<div class="nome-card">Cadernos artesanais</div>
								<div class="preco-card">R$25,00</div>
								<div class="avaliacao-card">
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-half"></i>
								</div>
								<div class="categoria-card">Artesanato</div>
								<div class="negocio-card">Cantinho da Arte</div>
							</div>
						</a>
						<a class="card-produto" href="../products/produto.php">
							<div class="img-card">
								<img src="../assets/img/products-services/francesinha.jpeg" />
							</div>
							<div class="info-card">
								<div class="nome-card">Francesinha</div>
								<div class="preco-card">R$20,00</div>
								<div class="avaliacao-card">
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star"></i>
									<i class="bi bi-star"></i>
								</div>
								<div class="categoria-card">Manicure</div>
								<div class="negocio-card">Mulher Maravilha</div>
							</div>
						</a>
						<a class="card-produto" href="../products/produto.php">
							<div class="img-card">
								<img src="../assets/img/products-services/bolo-laranja.jpg" />
							</div>
							<div class="info-card">
								<div class="nome-card">Bolo de Laranja</div>
								<div class="preco-card">R$15,00</div>
								<div class="avaliacao-card">
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
								</div>
								<div class="categoria-card">Culinária</div>
								<div class="negocio-card">Açúcar e Canela</div>
							</div>
						</a>
						<a class="card-produto" href="../products/produto.php">
							<div class="img-card">
								<img src="../assets/img/products-services/bolo-chocolate.jpg" />
							</div>
							<div class="info-card">
								<div class="nome-card">Bolo de Chocolate</div>
								<div class="preco-card">R$25,00</div>
								<div class="avaliacao-card">
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
								</div>
								<div class="categoria-card">Culinária</div>
								<div class="negocio-card">Açúcar e Canela</div>
							</div>
						</a>
						<a class="card-produto" href="../products/produto.php">
							<div class="img-card">
								<img src="../assets/img/products-services/sabonetes.jpg" />
							</div>
							<div class="info-card">
								<div class="nome-card">Sabonetes Artesanais de Lavanda</div>
								<div class="preco-card">R$12,00</div>
								<div class="avaliacao-card">
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-half"></i>
								</div>
								<div class="categoria-card">Beleza</div>
								<div class="negocio-card">Ana Rodrigues</div>
							</div>
						</a>
						<a class="card-produto" href="../products/produto.php">
							<div class="img-card">
								<img src="../assets/img/products-services/pano-de-prato.jpg" />
							</div>
							<div class="info-card">
								<div class="nome-card">Pano de Prato Bordado</div>
								<div class="preco-card">R$25,00</div>
								<div class="avaliacao-card">
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star"></i>
									<i class="bi bi-star"></i>
								</div>
								<div class="categoria-card">Artesanato</div>
								<div class="negocio-card">Maria Santos</div>
							</div>
						</a>
						<a class="card-produto" href="../products/produto.php">
							<div class="img-card">
								<img src="../assets/img/products-services/conjunto-de-velas.jpg" />
							</div>
							<div class="info-card">
								<div class="nome-card">Conjunto de Velas Perfumadas</div>
								<div class="preco-card">R$35,00</div>
								<div class="avaliacao-card">
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
								</div>
								<div class="categoria-card">Decoração</div>
								<div class="negocio-card">Isabella Silva</div>
							</div>
						</a>
						<a class="card-produto" href="../products/produto.php">
							<div class="img-card">
								<img src="../assets/img/products-services/oleo-essencial-de-lavanda-10ml.jpg" />
							</div>
							<div class="info-card">
								<div class="nome-card">
									Óleo Essencial Relaxante de Lavanda 10ml
								</div>
								<div class="preco-card">R$30,00</div>
								<div class="avaliacao-card">
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
								</div>
								<div class="categoria-card">Bem estar</div>
								<div class="negocio-card">Luísa Oliveira</div>
							</div>
						</a>
					</div>
				</div>
				<div class="section">
					<div class="section-title placeholder-element placeholder-glow">
						<span class="placeholder col-4"></span>
					</div>
					<div class="section-title load">Populares</div>
					<span class="veja-mais placeholder-element placeholder-glow">
						<span class="placeholder col-4"></span>
					</span>
					<a href="pesquisa.php" class="veja-mais load"> veja mais </a>
					<div class="carrossel-cards placeholder-element">
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
					</div>
					<div class="carrossel-cards load">
						<a class="card-produto" href="../products/produto.php">
							<div class="img-card">
								<img src="../assets/img/products-services/cadernos-artesanais.jpg" />
							</div>
							<div class="info-card">
								<div class="nome-card">Cadernos artesanais</div>
								<div class="preco-card">R$25,00</div>
								<div class="avaliacao-card">
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-half"></i>
								</div>
								<div class="categoria-card">Artesanato</div>
								<div class="negocio-card">Cantinho da Arte</div>
							</div>
						</a>
						<a class="card-produto" href="../products/produto.php">
							<div class="img-card">
								<img src="../assets/img/products-services/francesinha.jpeg" />
							</div>
							<div class="info-card">
								<div class="nome-card">Francesinha</div>
								<div class="preco-card">R$20,00</div>
								<div class="avaliacao-card">
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star"></i>
									<i class="bi bi-star"></i>
								</div>
								<div class="categoria-card">Manicure</div>
								<div class="negocio-card">Mulher Maravilha</div>
							</div>
						</a>
						<a class="card-produto" href="../products/produto.php">
							<div class="img-card">
								<img src="../assets/img/products-services/bolo-laranja.jpg" />
							</div>
							<div class="info-card">
								<div class="nome-card">Bolo de Laranja</div>
								<div class="preco-card">R$15,00</div>
								<div class="avaliacao-card">
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
								</div>
								<div class="categoria-card">Culinária</div>
								<div class="negocio-card">Açúcar e Canela</div>
							</div>
						</a>
						<a class="card-produto" href="../products/produto.php">
							<div class="img-card">
								<img src="../assets/img/products-services/bolo-chocolate.jpg" />
							</div>
							<div class="info-card">
								<div class="nome-card">Bolo de Chocolate</div>
								<div class="preco-card">R$25,00</div>
								<div class="avaliacao-card">
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
								</div>
								<div class="categoria-card">Culinária</div>
								<div class="negocio-card">Açúcar e Canela</div>
							</div>
						</a>
						<a class="card-produto" href="../products/produto.php">
							<div class="img-card">
								<img src="../assets/img/products-services/sabonetes.jpg" />
							</div>
							<div class="info-card">
								<div class="nome-card">Sabonetes Artesanais de Lavanda</div>
								<div class="preco-card">R$12,00</div>
								<div class="avaliacao-card">
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-half"></i>
								</div>
								<div class="categoria-card">Beleza</div>
								<div class="negocio-card">Ana Rodrigues</div>
							</div>
						</a>
						<a class="card-produto" href="../products/produto.php">
							<div class="img-card">
								<img src="../assets/img/products-services/pano-de-prato.jpg" />
							</div>
							<div class="info-card">
								<div class="nome-card">Pano de Prato Bordado</div>
								<div class="preco-card">R$25,00</div>
								<div class="avaliacao-card">
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star"></i>
									<i class="bi bi-star"></i>
								</div>
								<div class="categoria-card">Artesanato</div>
								<div class="negocio-card">Maria Santos</div>
							</div>
						</a>
						<a class="card-produto" href="../products/produto.php">
							<div class="img-card">
								<img src="../assets/img/products-services/conjunto-de-velas.jpg" />
							</div>
							<div class="info-card">
								<div class="nome-card">Conjunto de Velas Perfumadas</div>
								<div class="preco-card">R$35,00</div>
								<div class="avaliacao-card">
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
								</div>
								<div class="categoria-card">Decoração</div>
								<div class="negocio-card">Isabella Silva</div>
							</div>
						</a>
						<a class="card-produto" href="../products/produto.php">
							<div class="img-card">
								<img src="../assets/img/products-services/oleo-essencial-de-lavanda-10ml.jpg" />
							</div>
							<div class="info-card">
								<div class="nome-card">
									Óleo Essencial Relaxante de Lavanda 10ml
								</div>
								<div class="preco-card">R$30,00</div>
								<div class="avaliacao-card">
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
									<i class="bi bi-star-fill"></i>
								</div>
								<div class="categoria-card">Bem estar</div>
								<div class="negocio-card">Luísa Oliveira</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<img src="../assets/img/rosas.svg" class="rosa-fundo">
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