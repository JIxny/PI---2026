<?php
/**
 * Conexão com Banco de Dados via PDO
 * Suporta fallback transparente quando o servidor MySQL/MariaDB não está disponível.
 */

declare(strict_types=1);

class Database
{
    private static ?PDO $instance = null;
    private static bool $connectionAttempted = false;

    public static function getConnection(): ?PDO
    {
        if (self::$instance !== null) {
            return self::$instance;
        }

        if (self::$connectionAttempted) {
            return null;
        }

        self::$connectionAttempted = true;

        // Configurações com fallback para padrões locais do XAMPP
        $host = getenv('DB_HOST') ?: '127.0.0.1';
        $port = getenv('DB_PORT') ?: '3306';
        $dbname = getenv('DB_NAME') ?: 'uzbequistao_brasil';
        $user = getenv('DB_USER') ?: 'root';
        $pass = getenv('DB_PASS') !== false ? getenv('DB_PASS') : '';

        $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
        ];

        try {
            self::$instance = new PDO($dsn, $user, $pass, $options);
            return self::$instance;
        } catch (PDOException $e) {
            // Em produção/desenvolvimento local sem o banco inicializado,
            // registramos no log de erro do PHP sem expor credenciais ao usuário.
            error_log('Conexão ao banco de dados não estabelecida: ' . $e->getMessage());
            self::$instance = null;
            return null;
        }
    }

    public static function isConnected(): bool
    {
        return self::getConnection() !== null;
    }
}

