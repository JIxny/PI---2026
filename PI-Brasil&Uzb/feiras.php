<?php
/**
 * PÁGINA DE FEIRAS CULTURAIS — feiras.php
 */
$pagina = 'feiras';
$titulo = 'Feiras Culturais | Uzbequistão & Brasil';
$descricaoSeo = 'Um encontro de sabores, tradições, arte e empreendedorismo conectando o Uzbequistão e o Brasil no Projeto Integrador.';

include __DIR__ . '/includes/header.php';
$pratos = get_todos_pratos();

// Categorias e feiras para filtragem dinâmica
$atividadesFeiras = [
    [
        'id' => 'dancas-tipicas',
        'titulo' => 'Danças Típicas e Folclóricas',
        'subtitulo' => 'Ritmos e expressões corporais',
        'categoria' => 'dancas uzbeque brasil',
        'categoria_nome' => 'Danças Típicas',
        'data_local' => 'Maio de 2026 • Palco Cultural Central',
        'img' => 'assets/img/feiras/dança.jpg',
        'intro' => 'Apresentações coreográficas que traduzem a alma, o lirismo e a energia festiva dos dois povos.',
        'itens' => [
            'Danças Uzbeques: Lazgi (Corásmia) e coreografias de Bukhara e Fergana com vestimentas de seda ikat bordadas em ouro.',
            'Danças Brasileiras: Frevo pernambucano, Samba de roda baiano e Forró tradicional pé-de-serra.',
            'Oficinas abertas de passos básicos com figurinos tradicionais para o público interagir.'
        ],
        'extra' => 'A dança tradicional uzbeque Lazgi foi inscrita pela UNESCO na Lista Representativa do Patrimônio Cultural Imaterial da Humanidade.'
    ],
    [
        'id' => 'culinaria-local',
        'titulo' => 'Culinária Local Uzbeque',
        'subtitulo' => 'Sabores autênticos do coração da Ásia Central',
        'categoria' => 'culinaria uzbeque',
        'categoria_nome' => 'Culinária Local',
        'data_local' => 'Maio de 2026 • Pavilhão das Nações',
        'img' => 'assets/img/feiras/culinaria.jpg',
        'intro' => 'Degustação e demonstração ao vivo de pratos sagrados e festivos da Rota da Seda.',
        'itens' => [
            'Plov tradicional preparado no caldeirão de ferro (kazan) com cordeiro, cenouras amarelas e zira.',
            'Samsas crocantes folhadas assadas na temperatura exata das paredes do forno tandyr.',
            'Manti recheados no vapor servidos com molhos de ervas frescas e pão tradicional Non.'
        ],
        'extra' => 'No Uzbequistão, a hospitalidade começa oferecendo uma tigela de chá verde (kok-chay) e pão quebrado com as mãos.'
    ],
    [
        'id' => 'artesanato-uz',
        'titulo' => 'Artesanato & Tapeçaria',
        'subtitulo' => 'A riqueza dos detalhes e da tradição milenar',
        'categoria' => 'artesanato uzbeque',
        'categoria_nome' => 'artesanato.jpg',
        'data_local' => 'Maio de 2026 • Alameda das Artes',
        'img' => 'assets/img/feiras/artesanato.jpg',
        'intro' => 'Exposição de peças esculpidas à mão, cerâmica vidrada e tecelagem manual de seda.',
        'itens' => [
            'Cerâmica azul de Rishtan: peças exclusivas pintadas com pigmentos vegetais e minerais.',
            'Tecidos Suzani e Ikat (Abrbandi): bordados manuais com símbolos de fertilidade e proteção.',
            'Gravação artística em cobre e madeira de nogueira de Samarcanda.'
        ],
        'extra' => 'Os padrões nos tecidos Suzani nunca são idênticos, revelando a assinatura e os desejos de bem-aventurança de quem os teceu.'
    ],
    [
        'id' => 'gastrobar-brazuca',
        'titulo' => 'Paraíso Brazuca Gastro Bar',
        'subtitulo' => 'Empreendedorismo e culinária de raiz',
        'categoria' => 'empreendedorismo gastronomia brasil',
        'categoria_nome' => 'Empreendedorismo',
        'data_local' => 'Maio de 2026 • Praça de Alimentação',
        'img' => 'assets/img/heroes/hero-gastrobar.png',
        'intro' => 'Nosso modelo de negócio completo: um gastro bar que une comida de feira, ambiente acolhedor e gestão sustentável.',
        'itens' => [
            'Cardápio autoral com pastel de feira crocante, caldo de cana fresco, tapiocas artesanais e sobremesa cartola.',
            'Estratégia focada no cliente com ambiente instagramável e iluminação aconchegante.',
            'Controle de custos, fluxo de caixa e planejamento sustentável de insumos regionais.'
        ],
        'extra' => 'Demonstração prática de competências empreendedoras integrando finanças, marketing e excelência operacional.'
    ],
    [
        'id' => 'lendas-exposicao',
        'titulo' => 'Tenda das Lendas & Mitos',
        'subtitulo' => 'Contação de histórias para todas as idades',
        'categoria' => 'conhecimento lendas brasil uzbeque',
        'categoria_nome' => 'Lendas & Mitos',
        'data_local' => 'Maio de 2026 • Tenda Temática',
        'img' => 'assets/img/heroes/hero-lendas.jpg',
        'intro' => 'Espaço imersivo com efeitos sonoros, iluminação cênica e narrativas folclóricas de ambos os países.',
        'itens' => [
            'Sessões teatrais de bolso com a Mula sem Cabeça, Curupira e Saci-Pererê.',
            'Contos da Rota da Seda: as proezas de Alpamysh e as sátiras do sábio Nasreddin (Afandi).',
            'Espaço de desenho e atividades interativas para crianças e estudantes.'
        ],
        'extra' => 'A tradição oral reforça o papel do folclore na preservação da moral, da natureza e da memória coletiva.'
    ]
];
?>

<!-- ===================================================================
     HERO: FEIRAS CULTURAIS
==================================================================== -->
<section class="hero-panoramico" style="background: linear-gradient(135deg, #082B50 0%, #063B69 100%);">
  <div class="container hero-grid">
    <div class="hero-conteudo">
      <span class="section-badge gold">Exposições &amp; Eventos</span>
      <h1 class="hero-super-titulo">
        FEIRAS
        <span class="destaque-verde">CULTURAIS</span>
      </h1>
      <hr class="hero-divisor-linha">
      <p class="hero-subtitulo">Um encontro de sabores, tradições, arte e empreendedorismo.</p>
      <p class="hero-descricao">
        Explore a programação completa das feiras temáticas desenvolvidas para o Projeto Integrador. Interaja com os filtros para localizar oficinas, apresentações, culinária e estantes culturais.
      </p>
      <div class="hero-botoes">
        <a href="#feira-empreendedorismo" class="btn btn-primary">Gastro Bar Empreendedor</a>
        <a href="#semana-cultural" class="btn btn-outline">Semana Cultural Uzbeque</a>
      </div>
    </div>
  </div>
</section>

<!-- ===================================================================
     SEÇÃO DE FILTROS E CARDS DE ATIVIDADES
==================================================================== -->
<section class="section" id="catalogo-feiras">
  <div class="container">
    <div class="section-header">
      <span class="section-badge">Programação Dinâmica</span>
      <h2 class="section-title">
        <span class="ornamento-divisor"><span class="ornamento-bolinha"></span><span class="ornamento-linha"></span></span>
        Categorias e Atrações
        <span class="ornamento-divisor"><span class="ornamento-linha invertida"></span><span class="ornamento-bolinha"></span></span>
      </h2>
      <p class="section-desc">
        Filtre em tempo real sem recarregar a página e clique no card para ver informações completas de datas, locais e atividades.
      </p>
    </div>

    <!-- Botões de Filtros Vanilla JS -->
    <div class="filtros-container" role="toolbar" aria-label="Filtro de feiras por categoria">
      <button type="button" class="filtro-btn ativo" data-filtro="todos">Todas as Atividades</button>
      <button type="button" class="filtro-btn" data-filtro="dancas">Danças Típicas</button>
      <button type="button" class="filtro-btn" data-filtro="culinaria">Culinária Local</button>
      <button type="button" class="filtro-btn" data-filtro="artesanato">Artesanato</button>
      <button type="button" class="filtro-btn" data-filtro="empreendedorismo">Empreendedorismo</button>
      <button type="button" class="filtro-btn" data-filtro="uzbeque">Cultura Uzbeque</button>
      <button type="button" class="filtro-btn" data-filtro="brasil">Gastronomia Brasileira</button>
      <button type="button" class="filtro-btn" data-filtro="conhecimento">Conhecimento</button>
    </div>

    <!-- Grid de Cards de Atividades -->
    <div class="feiras-principais-grid" id="grid-atividades">
      <?php foreach ($atividadesFeiras as $atv): ?>
        <article class="feira-destaque-card filtrar-item abrir-modal"
                 tabindex="0"
                 role="button"
                 data-categoria="<?= e($atv['categoria']) ?>"
                 data-titulo="<?= e($atv['titulo']) ?>"
                 data-subtitulo="<?= e($atv['subtitulo']) ?>"
                 data-origem="<?= e($atv['data_local']) ?>"
                 data-img="<?= e($atv['img']) ?>"
                 data-intro="<?= e($atv['intro']) ?>"
                 data-itens="<?= e(json_encode($atv['itens'])) ?>"
                 data-extra="<?= e($atv['extra']) ?>"
                 aria-label="Abrir detalhes de <?= e($atv['titulo']) ?>">
          <div style="height: 160px; border-radius: var(--radius-md); overflow:hidden; margin-bottom: 8px;">
            <img src="<?= e($atv['img']) ?>" alt="<?= e($atv['titulo']) ?>" style="width:100%; height:100%; object-fit:cover;" loading="lazy">
          </div>
          <div class="feira-card-cabecalho">
            <div>
              <span class="modal-categoria-tag" style="font-size: 0.72rem;"><?= e($atv['categoria_nome']) ?></span>
              <h3 class="feira-card-titulo"><?= e($atv['titulo']) ?></h3>
            </div>
          </div>
          <p class="feira-card-tag">
            <?= e($atv['subtitulo']) ?>
          </p>
          <div class="feira-card-rodape">
            <span>Ver detalhes e horários</span>
            <span class="seta">&rarr;</span>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <!-- Mensagem de Filtro Vazio -->
    <div class="filtros-vazio">
      <div style="font-size: 3rem; margin-bottom: 1rem;">🔍</div>
      <h3 style="font-size: 1.25rem; color: var(--color-primary-navy); margin-bottom: 0.5rem;">Nenhuma atividade encontrada nesta categoria</h3>
      <p style="color: var(--color-text-muted); margin-bottom: 1.5rem;">Tente selecionar outra categoria de filtro ou redefinir a busca.</p>
      <button type="button" class="btn btn-primary btn-limpar-filtro">Mostrar Todas as Atividades</button>
    </div>
  </div>
</section>

<!-- ===================================================================
     SEÇÃO ESPECIAL: FEIRA DO EMPREENDEDORISMO — GASTRO BAR PARAÍSO BRAZUCA
     (Exatamente conforme Imagem 2 e Imagem 3 da referência)
==================================================================== -->
<section class="hero-gastrobar" id="feira-empreendedorismo">
  <div class="container hero-gastrobar-grid">
    <div>
      <span class="section-badge gold" style="color: #FFE082; background: rgba(255, 255, 255, 0.15);">Projeto de Empreendedorismo</span>
      <h2 style="font-family: var(--font-family-display); font-size: clamp(2rem, 3.5vw, 3rem); font-weight: 900; line-height: 1.1; margin: 10px 0;">
        Feira do<br>
        <span style="color: #81C784;">Empreendedorismo</span>
      </h2>
      <p style="font-size: 1.05rem; line-height: 1.6; color: rgba(255, 255, 255, 0.95); margin-bottom: 1.5rem;">
        <strong>Nosso projeto:</strong> um gastro bar com a melhor culinária brasileira, <strong>Paraíso Brazuca!</strong><br>
        Sabor, Cultura e empreendedorismo em cada detalhe.
      </p>

      <!-- Os Três Pilares da Referência -->
      <div class="gastrobar-pilares">
        <div class="pilar-item">
          <div class="pilar-icone" aria-hidden="true">💡</div>
          <small>Ideias inovadoras</small>
        </div>
        <div class="pilar-item">
          <div class="pilar-icone" aria-hidden="true">🎯</div>
          <small>Foco no cliente</small>
        </div>
        <div class="pilar-item">
          <div class="pilar-icone" aria-hidden="true">📈</div>
          <small>Gestão em planejamento</small>
        </div>
      </div>
    </div>

    <div>
      <div class="gastrobar-foto-hero">
        <img src="assets/img/heroes/hero-gastrobar.png" alt="Brasil Gastro Bar - Ambiente rústico acolhedor iluminado" width="800" height="350">
      </div>
    </div>
  </div>
</section>

<!-- Subseção: Nosso Cardápio (Exatamente 6 cards da referência 2) -->
<section class="section section-bg-white" id="cardapio-gastrobar">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">
        <span class="ornamento-divisor"><span class="ornamento-bolinha"></span><span class="ornamento-linha"></span></span>
        Nosso Cardápio
        <span class="ornamento-divisor"><span class="ornamento-linha invertida"></span><span class="ornamento-bolinha"></span></span>
      </h2>
      <p class="section-desc">
        Receitas tradicionais elaboradas com insumos selecionados, preparo artesanal e fidelidade à cultura gastronômica do Brasil.
      </p>
    </div>

    <div class="cardapio-grid">
      <?php
      $pratosGastrobar = ['cartola', 'pastel', 'tapioca', 'caldo', 'caipirinha', 'banquete'];
      foreach ($pratosGastrobar as $idPrato):
        if (!isset($pratos[$idPrato])) continue;
        $p = $pratos[$idPrato];
      ?>
        <div class="cardapio-card abrir-modal"
             tabindex="0"
             role="button"
             data-titulo="<?= e($p['titulo']) ?>"
             data-subtitulo="<?= e($p['subtitulo']) ?>"
             data-categoria="Gastro Bar • Culinária Brasileira"
             data-origem="Brasil 🇧🇷"
             data-img="<?= e($p['img']) ?>"
             data-intro="<?= e($p['intro']) ?>"
             data-itens="<?= e(json_encode($p['itens'])) ?>"
             data-extra="<?= e($p['extra']) ?>"
             aria-label="Abrir detalhes de <?= e($p['titulo']) ?>">
          <div class="cardapio-card-img">
            <img src="<?= e($p['img']) ?>" alt="<?= e($p['titulo']) ?>" loading="lazy">
          </div>
          <h3><?= e($p['titulo']) ?></h3>
          <p><?= e($p['subtitulo']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===================================================================
     SEÇÃO ESPECIAL: SEMANA CULTURAL UZBEQUE
     (Exatamente conforme Imagem 4 da referência)
==================================================================== -->
<section class="hero-cultural-uz" id="semana-cultural">
  <div class="container hero-cultural-grid">
    <div>
      <h2 style="font-family: var(--font-family-display); font-size: clamp(2.2rem, 4vw, 3.4rem); font-weight: 900; line-height: 1.05;">
        SEMANA<br>
        <span style="color: var(--color-accent-emerald);">CULTURAL</span>
      </h2>
      <hr style="width: 80px; height: 3px; background: var(--color-ornamental-gold); border: none; margin: 14px 0;">
      <p style="font-size: 1.05rem; line-height: 1.6; color: rgba(255, 255, 255, 0.95); margin-bottom: 1.2rem;">
        <strong>Celebrando a cultura do Uzbequistão.</strong> Uma imersão profunda em tradições milenares, história da Rota da Seda, culinária autêntica, danças e muito mais.
      </p>

      <div style="display: inline-flex; align-items: center; gap: 10px; background: rgba(0, 155, 112, 0.2); border: 1px solid var(--color-accent-emerald); padding: 8px 16px; border-radius: var(--radius-sm); margin-bottom: 1.5rem;">
        <span style="font-size: 1.3rem;">📅</span>
        <div>
          <small style="display: block; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--color-ornamental-gold);">Data da Feira</small>
          <strong style="font-size: 0.92rem; color: var(--color-white);">Maio de 2026</strong>
        </div>
      </div>
    </div>

    <!-- Imagem de Samarcanda com os 4 Mini Cards Flutuantes -->
    <div class="hero-registan-wrapper">
      <img src="assets/img/heroes/hero-registan.png" alt="Registan Samarcanda" class="foto-fundo">
    </div>
  </div>
</section>

<!-- Subseção: Sobre o Uzbequistão (Painel com ícones e dados gerais da referência 4) -->
<section class="section section-bg-white" id="dados-rapidos-uz">
  <div class="container">
    <div class="section-header" style="text-align: left; margin-bottom: 2rem;">
      <h2 class="section-title" style="justify-content: flex-start;">
        Sobre o Uzbequistão
        <span class="ornamento-divisor"><span class="ornamento-linha"></span><span class="ornamento-bolinha"></span></span>
      </h2>
      <p style="font-size: 1rem; color: var(--color-text-main); max-width: 650px;">
        Um país de história milenar na Ásia Central, onde o passado glorioso e o futuro moderno caminham juntos em harmonia.
      </p>
      <div style="margin-top: 14px;">
        <a href="sobre-paises.php" class="btn btn-primary" style="padding: 8px 20px; font-size: 0.875rem;">Conhecer o país &gt;</a>
      </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)) 260px; gap: 16px; align-items: center;">
      <!-- Localização -->
      <div style="border-right: 1px solid var(--color-border); padding: 10px;">
        <div style="font-size: 1.6rem; color: var(--color-accent-emerald);" aria-hidden="true">🗺️</div>
        <strong style="font-size: 0.88rem; color: var(--color-primary-navy); display:block;">Localização</strong>
        <span style="font-size: 0.8rem; color: var(--color-text-muted);">Ásia Central</span>
      </div>

      <!-- Capital -->
      <div style="border-right: 1px solid var(--color-border); padding: 10px;">
        <div style="font-size: 1.6rem; color: var(--color-accent-emerald);" aria-hidden="true">🕌</div>
        <strong style="font-size: 0.88rem; color: var(--color-primary-navy); display:block;">Capital</strong>
        <span style="font-size: 0.8rem; color: var(--color-text-muted);">Tashkent</span>
      </div>

      <!-- População -->
      <div style="border-right: 1px solid var(--color-border); padding: 10px;">
        <div style="font-size: 1.6rem; color: var(--color-accent-emerald);" aria-hidden="true">👥</div>
        <strong style="font-size: 0.88rem; color: var(--color-primary-navy); display:block;">População</strong>
        <span style="font-size: 0.8rem; color: var(--color-text-muted);">+37 milhões</span>
      </div>

      <!-- Idioma -->
      <div style="border-right: 1px solid var(--color-border); padding: 10px;">
        <div style="font-size: 1.6rem; color: var(--color-accent-emerald);" aria-hidden="true">🗣️</div>
        <strong style="font-size: 0.88rem; color: var(--color-primary-navy); display:block;">Idioma Oficial</strong>
        <span style="font-size: 0.8rem; color: var(--color-text-muted);">Uzbeque</span>
      </div>

      <!-- Moeda -->
      <div style="border-right: 1px solid var(--color-border); padding: 10px;">
        <div style="font-size: 1.6rem; color: var(--color-accent-emerald);" aria-hidden="true">🪙</div>
        <strong style="font-size: 0.88rem; color: var(--color-primary-navy); display:block;">Moeda Oficial</strong>
        <span style="font-size: 0.8rem; color: var(--color-text-muted);">Som Uzbeque</span>
      </div>

      <!-- Card com citação da referência -->
      <div style="background: var(--color-bg-light); border-radius: var(--radius-md); padding: 18px; border-left: 4px solid var(--color-accent-emerald);">
        <p style="font-family: var(--font-family-display); font-size: 1.05rem; font-weight: 800; color: var(--color-primary-navy); line-height: 1.3;">
          “ Duas culturas, infinitas possibilidades ”
        </p>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

