-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 08/09/2026 às 17:32
-- Versão do servidor: 8.0.45
-- Versão do PHP: 8.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `flybynight_completo`
--
CREATE DATABASE IF NOT EXISTS `flybynight_completo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `flybynight_completo`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`) VALUES
(1, 'Eletrônicos Tabajara'),
(2, 'Mundo dos Games'),
(3, 'Supermercado Tem de Tudo'),
(4, 'Livraria Demais da Conta'),
(6, 'Epson'),
(8, 'Samsung'),
(9, 'Tech Solutions'),
(10, 'Mega Informática'),
(11, 'Editora Horizonte'),
(12, 'Gamer World'),
(13, 'Casa & Coisas'),
(14, 'Office Brasil');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lojas`
--

CREATE TABLE `lojas` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `lojas`
--

INSERT INTO `lojas` (`id`, `nome`) VALUES
(1, 'Casas Bahia'),
(2, 'Shopping Zona Leste'),
(3, 'Bazar das Coisas'),
(4, 'Americanas'),
(5, 'Mega Store'),
(6, 'Shopping Center Norte'),
(7, 'Loja do Centro'),
(8, 'Outlet Eletrônicos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lojas_produtos`
--

CREATE TABLE `lojas_produtos` (
  `loja_id` int NOT NULL,
  `produto_id` int NOT NULL,
  `estoque` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `lojas_produtos`
--

INSERT INTO `lojas_produtos` (`loja_id`, `produto_id`, `estoque`) VALUES
(1, 1, 5),
(1, 4, 3),
(1, 7, 5),
(1, 22, 4),
(1, 24, 1),
(2, 1, 4),
(2, 3, 10),
(2, 4, 2),
(2, 5, 10),
(2, 6, 8),
(2, 7, 4),
(2, 12, 15),
(2, 20, 6),
(3, 8, 5),
(3, 9, 10),
(3, 10, 15),
(3, 12, 20),
(3, 21, 3),
(3, 25, 30),
(4, 1, 2),
(4, 2, 3),
(4, 4, 2),
(4, 5, 8),
(4, 11, 10),
(4, 13, 2),
(4, 16, 12),
(4, 17, 8),
(5, 4, 1),
(5, 5, 5),
(5, 6, 5),
(5, 7, 3),
(5, 8, 2),
(5, 13, 5),
(5, 20, 4),
(6, 7, 2),
(6, 8, 4),
(6, 13, 3),
(6, 22, 2),
(6, 24, 1),
(7, 9, 15),
(7, 10, 20),
(7, 12, 25),
(7, 16, 10),
(7, 17, 10),
(7, 18, 5),
(7, 19, 4),
(8, 5, 4),
(8, 6, 3),
(8, 9, 10),
(8, 10, 0),
(8, 11, 8),
(8, 20, 7),
(8, 25, 40);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int NOT NULL,
  `fornecedor_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `quantidade`, `fornecedor_id`) VALUES
(1, 'Smartphone Galaxy S23', 'Equipamento com sistema Android e câmera Full HD e etc e tal', 1599.45, 20, 1),
(2, 'Senhor dos Anéis: As Duas Torres', 'Volume 2 da série de livros criados pelo autor J.R.R. Tolkien', 80.99, 100, 4),
(3, 'TV Led', 'Tela de 50 polegadas, resolução 4K, 4 entradas HDMI e etc e tal', 2999.00, 5, 1),
(4, 'Notebook Ultra', 'Notebook com 16 GB de memória RAM e SSD de 512 GB', 3499.90, 8, 9),
(5, 'Mouse Gamer RGB', 'Mouse gamer com iluminação RGB e seis botões', 129.90, 35, 10),
(6, 'Teclado Mecânico', 'Teclado mecânico com iluminação e conexão USB', 289.50, 15, 10),
(7, 'Monitor 24 polegadas', 'Monitor Full HD com entrada HDMI', 899.90, 12, 8),
(8, 'Monitor 27 polegadas', 'Monitor com resolução QHD e entrada HDMI', 1599.00, 6, 8),
(9, 'Impressora EcoTank', 'Impressora multifuncional com tanque de tinta', 1199.90, 4, 6),
(10, 'Cabo HDMI 2 metros', 'Cabo HDMI para transmissão de áudio e vídeo', 39.90, 80, 9),
(11, 'Pen Drive 64GB', 'Dispositivo USB para armazenamento de arquivos', 49.90, 50, 9),
(12, 'SSD 1TB', 'Unidade de armazenamento SSD com capacidade de 1 TB', 499.90, 18, 10),
(13, 'Headset Gamer', 'Headset com microfone e conexão USB', 249.90, 25, 11),
(14, 'Controle sem fio', 'Controle sem fio compatível com computador', 299.90, 0, 2),
(15, 'Console de Videogame', 'Console com armazenamento interno de 1 TB', 4499.00, 3, 2),
(16, 'O Hobbit', 'Livro de fantasia escrito por J.R.R. Tolkien', 59.90, 45, 12),
(17, 'Senhor dos Anéis: A Sociedade do Anel', 'Primeiro volume da trilogia O Senhor dos Anéis', 79.90, 30, 4),
(18, 'Senhor dos Anéis: O Retorno do Rei', 'Terceiro volume da trilogia O Senhor dos Anéis', 85.90, 28, 4),
(19, 'Clean Code', 'Livro sobre boas práticas de desenvolvimento de software', 149.90, 10, 12),
(20, 'Cadeira de Escritório', 'Cadeira com regulagem de altura e apoio para braços', 699.90, 7, 13),
(21, 'Mesa para Computador', 'Mesa de escritório com espaço para computador', 549.90, 9, 13),
(22, 'Webcam Full HD', 'Webcam com resolução Full HD e microfone integrado', 199.90, 22, 9),
(23, 'Caixa de Som Bluetooth', 'Caixa de som portátil com conexão Bluetooth', 179.90, 14, 1),
(24, 'Smart TV 65 polegadas', 'Smart TV 4K com Wi-Fi e aplicativos integrados', 4299.90, 2, 8),
(25, 'Adaptador USB', 'Adaptador USB para diferentes dispositivos', 24.90, 100, 10);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `lojas`
--
ALTER TABLE `lojas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `lojas_produtos`
--
ALTER TABLE `lojas_produtos`
  ADD PRIMARY KEY (`loja_id`,`produto_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fornecedor_id` (`fornecedor_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `lojas`
--
ALTER TABLE `lojas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `lojas_produtos`
--
ALTER TABLE `lojas_produtos`
  ADD CONSTRAINT `lojas_produtos_ibfk_1` FOREIGN KEY (`loja_id`) REFERENCES `lojas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lojas_produtos_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE RESTRICT;

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;