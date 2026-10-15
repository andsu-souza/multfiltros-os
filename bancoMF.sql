SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `sistema_os_multfiltros` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `sistema_os_multfiltros`;

-- 1. Tabela de Utilizadores (Tela de Login)
CREATE TABLE IF NOT EXISTS `users` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) ENGINE = InnoDB;

-- 2. Tabela de Categorias (Para os Produtos)
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` TEXT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) ENGINE = InnoDB;

-- 3. Tabela de Produtos (Consultar, Cadastrar, Editar, Excluir)
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` TEXT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `estoque` INT NOT NULL DEFAULT 0,
  `categoria_id` BIGINT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  CONSTRAINT `fk_produtos_categoria`
    FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE = InnoDB;

-- 4. Tabela de Clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `telefone` VARCHAR(20) NOT NULL,
  `email` VARCHAR(255) NULL,
  `endereco` VARCHAR(255) NULL,
  `cidade` VARCHAR(255) NULL,
  `estado` VARCHAR(255) NULL,
  `cep` VARCHAR(20) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) ENGINE = InnoDB;

-- 5. Tabela de Técnicos (Equipa Técnica)
CREATE TABLE IF NOT EXISTS `tecnicos` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `especialidade` VARCHAR(100) NULL,
  `telefone` VARCHAR(20) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
) ENGINE = InnoDB;

-- 6. Tabela de Agenda / Agendamentos (Controlo por Dia, Mês, Ano e Faixa Horária)
CREATE TABLE IF NOT EXISTS `agendamentos` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `cliente_id` BIGINT UNSIGNED NOT NULL,
  `tecnico_id` BIGINT UNSIGNED NULL,
  `data` DATE NOT NULL, -- Permite filtrar facilmente por dia, mês e ano
  `faixa_horario` VARCHAR(50) NOT NULL, -- Ex: '08:00 - 10:00', '10:00 - 12:00'
  `status` ENUM('AGENDADO', 'CONFIRMADO', 'CONCLUIDO', 'CANCELADO') NOT NULL DEFAULT 'AGENDADO',
  `observacoes` TEXT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  CONSTRAINT `fk_agendamento_cliente`
    FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`)
    ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT `fk_agendamento_tecnico`
    FOREIGN KEY (`tecnico_id`) REFERENCES `tecnicos` (`id`)
    ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE = InnoDB;

-- 7. Tabela de Ordens de Serviço (OS)
CREATE TABLE IF NOT EXISTS `ordens_servico` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `cliente_id` BIGINT UNSIGNED NOT NULL,
  `tecnico_id` BIGINT UNSIGNED NULL, -- Técnico vinculado ao registar a conclusão
  `agendamento_id` BIGINT UNSIGNED NULL, -- Opcional: puxar dados do agendamento prévio
  `status` ENUM('ABERTO', 'EM_ANDAMENTO', 'CONCLUIDO', 'CANCELADO') NOT NULL DEFAULT 'ABERTO',
  `descricao_problema` TEXT NOT NULL,
  `laudo_tecnico` TEXT NULL,
  `valor_servico` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `valor_total` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  CONSTRAINT `fk_os_cliente`
    FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`)
    ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT `fk_os_tecnico`
    FOREIGN KEY (`tecnico_id`) REFERENCES `tecnicos` (`id`)
    ON UPDATE CASCADE ON DELETE SET NULL,
  CONSTRAINT `fk_os_agendamento`
    FOREIGN KEY (`agendamento_id`) REFERENCES `agendamentos` (`id`)
    ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE = InnoDB;

-- 8. Tabela de Itens / Peças da Ordem de Serviço (Baseado no sistema de e-commerce anterior)
CREATE TABLE IF NOT EXISTS `itens_os` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `ordem_servico_id` BIGINT UNSIGNED NOT NULL,
  `produto_id` BIGINT UNSIGNED NOT NULL,
  `quantidade` INT NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  CONSTRAINT `fk_itens_os_ordem`
    FOREIGN KEY (`ordem_servico_id`) REFERENCES `ordens_servico` (`id`)
    ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT `fk_itens_os_produto`
    FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;