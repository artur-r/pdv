-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/03/2025 às 03:30
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pdv`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'PÃO DE QUEIJO'),
(4, 'BISCOITO'),
(13, 'REFRIGERANTE'),
(14, 'SUCO'),
(15, 'PÃO'),
(16, 'ENLATADO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` int(11) NOT NULL,
  `cep` float NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `contato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cpf`, `cep`, `endereco`, `bairro`, `cidade`, `estado`, `contato`) VALUES
(1, '', 2014798699, 0, 'Rua Joaquim Ramos Filho', 'Jaqueline', 'Belo Horizonte', '', 2147483647),
(2, 'Artur', 2014798699, 0, 'Rua Joaquim Ramos Filho', 'Jaqueline', 'Belo Horizonte', '', 2147483647),
(3, 'Artur', 2014798699, 0, 'Rua Joaquim Ramos Filho', 'Jaqueline', 'Belo Horizonte', '', 2147483647),
(4, 'Artur', 2014798699, 0, 'Rua Joaquim Ramos Filho', 'Jaqueline', 'Belo Horizonte', '', 2147483647),
(5, 'artttt', 2014798699, 0, '', '', 'BH', '', 2147483647),
(6, '', 0, 0, '', '', '<br /><b>Warning</b>:  Undefined property: stdClas', '', 0),
(7, '', 0, 31748100, '', '', '<br /><b>Warning</b>:  Undefined property: stdClas', '', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `saldo_estoque` float NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `preco_custo` float NOT NULL,
  `preco_venda` float NOT NULL,
  `id_tipo_venda` int(11) NOT NULL,
  `codigo_de_barra` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `saldo_estoque`, `id_categoria`, `preco_custo`, `preco_venda`, `id_tipo_venda`, `codigo_de_barra`) VALUES
(39, 'Biscoito   ', 2, 4, 2, 2.55, 2, 0),
(52, 'aaaaaaa', 0, 14, 2, 2, 1, 0),
(53, 'AGUA DE CHUCA', 2, 14, 5, 10.99, 2, 2.34123e18),
(54, 'COCA COLA LATA 200ML', 5, 13, 1, 2, 1, 0),
(55, 'PÃO DE QUEIJO', 4, 1, 0.5, 1, 1, 0),
(56, 'PÃO DE SAL', 45, 15, 1, 2, 1, 0),
(57, 'AA', 0, 13, 1, 2, 2, 0),
(58, 'TESTE TESTE', 4, 14, 2, 3, 1, 0),
(59, 'LATA DE ATUM', 5, 16, 2, 3, 1, 0),
(60, 'TABLET', 3, 16, 100, 500, 1, 0),
(61, 'MUÇARELA', 2, 15, 0.5, 1, 2, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `id_venda` int(11) DEFAULT NULL,
  `saldo_inicial` float NOT NULL,
  `saldo_final` float NOT NULL,
  `data_abertura` date NOT NULL,
  `data_fechamento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_venda`
--

CREATE TABLE `tipo_venda` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipo_venda`
--

INSERT INTO `tipo_venda` (`id`, `nome`) VALUES
(1, 'UNITÁRIA'),
(2, 'FRACIONADA');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'Artur', 'admin', '123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `preco_custo` float NOT NULL,
  `preco_venda` float NOT NULL,
  `desconto` float NOT NULL,
  `forma_pagamento` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `hora` date NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_registro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `fk_produto_tipo_venda` (`id_tipo_venda`);

--
-- Índices de tabela `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_venda` (`id_venda`);

--
-- Índices de tabela `tipo_venda`
--
ALTER TABLE `tipo_venda`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_registro` (`id_registro`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_venda`
--
ALTER TABLE `tipo_venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_tipo_venda` FOREIGN KEY (`id_tipo_venda`) REFERENCES `tipo_venda` (`id`),
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);

--
-- Restrições para tabelas `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`id_venda`) REFERENCES `venda` (`id`);

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `venda_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `venda_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `venda_ibfk_5` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
