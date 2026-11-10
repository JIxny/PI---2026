<?php
/**
 * PÁGINA DE CONTATO — contato.php
 * Formulário seguro com validação no servidor, proteção CSRF e mensagens flash
 */
$pagina = 'contato';
$titulo = 'Contato | Uzbequistão & Brasil';
$descricaoSeo = 'Entre em contato com a equipe organizadora do Projeto Integrador Uzbequistão & Brasil.';

require_once __DIR__ . '/includes/functions.php';

$mensagemSucesso = '';
$mensagemErro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['csrf_token'] ?? '';
    if (!verify_csrf_token($token)) {
        $mensagemErro = 'Falha na validação de segurança (Token expirado ou inválido). Por favor, recarregue e tente novamente.';
    } else {
        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $assunto = trim($_POST['assunto'] ?? '');
        $mensagem = trim($_POST['mensagem'] ?? '');

        if (empty($nome) || mb_strlen($nome) < 3) {
            $mensagemErro = 'Por favor, informe seu nome completo (mínimo de 3 caracteres).';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mensagemErro = 'Por favor, informe um endereço de e-mail válido.';
        } elseif (empty($mensagem) || mb_strlen($mensagem) < 10) {
            $mensagemErro = 'A mensagem deve conter pelo menos 10 caracteres explicativos.';
        } else {
            // Em ambiente de produção real, enviaria e-mail ou gravaria no banco.
            // Aqui fornecemos feedback claro e higienizado.
            $mensagemSucesso = 'Mensagem enviada com sucesso! Agradecemos seu interesse pelo Projeto Integrador.';
        }
    }
}

include __DIR__ . '/includes/header.php';
?>

<!-- ===================================================================
HERO: CONTATO
==================================================================== -->
<section class="hero-panoramico" style="background: linear-gradient(135deg, #082B50 0%, #008844 100%);">
  <div class="container hero-grid">
    <div class="hero-conteudo">
      <span class="section-badge gold">Canal de Comunicação</span>
      <h1 class="hero-super-titulo">
        FALE
        <span class="destaque-verde">CONOSCO</span>
      </h1>
      <hr class="hero-divisor-linha">
      <p class="hero-subtitulo">Dúvidas, parcerias e informações sobre as feiras.</p>
      <p class="hero-descricao">
        Envie sua mensagem para a coordenação do projeto, sugira atividades culturais ou solicite informações para participar das próximas edições.
      </p>
    </div>
    <div class="hero-visual">
      <div class="hero-foto-panoramica">
        <img src="assets/img/heroes/hero-projeto.jpg" alt="Equipe e atendimento" width="800" height="400">
      </div>
    </div>
  </div>
</section>

<!-- ===================================================================
FORMULÁRIO DE CONTATO E INFORMAÇÕES
==================================================================== -->
<section class="section">
  <div class="container">
    <div style="display: grid; grid-template-columns: 1.2fr 1fr; gap: clamp(2rem, 4vw, 4rem); align-items: start;">
      
      <!-- Formulário com Proteção CSRF -->
      <div style="background: var(--color-white); border-radius: var(--radius-xl); padding: clamp(1.5rem, 3vw, 2.5rem); box-shadow: var(--shadow-lg); border: 1px solid var(--color-border);">
        <h2 style="font-family: var(--font-family-display); font-size: 1.4rem; font-weight: 800; color: var(--color-primary-navy); margin-bottom: 1.5rem;">
          Envie sua Mensagem
        </h2>
        <?php if (!empty($mensagemSucesso)): ?>
          <div class="alerta alerta-sucesso" role="alert">
            <span>✅</span>
            <p><?= e($mensagemSucesso) ?></p>
          </div>
        <?php endif; ?>
        <?php if (!empty($mensagemErro)): ?>
          <div class="alerta alerta-erro" role="alert">
            <span>⚠️</span>
            <p><?= e($mensagemErro) ?></p>
          </div>
        <?php endif; ?>
        <form method="POST" action="contato.php" novalidate>
          <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
          <div class="form-grupo">
            <label for="nome" class="form-label">Nome Completo *</label>
            <input type="text" id="nome" name="nome" class="form-controle" required placeholder="Seu nome" value="<?= isset($_POST['nome']) ? e($_POST['nome']) : '' ?>">
          </div>
          <div class="form-grupo">
            <label for="email" class="form-label">E-mail para Contato *</label>
            <input type="email" id="email" name="email" class="form-controle" required placeholder="seuemail@exemplo.com" value="<?= isset($_POST['email']) ? e($_POST['email']) : '' ?>">
          </div>
          <div class="form-grupo">
            <label for="assunto" class="form-label">Assunto</label>
            <select id="assunto" name="assunto" class="form-controle">
              <option value="Dúvidas Gerais">Dúvidas Gerais sobre o Projeto</option>
              <option value="Semana Cultural">Semana Cultural Uzbeque</option>
              <option value="Feira do Empreendedorismo">Feira do Empreendedorismo (Gastro Bar)</option>
              <option value="Feira do Conhecimento">Feira do Conhecimento (Lendas &amp; Mitos)</option>
              <option value="Parcerias e Apoio">Parcerias e Apoio Institucional</option>
            </select>
          </div>
          <div class="form-grupo">
            <label for="mensagem" class="form-label">Mensagem *</label>
            <textarea id="mensagem" name="mensagem" class="form-controle" required placeholder="Escreva sua mensagem com detalhes..."><?= isset($_POST['mensagem']) ? e($_POST['mensagem']) : '' ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 10px;">
            Enviar Mensagem
          </button>
        </form>
      </div>
      <!-- Informações Complementares -->
      <div>
        <div class="feira-destaque-card" style="margin-bottom: 1.5rem; cursor: default;">
          <h3 class="feira-card-titulo" style="font-size: 1.15rem; color: var(--color-primary-navy); margin-bottom: 12px;">
            Atendimento &amp; Localização
          </h3>
          <p style="font-size: 0.9rem; color: var(--color-text-main); line-height: 1.6; margin-bottom: 14px;">
            O Projeto Integrador é apresentado nos espaços acadêmicos e praças culturais integradas durante os períodos letivos.
          </p>
          <ul style="display: flex; flex-direction: column; gap: 8px; font-size: 0.88rem; color: var(--color-text-muted);">
            <li>📍 <strong>Local:</strong> Praça Cultural e Espaços Multiuso</li>
            <li>📅 <strong>Período:</strong> Maio de 2026</li>
            <li>🕒 <strong>Horário das Feiras:</strong> Das 09h às 18h</li>
            <li>✉️ <strong>E-mail Institucional:</strong> contato@uzbequistao.br</li>
          </ul>
        </div>
        <div class="feira-destaque-card" style="background: var(--color-bg-navy); color: #fff; cursor: default;">
          <h3 class="feira-card-titulo" style="font-size: 1.1rem; color: #fff; margin-bottom: 8px;">
            Acesso Rápido para Avaliadores
          </h3>
          <p style="font-size: 0.88rem; color: rgba(255, 255, 255, 0.82); line-height: 1.5; margin-bottom: 14px;">
            Docentes e administradores do projeto podem acessar a área restrita para gerenciamento do conteúdo dinâmico.
          </p>
          <a href="admin/login.php" class="btn btn-outline" style="font-size: 0.85rem; padding: 8px 18px;">
            Acessar Área Administrativa &rarr;
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
