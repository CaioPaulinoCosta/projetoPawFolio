-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Jun-2023 às 17:55
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pawfolio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `adminId` smallint(11) UNSIGNED NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `token` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pets`
--

CREATE TABLE `pets` (
  `petId` smallint(11) UNSIGNED NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `breed` varchar(250) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `color` varchar(250) DEFAULT NULL,
  `observation` text DEFAULT NULL,
  `user_id` smallint(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pets`
--

INSERT INTO `pets` (`petId`, `name`, `breed`, `birthday`, `weight`, `color`, `observation`, `user_id`) VALUES
(1, 'Rex', 'Pastor Alemao', '2015-02-02', '40kg', 'Preto', 'Ele e muito danado!', 3),
(2, 'Dara', 'poodle', '2015-07-15', '5kg', 'Branco', 'Muito difícil para conseguir secar ela depois do banho.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `userId` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `cpf` int(11) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `image` varchar(250) NOT NULL,
  `adress` varchar(250) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `token` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`userId`, `name`, `lastname`, `email`, `cpf`, `password`, `image`, `adress`, `birthday`, `token`) VALUES
(1, 'Caio', 'Costa', 'caiopaulinocosta@hotmail.com', 2147483647, '$2y$10$ROGxqpcgGmRzJxGEur0yJ.KCUQyWedlFp8bmh5gMSfaIbfeoDWpXW', '7a53baeaa83e1a0421c5ef60699fa13008fdd9bedf60cbc0704b9ad78559ee92bfa695f894cf07eabee8e48413800d07fe32876a028398b4ca99f887.jpg', 'Rua marmitinha', '2005-06-23', '2a69da89983c4e07ca3c99e157da4cb7641803770771125ea1543c46ca2916dd7aceab92e3c4edc6dab25c4c63842770ccd3'),
(3, 'Menino ', 'Maluquinho', 'maluquinho@hotmail.com', 2147483647, '$2y$10$uG78MfHnaw81oT6a2qcKnOZh5Jf8wqUCDFy5UP6JG4fNJ6jmw5ose', '', NULL, '2001-01-01', '57c70d7fea93a904f3a8fcfa7e09185214e670c316b2b1644f4526eec4dfbf1b54e075bcd9580d8ab4ffcc9bd03d51d5c367'),
(4, 'Fulano', 'Da Silva', 'teste@hotmail.com', 2147483647, '$2y$10$FSmH4y6W2nFfrUQaOzRi1udAnVeqBCceSkrfqHbCcviVv7Z2pKiTK', '', NULL, '2000-01-01', 'a798b23a21569ace5191b8b8b8f750be61e524ecf33f13eacd0a7d8d3588d08e63484dcb3461d953cbb3396b099ed81eb3bd');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminId`);

--
-- Índices para tabela `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`petId`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admins`
--
ALTER TABLE `admins`
  MODIFY `adminId` smallint(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pets`
--
ALTER TABLE `pets`
  MODIFY `petId` smallint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `userId` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
