<?php
/**
 * PÁGINA INICIAL — UZBEQUISTÃO & BRASIL: CONEXÕES QUE TRANSFORMAM
 */
$pagina = 'inicio';
$titulo = 'Uzbequistão & Brasil — Conexões que Transformam';
$descricaoSeo = 'Uma jornada por histórias milenares, tradições vivas, sabores marcantes e expressões culturais que aproximam o Uzbequistão e o Brasil.';

include __DIR__ . '/includes/header.php';
$pratos = get_todos_pratos();
?>

<!-- ===================================================================
HERO PANORÂMICO PRINCIPAL
==================================================================== -->
<section class="hero-panoramico" aria-label="Apresentação do projeto">
  <div class="container hero-grid">
    <div class="hero-conteudo">
      <span class="section-badge gold">Projeto Integrador Cultural</span>
      <h1 class="hero-super-titulo">
        UZBEQUISTÃO &amp;
        <span class="destaque-verde">BRASIL</span>
      </h1>
      <hr class="hero-divisor-linha"> 
      <p class="hero-subtitulo">Duas culturas, infinitas possibilidades.</p>
      <p class="hero-descricao">
        Conheça nossas feiras, descubra semelhanças fascinantes, celebre a riqueza das diferenças e construa conexões que transformam o aprendizado e o futuro.
      </p>
      <div class="hero-botoes">
        <a href="feiras.php" class="btn btn-primary">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
          Explorar as Feiras
        </a>
        <a href="sobre-paises.php" class="btn btn-outline">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
          Conhecer os Países
        </a>
      </div>
    </div>
  
  </div>
</section>

<!-- ===================================================================
SEÇÃO 1: CARDS DE FEIRAS PRINCIPAIS (Início)
==================================================================== -->
<section class="section" id="feiras-destaque">
  <div class="container">
    <div class="feiras-principais-grid">
      <!-- Card 1: Semana Cultural -->
      <a href="feiras.php#semana-cultural" class="feira-destaque-card semana">
        <div class="feira-card-cabecalho">
          <div class="feira-card-icone" aria-hidden="true">👥</div>
          <div>
            <h2 class="feira-card-titulo">Semana Cultural</h2>
            <small style="color: var(--color-accent-emerald); font-weight:700;">Imersão Uzbeque</small>
          </div>
        </div>
        <p class="feira-card-tag">
          Apresentações culturais, tradições milenares, danças, culinária autêntica e muito mais!
        </p>
        <div class="feira-card-rodape">
          <span>Ver programação e detalhes</span>
          <span class="seta">&rarr;</span>
        </div>
      </a>
      <!-- Card 2: Feira do Empreendedorismo -->
      <a href="feiras.php#feira-empreendedorismo" class="feira-destaque-card empreendedorismo">
        <div class="feira-card-cabecalho">
          <div class="feira-card-icone" aria-hidden="true">💲</div>
          <div>
            <h2 class="feira-card-titulo">Feira do Empreendedorismo</h2>
            <small style="color: var(--color-ornamental-gold); font-weight:700;">Gastro Bar Brazuca</small>
          </div>
        </div>
        <p class="feira-card-tag">
          Ideias que viram ação! Projetos inovadores, hospitalidade e soluções para o futuro.
        </p>
        <div class="feira-card-rodape">
          <span>Conhecer o cardápio e gestão</span>
          <span class="seta">&rarr;</span>
        </div>
      </a>
      <!-- Card 3: Feira do Conhecimento -->
      <a href="feiras.php#feira-conhecimento" class="feira-destaque-card conhecimento">
        <div class="feira-card-cabecalho">
          <div class="feira-card-icone" aria-hidden="true">🧠</div>
          <div>
            <h2 class="feira-card-titulo">Feira do Conhecimento</h2>
            <small style="color: var(--color-primary-accent); font-weight:700;">Lendas &amp; Tradição</small>
          </div>
        </div>
        <p class="feira-card-tag">
          Ciência, história, patrimônio arquitetônico e aprendizado compartilhado que inspira.
        </p>
        <div class="feira-card-rodape">
          <span>Explorar lendas e histórias</span>
          <span class="seta">&rarr;</span>
        </div>
      </a>
    </div>
  </div>
</section>

<!-- ===================================================================
SEÇÃO 2: INTEGRAÇÃO DOS PAÍSES (Handshake)
==================================================================== -->
<section class="section paises-integracao-secao">
  <div class="container">
    <div class="section-header">
      <span class="section-badge">Diálogo Intercontinental</span>
      <h2 class="section-title">
        <span class="ornamento-divisor"><span class="ornamento-bolinha"></span><span class="ornamento-linha"></span></span>
        Laços Culturais em Transformação
        <span class="ornamento-divisor"><span class="ornamento-linha invertida"></span><span class="ornamento-bolinha"></span></span>
      </h2>
      <p class="section-desc">
        A união do coração da Rota da Seda na Ásia Central com a calorosa riqueza artística e natural do continente sul-americano.
      </p>
    </div>
    <div class="paises-integracao-grid">
      <!-- Bloco Uzbequistão -->
      <div class="pais-bloco uzbequistao">
        <div class="pais-emblema-circulo">
          <img src="assets/img/logos/bandeira-uz-circulo.png" alt="Bandeira do Uzbequistão em círculo">
        </div>
        <div class="pais-textos">
          <h3>UZBEQUISTÃO</h3>
          <p>
            Localizado no coração da Ásia Central, o Uzbequistão é um país rico em história milenar, cultura e tradições. Antigas rotas da seda, arquitetura monumental em azulejos azuis e um povo acolhedor fazem do Uzbequistão um lugar único.
          </p>
        </div>
      </div>
      <!-- Ícone Central: Aperto de Mãos -->
      <div class="integracao-aperto" title="Conexão Brasil & Uzbequistão">
        <img src="assets/img/logos/aperto-maos.png" alt="Símbolo de aperto de mãos e cooperação cultural">
      </div>
      <!-- Bloco Brasil -->
      <div class="pais-bloco brasil">
        <div class="pais-emblema-circulo">
          <img src="assets/img/logos/selo-brasil.png" alt="Selo da República Federativa do Brasil">
        </div>
        <div class="pais-textos">
          <h3>BRASIL</h3>
          <p>
            O Brasil é reconhecido mundialmente por sua diversidade cultural vibrante, belezas naturais deslumbrantes e seu povo alegre e acolhedor. Um país de muitas cores, ritmos envolventes e histórias que inspiram o mundo.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================================================================
SEÇÃO 3: DESTAQUES CULTURAIS (Cards de Exploração)
==================================================================== -->
<section class="section section-bg-white" id="destaques-culturais">
  <div class="container">
    <div class="section-header">
      <span class="section-badge gold">Pilares do Projeto</span>
      <h2 class="section-title">
        <span class="ornamento-divisor"><span class="ornamento-bolinha"></span><span class="ornamento-linha"></span></span>
        Destaques Culturais
        <span class="ornamento-divisor"><span class="ornamento-linha invertida"></span><span class="ornamento-bolinha"></span></span>
      </h2>
      <p class="section-desc">
        Navegue pelos eixos temáticos que fundamentam a integração educacional entre Brasil e Uzbequistão.
      </p>
    </div>
    <div class="feiras-principais-grid">
      <!-- Destaque: Gastronomia -->
      <div class="feira-destaque-card">
        <div class="feira-card-cabecalho">
          <div class="feira-card-icone" style="background: rgba(217, 174, 88, 0.15); color: var(--color-ornamental-gold);">🍲</div>
          <div>
            <h3 class="feira-card-titulo">Gastronomia Típica</h3>
            <small style="color: var(--color-text-muted);">Sabores Marcantes</small>
          </div>
        </div>
        <p class="feira-card-tag" style="background: #FFF9E6; color: #8A6D1C;">
          Do pastel de feira e caipirinha ao lendário Plov e às crocantes Samsas assadas no forno tandoor.
        </p>
        <div class="feira-card-rodape">
          <a href="feiras.php#cardapio-gastrobar" style="color: var(--color-ornamental-gold); font-weight:700;">Ver receitas &rarr;</a>
        </div>
      </div>
      <!-- Destaque: Arquitetura -->
      <div class="feira-destaque-card">
        <div class="feira-card-cabecalho">
          <div class="feira-card-icone" style="background: rgba(8, 117, 201, 0.15); color: var(--color-primary-accent);">🏛️</div>
          <div>
            <h3 class="feira-card-titulo">Arquitetura Monumental</h3>
            <small style="color: var(--color-text-muted);">História &amp; Formas</small>
          </div>
        </div>
        <p class="feira-card-tag" style="background: #EBF5FF; color: #1E429F;">
          Contraste entre as suntuosas cúpulas azuis de Samarcanda e o modernismo de Niemeyer e o barroco de Aleijadinho.
        </p>
        <div class="feira-card-rodape">
          <a href="lendas.php#arquitetura-comparada" style="color: var(--color-primary-accent); font-weight:700;">Explorar monumentos &rarr;</a>
        </div>
      </div>
      <!-- Destaque: Lendas & Mitos -->
      <div class="feira-destaque-card">
        <div class="feira-card-cabecalho">
          <div class="feira-card-icone" style="background: rgba(0, 155, 112, 0.15); color: var(--color-accent-emerald);">✨</div>
          <div>
            <h3 class="feira-card-titulo">Lendas e Mitos</h3>
            <small style="color: var(--color-text-muted);">Tradição Oral</small>
          </div>
        </div>
        <p class="feira-card-tag" style="background: #E8F5E9; color: #1B5E20;">
          A Mula sem Cabeça e o Saci encontram a profecia do túmulo de Tamerlão e as proezas do herói Alpamysh.
        </p>
        <div class="feira-card-rodape">
          <a href="lendas.php" style="color: var(--color-accent-emerald); font-weight:700;">Ler narrativas &rarr;</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================================================================
SEÇÃO 4: GASTRONOMIA EM DESTAQUE (Com Acionador de Modal)
==================================================================== -->
<section class="section" id="gastronomia-destaque">
  <div class="container">
    <div class="section-header">
      <span class="section-badge">Sabores em Diálogo</span>
      <h2 class="section-title">
        <span class="ornamento-divisor"><span class="ornamento-bolinha"></span><span class="ornamento-linha"></span></span>
        Nosso Cardápio Selecionado
        <span class="ornamento-divisor"><span class="ornamento-linha invertida"></span><span class="ornamento-bolinha"></span></span>
      </h2>
      <p class="section-desc">
        Clique em qualquer prato para conferir os ingredientes, a história e o modo de preparo cultural.
      </p>
    </div>
    <div class="cardapio-grid">
      <?php 
      $selecionados = ['cartola', 'pastel', 'tapioca', 'caipirinha', 'samsa', 'plov'];
      foreach ($selecionados as $slug):
        if (!isset($pratos[$slug])) continue;
        $item = $pratos[$slug];
        $origemTexto = ($item['pais'] === 'br') ? 'Brasil 🇧🇷' : 'Uzbequistão 🇺🇿';
      ?>
        <div class="cardapio-card abrir-modal"
              tabindex="0"
              role="button"
              data-titulo="<?= e($item['titulo']) ?>"
              data-subtitulo="<?= e($item['subtitulo']) ?>"
              data-categoria="<?= e($item['categoria']) ?>"
              data-origem="<?= e($origemTexto) ?>"
              data-img="<?= e($item['img']) ?>"
              data-intro="<?= e($item['intro']) ?>"
              data-itens="<?= e(json_encode($item['itens'] ?? [])) ?>"
              data-extra="<?= e($item['extra'] ?? '') ?>"
              aria-label="Ver detalhes de <?= e($item['titulo']) ?>">
          <div class="cardapio-card-img">
            <img src="<?= e($item['img']) ?>" alt="<?= e($item['titulo']) ?>" loading="lazy">
          </div>
          <h3><?= e($item['titulo']) ?></h3>
          <p><?= e($item['subtitulo']) ?></p>
          <span class="card-ver-mais">Ver detalhes &plus;</span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===================================================================
SEÇÃO 5: CHAMADA FINAL (CTA)
==================================================================== -->
<section class="section section-bg-navy" style="text-align: center; position: relative;">
  <div class="container">
    <span class="section-badge gold">Intercâmbio Cultural</span>
    <h2 class="section-title text-white" style="justify-content: center; margin-top: 8px;">
      Pronto para vivenciar essa viagem cultural?
    </h2>
    <p class="section-desc text-white" style="margin-bottom: 2rem;">
      Descubra todas as atrações preparadas para o Projeto Integrador: oficinas gastronômicas, exposições fotográficas, narrativas míticas e planos de negócios inovadores.
    </p>
    <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
      <a href="feiras.php" class="btn btn-primary">Participar das Feiras</a>
      <a href="projeto-integrador.php" class="btn btn-gold">Ver Metodologia do Projeto</a>
      <a href="galeria.php" class="btn btn-outline">Ver Galeria Completa</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
