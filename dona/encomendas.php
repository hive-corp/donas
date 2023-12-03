<?php

require_once "validador.php";

$dados = daoVendedora::consultarPorId($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encomendas</title>
    <link rel="shortcut icon" href="../assets/media/favicon.ico" type="image/x-icon" />
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="user-encomenda">
    <div class="modal pop" id="modal-premium" tabindex="-1" aria-labelledby="modal-encomenda" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Plano Premium</h1>
                    </div>
                    <div class="modal-body" style="grid-template-columns: 0fr 0fr;">
                        <div class="row">
                            <div class="col d-flex flex-column align-items-center justify-content-center">
                            <p class="section-title load" style="text-align: center">Confira tudo que o nosso plano premium <span class="highlight"> oferece</span></p>
                            
                        </button>    
                        </div>
                            <div class="col">
                            <div class="tipo-plano mx-auto" style="width: 280px">

                                <div class="titulo-plano">
                                    Premium
                                </div>
                                <div class="preco-plano" style="color:black">
                                    R$49/mês
                                </div>
                                <div class="lista-plano" style="color:black">
                                    <div>
                                        <i class="bi bi-check"></i>
                                        Postar produtos a toda a rede de clientes
                                    </div>
                                    <div>
                                        <i class="bi bi-check"></i>
                                        Encomenda dos produtos através da plataforma Donas
                                    </div>
                                    <div>
                                        <i class="bi bi-check"></i>
                                        Painel de encomendas
                                    </div>
                                    <div>
                                        <i class="bi bi-check"></i>
                                        Engajamento maior dentro da plataforma
                                    </div>
                                </div>
                                <button class="aceitar-plano" type="button" class="button" id="iniciar-pagamento" data-bs-target="#modal-pagamento" data-bs-toggle="modal" for="premium">
                                Comprar
                            </button>
                            </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="button button-secondary" data-bs-dismiss="modal">Não tenho interresse</button>
                         <!-- <button type="button" class="button" id="iniciar-pagamento" data-bs-target="#modal-pagamento" data-bs-toggle="modal">Avançar</button> -->
                    </div>
                </div>
            </div>
        </div>
        <form action="pagar-encomendas.php" method="POST">
        <div class="modal pop" id="modal-pagamento" tabindex="-1" aria-labelledby="modal-pagamento" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Tem certeza?</h1>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Estamos quase no final! Escolha sua <span class="highlight">forma de pagamento</span>.</p>
                        <div class="input input-pagamento">
                            <label class="form-label" for="forma-pagamento">Forma de pagamento<span>*</span></label>
                            <div class="input-wrapper">
                                 <select name="forma-pagamento" id="forma-pagamento" style="background: var(--select-bg);
    color: var(--text-color);" required>
                                    <option selected value="1" style="background: var(--select-bg);
    color: var(--text-color);">PIX</option>
                                    <option value="2" style="background: var(--select-bg);
    color: var(--text-color);">Boleto</option>
                                </select>
                            </div>
                            <div class="invalid-feedback">
                                Insira uma quantidade para a encomenda
                            </div>
                        </div>
                        <div id="qrcode-pix" >
                            <div id="loading-pix"></div>
                            <img src="../assets/media/PagamentoPraGnete.png" alt="QR Code do PIX" id="qr-code" class="hide m-3">
                        </div>
                        <div id="boleto"  style="display: none;">
                            <div class="premium-plan-overlay d-flex flex-column align-items-center justify-content-center m-5">
                        <p class="section-title load" style="text-align: center">Clique no botão para gerar o boleto</p>
                        <div class=" d-flex justify-content-around">
                        <a id="new-product" target="_blank" onclick="gerarBoleto()" class="button">
                        <i class="bi bi-card-heading"></i>
                            <span>gerar boleto</span>
                        </a>
                        </div>
                        

                    </div>
                            </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button type="submit" class="button">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div class="modal pop" id="modal-cancelar" tabindex="-1" aria-labelledby="modal-cancelar" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Cancelar encomenda</h1>
                    </div>
                    <div class="modal-body d-flex flex-column text-center">
                        Você está prestes a cancelar a encomenda <h5 class="highlight"></h5>. Tem certeza? Ao cancelar, não será mais possível ter acesso a ele novamente.
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button type="button" class="button button-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <a href="cancelar-pedido.php" class="button button-red" id="cancelar-pedido">OK</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal pop" id="modal-cancelar-servico" tabindex="-1" aria-labelledby="modal-cancelar-servico" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Cancelar serviço</h1>
                    </div>
                    <div class="modal-body d-flex flex-column text-center">
                        Você está prestes a cancelar a serviço <h5 class="highlight"></h5>. Tem certeza? Ao cancelar, não será mais possível ter acesso a ele novamente.
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button type="button" class="button button-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <a href="cancelar-servico.php" class="button button-red" id="cancelar-servico">OK</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal pop" id="modal-concluir" tabindex="-1" aria-labelledby="modal-concluir" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Concluir encomenda</h1>
                    </div>
                    <div class="modal-body d-flex flex-column text-center">
                        Você está prestes a concluir a encomenda <h5 class="highlight"></h5> Tem certeza? Ao finalizar, não será mais possível ter acesso a ele novamente.
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button type="button" class="button button-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <a href="concluir-pedido.php" class="button" id="concluir-pedido">OK</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal pop" id="modal-concluir-servico" tabindex="-1" aria-labelledby="modal-concluir-servico" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Concluir serviço</h1>
                    </div>
                    <div class="modal-body d-flex flex-column text-center">
                        Você está prestes a concluir a serviço <h5 class="highlight"></h5> Tem certeza? Ao finalizar, não será mais possível ter acesso a ele novamente.
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button type="button" class="button button-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <a href="concluir-servico.php" class="button" id="concluir-servico">OK</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal pop" id="modal-aceitar" tabindex="-1" aria-labelledby="modal-aceitar" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Aceitar encomenda</h1>
                    </div>
                    <div class="modal-body d-flex flex-column text-center">
                        Você está prestes a aceitar a encomenda <h5 class="highlight"></h5> Tem certeza? Ao aceitar, não será mais possível cancelar a encomenda.
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button type="button" class="button button-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <a href="aceitar-pedido.php" class="button" id="aceitar-pedido">OK</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal pop" id="modal-aceitar-servico" tabindex="-1" aria-labelledby="modal-aceitar-servico" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Aceitar serviço</h1>
                    </div>
                    <div class="modal-body d-flex flex-column text-center">
                        Você está prestes a aceitar o serviço <h5 class="highlight"></h5> Tem certeza? Ao aceitar, não será mais possível cancelar a encomenda.
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button type="button" class="button button-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <a href="aceitar-servico.php" class="button" id="aceitar-servico">OK</a>
                    </div>
                </div>
            </div>
        </div>
        <nav id="nav" class="nav-dona">
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
                <a href="encomendas.php" class="nav-link active">
                    <i class="bi bi-grid-fill"></i>
                    <span>
                        Encomendas
                    </span>
                </a>
                <a href="meus-anuncios.php" class="nav-link">
                    <i class="bi bi-box-seam"></i>
                    <span>
                        Meus anúncios
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
                <a>
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
            <!-- <img src="../assets/media/rosas.svg" class="rosa-fundo"> -->
            <div id="main-title">
                Painel de encomendas
            </div>
            <?php if ($dados['nivelNegocioVendedora'] == 1) {
                                ?>
            <div id="content">
                <?php
                $encomenda = daoPedidoProduto::listarPedidosAtivosVendedora($_SESSION['id']);
                $servicos = daoPedidoServico::listarPedidosAtivosVendedora($_SESSION['id']);
                if (empty($encomenda) && empty($servicos)) {
                    ?>
                      <div class="premium-plan-overlay d-flex flex-column align-items-center justify-content-center m-5">
<p class="section-title load" style="text-align: center">Nenhum pedido ou serviço encontrado</p>
</div>
                    <?php
                }else {?>
                <div id="encomendas">
                    <?php
                    $pedidos = daoPedidoProduto::listarPedidosAtivosVendedora($_SESSION['id']);
                    
                    foreach ($pedidos as $p) {
                    ?>
                        <div class="encomenda">
                            <div class="info-encomenda">
                                <img src="../<?php echo $p['fotoCliente'] ?>" alt="" class="foto-encomenda">
                                <div class="nome-username">
                                    <div class="nome-encomenda"><?php echo $p['nomeCliente'] ?></div>
                                    <div class="username-encomenda">@<?php echo $p['nomeUsuarioCliente'] ?></div>
                                </div>
                            </div>
                            <div class="dados-encomenda">
                                <div class="nome-encomenda-anuncio">
                                    <label for="" class="form-label">Pedido</label>
                                    <div class="input-wrapper">
                                        <?php echo $p['nomeAnuncio'] ?>
                                    </div>
                                </div>
                                <div class="data-encomenda-anuncio">
                                    <label for="" class="form-label">Data do pedido</label>
                                    <div class="input-wrapper">
                                        <?php
                                      $dataPedido = new DateTime($p['dataPedidoEntregue']);
                                        echo $dataPedido->format("d/m/Y");?>
                                    </div>
					  <div class="data-encomenda-anuncio">
                                    <label for="" class="form-label">Quantidade</label>
                                    <div class="input-wrapper">
                                        <?php echo $p['qtdProdutoPedido'] ?>
                                    </div>
                                </div>
                                <div class="data-encomenda-anuncio">
                                    <label for="" class="form-label">Valor</label>
                                    <div class="input-wrapper">
                                    <?php echo number_format($p['valorTotal'], 2, ',', '.') ?>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="opcoes-encomenda">
                            <?php if ($p['statusPedidoProduto'] == 3) { ?>
                                <button class="button concluir-pedido" data-bs-toggle="modal" data-bs-target="#modal-concluir" data-id="<?php echo $p['idPedidoProduto'] ?>" data-nome="<?php echo $p['nomeCliente'] ?>" data-anuncio="<?php echo $p['nomeAnuncio'] ?>">Concluir</button>
                                <?php
                                }else {
                                ?>
                                <button class="button aceitar-pedido" data-bs-toggle="modal" data-bs-target="#modal-aceitar" data-id="<?php echo $p['idPedidoProduto'] ?>" data-nome="<?php echo $p['nomeCliente'] ?>" data-anuncio="<?php echo $p['nomeAnuncio'] ?>">Aceitar</button>
                                <?php
                                }
                                ?>
                                <button class="button button-red cancelar-pedido" data-bs-toggle="modal" data-bs-target="#modal-cancelar" data-id="<?php echo $p['idPedidoProduto'] ?>" data-nome="<?php echo $p['nomeCliente'] ?>" data-anuncio="<?php echo $p['nomeAnuncio'] ?>">Cancelar</button>
                            </div>
                        </div>
                    <?php
                    } 
                    ?>
                     <?php
                    $pedidos = daoPedidoServico::listarPedidosAtivosVendedora($_SESSION['id']);

                    foreach ($pedidos as $p) {
                    ?>
                        <div class="encomenda">
                            <div class="info-encomenda">
                                <img src="../<?php echo $p['fotoCliente'] ?>" alt="" class="foto-encomenda">
                                <div class="nome-username">
                                    <div class="nome-encomenda"><?php echo $p['nomeCliente'] ?></div>
                                    <div class="username-encomenda">@<?php echo $p['nomeUsuarioCliente'] ?></div>
                                </div>
                            </div>
                            <div class="dados-encomenda">
                                <div class="nome-encomenda-anuncio">
                                    <label for="" class="form-label">Serviço</label>
                                    <div class="input-wrapper">
                                        <?php echo $p['nomeAnuncio'] ?>
                                    </div>
                                </div>
                               <div class="data-encomenda-anuncio">
                                    <label for="" class="form-label">Data do serviço</label>
                                    <div class="input-wrapper">
                                        <?php $dataServicoContratado = new DateTime($p['dataServicoContratado']);
echo $dataServicoContratado->format("d/m/Y H:i:s");?>
                                    </div>
                                </div>
                                <div class="data-encomenda-anuncio">
                                    <label for="" class="form-label">Data do serviço marcado</label>
                                    <div class="input-wrapper">
                                        <?php 
                                        $dataServicoMarcado = new DateTime($p['dataServicoMarcado']);
                                        echo $dataServicoMarcado->format("d/m/Y H:i:s")?>
                                    </div>
                                </div>
                                
                                <div class="data-encomenda-anuncio">
                                    <label for="" class="form-label">Valor</label>
                                    <div class="input-wrapper">
                                    <?php echo number_format($p['valorTotal'], 2, ',', '.') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="opcoes-encomenda">
                            <?php if ($p['statusPedidoServico'] == 3) { ?>
                                <button class="button concluir-servico" data-bs-toggle="modal" data-bs-target="#modal-concluir-servico" data-id="<?php echo $p['idPedidoServico'] ?>" data-nome="<?php echo $p['nomeCliente'] ?>" data-anuncio="<?php echo $p['nomeAnuncio'] ?>">Concluir</button>
                                <?php
                                }else {
                                ?>
                                <button class="button aceitar-servico" data-bs-toggle="modal" data-bs-target="#modal-aceitar-servico" data-id="<?php echo $p['idPedidoServico'] ?>" data-nome="<?php echo $p['nomeCliente'] ?>" data-anuncio="<?php echo $p['nomeAnuncio'] ?>">Aceitar</button>
                                <?php
                                }
                                ?>
                                <button class="button button-red cancelar-servico" data-bs-toggle="modal" data-bs-target="#modal-cancelar-servico" data-id="<?php echo $p['idPedidoServico'] ?>" data-nome="<?php echo $p['nomeCliente'] ?>" data-anuncio="<?php echo $p['nomeAnuncio'] ?>">Cancelar</button>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
            </div>
            <!-- <img src="../assets/media/rosas.svg" class="rosa-fundo"> -->
            <?php
            } else {
                ?>
                <div class="premium-plan-overlay d-flex flex-column align-items-center justify-content-center m-5">
<p class="section-title load" style="text-align: center">Upgrade para o plano premium para obter benefícios as encomendas!</p>
<button id="new-product" data-bs-target="#modal-premium" data-bs-toggle="modal" class="button">
<i class="bi bi-cash"></i>
<span>Comprar Plano Premium</span>
            </button>

</div>
                <?php 
                }
                ?>
        </main>
    </div>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script>
         var iniciarPagamento = document.getElementById('iniciar-pagamento')
        let cancelarPedido = document.querySelectorAll('.cancelar-pedido')
        let concluirPedido = document.querySelectorAll('.concluir-pedido')
        let aceitarPedido = document.querySelectorAll('.aceitar-pedido')
        let cancelarServico = document.querySelectorAll('.cancelar-servico')
        let concluirServico = document.querySelectorAll('.concluir-servico')
        let aceitarServico = document.querySelectorAll('.aceitar-servico')
      
        cancelarPedido.forEach(item => {
            let id = item.getAttribute('data-id')
            let cliente = item.getAttribute('data-nome')
            let anuncio = item.getAttribute('data-anuncio')

            item.addEventListener('click', () => {
                document.querySelector('#cancelar-pedido').href=`cancelar-encomenda.php?e=${id}`

                document.querySelector('#modal-cancelar h5.highlight').innerText = `${cliente} - ${anuncio}`
            })
        })
        cancelarServico.forEach(item => {
            let id = item.getAttribute('data-id')
            let cliente = item.getAttribute('data-nome')
            let anuncio = item.getAttribute('data-anuncio')

            item.addEventListener('click', () => {
                document.querySelector('#cancelar-servico').href=`cancelar-servico.php?e=${id}`

                document.querySelector('#modal-cancelar-servico h5.highlight').innerText = `${cliente} - ${anuncio}`
            })
        })
        concluirPedido.forEach(item => {
            let id = item.getAttribute('data-id')
            let cliente = item.getAttribute('data-nome')
            let anuncio = item.getAttribute('data-anuncio')

            item.addEventListener('click', () => {
                document.querySelector('#concluir-pedido').href=`concluir-encomenda.php?e=${id}`

                document.querySelector('#modal-concluir h5.highlight').innerText = `${cliente} - ${anuncio}`
            })
        }) 
        concluirServico.forEach(item => {
            let id = item.getAttribute('data-id')
            let cliente = item.getAttribute('data-nome')
            let anuncio = item.getAttribute('data-anuncio')

            item.addEventListener('click', () => {
                document.querySelector('#concluir-servico').href=`concluir-servico.php?e=${id}`

                document.querySelector('#modal-concluir-servico h5.highlight').innerText = `${cliente} - ${anuncio}`
            })
        })
        aceitarPedido.forEach(item => {
            let id = item.getAttribute('data-id')
            let cliente = item.getAttribute('data-nome')
            let anuncio = item.getAttribute('data-anuncio')

            item.addEventListener('click', () => {
                document.querySelector('#aceitar-pedido').href=`aceitar-encomenda.php?e=${id}`

                document.querySelector('#modal-aceitar h5.highlight').innerText = `${cliente} - ${anuncio}`
              
            })
        })
        aceitarServico.forEach(item => {
            let id = item.getAttribute('data-id')
            let cliente = item.getAttribute('data-nome')
            let anuncio = item.getAttribute('data-anuncio')

            item.addEventListener('click', () => {
                document.querySelector('#aceitar-servico').href=`aceitar-servico.php?e=${id}`

                document.querySelector('#modal-aceitar-servico h5.highlight').innerText = `${cliente} - ${anuncio}`
              
            })
        })
        iniciarPagamento.addEventListener('click', () => {
         

         let qrCodeImg = document.querySelector('#qr-code')
         let loadingQrCode = document.querySelector('#loading-pix')
       

         qrCodeImg.classList.add('hide')
         loadingQrCode.classList.remove('hide')

       

         setTimeout(() => {
                     qrCodeImg.classList.remove('hide')
                     loadingQrCode.classList.add('hide')
                 }, 2000)

        
         })
    </script>
	     <script>
        function gerarBoleto() {
        // Obtém o valor atualizado
        var url = "../api/boleto/boleto_bb.php?v=<?php echo $_SESSION['username'] ?>&bairroCliente=<?php echo $dados['bairroNegocioVendedora'] ?>&numCliente=<?php echo $dados['numNegocioVendedora'] ?>&negocio=Hive&cnpj=79798353000139&cidade=São Paulo&valorUni=49&estado=SP&cep=&bairro=&num=&qtd=1&valor=49" ;

    // Abre a URL em outra aba
    window.open(url, '_blank');
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $(document).ready(function() {
        // Quando o valor do select mudar
        $("#forma-pagamento").change(function() {
            // Verifique se o valor selecionado é "Boleto"
            if ($(this).val() === "2") {
                // Se for, mostre o elemento #boleto e esconda #qrcode-pix
                $("#boleto").show();
                $("#qrcode-pix").hide();
            } else {
                // Caso contrário, mostre o elemento #qrcode-pix e esconda #boleto
                $("#qrcode-pix").show();
                $("#boleto").hide();
            }
        });
    });
   


</script>
</body>

</html>
