<?php
/**
 * GERENCIAMENTO DE FEIRAS — admin/feiras.php
 */
declare(strict_types=1);

require_once __DIR__ . '/../includes/functions.php';

if (empty($_SESSION['admin_usuario'])) {
    header('Location: login.php');
    exit;
}

$dbConectado = Database::isConnected();
$msgSucesso = '';
$msgErro = '';

// Processamento de formulário de nova feira / atividade
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['csrf_token'] ?? '';
    if (!verify_csrf_token($token)) {
        $msgErro = 'Erro de segurança CSRF.';
    } else {
        $titulo = trim($_POST['titulo'] ?? '');
        $subtitulo = trim($_POST['subtitulo'] ?? '');
        $categoriaId = (int)($_POST['categoria_id'] ?? 1);
        $dataEvento = trim($_POST['data_evento'] ?? 'Maio de 2026');
        $localizacao = trim($_POST['localizacao'] ?? 'Pavilhão Cultural');
        $descricao = trim($_POST['descricao'] ?? '');

        if (empty($titulo) || empty($descricao)) {
            $msgErro = 'Preencha o título e a descrição da feira.';
        } else {
            if ($dbConectado) {
                try {
                    $pdo = Database::getConnection();
                    $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $titulo));
                    $stmt = $pdo->prepare("INSERT INTO feiras (categoria_id, titulo, subtitulo, slug, descricao, data_evento, localizacao, imagem, destaque) VALUES (:cat, :titulo, :sub, :slug, :desc, :data, :local, 'assets/img/heroes/hero-inicio.jpg', 1)");
                    $stmt->execute([
                        ':cat' => $categoriaId,
                        ':titulo' => $titulo,
                        ':sub' => $subtitulo,
                        ':slug' => $slug,
                        ':desc' => $descricao,
                        ':data' => $dataEvento,
                        ':local' => $localizacao
                    ]);
                    $msgSucesso = 'Feira cadastrada com sucesso no banco de dados!';
                } catch (PDOException $e) {
                    $msgErro = 'Erro ao salvar no banco: ' . $e->getMessage();
                }
            } else {
                $msgSucesso = 'Dados validados com sucesso! (Modo autônomo sem MySQL: os dados públicos continuam servidos pelo repositório)';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerenciar Feiras | Painel Administrativo</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Montserrat:wght@700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="admin-layout">
  <aside class="admin-sidebar">
    <div class="admin-brand">
      <div style="font-size: 0.75rem; color: var(--color-accent-emerald); text-transform: uppercase;">Projeto Integrador</div>
      Uzbequistão &amp; Brasil
    </div>

    <nav class="admin-nav">
      <a href="dashboard.php" class="admin-nav-item">📊 Visão Geral</a>
      <a href="feiras.php" class="admin-nav-item ativo">🎪 Gerenciar Feiras</a>
      <a href="imagens.php" class="admin-nav-item">🖼️ Imagens &amp; Uploads</a>
      <a href="../index.php" target="_blank" class="admin-nav-item">🌐 Ver Site Público &nearr;</a>
    </nav>

    <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1rem; margin-top: auto;">
      <a href="logout.php" style="font-size: 0.8rem; color: #FF8A80;">&larr; Encerrar Sessão</a>
    </div>
  </aside>

  <main class="admin-conteudo-principal">
    <div style="margin-bottom: 2rem;">
      <h1 style="font-family: var(--font-family-display); font-size: 1.8rem; font-weight: 800; color: var(--color-primary-navy);">
        Gerenciador de Feiras Culturais
      </h1>
      <p style="color: var(--color-text-muted); font-size: 0.9rem;">
        Cadastre e atualize informações sobre as atrações, palestras e estandes.
      </p>
    </div>

    <?php if (!empty($msgSucesso)): ?>
      <div class="alerta alerta-sucesso"><span>✅</span><p><?= e($msgSucesso) ?></p></div>
    <?php endif; ?>

    <?php if (!empty($msgErro)): ?>
      <div class="alerta alerta-erro"><span>⚠️</span><p><?= e($msgErro) ?></p></div>
    <?php endif; ?>

    <div style="display: grid; grid-template-columns: 1.3fr 1fr; gap: 24px; align-items: start;">
      
      <!-- Formulário de Cadastro -->
      <div class="admin-tabela-card" style="padding: 24px;">
        <h3 style="font-family: var(--font-family-display); font-size: 1.15rem; color: var(--color-primary-navy); font-weight: 800; margin-bottom: 1.2rem;">
          Cadastrar Nova Feira / Evento
        </h3>

        <form method="POST" action="feiras.php">
          <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

          <div class="form-grupo">
            <label for="titulo" class="form-label">Título da Feira *</label>
            <input type="text" id="titulo" name="titulo" class="form-controle" required placeholder="Ex: Mostra de Tapeçaria Uzbeque">
          </div>

          <div class="form-grupo">
            <label for="categoria_id" class="form-label">Eixo Temático</label>
            <select id="categoria_id" name="categoria_id" class="form-controle">
              <option value="1">Semana Cultural Uzbeque</option>
              <option value="2">Feira do Empreendedorismo (Gastro Bar)</option>
              <option value="3">Feira do Conhecimento (Lendas &amp; Mitos)</option>
            </select>
          </div>

          <div class="form-grupo">
            <label for="subtitulo" class="form-label">Subtítulo / Chamada Curta</label>
            <input type="text" id="subtitulo" name="subtitulo" class="form-controle" placeholder="Ex: Exposição de motivos e oficinas de tecelagem">
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
            <div class="form-grupo">
              <label for="data_evento" class="form-label">Data Prevista</label>
              <input type="text" id="data_evento" name="data_evento" class="form-controle" value="Maio de 2026">
            </div>
            <div class="form-grupo">
              <label for="localizacao" class="form-label">Local de Realização</label>
              <input type="text" id="localizacao" name="localizacao" class="form-controle" value="Auditório Principal">
            </div>
          </div>

          <div class="form-grupo">
            <label for="descricao" class="form-label">Descrição Completa *</label>
            <textarea id="descricao" name="descricao" class="form-controle" required placeholder="Detalhes da atração cultural..."></textarea>
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%;">
            Salvar Feira
          </button>
        </form>
      </div>

      <!-- Lista de Feiras Ativas -->
      <div class="admin-tabela-card" style="padding: 20px;">
        <h3 style="font-family: var(--font-family-display); font-size: 1.15rem; color: var(--color-primary-navy); font-weight: 800; margin-bottom: 1rem;">
          Feiras Ativas no Sistema
        </h3>
        
        <div style="display: flex; flex-direction: column; gap: 14px;">
          <div style="padding: 12px; background: var(--color-bg-light); border-radius: var(--radius-sm); border-left: 4px solid var(--color-primary-accent);">
            <strong>Semana Cultural Uzbeque</strong>
            <p style="font-size: 0.8rem; color: var(--color-text-muted); margin-top: 2px;">Auditório Principal • Maio de 2026</p>
          </div>

          <div style="padding: 12px; background: var(--color-bg-light); border-radius: var(--radius-sm); border-left: 4px solid var(--color-accent-green);">
            <strong>Feira do Empreendedorismo (Gastro Bar)</strong>
            <p style="font-size: 0.8rem; color: var(--color-text-muted); margin-top: 2px;">Pavilhão Gastronômico • Maio de 2026</p>
          </div>

          <div style="padding: 12px; background: var(--color-bg-light); border-radius: var(--radius-sm); border-left: 4px solid var(--color-ornamental-gold);">
            <strong>Feira do Conhecimento: Lendas &amp; Mitos</strong>
            <p style="font-size: 0.8rem; color: var(--color-text-muted); margin-top: 2px;">Espaço Multiuso • Maio de 2026</p>
          </div>
        </div>
      </div>

    </div>
  </main>
</div>

</body>
</html>

