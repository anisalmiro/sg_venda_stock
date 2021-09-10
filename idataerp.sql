-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Mar-2020 às 15:23
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `idataerp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arm`
--

CREATE TABLE `arm` (
  `arm_id` varchar(15) NOT NULL,
  `arm_descricao` varchar(60) DEFAULT NULL,
  `arm_datacriacao` datetime DEFAULT NULL,
  `arm_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `arm`
--

INSERT INTO `arm` (`arm_id`, `arm_descricao`, `arm_datacriacao`, `arm_dataactualizacao`) VALUES
('1', 'arm1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `banco`
--

CREATE TABLE `banco` (
  `banco_id` varchar(15) NOT NULL,
  `banco_sigla` varchar(15) DEFAULT NULL,
  `banco_descricao` varchar(60) DEFAULT NULL,
  `banco_datacriacao` datetime DEFAULT NULL,
  `banco_dataactualizacao` datetime DEFAULT NULL,
  `banco_utilizadorcriacao` int(11) DEFAULT NULL,
  `banco_utilizadoractualizacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `caixa`
--

CREATE TABLE `caixa` (
  `caixa_id` varchar(15) NOT NULL,
  `caixa_descricao` varchar(60) DEFAULT NULL,
  `caixa_datacriacao` datetime DEFAULT NULL,
  `caixa_dataactualizacao` datetime DEFAULT NULL,
  `caixa_utilizadorcriacao` int(11) DEFAULT NULL,
  `caixa_utilizadoractualizacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cencusto`
--

CREATE TABLE `cencusto` (
  `cencusto_id` varchar(15) NOT NULL,
  `cencusto_descricao` varchar(60) DEFAULT NULL,
  `cencusto_datacriacao` datetime DEFAULT NULL,
  `cencusto_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cli`
--

CREATE TABLE `cli` (
  `cli_id` varchar(15) NOT NULL,
  `cli_numero` decimal(16,0) DEFAULT NULL,
  `cli_nome` varchar(60) DEFAULT NULL,
  `cli_morada` varchar(255) DEFAULT NULL,
  `cli_telefone` varchar(60) DEFAULT NULL,
  `cli_celular` varchar(60) DEFAULT NULL,
  `cli_fax` varchar(60) DEFAULT NULL,
  `cli_email` varchar(255) DEFAULT NULL,
  `cli_nuit` varchar(15) DEFAULT NULL,
  `cli_tipocliid` varchar(15) DEFAULT NULL,
  `cli_vendid` varchar(15) DEFAULT NULL,
  `cli_valmin` decimal(16,2) DEFAULT NULL,
  `cli_valmax` decimal(16,2) DEFAULT NULL,
  `cli_tipodesconto` decimal(1,0) DEFAULT NULL,
  `cli_desconto` decimal(16,2) DEFAULT NULL,
  `cli_moedaid` varchar(15) DEFAULT NULL,
  `cli_estado` decimal(1,0) DEFAULT NULL,
  `cli_codtabpreco` decimal(1,0) DEFAULT NULL,
  `cli_importador` decimal(1,0) DEFAULT NULL,
  `cli_exportador` decimal(1,0) DEFAULT NULL,
  `cli_observacao` text DEFAULT NULL,
  `cli_paisid` varchar(15) DEFAULT NULL,
  `cli_prontopag` decimal(1,0) DEFAULT NULL,
  `cli_cencustoid` varchar(15) DEFAULT NULL,
  `cli_armazemid` varchar(15) DEFAULT NULL,
  `cli_ivaincluido` decimal(1,0) DEFAULT NULL,
  `cli_ivaisento` decimal(1,0) DEFAULT NULL,
  `cli_nomecomercial` varchar(60) DEFAULT NULL,
  `cli_condpagid` varchar(15) DEFAULT NULL,
  `cli_tipoagencia` decimal(1,0) DEFAULT NULL,
  `cli_valoragencia` decimal(16,2) DEFAULT NULL,
  `cli_taxaagencia` decimal(6,0) DEFAULT NULL,
  `cli_contador` decimal(1,0) DEFAULT NULL,
  `cli_leiturainicial` decimal(16,2) DEFAULT NULL,
  `cli_zonaid` varchar(15) DEFAULT NULL,
  `cli_numerocontador` varchar(60) DEFAULT NULL,
  `cli_rua` varchar(60) DEFAULT NULL,
  `cli_datacriacao` datetime DEFAULT NULL,
  `cli_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cli`
--

INSERT INTO `cli` (`cli_id`, `cli_numero`, `cli_nome`, `cli_morada`, `cli_telefone`, `cli_celular`, `cli_fax`, `cli_email`, `cli_nuit`, `cli_tipocliid`, `cli_vendid`, `cli_valmin`, `cli_valmax`, `cli_tipodesconto`, `cli_desconto`, `cli_moedaid`, `cli_estado`, `cli_codtabpreco`, `cli_importador`, `cli_exportador`, `cli_observacao`, `cli_paisid`, `cli_prontopag`, `cli_cencustoid`, `cli_armazemid`, `cli_ivaincluido`, `cli_ivaisento`, `cli_nomecomercial`, `cli_condpagid`, `cli_tipoagencia`, `cli_valoragencia`, `cli_taxaagencia`, `cli_contador`, `cli_leiturainicial`, `cli_zonaid`, `cli_numerocontador`, `cli_rua`, `cli_datacriacao`, `cli_dataactualizacao`) VALUES
('3991aa6f-53dc-1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0', '0.00', NULL, '0', '0', '0', '0', NULL, NULL, '0', NULL, NULL, '0', '0', NULL, NULL, '0', '0.00', '0', '0', '0.00', NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `codconta`
--

CREATE TABLE `codconta` (
  `codconta_id` int(11) NOT NULL,
  `codconta_sigla` varchar(15) DEFAULT NULL,
  `codconta_descricao` varchar(60) DEFAULT NULL,
  `codconta_datacriacao` datetime DEFAULT NULL,
  `codconta_dataactualizacao` datetime DEFAULT NULL,
  `codconta_utilizadorcriacao` int(11) DEFAULT NULL,
  `codconta_utilizadoractualizacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `codmovstk`
--

CREATE TABLE `codmovstk` (
  `codmovstk_id` int(11) NOT NULL,
  `codmovstk_sigla` varchar(60) DEFAULT NULL,
  `codmovstk_descricao` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `codmovtes`
--

CREATE TABLE `codmovtes` (
  `codmovtes_id` int(11) NOT NULL,
  `codmovtes_codigo` varchar(15) DEFAULT NULL,
  `codmov_descricao` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `condpag`
--

CREATE TABLE `condpag` (
  `condpag_id` varchar(15) NOT NULL,
  `condpag_descricao` varchar(60) DEFAULT NULL,
  `condpag_dias` decimal(3,0) DEFAULT NULL,
  `condpag_datacriacao` datetime DEFAULT NULL,
  `condpag_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatesoura`
--

CREATE TABLE `contatesoura` (
  `contatesoura_id` int(11) NOT NULL,
  `contatesoura_numero` decimal(16,0) DEFAULT NULL,
  `contatesoura_sigla` varchar(15) DEFAULT NULL,
  `contatesoura_descricao` varchar(60) DEFAULT NULL,
  `contatesoura_bancoid` varchar(15) NOT NULL,
  `contatesoura_nib` varchar(60) DEFAULT NULL,
  `contatesoura_morada` varchar(255) DEFAULT NULL,
  `contatesoura_contacto` varchar(60) DEFAULT NULL,
  `contatesoura_pessoacontacto` varchar(60) DEFAULT NULL,
  `contatesoura_observacao` text DEFAULT NULL,
  `contatesoura_datacricacao` datetime DEFAULT NULL,
  `contatesoura_dataatualizacao` datetime DEFAULT NULL,
  `contatesoura_utilizadorcriacao` int(11) DEFAULT NULL,
  `contatesoura_utilizadoractualizacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ecran`
--

CREATE TABLE `ecran` (
  `ecran_id` int(11) NOT NULL,
  `ecran_nome` varchar(60) DEFAULT NULL,
  `ecran_descricao` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emp`
--

CREATE TABLE `emp` (
  `emp_id` int(11) NOT NULL,
  `emp_sigla` varchar(10) DEFAULT NULL,
  `emp_nome` varchar(60) DEFAULT NULL,
  `emp_morada` varchar(255) DEFAULT NULL,
  `emp_telefone` varchar(255) DEFAULT NULL,
  `emp_fax` varchar(255) DEFAULT NULL,
  `emp_celular` varchar(255) DEFAULT NULL,
  `emp_email` varchar(255) DEFAULT NULL,
  `emp_actividade` varchar(255) DEFAULT NULL,
  `emp_nuit` varchar(20) DEFAULT NULL,
  `emp_moedaid` varchar(15) NOT NULL,
  `emp_infobancaria` varchar(255) DEFAULT NULL,
  `emp_declarante` varchar(60) DEFAULT NULL,
  `emp_refdeclarante` varchar(20) DEFAULT NULL,
  `emp_website` varchar(60) DEFAULT NULL,
  `emp_slogan` varchar(255) DEFAULT NULL,
  `emp_logotipo` blob DEFAULT NULL,
  `emp_tecconta` varchar(60) DEFAULT NULL,
  `emp_teccontaref` varchar(60) DEFAULT NULL,
  `emp_reparticaofinancas` varchar(255) DEFAULT NULL,
  `emp_coddgi` varchar(255) DEFAULT NULL,
  `emp_observacao` text DEFAULT NULL,
  `emp_capitalsocial` decimal(16,2) DEFAULT NULL,
  `emp_datacriacao` datetime DEFAULT NULL,
  `emp_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ent`
--

CREATE TABLE `ent` (
  `ent_id` int(11) NOT NULL,
  `ent_nome` varchar(60) DEFAULT NULL,
  `ent_morada` varchar(255) DEFAULT NULL,
  `ent_telefone` varchar(60) DEFAULT NULL,
  `ent_celular` varchar(60) DEFAULT NULL,
  `ent_fax` varchar(60) DEFAULT NULL,
  `ent_email` varchar(255) DEFAULT NULL,
  `ent_nuit` varchar(15) DEFAULT NULL,
  `ent_tipo` varchar(45) DEFAULT NULL,
  `ent_vendid` varchar(15) NOT NULL,
  `ent_moedaid` varchar(15) NOT NULL,
  `ent_estado` decimal(1,0) DEFAULT NULL,
  `ent_observacao` text DEFAULT NULL,
  `ent_paisid` varchar(15) NOT NULL,
  `ent_cencustoid` varchar(15) NOT NULL,
  `ent_armazemid` varchar(15) NOT NULL,
  `ent_zonaid` varchar(15) NOT NULL,
  `ent_datacriacao` datetime DEFAULT NULL,
  `ent_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fat`
--

CREATE TABLE `fat` (
  `fat_id` int(11) NOT NULL,
  `fat_tipofatid` varchar(15) NOT NULL,
  `fat_numero` decimal(16,0) DEFAULT NULL,
  `fat_dataemissao` date DEFAULT NULL,
  `fat_datavencimento` date DEFAULT NULL,
  `fat_cliid` varchar(15) NOT NULL,
  `fat_moedaid` varchar(15) NOT NULL,
  `fat_subtotal` decimal(16,2) DEFAULT NULL,
  `fat_percentdesconto` decimal(16,2) DEFAULT NULL,
  `fat_valordesconto` decimal(16,2) DEFAULT NULL,
  `fat_totaliva` decimal(16,2) DEFAULT NULL,
  `fat_total` decimal(16,2) DEFAULT NULL,
  `fat_msubtotal` decimal(16,2) DEFAULT NULL,
  `fat_mvalordesconto` decimal(16,2) DEFAULT NULL,
  `fat_mtotaliva` decimal(16,2) DEFAULT NULL,
  `fat_mtotal` decimal(16,2) DEFAULT NULL,
  `fat_vendid` varchar(15) NOT NULL,
  `fat_cambio` decimal(16,2) DEFAULT NULL,
  `fat_cambiofixo` decimal(1,0) DEFAULT NULL,
  `fat_anulado` decimal(1,0) DEFAULT NULL,
  `fat_numerointerno` varchar(60) DEFAULT NULL,
  `fat_cencustoid` varchar(15) NOT NULL,
  `fat_origemid` int(11) DEFAULT NULL,
  `fat_aprovado` decimal(1,0) DEFAULT NULL,
  `fat_adjudicado` decimal(1,0) DEFAULT NULL,
  `fat_dataadjudicacao` date DEFAULT NULL,
  `fat_mesa` varchar(60) DEFAULT NULL,
  `fat_fechada` decimal(1,0) DEFAULT NULL,
  `fat_entid` varchar(15) NOT NULL,
  `fat_caixaid` varchar(15) NOT NULL,
  `fat_sectorid` varchar(15) NOT NULL,
  `fat_datacriacao` datetime DEFAULT NULL,
  `fat_dataactualizacao` datetime DEFAULT NULL,
  `fat_utilizadorcriacao` decimal(11,0) DEFAULT NULL,
  `fat_utilizadoractualizacao` decimal(11,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatitem`
--

CREATE TABLE `fatitem` (
  `fatitem_id` int(11) NOT NULL,
  `fatitem_stkid` varchar(15) NOT NULL,
  `fatitem_descricao` varchar(60) DEFAULT NULL,
  `fatitem_quantidade` decimal(16,2) DEFAULT NULL,
  `fatitem_armid` varchar(15) NOT NULL,
  `fatitem_preco` decimal(16,2) DEFAULT NULL,
  `fatitem_mpreco` decimal(16,2) DEFAULT NULL,
  `fatitem_tabivaid` varchar(15) NOT NULL,
  `fatitem_valoriva` decimal(16,2) DEFAULT NULL,
  `fatitem_mvaloriva` decimal(16,2) DEFAULT NULL,
  `fatitem_ivaincluido` decimal(1,0) DEFAULT NULL,
  `fatitem_percentdesconto` decimal(16,2) DEFAULT NULL,
  `fatitem_valordesconto` decimal(16,2) DEFAULT NULL,
  `fatitem_mvalordesconto` decimal(16,2) DEFAULT NULL,
  `fatitem_subtotal` decimal(16,2) DEFAULT NULL,
  `fatitem_msubtotal` decimal(16,2) DEFAULT NULL,
  `fatitem_total` decimal(16,2) DEFAULT NULL,
  `fatitem_mtotal` decimal(16,2) DEFAULT NULL,
  `fatitem_loteid` varchar(15) NOT NULL,
  `fatitem_origemid` int(11) DEFAULT NULL,
  `fatitem_quantidade2` decimal(16,2) DEFAULT NULL,
  `fatitem_quantidade3` decimal(16,2) DEFAULT NULL,
  `fatitem_tabprecoid` varchar(15) NOT NULL,
  `fatitem_quantmedida` decimal(16,2) DEFAULT NULL,
  `fatitem_totalmedida` decimal(16,2) DEFAULT NULL,
  `fatitem_quantdecimal` decimal(16,2) DEFAULT NULL,
  `fatitem_datacriacao` datetime DEFAULT NULL,
  `fatitem_dataactualizacao` datetime DEFAULT NULL,
  `fatitem_utilizadorcriacao` int(11) DEFAULT NULL,
  `fatitem_utilizadoractualizacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formapag`
--

CREATE TABLE `formapag` (
  `formapag_id` int(11) NOT NULL,
  `formapag_tipopagid` varchar(15) NOT NULL,
  `formapag_bancoid` varchar(15) NOT NULL,
  `formapag_data` date DEFAULT NULL,
  `formapag_contatesouraid` varchar(15) NOT NULL,
  `formapag_valor` decimal(16,2) DEFAULT NULL,
  `formapag_mvalor` decimal(16,2) DEFAULT NULL,
  `formapag_fatid` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE `grupo` (
  `grupo_id` int(11) NOT NULL,
  `grupo_descricao` varchar(60) DEFAULT NULL,
  `grupo_datacriacao` datetime DEFAULT NULL,
  `grupo_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`grupo_id`, `grupo_descricao`, `grupo_datacriacao`, `grupo_dataactualizacao`) VALUES
(1, 'grupo1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lote`
--

CREATE TABLE `lote` (
  `lote_id` int(11) NOT NULL,
  `lote_descricao` varchar(60) DEFAULT NULL,
  `lote_validade` date DEFAULT NULL,
  `lote_stkid` varchar(15) NOT NULL,
  `lote_datacriacao` datetime DEFAULT NULL,
  `lote_dataactualizacao` datetime DEFAULT NULL,
  `lote_utilizadorcriacao` int(11) DEFAULT NULL,
  `lote_utilizadoractualizacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `marca_id` int(11) NOT NULL,
  `marca_descricao` varchar(60) DEFAULT NULL,
  `marca_datacriacao` datetime DEFAULT NULL,
  `marca_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`marca_id`, `marca_descricao`, `marca_datacriacao`, `marca_dataactualizacao`) VALUES
(1, 'marca1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mod`
--

CREATE TABLE `mod` (
  `mod_id` int(11) NOT NULL,
  `mod_codigo` decimal(11,0) DEFAULT NULL,
  `mod_descricao` varchar(60) DEFAULT NULL,
  `mod_datacriacao` datetime DEFAULT NULL,
  `mod_dataactualizacao` datetime DEFAULT NULL,
  `mod_utilizadorcriacao` varchar(15) NOT NULL,
  `mod_utilizadoractualizacao` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `moeda`
--

CREATE TABLE `moeda` (
  `moeda_id` varchar(15) NOT NULL,
  `moeda_sigla` varchar(10) DEFAULT NULL,
  `moeda_descricao` varchar(60) DEFAULT NULL,
  `moeda_datacriacao` datetime DEFAULT NULL,
  `moeda_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `moeda`
--

INSERT INTO `moeda` (`moeda_id`, `moeda_sigla`, `moeda_descricao`, `moeda_datacriacao`, `moeda_dataactualizacao`) VALUES
('0c660e1a-57cc-1', 'MTN', 'Metical', '1900-01-01 00:00:00', '1900-01-01 00:00:00'),
('b5f6b6f4-57d1-1', 'EUR', 'EURO', '1900-01-01 00:00:00', '1900-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movtes`
--

CREATE TABLE `movtes` (
  `movtes_id` int(11) NOT NULL,
  `movtes_data` datetime DEFAULT NULL,
  `movtes_tipomov` decimal(1,0) DEFAULT NULL,
  `movtes_valor` decimal(16,2) DEFAULT NULL,
  `movtes_codcontaid` varchar(15) NOT NULL,
  `movtes_numtitulo` varchar(60) DEFAULT NULL,
  `movtes_moedaid` varchar(15) NOT NULL,
  `movtes_mvalor` decimal(16,2) DEFAULT NULL,
  `movtes_cencustoid` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `pais_id` varchar(15) NOT NULL,
  `pais_descricao` varchar(60) DEFAULT NULL,
  `pais_datacriacao` datetime DEFAULT NULL,
  `pais_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rec`
--

CREATE TABLE `rec` (
  `rec_id` int(11) NOT NULL,
  `rec_numero` decimal(16,0) DEFAULT NULL,
  `rec_cliid` varchar(15) NOT NULL,
  `rec_moedaid` varchar(15) NOT NULL,
  `rec_total` decimal(16,2) DEFAULT NULL,
  `rec_mtotal` decimal(16,2) DEFAULT NULL,
  `rec_cencustoid` varchar(15) NOT NULL,
  `rec_data` date DEFAULT NULL,
  `rec_anulado` decimal(1,0) DEFAULT NULL,
  `rec_observacao` text DEFAULT NULL,
  `rec_datacriacao` datetime DEFAULT NULL,
  `rec_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recitem`
--

CREATE TABLE `recitem` (
  `recitem_id` int(11) NOT NULL,
  `recitem_recid` varchar(15) NOT NULL,
  `recitem_fatid` varchar(15) NOT NULL,
  `recitem_valorpagar` decimal(16,2) DEFAULT NULL,
  `recitem_valorpago` decimal(16,2) DEFAULT NULL,
  `recitem_mvalorpagar` decimal(16,2) DEFAULT NULL,
  `recitem_datacriacao` datetime DEFAULT NULL,
  `recitem_dataactualizacao` datetime DEFAULT NULL,
  `recitem_utilizadorcriacao` decimal(11,0) DEFAULT NULL,
  `recitem_utilizadoractualizacao` decimal(11,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sector`
--

CREATE TABLE `sector` (
  `sector_id` int(11) NOT NULL,
  `sector_descricao` varchar(60) DEFAULT NULL,
  `sector_datacriacao` datetime DEFAULT NULL,
  `sector_dataactualizacao` datetime DEFAULT NULL,
  `caixa_utilizadorcriacao` int(11) DEFAULT NULL,
  `caixa_utilizadoractualizacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `stk`
--

CREATE TABLE `stk` (
  `stk_id` varchar(15) NOT NULL,
  `stk_referencia` varchar(60) DEFAULT NULL,
  `stk_descricao` varchar(60) DEFAULT NULL,
  `stk_servico` decimal(1,0) DEFAULT NULL,
  `stk_tabivaid` varchar(15) DEFAULT NULL,
  `stk_grupoid` varchar(15) DEFAULT NULL,
  `stk_codbarra` varchar(60) DEFAULT NULL,
  `stk_unimedid` varchar(15) DEFAULT NULL,
  `stk_negativo` decimal(1,0) DEFAULT NULL,
  `stk_avisanegativo` decimal(1,0) DEFAULT NULL,
  `stk_pontoencomenda` decimal(16,2) DEFAULT NULL,
  `stk_usalote` decimal(1,0) DEFAULT NULL,
  `stk_observacao` text DEFAULT NULL,
  `stk_estado` decimal(1,0) DEFAULT NULL,
  `stk_quantreserva` decimal(16,2) DEFAULT NULL,
  `stk_previsto` decimal(16,2) DEFAULT NULL,
  `stk_produtocomposto` decimal(1,0) DEFAULT NULL,
  `stk_armazemid` varchar(15) DEFAULT NULL,
  `stk_imagem` varchar(255) DEFAULT NULL,
  `stk_pos` decimal(1,0) DEFAULT NULL,
  `stk_descricaopos` varchar(60) DEFAULT NULL,
  `stk_marcaid` varchar(15) DEFAULT NULL,
  `stk_reffornecedor` varchar(60) DEFAULT NULL,
  `stk_usadesctecnica` decimal(1,0) DEFAULT NULL,
  `stk_desctecnica` text DEFAULT NULL,
  `stk_datacriacao` datetime DEFAULT NULL,
  `stk_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `stk`
--

INSERT INTO `stk` (`stk_id`, `stk_referencia`, `stk_descricao`, `stk_servico`, `stk_tabivaid`, `stk_grupoid`, `stk_codbarra`, `stk_unimedid`, `stk_negativo`, `stk_avisanegativo`, `stk_pontoencomenda`, `stk_usalote`, `stk_observacao`, `stk_estado`, `stk_quantreserva`, `stk_previsto`, `stk_produtocomposto`, `stk_armazemid`, `stk_imagem`, `stk_pos`, `stk_descricaopos`, `stk_marcaid`, `stk_reffornecedor`, `stk_usadesctecnica`, `stk_desctecnica`, `stk_datacriacao`, `stk_dataactualizacao`) VALUES
('1581499399', '123', 'osdh', '1', '1', '1', '123', '1', '1', '1', '123.00', '1', '123', NULL, '123.00', '123.00', NULL, '1', '788c498b9a9f565e348c629682b8f6eb.jpg', '1', '1234', '1', '123', '1', '123', '2020-02-20 10:58:03', '2020-02-20 10:58:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabiva`
--

CREATE TABLE `tabiva` (
  `tabiva_id` int(11) NOT NULL,
  `tabiva_descricao` varchar(60) DEFAULT NULL,
  `tabiva_taxa` decimal(16,2) DEFAULT NULL,
  `tabiva_datacriacao` datetime DEFAULT NULL,
  `tabiva_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tabiva`
--

INSERT INTO `tabiva` (`tabiva_id`, `tabiva_descricao`, `tabiva_taxa`, `tabiva_datacriacao`, `tabiva_dataactualizacao`) VALUES
(1, 'tabiva1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabpreco`
--

CREATE TABLE `tabpreco` (
  `tabpreco_id` int(11) NOT NULL,
  `tabpreco_stkid` varchar(15) NOT NULL,
  `tabpreco_codigo` decimal(1,0) DEFAULT NULL,
  `tabpreco_moedaid` varchar(15) NOT NULL,
  `tabpreco_preco` decimal(16,2) DEFAULT NULL,
  `tabpreco_datacriacao` datetime DEFAULT NULL,
  `tabpreco_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipocli`
--

CREATE TABLE `tipocli` (
  `tipocli_id` varchar(15) NOT NULL,
  `tipocli_descricao` varchar(60) DEFAULT NULL,
  `tipocli_datacriacao` datetime DEFAULT NULL,
  `tipocli_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipocli`
--

INSERT INTO `tipocli` (`tipocli_id`, `tipocli_descricao`, `tipocli_datacriacao`, `tipocli_dataactualizacao`) VALUES
('1', 'dsfsd', '1900-01-01 00:00:00', '1900-01-01 00:00:00'),
('2', 'NORMAL', '1900-01-01 00:00:00', '1900-01-01 00:00:00'),
('2155', 'csdc', '1900-01-01 00:00:00', '1900-01-01 00:00:00'),
('2575', 'especial', '1900-01-01 00:00:00', '1900-01-01 00:00:00'),
('2775', 'esdsfv', '1900-01-01 00:00:00', '1900-01-01 00:00:00'),
('3', 'DFDF', '1900-01-01 00:00:00', '1900-01-01 00:00:00'),
('463a7077-5322-1', 'eweed', '1900-01-01 00:00:00', '1900-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipofat`
--

CREATE TABLE `tipofat` (
  `tipofat_id` varchar(15) NOT NULL,
  `tipofat_sigla` varchar(10) DEFAULT NULL,
  `tipofat_descricao` varchar(60) DEFAULT NULL,
  `tipofat_alteranomeseq` decimal(1,0) DEFAULT NULL,
  `tipofat_controladata` decimal(1,0) DEFAULT NULL,
  `tipofat_armid` varchar(15) NOT NULL,
  `tipofat_armpredefinidoid` varchar(15) NOT NULL,
  `tipofat_movstk` decimal(1,0) DEFAULT NULL,
  `tipofat_codmovstkid` varchar(15) NOT NULL,
  `tipofat_usastkcomposto` decimal(1,0) DEFAULT NULL,
  `tipofat_obrigacentrocusto` decimal(1,0) DEFAULT NULL,
  `tipofat_movtes` decimal(1,0) DEFAULT NULL,
  `tipofat_codmovtesid` varchar(15) NOT NULL,
  `tipofat_predefinido` decimal(1,0) DEFAULT NULL,
  `tipofat_introduzdirectacli` decimal(1,0) DEFAULT NULL,
  `tipofat_cencustoid` varchar(15) NOT NULL,
  `tipofat_movreservastk` decimal(1,0) DEFAULT NULL,
  `tipofat_movnagativostk` decimal(1,0) DEFAULT NULL,
  `tipofat_armazemdefeito` decimal(1,0) DEFAULT NULL,
  `tipofat_copiaquant` decimal(1,0) DEFAULT NULL,
  `tipofat_diasvencimento` decimal(2,0) DEFAULT NULL,
  `tipofat_datacriacao` datetime DEFAULT NULL,
  `tipofat_dataactualizacao` datetime DEFAULT NULL,
  `tipofat_utilizadorcriacao` decimal(11,0) DEFAULT NULL,
  `tipofat_utilizadoractualizacao` decimal(11,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipopag`
--

CREATE TABLE `tipopag` (
  `tipopag_id` int(11) NOT NULL,
  `tipopag_descricao` varchar(60) DEFAULT NULL,
  `tipopag_tipo` decimal(1,0) DEFAULT NULL,
  `tipopag_obriganumtitulo` decimal(1,0) DEFAULT NULL,
  `tipopag_numerario` decimal(1,0) DEFAULT NULL,
  `tipopag_datacriacao` datetime DEFAULT NULL,
  `tipopag_dataactualizacao` datetime DEFAULT NULL,
  `tipopag_utilizadorcriacao` int(11) DEFAULT NULL,
  `tipopag_utilizadoractualizacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tiporec`
--

CREATE TABLE `tiporec` (
  `tiporec_id` int(11) NOT NULL,
  `tiporec_numero` decimal(16,2) DEFAULT NULL,
  `tiporec_sigla` varchar(10) DEFAULT NULL,
  `tiporec _descricao` varchar(60) DEFAULT NULL,
  `tiporec_tipopagid` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unimed`
--

CREATE TABLE `unimed` (
  `unimed_id` int(11) NOT NULL,
  `unimed_sigla` varchar(15) DEFAULT NULL,
  `unimed_descricao` varchar(60) DEFAULT NULL,
  `unimed_datacriacao` datetime DEFAULT NULL,
  `unimed_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `unimed`
--

INSERT INTO `unimed` (`unimed_id`, `unimed_sigla`, `unimed_descricao`, `unimed_datacriacao`, `unimed_dataactualizacao`) VALUES
(1, 'UNIMED', 'desc', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `util`
--

CREATE TABLE `util` (
  `util_id` varchar(15) NOT NULL,
  `util_nome` varchar(60) DEFAULT NULL,
  `util_login` varchar(60) DEFAULT NULL,
  `util_estado` decimal(1,0) DEFAULT NULL,
  `util_apenaspos` decimal(1,0) DEFAULT NULL,
  `util_email` varchar(255) DEFAULT NULL,
  `util_senha` varchar(255) DEFAULT NULL,
  `util_datacriacao` datetime DEFAULT NULL,
  `util_dataactualizacao` datetime DEFAULT NULL,
  `util_utilizadorcriacao` varchar(15) NOT NULL,
  `util_utilizadoractualizacao` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `util`
--

INSERT INTO `util` (`util_id`, `util_nome`, `util_login`, `util_estado`, `util_apenaspos`, `util_email`, `util_senha`, `util_datacriacao`, `util_dataactualizacao`, `util_utilizadorcriacao`, `util_utilizadoractualizacao`) VALUES
('1', 'admin', 'admin', '1', '0', 'suporte@infordata.co.mz', '$2y$10$.ZzCuM7A9a8Awmu0mbFnaOjouikU5475uJR3HaqN.rhtvhznH6V1W', '2020-02-04 00:00:00', '2020-02-04 00:00:00', '', ''),
('cc5d7e73-57e1-1', 'ede', 'de', '0', '0', NULL, '$2a$10$eZFpkWHKsAj6YIZwz1Hp4ewg/Mgr7btU7DkqmKJx2s.n6PUDze0mS', '1900-01-01 00:00:00', '1900-01-01 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilacessos`
--

CREATE TABLE `utilacessos` (
  `utilacessos_id` int(11) NOT NULL,
  `utilacessos_descricao` varchar(255) DEFAULT NULL,
  `utilacessos_introduzir` decimal(1,0) DEFAULT NULL,
  `utilacessos_visualizar` decimal(1,0) DEFAULT NULL,
  `utilacessos_editar` decimal(1,0) DEFAULT NULL,
  `utilacessos_anular` decimal(1,0) DEFAULT NULL,
  `utilacessos_apagar` decimal(1,0) DEFAULT NULL,
  `utilacessos_imprimir` decimal(1,0) DEFAULT NULL,
  `utilacessos_utilid` varchar(15) NOT NULL,
  `utilacessos_ecranid` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vend`
--

CREATE TABLE `vend` (
  `vend_id` varchar(15) NOT NULL,
  `vend_nome` varchar(60) DEFAULT NULL,
  `vend_email` varchar(255) DEFAULT NULL,
  `vend_posto` varchar(60) DEFAULT NULL,
  `vend_telefone` varchar(15) DEFAULT NULL,
  `vend_datacriacao` datetime DEFAULT NULL,
  `vend_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `zona`
--

CREATE TABLE `zona` (
  `zona_id` varchar(15) NOT NULL,
  `descricao` varchar(60) DEFAULT NULL,
  `zona_datacriacao` datetime DEFAULT NULL,
  `zona_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `zona`
--

INSERT INTO `zona` (`zona_id`, `descricao`, `zona_datacriacao`, `zona_dataactualizacao`) VALUES
('C0B69BC3-5160-1', 'zonz1', '2020-02-17 00:00:00', '2020-02-17 00:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `arm`
--
ALTER TABLE `arm`
  ADD PRIMARY KEY (`arm_id`);

--
-- Índices para tabela `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`banco_id`);

--
-- Índices para tabela `caixa`
--
ALTER TABLE `caixa`
  ADD PRIMARY KEY (`caixa_id`);

--
-- Índices para tabela `cencusto`
--
ALTER TABLE `cencusto`
  ADD PRIMARY KEY (`cencusto_id`);

--
-- Índices para tabela `cli`
--
ALTER TABLE `cli`
  ADD PRIMARY KEY (`cli_id`),
  ADD KEY `fk_cli_tipocli1_idx` (`cli_tipocliid`),
  ADD KEY `fk_cli_vend1_idx` (`cli_vendid`),
  ADD KEY `fk_cli_moeda1_idx` (`cli_moedaid`),
  ADD KEY `fk_cli_pais1_idx` (`cli_paisid`),
  ADD KEY `fk_cli_cencusto1_idx` (`cli_cencustoid`),
  ADD KEY `fk_cli_armazem1_idx` (`cli_armazemid`),
  ADD KEY `fk_cli_condpag1_idx` (`cli_condpagid`),
  ADD KEY `fk_cli_zona1_idx` (`cli_zonaid`);

--
-- Índices para tabela `codconta`
--
ALTER TABLE `codconta`
  ADD PRIMARY KEY (`codconta_id`);

--
-- Índices para tabela `codmovstk`
--
ALTER TABLE `codmovstk`
  ADD PRIMARY KEY (`codmovstk_id`);

--
-- Índices para tabela `codmovtes`
--
ALTER TABLE `codmovtes`
  ADD PRIMARY KEY (`codmovtes_id`);

--
-- Índices para tabela `condpag`
--
ALTER TABLE `condpag`
  ADD PRIMARY KEY (`condpag_id`);

--
-- Índices para tabela `contatesoura`
--
ALTER TABLE `contatesoura`
  ADD PRIMARY KEY (`contatesoura_id`),
  ADD KEY `fk_contatesoura_banco1_idx` (`contatesoura_bancoid`);

--
-- Índices para tabela `ecran`
--
ALTER TABLE `ecran`
  ADD PRIMARY KEY (`ecran_id`);

--
-- Índices para tabela `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `fk_emp_moeda1_idx` (`emp_moedaid`);

--
-- Índices para tabela `ent`
--
ALTER TABLE `ent`
  ADD PRIMARY KEY (`ent_id`),
  ADD KEY `fk_cli_vend1_idx` (`ent_vendid`),
  ADD KEY `fk_cli_moeda1_idx` (`ent_moedaid`),
  ADD KEY `fk_cli_pais1_idx` (`ent_paisid`),
  ADD KEY `fk_cli_cencusto1_idx` (`ent_cencustoid`),
  ADD KEY `fk_cli_armazem1_idx` (`ent_armazemid`),
  ADD KEY `fk_cli_zona1_idx` (`ent_zonaid`);

--
-- Índices para tabela `fat`
--
ALTER TABLE `fat`
  ADD PRIMARY KEY (`fat_id`),
  ADD KEY `fk_fat_tipofat1_idx` (`fat_tipofatid`),
  ADD KEY `fk_fat_cli1_idx` (`fat_cliid`),
  ADD KEY `fk_fat_moeda1_idx` (`fat_moedaid`),
  ADD KEY `fk_fat_vend1_idx` (`fat_vendid`),
  ADD KEY `fk_fat_cencusto1_idx` (`fat_cencustoid`),
  ADD KEY `fk_fat_ent1_idx` (`fat_entid`),
  ADD KEY `fk_fat_caixa1_idx` (`fat_caixaid`),
  ADD KEY `fk_fat_sector1_idx` (`fat_sectorid`);

--
-- Índices para tabela `fatitem`
--
ALTER TABLE `fatitem`
  ADD PRIMARY KEY (`fatitem_id`),
  ADD KEY `fk_fatitem_arm1_idx` (`fatitem_armid`),
  ADD KEY `fk_fatitem_tabiva1_idx` (`fatitem_tabivaid`),
  ADD KEY `fk_fatitem_stk1_idx` (`fatitem_stkid`),
  ADD KEY `fk_fatitem_lote1_idx` (`fatitem_loteid`),
  ADD KEY `fk_fatitem_tabpreco1_idx` (`fatitem_tabprecoid`);

--
-- Índices para tabela `formapag`
--
ALTER TABLE `formapag`
  ADD PRIMARY KEY (`formapag_id`),
  ADD KEY `fk_formpag_tipopag1_idx` (`formapag_tipopagid`),
  ADD KEY `fk_formapag_banco1_idx` (`formapag_bancoid`),
  ADD KEY `fk_formapag_contatesoura1_idx` (`formapag_contatesouraid`),
  ADD KEY `fk_formapag_fat1_idx` (`formapag_fatid`);

--
-- Índices para tabela `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`grupo_id`);

--
-- Índices para tabela `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`lote_id`),
  ADD KEY `fk_lote_stk1_idx` (`lote_stkid`);

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`marca_id`);

--
-- Índices para tabela `mod`
--
ALTER TABLE `mod`
  ADD PRIMARY KEY (`mod_id`),
  ADD KEY `fk_mod_util1_idx` (`mod_utilizadorcriacao`),
  ADD KEY `fk_mod_util2_idx` (`mod_utilizadoractualizacao`);

--
-- Índices para tabela `moeda`
--
ALTER TABLE `moeda`
  ADD PRIMARY KEY (`moeda_id`);

--
-- Índices para tabela `movtes`
--
ALTER TABLE `movtes`
  ADD PRIMARY KEY (`movtes_id`),
  ADD KEY `fk_movtes_codconta1_idx` (`movtes_codcontaid`),
  ADD KEY `fk_movtes_moeda1_idx` (`movtes_moedaid`),
  ADD KEY `fk_movtes_cencusto1_idx` (`movtes_cencustoid`);

--
-- Índices para tabela `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`pais_id`);

--
-- Índices para tabela `rec`
--
ALTER TABLE `rec`
  ADD PRIMARY KEY (`rec_id`),
  ADD KEY `fk_rec_cli1_idx` (`rec_cliid`),
  ADD KEY `fk_rec_moeda1_idx` (`rec_moedaid`),
  ADD KEY `fk_rec_cencusto1_idx` (`rec_cencustoid`);

--
-- Índices para tabela `recitem`
--
ALTER TABLE `recitem`
  ADD PRIMARY KEY (`recitem_id`),
  ADD KEY `fk_recitem_rec1_idx` (`recitem_recid`),
  ADD KEY `fk_recitem_fat1_idx` (`recitem_fatid`);

--
-- Índices para tabela `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`sector_id`);

--
-- Índices para tabela `stk`
--
ALTER TABLE `stk`
  ADD PRIMARY KEY (`stk_id`),
  ADD KEY `fk_stk_tabiva_idx` (`stk_tabivaid`),
  ADD KEY `fk_stk_grupo1_idx` (`stk_grupoid`),
  ADD KEY `fk_stk_unimed1_idx` (`stk_unimedid`),
  ADD KEY `fk_stk_armazem1_idx` (`stk_armazemid`),
  ADD KEY `fk_stk_marca1_idx` (`stk_marcaid`);

--
-- Índices para tabela `tabiva`
--
ALTER TABLE `tabiva`
  ADD PRIMARY KEY (`tabiva_id`);

--
-- Índices para tabela `tabpreco`
--
ALTER TABLE `tabpreco`
  ADD PRIMARY KEY (`tabpreco_id`),
  ADD KEY `fk_tabpreco_stk1_idx` (`tabpreco_stkid`),
  ADD KEY `fk_tabpreco_moeda1_idx` (`tabpreco_moedaid`);

--
-- Índices para tabela `tipocli`
--
ALTER TABLE `tipocli`
  ADD PRIMARY KEY (`tipocli_id`);

--
-- Índices para tabela `tipofat`
--
ALTER TABLE `tipofat`
  ADD PRIMARY KEY (`tipofat_id`),
  ADD KEY `fk_tipofat_arm1_idx` (`tipofat_armid`),
  ADD KEY `fk_tipofat_arm2_idx` (`tipofat_armpredefinidoid`),
  ADD KEY `fk_tipofat_codmovstk1_idx` (`tipofat_codmovstkid`),
  ADD KEY `fk_tipofat_codmovtes1_idx` (`tipofat_codmovtesid`),
  ADD KEY `fk_tipofat_cencusto1_idx` (`tipofat_cencustoid`);

--
-- Índices para tabela `tipopag`
--
ALTER TABLE `tipopag`
  ADD PRIMARY KEY (`tipopag_id`);

--
-- Índices para tabela `tiporec`
--
ALTER TABLE `tiporec`
  ADD PRIMARY KEY (`tiporec_id`),
  ADD KEY `fk_tiporec_tipopag1_idx` (`tiporec_tipopagid`);

--
-- Índices para tabela `unimed`
--
ALTER TABLE `unimed`
  ADD PRIMARY KEY (`unimed_id`);

--
-- Índices para tabela `util`
--
ALTER TABLE `util`
  ADD PRIMARY KEY (`util_id`),
  ADD KEY `fk_util_util1_idx` (`util_utilizadorcriacao`),
  ADD KEY `fk_util_util2_idx` (`util_utilizadoractualizacao`);

--
-- Índices para tabela `utilacessos`
--
ALTER TABLE `utilacessos`
  ADD PRIMARY KEY (`utilacessos_id`),
  ADD KEY `fk_utilacessos_util1_idx` (`utilacessos_utilid`),
  ADD KEY `fk_utilacessos_ecran1_idx` (`utilacessos_ecranid`);

--
-- Índices para tabela `vend`
--
ALTER TABLE `vend`
  ADD PRIMARY KEY (`vend_id`);

--
-- Índices para tabela `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`zona_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contatesoura`
--
ALTER TABLE `contatesoura`
  MODIFY `contatesoura_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ecran`
--
ALTER TABLE `ecran`
  MODIFY `ecran_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fat`
--
ALTER TABLE `fat`
  MODIFY `fat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fatitem`
--
ALTER TABLE `fatitem`
  MODIFY `fatitem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `formapag`
--
ALTER TABLE `formapag`
  MODIFY `formapag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `grupo`
--
ALTER TABLE `grupo`
  MODIFY `grupo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `marca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `mod`
--
ALTER TABLE `mod`
  MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `movtes`
--
ALTER TABLE `movtes`
  MODIFY `movtes_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `rec`
--
ALTER TABLE `rec`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `recitem`
--
ALTER TABLE `recitem`
  MODIFY `recitem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tabiva`
--
ALTER TABLE `tabiva`
  MODIFY `tabiva_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tipopag`
--
ALTER TABLE `tipopag`
  MODIFY `tipopag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tiporec`
--
ALTER TABLE `tiporec`
  MODIFY `tiporec_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `unimed`
--
ALTER TABLE `unimed`
  MODIFY `unimed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `utilacessos`
--
ALTER TABLE `utilacessos`
  MODIFY `utilacessos_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cli`
--
ALTER TABLE `cli`
  ADD CONSTRAINT `cli_ibfk_1` FOREIGN KEY (`cli_condpagid`) REFERENCES `condpag` (`condpag_id`),
  ADD CONSTRAINT `cli_ibfk_2` FOREIGN KEY (`cli_condpagid`) REFERENCES `condpag` (`condpag_id`),
  ADD CONSTRAINT `cli_ibfk_3` FOREIGN KEY (`cli_zonaid`) REFERENCES `zona` (`zona_id`),
  ADD CONSTRAINT `cli_ibfk_4` FOREIGN KEY (`cli_vendid`) REFERENCES `vend` (`vend_id`),
  ADD CONSTRAINT `cli_ibfk_5` FOREIGN KEY (`cli_armazemid`) REFERENCES `arm` (`arm_id`),
  ADD CONSTRAINT `cli_ibfk_6` FOREIGN KEY (`cli_tipocliid`) REFERENCES `tipocli` (`tipocli_id`),
  ADD CONSTRAINT `cli_ibfk_7` FOREIGN KEY (`cli_tipocliid`) REFERENCES `tipocli` (`tipocli_id`),
  ADD CONSTRAINT `cli_ibfk_8` FOREIGN KEY (`cli_paisid`) REFERENCES `pais` (`pais_id`),
  ADD CONSTRAINT `cli_ibfk_9` FOREIGN KEY (`cli_moedaid`) REFERENCES `moeda` (`moeda_id`);

--
-- Limitadores para a tabela `contatesoura`
--
ALTER TABLE `contatesoura`
  ADD CONSTRAINT `contatesoura_ibfk_1` FOREIGN KEY (`contatesoura_bancoid`) REFERENCES `banco` (`banco_id`);

--
-- Limitadores para a tabela `ent`
--
ALTER TABLE `ent`
  ADD CONSTRAINT `ent_ibfk_1` FOREIGN KEY (`ent_moedaid`) REFERENCES `zona` (`zona_id`),
  ADD CONSTRAINT `ent_ibfk_2` FOREIGN KEY (`ent_cencustoid`) REFERENCES `cencusto` (`cencusto_id`),
  ADD CONSTRAINT `ent_ibfk_3` FOREIGN KEY (`ent_armazemid`) REFERENCES `arm` (`arm_id`),
  ADD CONSTRAINT `ent_ibfk_4` FOREIGN KEY (`ent_paisid`) REFERENCES `pais` (`pais_id`),
  ADD CONSTRAINT `ent_ibfk_5` FOREIGN KEY (`ent_moedaid`) REFERENCES `moeda` (`moeda_id`);

--
-- Limitadores para a tabela `fat`
--
ALTER TABLE `fat`
  ADD CONSTRAINT `fat_ibfk_1` FOREIGN KEY (`fat_cencustoid`) REFERENCES `cencusto` (`cencusto_id`),
  ADD CONSTRAINT `fat_ibfk_2` FOREIGN KEY (`fat_caixaid`) REFERENCES `caixa` (`caixa_id`),
  ADD CONSTRAINT `fat_ibfk_3` FOREIGN KEY (`fat_tipofatid`) REFERENCES `tipofat` (`tipofat_id`),
  ADD CONSTRAINT `fat_ibfk_4` FOREIGN KEY (`fat_moedaid`) REFERENCES `moeda` (`moeda_id`),
  ADD CONSTRAINT `fat_ibfk_5` FOREIGN KEY (`fat_cliid`) REFERENCES `cli` (`cli_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
