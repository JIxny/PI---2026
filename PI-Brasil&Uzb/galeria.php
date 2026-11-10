<?php
/**
 * PÁGINA DA GALERIA FOTOGRÁFICA — galeria.php
 */
$pagina = 'galeria';
$titulo = 'Galeria Cultural | Uzbequistão & Brasil';
$descricaoSeo = 'Fotografias de monumentos históricos, pratos típicos, danças tradicionais e artesanato do Uzbequistão e do Brasil com lightbox interativo.';

include __DIR__ . '/includes/header.php';
$imagens = get_todas_imagens_galeria();
?>

<!-- ===================================================================
HERO: GALERIA FOTOGRÁFICA
==================================================================== -->
<section class="hero-panoramico" style="background: linear-gradient(135deg, #082B50 0%, #063B69 100%);">
  <div class="container hero-grid">
    <div class="hero-conteudo">
      <span class="section-badge gold">Acervo Visual</span>
      <h1 class="hero-super-titulo">
        GALERIA
        <span class="destaque-verde">CULTURAL</span>
      </h1>
      <hr class="hero-divisor-linha">
      <p class="hero-subtitulo">Imagens que revelam história, alma e cores.</p>
      <p class="hero-descricao">
        Percorra nossa coleção fotográfica de arquitetura monumental, feiras temáticas, iguarias gastronômicas e riqueza artesanal. Clique em qualquer imagem para abrir o visualizador ampliado.
      </p>
    </div>
    <div class="hero-visual">
      <div class="hero-foto-panoramica">
        <img src="assets/img/heroes/hero-galeria.jpg" alt="Acervo fotográfico da Rota da Seda e do Brasil" width="800" height="400">
      </div>
    </div>
  </div>
</section>

<!-- ===================================================================
SEÇÃO DA GALERIA COM FILTROS E LIGHTBOX
==================================================================== -->
<section class="section" id="galeria-fotos">
  <div class="container">
    <div class="section-header">
      <span class="section-badge">Exploração Temática</span>
      <h2 class="section-title">
        <span class="ornamento-divisor"><span class="ornamento-bolinha"></span><span class="ornamento-linha"></span></span>
        Coleção Fotográfica
        <span class="ornamento-divisor"><span class="ornamento-linha invertida"></span><span class="ornamento-bolinha"></span></span>
      </h2>
      <p class="section-desc">
        Use os filtros abaixo para selecionar o tema desejado ou navegue livremente por toda a grade.
      </p>
    </div>
    <!-- Filtros de Categoria em Vanilla JS -->
    <div class="filtros-container" role="toolbar" aria-label="Filtro de imagens por categoria">
      <button type="button" class="filtro-btn ativo" data-filtro="todos">Todas as Imagens</button>
      <button type="button" class="filtro-btn" data-filtro="arquitetura">Arquitetura</button>
      <button type="button" class="filtro-btn" data-filtro="gastronomia">Gastronomia</button>
      <button type="button" class="filtro-btn" data-filtro="feiras">Feiras &amp; Estandes</button>
      <button type="button" class="filtro-btn" data-filtro="dancas">Danças</button>
      <button type="button" class="filtro-btn" data-filtro="artesanato">Artesanato</button>
      <button type="button" class="filtro-btn" data-filtro="brasil">Brasil</button>
      <button type="button" class="filtro-btn" data-filtro="uz">Uzbequistão</button>
    </div>
    <!-- Grade Responsiva de Imagens -->
    <div class="galeria-grid" id="grid-galeria">
      <?php foreach ($imagens as $img): 
        $catClass = strtolower($img['categoria'] . ' ' . $img['pais']);
      ?>
        <figure class="galeria-item filtrar-item"
                data-categoria="<?= e($catClass) ?>"
                data-img="<?= e($img['img']) ?>"
                data-titulo="<?= e($img['titulo']) ?>"
                data-desc="<?= e($img['desc']) ?>"
                data-lightbox="true"
                tabindex="0"
                role="button"
                aria-label="Ampliar fotografia: <?= e($img['titulo']) ?>">
          <img src="<?= e($img['img']) ?>" 
                alt="<?= e($img['titulo']) ?>" 
                loading="lazy" 
                onerror="this.src='assets/img/heroes/hero-inicio.jpg';">
          <figcaption class="galeria-overlay-hover">
            <span class="modal-categoria-tag" style="color: var(--color-ornamental-gold); font-size: 0.7rem;">
              <?= strtoupper(e($img['categoria'])) ?>
            </span>
            <h4><?= e($img['titulo']) ?></h4>
            <p><?= e($img['desc']) ?></p>
          </figcaption>
        </figure>
      <?php endforeach; ?>
    </div>
    <!-- Mensagem de Vazio -->
    <div class="filtros-vazio">
      <div style="font-size: 3rem; margin-bottom: 1rem;">🖼️</div>
      <h3 style="font-size: 1.25rem; color: var(--color-primary-navy); margin-bottom: 0.5rem;">Nenhuma foto nesta categoria no momento</h3>
      <p style="color: var(--color-text-muted); margin-bottom: 1.5rem;">Selecione outra categoria ou veja todas as fotografias.</p>
      <button type="button" class="btn btn-primary btn-limpar-filtro">Ver Todas as Fotos</button>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
