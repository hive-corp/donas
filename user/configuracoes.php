<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div id="user-config">
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
                <a href="configuracoes.php" class="nav-link active">
                    <img src="" id="foto-usuario">
                    <i class="bi bi-person-fill"></i>
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

        <div id="config">
            <div id="config-title">
                Configurações
            </div>
            <div id="list-configs">
                <div class="config-item">
                    Informações pessoais
                </div>
                <a href="notificacoes.php" class="config-item">
                    Notificações
                </a>
                <label for="noturno-slider" class="config-item">
                    Tema escuro
                    <label class="switch">
                        <input type="checkbox" id="noturno-slider">
                        <span class="slider"></span>
                    </label>
                </label>
                <a href="../" class="config-item">
                    Sair
                </a>
            </div>
        </div>
        <main id="main" class="hide">
            <div id="main-title">
                Nome
            </div>
            <div id="content">

            </div>
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