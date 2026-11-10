<?php
/**
 * GERENCIAMENTO DE IMAGENS E UPLOADS SEGUROS — admin/imagens.php
 */
declare(strict_types=1);

require_once __DIR__ . '/../includes/functions.php';

if (empty($_SESSION['admin_usuario'])) {
    header('Location: login.php');
    exit;
}

$msgSucesso = '';
$msgErro = '';
$diretorioUpload = __DIR__ . '/../uploads/';

// Tratamento de Upload Seguro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['csrf_token'] ?? '';
    if (!verify_csrf_token($token)) {
        $msgErro = 'Erro de validação CSRF.';
    } elseif (!isset($_FILES['imagem']) || $_FILES['imagem']['error'] !== UPLOAD_ERR_OK) {
        $msgErro = 'Nenhum arquivo enviado ou erro no upload (Código: ' . ($_FILES['imagem']['error'] ?? 'desconhecido') . ').';
    } else {
        $arquivo = $_FILES['imagem'];
        $tamanhoMaximo = 5 * 1024 * 1024; // 5 MB

        if ($arquivo['size'] > $tamanhoMaximo) {
            $msgErro = 'O arquivo excede o limite máximo permitido de 5 MB.';
        } else {
            // Verificação do MIME Type real com Fileinfo
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mimeReal = $finfo->file($arquivo['tmp_name']);

            $tiposPermitidos = [
                'image/jpeg' => 'jpg',
                'image/png'  => 'png',
                'image/webp' => 'webp'
            ];

            if (!array_key_exists($mimeReal, $tiposPermitidos)) {
                $msgErro = 'Formato de arquivo inválido. Permitido apenas JPG, PNG e WebP.';
            } else {
                $extensao = $tiposPermitidos[$mimeReal];
                // Nome gerado criptograficamente pelo servidor (evita injeção de nomes maliciosos)
                $nomeSeguro = 'foto_' . bin2hex(random_bytes(10)) . '.' . $extensao;
                $destinoFinal = $diretorioUpload . $nomeSeguro;

                if (move_uploaded_file($arquivo['tmp_name'], $destinoFinal)) {
                    $titulo = trim($_POST['titulo'] ?? 'Fotografia Cultural');
                    $categoria = trim($_POST['categoria'] ?? 'geral');
                    $msgSucesso = 'Imagem enviada com sucesso: ' . $nomeSeguro;
                } else {
                    $msgErro = 'Falha ao salvar o arquivo no diretório seguro de uploads.';
                }
            }
        }
    }
}

$imagensGaleria = get_todas_imagens_galeria();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerenciamento de Imagens | Painel Administrativo</title>
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
      <a href="feiras.php" class="admin-nav-item">🎪 Gerenciar Feiras</a>
      <a href="imagens.php" class="admin-nav-item ativo">🖼️ Imagens &amp; Uploads</a>
      <a href="../index.php" target="_blank" class="admin-nav-item">🌐 Ver Site Público &nearr;</a>
    </nav>

    <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1rem; margin-top: auto;">
      <a href="logout.php" style="font-size: 0.8rem; color: #FF8A80;">&larr; Encerrar Sessão</a>
    </div>
  </aside>

  <main class="admin-conteudo-principal">
    <div style="margin-bottom: 2rem;">
      <h1 style="font-family: var(--font-family-display); font-size: 1.8rem; font-weight: 800; color: var(--color-primary-navy);">
        Acervo e Upload de Fotografias
      </h1>
      <p style="color: var(--color-text-muted); font-size: 0.9rem;">
        Envio seguro de fotos protegidas contra execução de scripts maliciosos.
      </p>
    </div>

    <?php if (!empty($msgSucesso)): ?>
      <div class="alerta alerta-sucesso"><span>✅</span><p><?= e($msgSucesso) ?></p></div>
    <?php endif; ?>

    <?php if (!empty($msgErro)): ?>
      <div class="alerta alerta-erro"><span>⚠️</span><p><?= e($msgErro) ?></p></div>
    <?php endif; ?>

    <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 24px; align-items: start;">
      <!-- Formulário de Upload -->
      <div class="admin-tabela-card" style="padding: 24px;">
        <h3 style="font-family: var(--font-family-display); font-size: 1.15rem; color: var(--color-primary-navy); font-weight: 800; margin-bottom: 1.2rem;">
          Novo Upload Seguro
        </h3>

        <form method="POST" action="imagens.php" enctype="multipart/form-data">
          <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

          <div class="form-grupo">
            <label for="titulo" class="form-label">Título da Fotografia</label>
            <input type="text" id="titulo" name="titulo" class="form-controle" required placeholder="Ex: Detalhe do Mosaico Shah-i-Zinda">
          </div>

          <div class="form-grupo">
            <label for="categoria" class="form-label">Categoria</label>
            <select id="categoria" name="categoria" class="form-controle">
              <option value="arquitetura">Arquitetura</option>
              <option value="gastronomia">Gastronomia</option>
              <option value="feiras">Feiras &amp; Estandes</option>
              <option value="dancas">Danças</option>
              <option value="artesanato">Artesanato</option>
            </select>
          </div>

          <div class="form-grupo">
            <label for="imagem" class="form-label">Arquivo de Imagem (JPG, PNG ou WebP - Máx 5MB)</label>
            <input type="file" id="imagem" name="imagem" accept="image/jpeg,image/png,image/webp" class="form-controle" required>
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 8px;">
            Fazer Upload Seguro
          </button>
        </form>
      </div>

      <!-- Grade de Imagens Ativas -->
      <div class="admin-tabela-card" style="padding: 20px;">
        <h3 style="font-family: var(--font-family-display); font-size: 1.15rem; color: var(--color-primary-navy); font-weight: 800; margin-bottom: 1rem;">
          Fotografias no Acervo Atual
        </h3>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); gap: 12px;">
          <?php foreach ($imagensGaleria as $im): ?>
            <div style="border: 1px solid var(--color-border); border-radius: var(--radius-sm); overflow:hidden; background: var(--color-bg-light);">
              <img src="../<?= e($im['img']) ?>" alt="<?= e($im['titulo']) ?>" style="width:100%; height:90px; object-fit:cover;">
              <div style="padding: 6px; font-size: 0.72rem;">
                <strong style="display:block; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"><?= e($im['titulo']) ?></strong>
                <span style="color: var(--color-text-muted); text-transform:uppercase; font-size:0.65rem;"><?= e($im['categoria']) ?></span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </main>
</div>

</body>
</html>

