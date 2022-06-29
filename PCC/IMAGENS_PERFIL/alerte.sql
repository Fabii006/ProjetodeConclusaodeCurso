-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jun-2022 às 05:47
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `alerte`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alerta`
--

CREATE TABLE `alerta` (
  `ID` int(11) NOT NULL,
  `Titulo` varchar(40) NOT NULL,
  `Estado` varchar(5) NOT NULL,
  `Cidade` varchar(20) NOT NULL,
  `Profissao` varchar(40) NOT NULL,
  `Registro` varchar(40) NOT NULL,
  `Contato` char(14) NOT NULL,
  `Descricao` longtext NOT NULL,
  `Tipo` varchar(20) NOT NULL,
  `ID_usuario` int(11) DEFAULT NULL,
  `Tempo` varchar(10) NOT NULL,
  `Estatus` varchar(10) NOT NULL,
  `Denuncias` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alerta`
--

INSERT INTO `alerta` (`ID`, `Titulo`, `Estado`, `Cidade`, `Profissao`, `Registro`, `Contato`, `Descricao`, `Tipo`, `ID_usuario`, `Tempo`, `Estatus`, `Denuncias`) VALUES
(119, 'Eu preciso de ajuda urgente', 'BA', 'Guanambi', '', '', '(77)99857-5342', 'Eu preciso de ajuda, sofro de ansiedade e outros transtornos por causa da minha sexualidade. Vivo em uma famÃ­lia homofÃ³bica e de extrema direita, peÃ§o ajuda de um profissional e de um lugar para ficar. ', 'Solicitar ajuda', 67, '26/06/2022', 'ATIVO', 19),
(120, 'Alerta teste', 'AP', 'AmapÃ¡', 'PsicÃ³logo(a)', '123456789555', '(77)99857-5342', 'Preencha todas as informaÃ§Ãµes corretamente de acordo com as instruÃ§Ãµes dos campos, em tipo selecione Fornecer ajuda, caso seu alerta almeja fornecer ajuda voluntÃ¡ria (Ã© preciso ser um profissional e comprovar com o respectivo registro), ou solicitar ajuda, caso seja um usuÃ¡rio comum e necessita de ajuda. Aproveite!!!', 'Fornecer ajuda', 67, '26/06/2022', 'ATIVO', 0),
(121, 'Eu me odeio', 'BA', 'AbaÃ­ra', '', '', '(77)99857-5342', 'Preencha todas as informaÃ§Ãµes corretamente de acordo com as instruÃ§Ãµes dos campos, em tipo selecione Fornecer ajuda, caso seu alerta almeja fornecer ajuda voluntÃ¡ria (Ã© preciso ser um profissional e comprovar com o respectivo registro), ou solicitar ajuda, caso seja um usuÃ¡rio comum e necessita de ajuda. Aproveite!!!', 'Solicitar ajuda', 69, '27/06/2022', 'ATIVO', 5),
(122, 'Eu me odeio', 'BA', 'AbaÃ­ra', 'Advogado(a)', '12345678912', '(77)99857-5342', 'Preencha todas as informaÃ§Ãµes corretamente de acordo com as instruÃ§Ãµes dos campos, em tipo selecione Fornecer ajuda, caso seu alerta almeja fornecer ajuda voluntÃ¡ria (Ã© preciso ser um profissional e comprovar com o respectivo registro), ou solicitar ajuda, caso seja um usuÃ¡rio comum e necessita de ajuda. Aproveite!!!', 'Fornecer ajuda', 67, '27/06/2022', 'ATIVO', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `ID` int(11) NOT NULL,
  `Imagem` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(60) NOT NULL,
  `Sobrenome` varchar(100) NOT NULL,
  `Nome_social` varchar(60) NOT NULL,
  `Usuario` varchar(60) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Senha` varchar(250) NOT NULL,
  `Nascimento` varchar(10) NOT NULL,
  `Genero` varchar(30) NOT NULL,
  `Imagem_perfil` varchar(250) DEFAULT NULL,
  `CPF` char(15) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `Nome`, `Sobrenome`, `Nome_social`, `Usuario`, `Email`, `Senha`, `Nascimento`, `Genero`, `Imagem_perfil`, `CPF`, `Status`) VALUES
(66, 'Alessandro', 'Dos Santos GonÃ§alves', 'Alessandro', 'Alessandro_fenty', 'alesandroemae@gmail.com', '$2y$10$q4Lx3sIXHQ30nXiBB8WHH.IFi2JaAQC7vFSKB0eqoKzjPTvWCtn7y', '2000-08-11', 'Homem cis', 'unnamed.png', '', 'ATIVO');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alerta`
--
ALTER TABLE `alerta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_usuario` (`ID_usuario`);

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alerta`
--
ALTER TABLE `alerta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
