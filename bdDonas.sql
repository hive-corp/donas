-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Nov-2023 às 21:55
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bddonas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbanuncio`
--

CREATE TABLE `tbanuncio` (
  `idAnuncio` int(11) NOT NULL,
  `nomeAnuncio` varchar(100) DEFAULT NULL,
  `descricaoAnuncio` varchar(240) DEFAULT NULL,
  `valorAnuncio` double DEFAULT NULL,
  `estrelasAnuncio` int(11) DEFAULT NULL,
  `imagemPrincipalAnuncio` varchar(100) DEFAULT NULL,
  `tipoAnuncio` int(11) DEFAULT NULL,
  `qtdProduto` int(11) DEFAULT NULL,
  `idVendedora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbanunciosubcategoria`
--

CREATE TABLE `tbanunciosubcategoria` (
  `idAnuncioSubCategoria` int(11) NOT NULL,
  `idAnuncio` int(11) DEFAULT NULL,
  `idSubCategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbavaliacao`
--

CREATE TABLE `tbavaliacao` (
  `idAvaliacao` int(11) NOT NULL,
  `conteudoAvaliacao` varchar(140) DEFAULT NULL,
  `estrelasAvaliacao` int(11) NOT NULL,
  `idAnuncio` int(11) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcategoria`
--

CREATE TABLE `tbcategoria` (
  `idCategoria` int(11) NOT NULL,
  `nomeCategoria` varchar(50) DEFAULT NULL,
  `fotoCategoria` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(100) DEFAULT NULL,
  `nomeUsuarioCliente` varchar(50) DEFAULT NULL,
  `emailCliente` varchar(100) DEFAULT NULL,
  `senhaCliente` varchar(256) DEFAULT NULL,
  `dtNascCliente` date DEFAULT NULL,
  `fotoCliente` varchar(100) DEFAULT NULL,
  `cidadeCliente` varchar(100) DEFAULT NULL,
  `estadoCliente` char(2) DEFAULT NULL,
  `logradouroCliente` varchar(100) DEFAULT NULL,
  `bairroCliente` varchar(100) DEFAULT NULL,
  `numeroCliente` int(11) DEFAULT NULL,
  `complementoCliente` varchar(100) DEFAULT NULL,
  `cepCliente` char(8) DEFAULT NULL,
  `cpfCliente` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbdenuncia`
--

CREATE TABLE `tbdenuncia` (
  `idDenuncia` int(11) NOT NULL,
  `motivoDenuncia` varchar(100) DEFAULT NULL,
  `descricaoDenuncia` varchar(100) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idVendedora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbentradaproduto`
--

CREATE TABLE `tbentradaproduto` (
  `idEntradaProduto` int(11) NOT NULL,
  `dataEntradaProduto` date DEFAULT NULL,
  `qtdEntradaProduto` int(11) DEFAULT NULL,
  `idAnuncio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbimagemanuncio`
--

CREATE TABLE `tbimagemanuncio` (
  `idImagemAnuncio` int(11) NOT NULL,
  `enderecoImagem` varchar(100) DEFAULT NULL,
  `idAnuncio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmensagem`
--

CREATE TABLE `tbmensagem` (
  `idMensagem` int(11) NOT NULL,
  `conteudoMensagem` varchar(512) DEFAULT NULL,
  `arquivoMensagem` varchar(100) DEFAULT NULL,
  `horaMensagem` time DEFAULT current_timestamp(),
  `lidoEmMensagem` int(11) DEFAULT 0,
  `origemMensagem` int(11) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idVendedora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbnotifccliente`
--

CREATE TABLE `tbnotifccliente` (
  `idNotifcCliente` int(11) NOT NULL,
  `idDenuncia` int(11) DEFAULT NULL,
  `idAnuncio` int(11) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `tipoNotificacao` int(11) DEFAULT NULL,
  `statusNotificacao` int(11) DEFAULT NULL,
  `dataNotificacao` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpedidoproduto`
--

CREATE TABLE `tbpedidoproduto` (
  `idPedidoProduto` int(11) NOT NULL,
  `valorTotal` double DEFAULT NULL,
  `qtdProdutoPedido` int(11) DEFAULT NULL,
  `dataPedidoFeito` date DEFAULT NULL,
  `dataPedidoEntregue` date DEFAULT NULL,
  `statusPedidoProduto` int(11) DEFAULT NULL,
  `idAnuncio` int(11) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpedidoservico`
--

CREATE TABLE `tbpedidoservico` (
  `idPedidoServico` int(11) NOT NULL,
  `valorTotal` double DEFAULT NULL,
  `dataServicoContradado` date DEFAULT NULL,
  `dataServicoMarcado` date DEFAULT NULL,
  `idAnuncio` int(11) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpreferencias`
--

CREATE TABLE `tbpreferencias` (
  `idPreferencias` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsaidaproduto`
--

CREATE TABLE `tbsaidaproduto` (
  `idSaidaProduto` int(11) NOT NULL,
  `dataSaidaProduto` date DEFAULT NULL,
  `qtdSaidaProduto` int(11) DEFAULT NULL,
  `idAnuncio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbseguidor`
--

CREATE TABLE `tbseguidor` (
  `idSeguidor` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idVendedora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsubcategoria`
--

CREATE TABLE `tbsubcategoria` (
  `idSubCategoria` int(11) NOT NULL,
  `nomeSubCategoria` varchar(50) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbvendedora`
--

CREATE TABLE `tbvendedora` (
  `idVendedora` int(11) NOT NULL,
  `nomeVendedora` varchar(100) DEFAULT NULL,
  `emailVendedora` varchar(100) DEFAULT NULL,
  `senhaVendedora` varchar(256) DEFAULT NULL,
  `fotoVendedora` varchar(100) DEFAULT NULL,
  `statusVendedora` int(11) DEFAULT NULL,
  `dtNascVendedora` date DEFAULT NULL,
  `nomeNegocioVendedora` varchar(100) DEFAULT NULL,
  `nomeUsuarioNegocioVendedora` varchar(50) DEFAULT NULL,
  `fotoNegocioVendedora` varchar(100) DEFAULT NULL,
  `bioNegocioVendedora` varchar(255) NOT NULL,
  `logNegocioVendedora` varchar(100) DEFAULT NULL,
  `cidadeNegocioVendedora` varchar(100) DEFAULT NULL,
  `estadoNegocioVendedora` char(2) DEFAULT NULL,
  `bairroNegocioVendedora` varchar(100) DEFAULT NULL,
  `numNegocioVendedora` int(11) DEFAULT NULL,
  `compNegocioVendedora` varchar(100) DEFAULT NULL,
  `cepNegocioVendedora` char(8) DEFAULT NULL,
  `cnpjNegocioVendedora` char(14) DEFAULT NULL,
  `nivelNegocioVendedora` int(11) DEFAULT NULL,
  `telefoneNegocioVendedora` varchar(11) NOT NULL,
  `idCategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbanuncio`
--
ALTER TABLE `tbanuncio`
  ADD PRIMARY KEY (`idAnuncio`),
  ADD KEY `idVendedora` (`idVendedora`);

--
-- Índices para tabela `tbanunciosubcategoria`
--
ALTER TABLE `tbanunciosubcategoria`
  ADD PRIMARY KEY (`idAnuncioSubCategoria`),
  ADD KEY `idAnuncio` (`idAnuncio`),
  ADD KEY `idSubCategoria` (`idSubCategoria`);

--
-- Índices para tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  ADD PRIMARY KEY (`idAvaliacao`),
  ADD KEY `idAnuncio` (`idAnuncio`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Índices para tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índices para tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `tbdenuncia`
--
ALTER TABLE `tbdenuncia`
  ADD PRIMARY KEY (`idDenuncia`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idVendedora` (`idVendedora`);

--
-- Índices para tabela `tbentradaproduto`
--
ALTER TABLE `tbentradaproduto`
  ADD PRIMARY KEY (`idEntradaProduto`),
  ADD KEY `idAnuncio` (`idAnuncio`);

--
-- Índices para tabela `tbimagemanuncio`
--
ALTER TABLE `tbimagemanuncio`
  ADD PRIMARY KEY (`idImagemAnuncio`),
  ADD KEY `idAnuncio` (`idAnuncio`);

--
-- Índices para tabela `tbmensagem`
--
ALTER TABLE `tbmensagem`
  ADD PRIMARY KEY (`idMensagem`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idVendedora` (`idVendedora`);

--
-- Índices para tabela `tbnotifccliente`
--
ALTER TABLE `tbnotifccliente`
  ADD PRIMARY KEY (`idNotifcCliente`),
  ADD KEY `idDenuncia` (`idDenuncia`),
  ADD KEY `idAnuncio` (`idAnuncio`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Índices para tabela `tbpedidoproduto`
--
ALTER TABLE `tbpedidoproduto`
  ADD PRIMARY KEY (`idPedidoProduto`),
  ADD KEY `idAnuncio` (`idAnuncio`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Índices para tabela `tbpedidoservico`
--
ALTER TABLE `tbpedidoservico`
  ADD PRIMARY KEY (`idPedidoServico`),
  ADD KEY `idAnuncio` (`idAnuncio`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Índices para tabela `tbpreferencias`
--
ALTER TABLE `tbpreferencias`
  ADD PRIMARY KEY (`idPreferencias`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Índices para tabela `tbsaidaproduto`
--
ALTER TABLE `tbsaidaproduto`
  ADD PRIMARY KEY (`idSaidaProduto`),
  ADD KEY `idAnuncio` (`idAnuncio`);

--
-- Índices para tabela `tbseguidor`
--
ALTER TABLE `tbseguidor`
  ADD PRIMARY KEY (`idSeguidor`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idVendedora` (`idVendedora`);

--
-- Índices para tabela `tbsubcategoria`
--
ALTER TABLE `tbsubcategoria`
  ADD PRIMARY KEY (`idSubCategoria`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Índices para tabela `tbvendedora`
--
ALTER TABLE `tbvendedora`
  ADD PRIMARY KEY (`idVendedora`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbanuncio`
--
ALTER TABLE `tbanuncio`
  MODIFY `idAnuncio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbanunciosubcategoria`
--
ALTER TABLE `tbanunciosubcategoria`
  MODIFY `idAnuncioSubCategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  MODIFY `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbdenuncia`
--
ALTER TABLE `tbdenuncia`
  MODIFY `idDenuncia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbentradaproduto`
--
ALTER TABLE `tbentradaproduto`
  MODIFY `idEntradaProduto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbimagemanuncio`
--
ALTER TABLE `tbimagemanuncio`
  MODIFY `idImagemAnuncio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbmensagem`
--
ALTER TABLE `tbmensagem`
  MODIFY `idMensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbnotifccliente`
--
ALTER TABLE `tbnotifccliente`
  MODIFY `idNotifcCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbpedidoproduto`
--
ALTER TABLE `tbpedidoproduto`
  MODIFY `idPedidoProduto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbpedidoservico`
--
ALTER TABLE `tbpedidoservico`
  MODIFY `idPedidoServico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbpreferencias`
--
ALTER TABLE `tbpreferencias`
  MODIFY `idPreferencias` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbsaidaproduto`
--
ALTER TABLE `tbsaidaproduto`
  MODIFY `idSaidaProduto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbseguidor`
--
ALTER TABLE `tbseguidor`
  MODIFY `idSeguidor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbsubcategoria`
--
ALTER TABLE `tbsubcategoria`
  MODIFY `idSubCategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbvendedora`
--
ALTER TABLE `tbvendedora`
  MODIFY `idVendedora` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbanuncio`
--
ALTER TABLE `tbanuncio`
  ADD CONSTRAINT `tbanuncio_ibfk_1` FOREIGN KEY (`idVendedora`) REFERENCES `tbvendedora` (`idVendedora`);

--
-- Limitadores para a tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  ADD CONSTRAINT `tbavaliacao_ibfk_1` FOREIGN KEY (`idAnuncio`) REFERENCES `tbanuncio` (`idAnuncio`),
  ADD CONSTRAINT `tbavaliacao_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`);

--
-- Limitadores para a tabela `tbdenuncia`
--
ALTER TABLE `tbdenuncia`
  ADD CONSTRAINT `tbdenuncia_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`),
  ADD CONSTRAINT `tbdenuncia_ibfk_2` FOREIGN KEY (`idVendedora`) REFERENCES `tbvendedora` (`idVendedora`);

--
-- Limitadores para a tabela `tbentradaproduto`
--
ALTER TABLE `tbentradaproduto`
  ADD CONSTRAINT `tbentradaproduto_ibfk_1` FOREIGN KEY (`idAnuncio`) REFERENCES `tbanuncio` (`idAnuncio`);

--
-- Limitadores para a tabela `tbimagemanuncio`
--
ALTER TABLE `tbimagemanuncio`
  ADD CONSTRAINT `tbimagemanuncio_ibfk_1` FOREIGN KEY (`idAnuncio`) REFERENCES `tbanuncio` (`idAnuncio`);

--
-- Limitadores para a tabela `tbmensagem`
--
ALTER TABLE `tbmensagem`
  ADD CONSTRAINT `tbmensagem_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`),
  ADD CONSTRAINT `tbmensagem_ibfk_2` FOREIGN KEY (`idVendedora`) REFERENCES `tbvendedora` (`idVendedora`);

--
-- Limitadores para a tabela `tbnotifccliente`
--
ALTER TABLE `tbnotifccliente`
  ADD CONSTRAINT `tbnotifccliente_ibfk_1` FOREIGN KEY (`idDenuncia`) REFERENCES `tbdenuncia` (`idDenuncia`),
  ADD CONSTRAINT `tbnotifccliente_ibfk_2` FOREIGN KEY (`idAnuncio`) REFERENCES `tbanuncio` (`idAnuncio`),
  ADD CONSTRAINT `tbnotifccliente_ibfk_3` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`);

--
-- Limitadores para a tabela `tbpedidoproduto`
--
ALTER TABLE `tbpedidoproduto`
  ADD CONSTRAINT `tbpedidoproduto_ibfk_1` FOREIGN KEY (`idAnuncio`) REFERENCES `tbanuncio` (`idAnuncio`),
  ADD CONSTRAINT `tbpedidoproduto_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`);

--
-- Limitadores para a tabela `tbpedidoservico`
--
ALTER TABLE `tbpedidoservico`
  ADD CONSTRAINT `tbpedidoservico_ibfk_1` FOREIGN KEY (`idAnuncio`) REFERENCES `tbanuncio` (`idAnuncio`),
  ADD CONSTRAINT `tbpedidoservico_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`);

--
-- Limitadores para a tabela `tbpreferencias`
--
ALTER TABLE `tbpreferencias`
  ADD CONSTRAINT `tbpreferencias_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`),
  ADD CONSTRAINT `tbpreferencias_ibfk_2` FOREIGN KEY (`idCategoria`) REFERENCES `tbcategoria` (`idCategoria`);

--
-- Limitadores para a tabela `tbsaidaproduto`
--
ALTER TABLE `tbsaidaproduto`
  ADD CONSTRAINT `tbsaidaproduto_ibfk_1` FOREIGN KEY (`idAnuncio`) REFERENCES `tbanuncio` (`idAnuncio`);

--
-- Limitadores para a tabela `tbseguidor`
--
ALTER TABLE `tbseguidor`
  ADD CONSTRAINT `tbseguidor_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`),
  ADD CONSTRAINT `tbseguidor_ibfk_2` FOREIGN KEY (`idVendedora`) REFERENCES `tbvendedora` (`idVendedora`);

--
-- Limitadores para a tabela `tbsubcategoria`
--
ALTER TABLE `tbsubcategoria`
  ADD CONSTRAINT `tbsubcategoria_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `tbcategoria` (`idCategoria`);

--
-- Limitadores para a tabela `tbvendedora`
--
ALTER TABLE `tbvendedora`
  ADD CONSTRAINT `tbvendedora_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `tbcategoria` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
