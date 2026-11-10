-- =====================================================================
-- BANCO DE DADOS: UZBEQUISTÃO & BRASIL — CONEXÕES QUE TRANSFORMAM
-- Estrutura compatível com MySQL 8.0+ / MariaDB 10.4+
-- =====================================================================

CREATE DATABASE IF NOT EXISTS `uzbequistao_brasil`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `uzbequistao_brasil`;

-- ---------------------------------------------------------------------
-- Tabela: usuarios (Painel Administrativo)
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(120) NOT NULL,
  `email` VARCHAR(150) NOT NULL UNIQUE,
  `senha_hash` VARCHAR(255) NOT NULL,
  `perfil` ENUM('admin', 'editor') NOT NULL DEFAULT 'editor',
  `status` ENUM('ativo', 'inativo') NOT NULL DEFAULT 'ativo',
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- Tabela: categorias
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(80) NOT NULL,
  `slug` VARCHAR(80) NOT NULL UNIQUE,
  `cor` VARCHAR(20) NOT NULL DEFAULT '#008844',
  `icone` VARCHAR(60) NOT NULL DEFAULT 'star',
  `descricao` TEXT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- Tabela: feiras
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `feiras` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `categoria_id` INT UNSIGNED NULL,
  `titulo` VARCHAR(150) NOT NULL,
  `subtitulo` VARCHAR(255) NULL,
  `slug` VARCHAR(150) NOT NULL UNIQUE,
  `descricao` TEXT NOT NULL,
  `data_evento` VARCHAR(80) NULL,
  `localizacao` VARCHAR(150) NULL,
  `imagem` VARCHAR(255) NOT NULL,
  `destaque` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT `fk_feiras_categoria`
    FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
    ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- Tabela: gastronomia
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gastronomia` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `titulo` VARCHAR(120) NOT NULL,
  `subtitulo` VARCHAR(255) NULL,
  `pais` ENUM('br', 'uz') NOT NULL,
  `slug` VARCHAR(120) NOT NULL UNIQUE,
  `categoria` VARCHAR(60) NOT NULL DEFAULT 'Prato Típico',
  `intro` TEXT NOT NULL,
  `ingredientes_json` JSON NULL,
  `extra` TEXT NULL,
  `imagem` VARCHAR(255) NOT NULL,
  `destaque` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- Tabela: lendas
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `lendas` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `titulo` VARCHAR(150) NOT NULL,
  `subtitulo` VARCHAR(255) NULL,
  `pais` ENUM('br', 'uz') NOT NULL,
  `slug` VARCHAR(150) NOT NULL UNIQUE,
  `intro` TEXT NOT NULL,
  `narrativa_completa` LONGTEXT NOT NULL,
  `itens_json` JSON NULL,
  `imagem` VARCHAR(255) NOT NULL,
  `destaque` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- Tabela: galeria
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `galeria` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `titulo` VARCHAR(150) NOT NULL,
  `descricao` TEXT NULL,
  `categoria` VARCHAR(80) NOT NULL,
  `pais` ENUM('br', 'uz', 'ambos') NOT NULL DEFAULT 'ambos',
  `imagem` VARCHAR(255) NOT NULL,
  `destaque` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- SEED DATA (DADOS INICIAIS)
-- Usuário inicial: admin@uzbequistao.br / Senha segura: Admin@2026!
-- Hash gerado com PASSWORD_DEFAULT (BCrypt)
-- ---------------------------------------------------------------------
INSERT INTO `usuarios` (`nome`, `email`, `senha_hash`, `perfil`, `status`)
VALUES (
  'Administrador Cultural',
  'admin@uzbequistao.br',
  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', -- 'password' (trocar no primeiro acesso)
  'admin',
  'ativo'
) ON DUPLICATE KEY UPDATE `nome` = VALUES(`nome`);

-- Categorias
INSERT INTO `categorias` (`id`, `nome`, `slug`, `cor`, `icone`, `descricao`)
VALUES
  (1, 'Semana Cultural', 'semana-cultural', '#0875C9', 'landmark', 'Celebração das tradições uzbeques, música e costumes'),
  (2, 'Empreendedorismo', 'empreendedorismo', '#008844', 'store', 'Projetos inovadores e Gastro Bar Paraíso Brazuca'),
  (3, 'Feira do Conhecimento', 'conhecimento', '#082B50', 'book-open', 'História, lendas e mitos de Brasil e Uzbequistão')
ON DUPLICATE KEY UPDATE `nome` = VALUES(`nome`);

-- Feiras
INSERT INTO `feiras` (`categoria_id`, `titulo`, `subtitulo`, `slug`, `descricao`, `data_evento`, `localizacao`, `imagem`, `destaque`)
VALUES
  (1, 'Semana Cultural Uzbeque', 'Imersão em tradições, história, culinária e danças', 'semana-cultural', 'Celebrando a cultura do Uzbequistão com trajes típicos, exposições de tapeçaria ikat, cerâmica azul de Rishtan e danças tradicionais.', 'Maio de 2026', 'Auditório Principal & Praça Cultural', 'assets/img/heroes/registan-hero.jpg', 1),
  (2, 'Feira do Empreendedorismo - Gastro Bar', 'Paraíso Brazuca: Sabor e Cultura em cada detalhe', 'feira-empreendedorismo', 'Nosso projeto de gastro bar integrando a melhor culinária de rua e iguarias brasileiras com estratégias modernas de gestão e hospitalidade.', 'Maio de 2026', 'Pavilhão Gastronômico', 'assets/img/heroes/gastrobar-hero.jpg', 1),
  (3, 'Feira do Conhecimento: Lendas e Mitos', 'Duas culturas, histórias que atravessam gerações', 'feira-conhecimento', 'Encontro interativo de narrativas populares, folclore amazônico e nordestino brasileiro ao lado de grandes epopeias e lendas da Rota da Seda.', 'Maio de 2026', 'Espaço Multiuso', 'assets/img/heroes/hero-lendas.jpg', 1)
ON DUPLICATE KEY UPDATE `titulo` = VALUES(`titulo`);

