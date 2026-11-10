<?php
/**
 * PAINEL ADMINISTRATIVO — DASHBOARD
 */
declare(strict_types=1);

require_once __DIR__ . '/../includes/functions.php';

if (empty($_SESSION['admin_usuario'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['admin_usuario'];
$dbConectado = Database::isConnected();

$pratos = get_todos_pratos();
$lendas = get_todas_lendas();
$galeria = get_todas_imagens_galeria();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Painel Uzbequistão &amp; Brasil</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Montserrat:wght@700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="admin-layout">
  <!-- Barra Lateral -->
  <aside class="admin-sidebar">
    <div class="admin-brand">
      <div style="font-size: 0.75rem; color: var(--color-accent-emerald); text-transform: uppercase; letter-spacing: 0.05em;">Projeto Integrador</div>
      Uzbequistão &amp; Brasil
    </div>

    <nav class="admin-nav">
      <a href="dashboard.php" class="admin-nav-item ativo">📊 Visão Geral</a>
      <a href="feiras.php" class="admin-nav-item">🎪 Gerenciar Feiras</a>
      <a href="imagens.php" class="admin-nav-item">🖼️ Imagens &amp; Uploads</a>
      <a href="../index.php" target="_blank" class="admin-nav-item">🌐 Ver Site Público &nearr;</a>
    </nav>

    <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1rem; margin-top: auto;">
      <div style="font-size: 0.82rem; margin-bottom: 6px;">Logado como:</div>
      <strong style="font-size: 0.9rem; color: #fff; display:block;"><?= e($user['nome']) ?></strong>
      <a href="logout.php" style="display:inline-block; margin-top: 8px; font-size: 0.8rem; color: #FF8A80;">&larr; Encerrar Sessão</a>
    </div>
  </aside>

  <!-- Conteúdo Principal -->
  <main class="admin-conteudo-principal">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
      <div>
        <h1 style="font-family: var(--font-family-display); font-size: 1.8rem; font-weight: 800; color: var(--color-primary-navy);">
          Painel de Controle
        </h1>
        <p style="color: var(--color-text-muted); font-size: 0.9rem;">
          Gerenciamento de conteúdos e monitoramento do portal cultural.
        </p>
      </div>

      <div>
        <?php if ($dbConectado): ?>
          <span style="display:inline-flex; align-items:center; gap:6px; background:#E8F5E9; color:#1B5E20; padding:6px 14px; border-radius:9999px; font-size:0.8rem; font-weight:700;">
            <span style="width:8px; height:8px; background:#2E7D32; border-radius:50%;"></span>
            MySQL / MariaDB Conectado
          </span>
        <?php else: ?>
          <span style="display:inline-flex; align-items:center; gap:6px; background:#EBF5FF; color:#1E429F; padding:6px 14px; border-radius:9999px; font-size:0.8rem; font-weight:700;">
            <span style="width:8px; height:8px; background:#0875C9; border-radius:50%;"></span>
            Repositório Autônomo Ativo
          </span>
        <?php endif; ?>
      </div>
    </div>

    <!-- Cards de Métricas -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-bottom: 2.5rem;">
      <div class="feira-destaque-card" style="padding: 20px;">
        <span style="font-size: 0.8rem; font-weight: 700; color: var(--color-accent-emerald);">Gastronomia</span>
        <div style="font-size: 2.2rem; font-weight: 900; color: var(--color-primary-navy);"><?= count($pratos) ?></div>
        <small style="color: var(--color-text-muted);">Pratos típicos cadastrados</small>
      </div>

      <div class="feira-destaque-card" style="padding: 20px;">
        <span style="font-size: 0.8rem; font-weight: 700; color: var(--color-ornamental-gold);">Folclore</span>
        <div style="font-size: 2.2rem; font-weight: 900; color: var(--color-primary-navy);"><?= count($lendas) ?></div>
        <small style="color: var(--color-text-muted);">Lendas e narrativas orais</small>
      </div>

      <div class="feira-destaque-card" style="padding: 20px;">
        <span style="font-size: 0.8rem; font-weight: 700; color: var(--color-primary-accent);">Galeria</span>
        <div style="font-size: 2.2rem; font-weight: 900; color: var(--color-primary-navy);"><?= count($galeria) ?></div>
        <small style="color: var(--color-text-muted);">Fotografias no acervo</small>
      </div>

      <div class="feira-destaque-card" style="padding: 20px;">
        <span style="font-size: 0.8rem; font-weight: 700; color: var(--color-primary-navy);">Feiras Culturais</span>
        <div style="font-size: 2.2rem; font-weight: 900; color: var(--color-primary-navy);">3</div>
        <small style="color: var(--color-text-muted);">Eixos temáticos em exibição</small>
      </div>
    </div>

    <!-- Tabela de Itens Recentes -->
    <div class="admin-tabela-card">
      <div style="padding: 18px 24px; border-bottom: 1px solid var(--color-border); display: flex; justify-content: space-between; align-items: center;">
        <h3 style="font-family: var(--font-family-display); font-size: 1.1rem; color: var(--color-primary-navy); font-weight: 800;">
          Itens Gastronômicos em Exibição
        </h3>
        <a href="feiras.php" class="btn btn-primary" style="padding: 6px 14px; font-size: 0.8rem;">Gerenciar Feiras</a>
      </div>
      <table class="tabela-dados">
        <thead>
          <tr>
            <th>Prato / Item</th>
            <th>Origem</th>
            <th>Categoria</th>
            <th>Subtítulo</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach (array_slice($pratos, 0, 6) as $p): ?>
            <tr>
              <td>
                <strong><?= e($p['titulo']) ?></strong>
              </td>
              <td><?= $p['pais'] === 'br' ? '🇧🇷 Brasil' : '🇺🇿 Uzbequistão' ?></td>
              <td><span style="font-size:0.75rem; background:var(--color-bg-light); padding:2px 8px; border-radius:4px;"><?= e($p['categoria']) ?></span></td>
              <td style="color: var(--color-text-muted);"><?= e($p['subtitulo']) ?></td>
              <td><a href="../feiras.php#cardapio-gastrobar" target="_blank" style="font-size: 0.8rem; color: var(--color-primary-accent); font-weight: 700;">Ver no site &rarr;</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>
</div>

</body>
</html>

