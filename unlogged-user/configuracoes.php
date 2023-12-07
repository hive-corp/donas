<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/media/favicon.ico" type="image/x-icon">
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

    <div id="user-config">
        <nav id="nav">
            <picture id="nav-logo">
                <source srcset="../assets/media/logo-letra.svg" media="(max-width:1200px)" />
                <img src="../assets/media/logo-h.svg" alt="Logo do DONAS" class="mobile-hide">
            </picture>
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
                <a href="#" class="nav-link" data-bs-target="#modal-login" data-bs-toggle="modal">
                    <i class="bi bi-chat"></i>
                    <span>
                        Conversas
                    </span>
                </a>
                <a href="configuracoes.php" class="nav-link active">
                    <i class="bi bi-person-fill"></i>
                    <span>
                        Configurações
                    </span>
                </a>
            </div>
            <a id="new-product" href="login.php" class="button">
				<i class="bi bi-box-arrow-in-right"></i>
				<span>Fazer log-in</span>
			</a>
        </nav>

        <div id="config">
            <div id="config-title">
                Configurações
            </div>
            <div id="list-configs">
                <label for="noturno-slider" class="config-item">
                    Tema escuro
                    <label class="switch">
                        <input type="checkbox" id="noturno-slider">
                        <span class="slider"></span>
                    </label>
                </label>
                <a href="../login.php" class="config-item">
                    Fazer log-in
                </a>
            </div>
        </div>
        <main id="main" class="hide">
            <div id="main-title">
                <button class="voltar hide" id="voltar-config" data-config-hide="">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <button class="voltar hide" id="voltar-perfil" data-config-hide="">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <span></span>
            </div>
            <div id="content">

            </div>
        </main>
    </div>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>