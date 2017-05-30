-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Maio-2017 às 16:43
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wvasystem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `nivel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `nome`, `email`, `usuario`, `senha`, `thumb`, `nivel`) VALUES
(1, 'Danillo', 'direcaocomunicacao@danillotorrescominicacao.com.br', 'danillo', 'danillo', '', '1'),
(3, 'Lais Lima', 'Lais@live.com', 'laisinha', 'lais123', '', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_postagens`
--

CREATE TABLE `tb_postagens` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `data` varchar(12) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `exibir` varchar(5) NOT NULL,
  `descricao` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_postagens`
--

INSERT INTO `tb_postagens` (`id`, `titulo`, `data`, `imagem`, `exibir`, `descricao`) VALUES
(12, 'Titulo teste2', '29/12/1991', '31020.jpg', 'Sim', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at nibh quis sem gravida efficitur at nec enim. Aliquam nec mollis erat. In et dignissim felis. In sit amet pellentesque justo, posuere interdum nisi. Ut est massa, imperdiet quis convallis quis, mollis id libero. Nunc in vestibulum sem. Nam convallis lorem mi, aliquam ultrices metus pulvinar ut.\n\nCurabitur velit arcu, sodales tincidunt faucibus vel, rutrum eget magna. Integer libero urna, finibus volutpat arcu quis, lacinia tincidunt nisl. Nunc a luctus velit, eget cursus turpis. Donec eu aliquam nunc, vel suscipit augue. Suspendisse potenti. Nunc vehicula tempus porta. Ut sagittis bibendum diam nec tincidunt.'),
(13, 'teste1', '11/11/2010', '12277.jpg', 'Sim', 'coala'),
(14, 'teste2', '23/12/1990', '16778.jpg', 'Sim', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at nibh quis sem gravida efficitur at nec enim. Aliquam nec mollis erat. In et dignissim felis. In sit amet pellentesque justo, posuere interdum nisi. Ut est massa, imperdiet quis convallis quis, mollis id libero. Nunc in vestibulum sem. Nam convallis lorem mi, aliquam ultrices metus pulvinar ut.\n\nCurabitur velit arcu, sodales tincidunt faucibus vel, rutrum eget magna. Integer libero urna, finibus volutpat arcu quis, lacinia tincidunt nisl. Nunc a luctus velit, eget cursus turpis. Donec eu aliquam nunc, vel suscipit augue. Suspendisse potenti. Nunc vehicula tempus porta. Ut sagittis bibendum diam nec tincidunt.'),
(15, 'teste3', '22/12/2001', '9211.jpg', 'NÃ£o', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at nibh quis sem gravida efficitur at nec enim. Aliquam nec mollis erat. In et dignissim felis. In sit amet pellentesque justo, posuere interdum nisi. Ut est massa, imperdiet quis convallis quis, mollis id libero. Nunc in vestibulum sem. Nam convallis lorem mi, aliquam ultrices metus pulvinar ut.\n\nCurabitur velit arcu, sodales tincidunt faucibus vel, rutrum eget magna. Integer libero urna, finibus volutpat arcu quis, lacinia tincidunt nisl. Nunc a luctus velit, eget cursus turpis. Donec eu aliquam nunc, vel suscipit augue. Suspendisse potenti. Nunc vehicula tempus porta. Ut sagittis bibendum diam nec tincidunt.'),
(16, 'Testando formataÃ§Ã£o', '12/12/2012', '11402.jpg', 'Sim', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend tortor vel aliquam egestas. Aliquam eu mollis lorem, sed viverra risus. Aliquam erat volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam sed tellus elit. Vestibulum a faucibus nisi. Curabitur lobortis mi a libero dictum sollicitudin. Sed eget condimentum quam, consectetur elementum erat.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend tortor vel aliquam egestas. Aliquam eu mollis lorem, sed viverra risus. Aliquam erat volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam sed tellus elit. Vestibulum a faucibus nisi. Curabitur lobortis mi a libero dictum sollicitudin. Sed eget condimentum quam, consectetur elementum erat.'),
(17, 'novo', '12/12/1992', '31768.jpg', 'Sim', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend tortor vel aliquam egestas. Aliquam eu mollis lorem, sed viverra risus. Aliquam erat volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam sed tellus elit. Vestibulum a faucibus nisi. Curabitur lobortis mi a libero dictum sollicitudin. Sed eget condimentum quam, consectetur elementum erat.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend tortor vel aliquam egestas. Aliquam eu mollis lorem, sed viverra risus. Aliquam erat volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam sed tellus elit. Vestibulum a faucibus nisi. Curabitur lobortis mi a libero dictum sollicitudin. Sed eget condimentum quam, consectetur elementum erat.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_postagens`
--
ALTER TABLE `tb_postagens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_postagens`
--
ALTER TABLE `tb_postagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
