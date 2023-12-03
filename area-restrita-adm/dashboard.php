<?php
include_once("validador.php");
include_once("global.php");


// Obtém os dados
$categorias = daoCategoria::graficoCategorias();
$denuncias = daoDenuncia::graficoDenuncias();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrin-to-fit=no">

    <title>Dashboard - Donas</title>

    <link rel="shortcut icon" type="imagex/png" href="../assets/media/Logo-menor.png">

    <link href="../assets/css/styles-dash.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Adicione a referência ao Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!--LINKS-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sb-admin-2.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Dashboard.php">
                <div class="sidebar-brand-icon ">
                    <img src="../assets/media/LogoDash.png" class="Logo">
                </div>
                <div class="sidebar-brand-text mx-3">Donas</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path
                            d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                    </svg>
                    <span class="textoNav">Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="donas.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-person-badge" viewBox="0 0 16 16">
                        <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path
                            d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z" />
                    </svg>
                    <span class="textoNav">Donas</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="contas.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                    </svg>
                    <span class="textoNav">Contas</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="denuncias.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-flag" viewBox="0 0 16 16">
                        <path
                            d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z" />
                    </svg>
                    <span class="textoNav">Denúncias</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="cadastra-cate.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-tags" viewBox="0 0 16 16">
                        <path
                            d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z" />
                        <path
                            d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z" />
                    </svg>
                    <span class="textoNav">Cadastrar Categoria</span></a>
            </li>
            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="cadastra-subcate.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-custom-icon" viewBox="0 0 16 16">
                        <!-- Substitua os caminhos abaixo pelos caminhos do seu ícone personalizado -->
                        <path
                            d="M1 8c0-1.104.896-2 2-2s2 .896 2 2c0 .745-.416 1.385-1 1.732V15a1 1 0 1 1-2 0V9.732A1.977 1.977 0 0 1 1 8z" />
                        <path
                            d="M12 8c0-1.104.896-2 2-2s2 .896 2 2c0 .745-.416 1.385-1 1.732V15a1 1 0 1 1-2 0V9.732A1.977 1.977 0 0 1 12 8z" />
                        <path
                            d="M8 1c-1.104 0-2 .896-2 2 0 .745.416 1.385 1 1.732V15a1 1 0 1 0 2 0V4.732A1.977 1.977 0 0 0 10 3c0-1.104-.896-2-2-2z" />
                    </svg>
                    <span class="textoNav">Cadastrar Subcategoria</span>
                </a>
            </li>


            <hr class="sidebar-divider my-0">


        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                            <path
                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                        </svg>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Procurar ..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
                                        class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 display-4"
                                            placeholder="Procurar" aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-bell-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                </svg>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">1+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerta Notificação
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                                                <path
                                                    d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                <path
                                                    d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">12/06/2023</div>
                                        <span class="font-weight-bold">Nova denúncia de Ana Clara Rocha</span>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="denuncias.php">Ver
                                    Mais</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-chat-right-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M14 0a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z" />
                                </svg>

                                <span class="badge badge-danger badge-counter">1</span>
                            </a>

                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Novas Mensagens
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../assets/media/novasMensagens.jpg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">A minha conta foi bloqueada sem motivos ...</div>
                                        <div class="small text-gray-500">Ana Clara Rocha</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Ver Mais</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-moon-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                                </svg>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Heloisa Martins</span>
                                <img class="img-profile rounded-circle" src="../assets/media/Adm-dash.jpg">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="logout.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                        <path fill-rule="evenodd"
                                            d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                    </svg>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div id="linhaTexto">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        </div>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-files" viewBox="0 0 16 16">
                                <path
                                    d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z" />
                            </svg> Gerar Relatório</a>
                    </div>

                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card-dashboard card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div style="display: flex; align-items: center;">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Total de Donas</div>
                                                <div class="h6 mb-0 font-weight-bold text-gray-800"
                                                    style="margin-bottom: 4px!important; margin-left: 2px;">
                                                    (<?php echo daoVendedora::contarVendedora() ?>)
                                                </div>
                                            </div>
                                            <div style="display: flex; align-items: center;">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"
                                                    style="margin-right: 7px;">
                                                    Bloqueadas
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"
                                                    style="font-size: 1rem; margin-bottom: 1px!important;">
                                                    <?php echo daoVendedora::contarVendBloq() ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a class="nav-link" style="padding: 1px;" href="donas.php"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                    fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                </svg></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card-dashboard card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div style="display: flex; align-items: center;">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Total de Clientes</div>
                                                <div class="h6 mb-0 font-weight-bold text-gray-800"
                                                    style="margin-bottom: 4px!important; margin-left: 2px;">
                                                    (<?php echo daoCliente::contarCliente() ?>)
                                                </div>
                                            </div>
                                            <div style="display: flex; align-items: center;">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"
                                                    style="margin-right: 7px;">
                                                    Bloqueadas
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"
                                                    style="font-size: 1rem; margin-bottom: 1px!important;">
                                                    <?php echo daoCliente::contarCliBloq() ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a class="nav-link" style="padding: 1px;" href="contas.php"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                    fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                </svg></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card-dashboard card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Anúncios na plataforma
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php echo daoAnuncio::contarAnuncio() ?>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card-dashboard card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div style="display: flex; align-items: center;">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Contas Bloqueadas</div>
                                                <div class="h6 mb-0 font-weight-bold text-gray-800"
                                                    style="margin-bottom: 4px!important; margin-left: 5px;">
                                                    (<?php echo daoVendedora::contarVendBloq() + daoCliente::contarCliBloq()?>)
                                                </div>
                                            </div>
                                            <div style="display: flex; align-items: center;">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"
                                                    style="margin-right: 7px;">
                                                    Donas
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"
                                                    style="font-size: 1rem; margin-bottom: 2.2px!important;">
                                                    <?php echo daoVendedora::contarVendBloq() ?>
                                                </div>
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"
                                                    style="margin-right: 7px;">
                                                    Clientes
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"
                                                    style="font-size: 1rem; margin-bottom: 2.2px!important;">
                                                    <?php echo daoCliente::contarCliBloq() ?>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xl-8 col-lg-7">
                            <div class="card-dashboard card shadow mb-4">

                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-success">Crescimento da Plataforma - Grafico
                                    </h6>
                                    <div class="dropdown no-arrow">

                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myCresChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PHP para listar as duas últimas denúncias -->
                        <?php
                        $ultimasDenuncias = daoDenuncia::listarUltimasDuas();
                        ?>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card-dashboard card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-success">Denúncias (<?php echo daoDenuncia::contarDenuncia() ?>)
                                    </h6>
                                </div>

                                <div class="card-body">
                                    <?php foreach ($ultimasDenuncias as $denuncia): ?>
                                        <h5>
                                            <?php echo $denuncia['nomeCliente']; ?>
                                        </h5>
                                        <a href="ver-mais-denu.php?id=<?php echo $denuncia['idDenuncia']; ?>">
                                            <div class="customer-wrapper">
                                                <img class="rounded-circle imageDenun"
                                                    src="../<?php echo $denuncia['fotoCliente'] ?>" alt="">
                                                <div class="customer-name">
                                                    <h6>
                                                        <?php
                                                        $motivoDenuncia = $denuncia['motivoDenuncia'];
                                                        switch ($motivoDenuncia) {
                                                            case 1:
                                                                echo 'Propaganda enganosa';
                                                                break;
                                                            case 2:
                                                                echo 'Assédio';
                                                                break;
                                                            case 3:
                                                                echo 'Atividades ilegais';
                                                                break;
                                                            case 4:
                                                                echo 'Ofensas';
                                                                break;
                                                            case 5:
                                                                echo 'Falta de segurança';
                                                                break;
                                                            case 6:
                                                                echo 'Se passando por outra pessoa';
                                                                break;
                                                            default:
                                                                echo 'Motivo desconhecido';
                                                                break;
                                                        }
                                                        echo (strlen($motivoDenuncia) > 15 ? '...' : '');
                                                        ?>
                                                    </h6>
                                                    <p style="margin-bottom: 2px!important;">
                                                        <?php
                                                        $descricaoDenuncia = substr($denuncia['descricaoDenuncia'], 0, 35);
                                                        echo $descricaoDenuncia . (strlen($denuncia['descricaoDenuncia']) > 35 ? '...' : '');
                                                        ?>
                                                    </p>
                                                </div>
                                                <p class="customer-date">
                                                    <?php echo date('d M', strtotime($denuncia['dataDenuncia'])); ?>
                                                </p>
                                            </div>
                                        </a>
                                        <hr>
                                    <?php endforeach; ?>


                                    <a href="denuncias.php">
                                        <a class="dropdown-item text-center small text-gray-500"
                                            style="text-align: center;" href="denuncias.php">Ver Mais</a>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-6 mb-4">
                            <div class="card-dashboard card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-success">Denúncias</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-pie">
                                        <canvas id="myDenunChart"></canvas>
                                    </div>
                                    <br>
                                    <a href="denuncias.php" class="d-sm-inline-block btn btn-sm btn-primary">
                                        Ver denúncias
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="card-dashboard card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-success">Categorias mais populares</h6>
                                </div>
                                <div class="card-body">
                                    <br>
                                    <div id="myCateChart" class="chart-pie" style="min-width: 300px;"></div>
                                    <a href="cadastra-Cate.php" class="d-sm-inline-block btn btn-sm btn-primary">
                                        Adicionar nova categoria
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-6 mb-4">
                            <div class="card-dashboard card shadow mb-4">
                                <div class="card mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-success">Diferença de crescimento</h6>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="chart-pie" style="min-height: 360px;">
                                        <canvas id="tabelas"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Seta para subir a tela-->
    <a class="scroll-to-top rounded" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-up-short"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z" />
        </svg>
    </a>

    <!--MODAL-->




    <script>
        // Grafico de crescimento da plataforma

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Area Chart Example
        var dadosCrescimento = <?php echo json_encode(daoDashboard::graficoCresPlataforma()); ?>;
        var grafcres = document.getElementById("myCresChart");
        var myCresChart = new Chart(grafcres, {
            type: 'line',
            data: {
                labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Aug", "Set", "Out", "Nov", "Dez"],
                datasets: [{
                    label: "Crescimento",
                    lineTension: 0.3,
                    backgroundColor: "#fff",
                    borderColor: "#971881",
                    pointRadius: 3,
                    pointBackgroundColor: "#420C33",
                    pointBorderColor: "#fff",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "#000",
                    pointHoverBorderColor: "#000",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: dadosCrescimento,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        
                            ticks: {
            maxTicksLimit: 5,
            padding: 10,
            stepSize: 1,  // Alterado para 1 para representar inteiros
            beginAtZero: true,  // Começa a contagem a partir do zero
        },
                        
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            stepSize: 1,  // Adicionado para definir o intervalo entre os ticks
                            // Callback para formatar os ticks
                            callback: function (value, index, values) {
                                return value.toLocaleString();  // Formate conforme necessário
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function (tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });

    </script>





    <script>
        // Grafico de denuncias por motivo
        var grafdenun = document.getElementById("myDenunChart");
        var myDenunChart = new Chart(grafdenun, {
            type: 'doughnut',
            data: {
                labels: [
                    <?php
                    $graficodenun = DaoDenuncia::graficoDenuncias(); // Assuming DaoDenuncia is the correct class name
                    foreach ($graficodenun as $denuncia) {
                        $motivoDenunciaLabel = '';
                        switch ($denuncia['motivoDenuncia']) {
                            case 1:
                                $motivoDenunciaLabel = 'Propaganda enganosa';
                                break;
                            case 2:
                                $motivoDenunciaLabel = 'Assédio';
                                break;
                            case 3:
                                $motivoDenunciaLabel = 'Atividades ilegais';
                                break;
                            case 4:
                                $motivoDenunciaLabel = 'Ofensas';
                                break;
                            case 5:
                                $motivoDenunciaLabel = 'Falta de segurança';
                                break;
                            case 6:
                                $motivoDenunciaLabel = 'Se passando por outra pessoa';
                                break;
                            default:
                                $motivoDenunciaLabel = 'Motivo desconhecido';
                                break;
                        }
                        $formattedPercentual = number_format($denuncia['percentual'], 2); // Arredonda para duas casas decimais
                        echo "'{$motivoDenunciaLabel} ({$denuncia['quantidade']}, {$formattedPercentual}%)',";
                    }
                    ?>
                ],
                datasets: [{
                    data: [
                        <?php
                        foreach ($graficodenun as $denuncia) {
                            echo $denuncia['quantidade'] . ",";
                        }
                        ?>
                    ],
                    backgroundColor: ['#971881', '#CB6CE6', '#D11174', '#971881', '#420C33'],
                    hoverBackgroundColor: ['#9265f5'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: true,
                },
                cutoutPercentage: 80,
            },
        });
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load("current", { packages: ["corechart"] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var graficocate = <?php echo json_encode(DaoCategoria::graficoCategorias()); ?>;
            var data = [['Categoria', 'Quantidade', { role: 'tooltip' }]];  // Adicionando o tooltip como uma terceira coluna

            graficocate.forEach(function (categoria) {
                var formattedPercentual = number_format(categoria['percentual'], 2);
                var tooltip = categoria['nomeCategoria'] + '\nQuantidade: ' + categoria['quantidade'] + '\nPorcentagem: ' + formattedPercentual + '%';
                data.push([categoria['nomeCategoria'] + '\n' + categoria['quantidade'] + ' (' + formattedPercentual + '%)', categoria['quantidade'], tooltip]);
            });

            var data = google.visualization.arrayToDataTable(data);

            var options = {
                width: 500,
                backgroundColor: '#ffffff00',
                height: 250,
                is3D: true,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                slices: {
                    0: { color: '#FF69B4' },
                    1: { color: '#FFC0CB' },
                    2: { color: '#DA70D6' },
                    3: { color: '#8A2BE2' },
                    4: { color: '#FF6347' },
                    5: { color: '#FF0000' },
                    6: { color: '#9370DB' },
                    7: { color: '#800000' },
                    8: { color: '#FF4500' },
                    9: { color: '#DC143C' },
                },

                legend: { position: 'right', maxLines: 3, top: 100 },
                chartArea: { left: 75, top: 10, width: '80%', height: '100%' }
            };

            var chart = new google.visualization.PieChart(document.getElementById('myCateChart'));
            chart.draw(data, options);
        }
    </script>






    <?php
    $graficoCrescimento = daoVendedora::graficoCrescimento(); // Substitua "daoVendedora" pelo nome correto da sua classe DAO
    
    $dataDonaGratis = array_map(function ($vendedora) {
        return $vendedora['quantidadePedidos'];
    }, $graficoCrescimento['vendedorasPadrao']);

    $dataDonaPremium = array_map(function ($vendedora) {
        return $vendedora['quantidadePedidos'];
    }, $graficoCrescimento['vendedorasPremium']);

    $labels = array_map(function ($vendedora) {
        $quantidade = isset($vendedora['quantidadePedidos']) ? $vendedora['quantidadePedidos'] : 0;
        $percentual = isset($vendedora['percentual']) ? number_format($vendedora['percentual'], 2) : 0;
        return "{$vendedora['nomeVendedora']} ({$quantidade}, {$percentual}%)";
    }, array_merge($graficoCrescimento['vendedorasPadrao'], $graficoCrescimento['vendedorasPremium']));

    ?>


    <script>
        // Grafico de crescimento de donas premium e padrao baseado por pedidos por vendedora

        const dataDonaGratis = <?php echo json_encode($dataDonaGratis); ?>;
        const dataDonaPremium = <?php echo json_encode($dataDonaPremium); ?>;

        new Chart(document.querySelector('#tabelas'), {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Dona Gratís',
                    data: dataDonaGratis,
                    backgroundColor: '#971881',
                    borderRadius: 4,
                    color: 'rgb(0,0,0)'
                },
                {
                    label: 'Dona Premium',
                    data: dataDonaPremium,
                    backgroundColor: '#D11174',
                    borderRadius: 4,
                    color: 'rgb(0,0,0)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgb(0,0,0,0.05)'
                        },
                        ticks: {
                            font: {
                                size: 12,
                            },
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 12,
                            },
                        }
                    }
                },
                aspectRatio: 4 / 3,
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 12,
                            },
                        }
                    },
                }
            }
        })
    </script>



    <!-- Adicione isso antes do fechamento da tag </body> em seu arquivo HTML -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            obterDadosCategorias(); // Chama a função após o carregamento da página
        });
    </script>


</body>

</html>