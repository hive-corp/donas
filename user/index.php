<?php

require_once "validador.php";

if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];

}
if (isset($_GET['categoria']) && !empty($_GET['categoria'])) {
    $categoria = $_GET['categoria'];
}
if (isset($_GET['tipo']) && !empty($_GET['tipo'])) {
    $tipo = $_GET['tipo'];
}
if (isset($_GET['preco']) && !empty($_GET['preco'])) {
    $preco = $_GET['preco'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Home</title>
	<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="shortcut icon" href="../assets/media/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="../assets/vendor/flickity/css/flickity.css" />
	<link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css" />
	<link rel="stylesheet" href="../assets/css/styles.css" />
</head>

<body>
	<div id="user">
		<nav id="nav">
			<picture id="nav-logo">
				<source srcset="../assets/media/logo-letra.svg" media="(max-width:1200px)" />
				<img src="../assets/media/logo-h.svg" alt="Logo do DONAS" class="mobile-hide">
			</picture>
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
				<a href="seus-pedidos.php" class="nav-link mobile-hide">
					<i class="bi bi-box-seam"></i>
					<span>
						Seus pedidos
					</span>
				</a>
				<a href="notificacoes.php" class="nav-link">
					<i class="bi bi-bell">
						<?php
						if (daoNotifcCliente::contarNotificacoes($_SESSION['id'])) {
						?>
							<span class="counter">
								<?php
								echo daoNotifcCliente::contarNotificacoes($_SESSION['id']);
								?>
							</span>
						<?php
						}
						?>
					</i>
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
					<button id="options-user" class="options-button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
		<form action="pesquisa.php">
			<div id="pesquisa">
				<img class="logo-pesquisa" src="../assets/media/Logo-menor.png" alt="">
				<div class="search-container search-square">
					<input type="text" role="search" placeholder="Pesquisa" class="search-field" name="pesquisa" value="<?php echo isset($pesquisa) ? $pesquisa : "" ?>"/>
					<button class="search-button">
						<i class="bi bi-search"></i>
					</button>
				</div>
			</div>
					</form>
			<!-- <img src="../assets/media/rosas.svg" class="rosa-fundo"> -->

			<div id="content">
				<h2>Bem vindo(a), <span class="highlight"><?php echo explode(" ", $_SESSION['nome'])[0] ?></span>!</h2>
				<div id="carrossel">
					<div class="carousel-cell">
						<img src="../assets/media/carousel/1.png" alt="">
					</div>
					<div class="carousel-cell">
						<img src="../assets/media/carousel/2.png" alt="">
					</div>
				</div>
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
						<?php
						$categorias = daoCategoria::listar();

						foreach ($categorias as $c) {
						?>
							<a class="card-categoria" href="pesquisa.php">
								<div class="img-categoria">
									<img src="../<?php echo $c['fotoCategoria'] ?>" alt="<?php echo $c['nomeCategoria'] ?>" />
								</div>
								<p class="nome-categoria"><?php echo $c['nomeCategoria'] ?></p>
							</a>
						<?php
						}
						?>
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
						<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
						<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
						<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
						<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
						<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
						<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
						<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
						<?php

						$anuncios = daoAnuncio::listarAnunciosPreferencias($_SESSION['id']);

						foreach ($anuncios as $a) {

							$qtdestrelas = $a['estrelasAnuncio'];

						?>
							<a class="card-anuncio" href="anuncio.php?a=<?php echo $a['idAnuncio'] ?>">
								<div class="img-card">
									<img src="../<?php echo $a['imagemPrincipalAnuncio'] ?>" />
								</div>
								<div class="info-card">
									<div class="nome-card"><?php echo $a['nomeAnuncio'] ?></div>
									<div class="preco-card">R$<?php echo number_format($a['valorAnuncio'], 2, ',', '.') ?></div>
									<div class="avaliacao-card">
										<?php

										for ($i = 0; $i < $qtdestrelas; $i += 1) {
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
									<div class="categoria-card"><?php echo $a['nomeCategoria'] ?></div>
									<div class="negocio-card"><?php echo $a['nomeNegocioVendedora'] ?></div>
								</div>
							</a>
						<?php
						}

						?>
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
						<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
						<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
						<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
						<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
						<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
						<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
						<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
						<?php

						$anuncios = daoAnuncio::listarAnunciosPorEstrelas();

						foreach ($anuncios as $a) {

							$qtdestrelas = $a['estrelasAnuncio'];

						?>
							<a class="card-anuncio" href="anuncio.php?a=<?php echo $a['idAnuncio'] ?>">
								<div class="img-card">
									<img src="../<?php echo $a['imagemPrincipalAnuncio'] ?>" />
								</div>
								<div class="info-card">
									<div class="nome-card"><?php echo $a['nomeAnuncio'] ?></div>
									<div class="preco-card">R$<?php echo number_format($a['valorAnuncio'], 2, ',', '.') ?></div>
									<div class="avaliacao-card">
										<?php

										for ($i = 0; $i < $qtdestrelas; $i += 1) {
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
									<div class="categoria-card"><?php echo $a['nomeCategoria'] ?></div>
									<div class="negocio-card"><?php echo $a['nomeNegocioVendedora'] ?></div>
								</div>
							</a>
						<?php
						}

						?>
					</div>
				</div>
				<?php
				$isFollowing = daoSeguidor::contarQuantosSegue($_SESSION['id']);

				if ($isFollowing != 0) {
				?>
					<div class="section">
						<div class="section-title placeholder-element placeholder-glow">
							<span class="placeholder col-4"></span>
						</div>
						<div class="section-title load">Quem você segue</div>
						<span class="veja-mais placeholder-element placeholder-glow">
							<span class="placeholder col-4"></span>
						</span>
						<a href="pesquisa.php" class="veja-mais load"> veja mais </a>
						<div class="carrossel-cards placeholder-element">
							<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
							<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
							<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
							<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
							<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
							<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
							<div class="card-anuncio" href="produto.php" aria-hidden="true">
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
							<?php

							$anuncios = daoAnuncio::listarAnunciosPorContaSeguida($_SESSION['id']);

							foreach ($anuncios as $a) {

								$qtdestrelas = $a['estrelasAnuncio'];

							?>
								<a class="card-anuncio" href="anuncio.php?a=<?php echo $a['idAnuncio'] ?>">
									<div class="img-card">
										<img src="../<?php echo $a['imagemPrincipalAnuncio'] ?>" />
									</div>
									<div class="info-card">
										<div class="nome-card"><?php echo $a['nomeAnuncio'] ?></div>
										<div class="preco-card">R$<?php echo number_format($a['valorAnuncio'], 2, ',', '.') ?></div>
										<div class="avaliacao-card">
											<?php

											for ($i = 0; $i < $qtdestrelas; $i += 1) {
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
										<div class="categoria-card"><?php echo $a['nomeCategoria'] ?></div>
										<div class="negocio-card"><?php echo $a['nomeNegocioVendedora'] ?></div>
									</div>
								</a>
							<?php
							}

							?>
						</div>
					</div>
				<?php
				}
				?>
			</div>
			<!-- <img src="../assets/media/rosas.svg" class="rosa-fundo"> -->
		</main>
	</div>

	<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/vendor/flickity/js/flickity.pkgd.min.js"></script>
	<script src="../assets/js/script.js"></script>
	<script>
		var elem = document.querySelectorAll(".carrossel-cards")

		elem.forEach((item) => {
			new Flickity(item, {
				cellAlign: "left",
				prevNextButtons: false,
				pageDots: false,
				resize: false,
				contain: true,
			});
		});

		var carro = document.querySelector("#carrossel")

		new Flickity(carro, {
			prevNextButtons: false,
			pageDots: true,
			resize: true,
			contain: false,
			lazyLoad: true,
			wrapAround: true,
			autoPlay: 1500
		});
	</script>
</body>

</html>