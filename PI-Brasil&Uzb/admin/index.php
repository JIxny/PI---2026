<?php
/**
 * PONTO DE ENTRADA DO PAINEL ADMINISTRATIVO
 */
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!empty($_SESSION['admin_usuario'])) {
    header('Location: dashboard.php');
    exit;
}

header('Location: login.php');
exit;

