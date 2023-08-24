
/* bdDonas: */

CREATE TABLE tbCliente (
    idCliente INT PRIMARY KEY AUTO_INCREMENT,
    nomeCliente VARCHAR(100),
    nomeUsuarioCliente VARCHAR(50),
    emailCliente VARCHAR(100),
    senhaCliente VARCHAR(256),
    dtNascCliente DATE,
    fotoCliente VARCHAR(100),
    cidadeCliente VARCHAR(100),
    estadoCliente CHAR(2),
    logradouroCliente VARCHAR(100),
    bairroCliente VARCHAR(100),
    numeroCliente INT,
    complementoCliente VARCHAR(100),
    cepCliente CHAR(8),
    cpfCliente CHAR(11)
);

CREATE TABLE tbCategoria (
    idCategoria INT PRIMARY KEY AUTO_INCREMENT,
    nomeCategoria VARCHAR(50),
    fotoCategoria VARCHAR(100)
);

CREATE TABLE tbVendedora (
    idVendedora INT PRIMARY KEY AUTO_INCREMENT,
    nomeVendedora VARCHAR(100),
    emailVendedora VARCHAR(100),
    senhaVendedora VARCHAR(256),
    fotoVendedora VARCHAR(100),
    statusVendedora INT,
    dtNascVendedora DATE,
    nomeNegocioVendedora VARCHAR(100),
    nomeUsuarioNegocioVendedora VARCHAR(50),
    fotoNegocioVendedora VARCHAR(100),
    logNegocioVendedora VARCHAR(100),
    cidadeNegocioVendedora VARCHAR(100),
    estadoNegocioVendedora CHAR(2),
    bairroNegocioVendedora VARCHAR(100),
    numNegocioVendedora INT,
    compNegocioVendedora VARCHAR(100),
    cepNegocioVendedora CHAR(8),
    cnpjNegocioVendedora CHAR(14),
    nivelNegocioVendedora INT,
    idCategoria INT, 
	FOREIGN KEY(idCategoria) REFERENCES tbCategoria(idCategoria)
);

CREATE TABLE tbMensagem (
    idMensagem INT PRIMARY KEY AUTO_INCREMENT,
    conteudoMensagem VARCHAR(100),
    imagemMensagem VARCHAR(100),
    horaMensagem TIME,
    lidoEmMensagem INT,
    origemMensagem INT,
    idCliente INT, 
	FOREIGN KEY(idCliente) REFERENCES tbCliente(idCliente),
    idVendedora INT, 
	FOREIGN KEY(idVendedora) REFERENCES tbVendedora(idVendedora)
);

CREATE TABLE tbAnuncio (
    idAnuncio INT PRIMARY KEY AUTO_INCREMENT,
    nomeAnuncio VARCHAR(100),
    descricaoAnuncio VARCHAR(240),
    valorAnuncio DOUBLE,
    estrelasAnuncio INT,
    imagemPrincipalAnuncio VARCHAR(100),
    tipoAnuncio INT,
    qtdProduto INT,
    idVendedora INT, 
	FOREIGN KEY(idVendedora) REFERENCES tbVendedora(idVendedora)
);

CREATE TABLE tbImagemAnuncio (
    idImagemAnuncio INT PRIMARY KEY AUTO_INCREMENT,
    enderecoImagem VARCHAR(100),
    idAnuncio INT, 
	FOREIGN KEY(idAnuncio) REFERENCES tbAnuncio(idAnuncio)
);

CREATE TABLE tbAvaliacao (
    idAvaliacao INT PRIMARY KEY AUTO_INCREMENT,
    conteudoAvaliacao VARCHAR(140),
    idAnuncio INT, 
	FOREIGN KEY(idAnuncio) REFERENCES tbAnuncio(idAnuncio),
    idCliente INT, 
	FOREIGN KEY(idCliente) REFERENCES tbCliente(idCliente)
);

CREATE TABLE tbEntradaProduto (
    idEntradaProduto INT PRIMARY KEY AUTO_INCREMENT,
    dataEntradaProduto DATE,
    qtdEntradaProduto INT,
    idAnuncio INT, 
	FOREIGN KEY(idAnuncio) REFERENCES tbAnuncio(idAnuncio)
);

CREATE TABLE tbSaidaProduto (
    idSaidaProduto INT PRIMARY KEY AUTO_INCREMENT,
    dataSaidaProduto DATE,
    qtdSaidaProduto INT,
    idAnuncio INT, 
	FOREIGN KEY(idAnuncio) REFERENCES tbAnuncio(idAnuncio)
);

CREATE TABLE tbEncomenda (
    idEncomenda INT PRIMARY KEY AUTO_INCREMENT,
    codigoRastreio VARCHAR(100),
    valorEncomenda DOUBLE,
    dataEncomenda DATE,
    statusEncomenda INT,
    idAnuncio INT, 
	FOREIGN KEY(idAnuncio) REFERENCES tbAnuncio(idAnuncio),
    idCliente INT, 
	FOREIGN KEY(idCliente) REFERENCES tbCliente(idCliente)
);

CREATE TABLE tbNotifcCliente (
    idNotifcCliente INT PRIMARY KEY AUTO_INCREMENT,
    statusPedido VARCHAR(100),
    idVendedora INT, 
	FOREIGN KEY(idVendedora) REFERENCES tbVendedora(idVendedora),
    idCliente INT, 
	FOREIGN KEY(idCliente) REFERENCES tbCliente(idCliente)
);

CREATE TABLE tbNotifcVendedora (
    idNotifcVendedora INT PRIMARY KEY AUTO_INCREMENT,
    dataPedido DATE,
    descPedido VARCHAR(100),
    idVendedora INT, 
	FOREIGN KEY(idVendedora) REFERENCES tbVendedora(idVendedora),
    idEncomenda INT, 
	FOREIGN KEY(idEncomenda) REFERENCES tbEncomenda(idEncomenda)
);

CREATE TABLE tbDenuncia (
    idDenuncia INT PRIMARY KEY AUTO_INCREMENT,
    motivoDenuncia VARCHAR(100),
    descricaoDenuncia VARCHAR(100),
    idCliente INT, 
	FOREIGN KEY(idCliente) REFERENCES tbCliente(idCliente),
    idVendedora INT, 
	FOREIGN KEY(idVendedora) REFERENCES tbVendedora(idVendedora)
);