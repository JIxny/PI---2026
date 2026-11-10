<?php
/**
 * PÁGINA DO PROJETO INTEGRADOR — projeto-integrador.php
 * Estrutura acadêmica e conceitual rigorosa
 */
$pagina = 'projeto';
$titulo = 'Projeto Integrador | Uzbequistão & Brasil';
$descricaoSeo = 'Apresentação acadêmica, objetivos, metodologia, linha do tempo e competências do Projeto Integrador Uzbequistão & Brasil.';

include __DIR__ . '/includes/header.php';
?>

<!-- ===================================================================
     HERO: PROJETO INTEGRADOR
==================================================================== -->
<section class="hero-panoramico" style="background: linear-gradient(135deg, #082B50 0%, #0875C9 100%);">
  <div class="container hero-grid">
    <div class="hero-conteudo">
      <span class="section-badge gold">Metodologia &amp; Desenvolvimento</span>
      <h1 class="hero-super-titulo">
        PROJETO
        <span class="destaque-verde">INTEGRADOR</span>
      </h1>
      <hr class="hero-divisor-linha">
      <p class="hero-subtitulo">UZBEQUISTÃO &amp; BRASIL — Conexões que Transformam</p>
      <p class="hero-descricao">
        Um projeto interdisciplinar que articula pesquisa histórica, valorização do patrimônio imaterial, empreendedorismo gastronômico e desenvolvimento tecnológico.
      </p>
      <div class="hero-botoes">
        <a href="#metodologia" class="btn btn-primary">Ver Metodologia</a>
        <a href="#linha-do-tempo" class="btn btn-outline">Linha do Tempo</a>
      </div>
    </div>

    <div class="hero-visual">
      <div class="hero-foto-panoramica">
        <img src="assets/img/heroes/hero-projeto.jpg" alt="Pesquisa e desenvolvimento interdisciplinar" width="800" height="400">
      </div>
    </div>
  </div>
</section>

<!-- ===================================================================
     SEÇÃO 1: APRESENTAÇÃO E JUSTIFICATIVA
==================================================================== -->
<section class="section" id="apresentacao">
  <div class="container">
    <div class="section-header">
      <span class="section-badge">Fundamentação</span>
      <h2 class="section-title">
        <span class="ornamento-divisor"><span class="ornamento-bolinha"></span><span class="ornamento-linha"></span></span>
        Apresentação &amp; Justificativa
        <span class="ornamento-divisor"><span class="ornamento-linha invertida"></span><span class="ornamento-bolinha"></span></span>
      </h2>
      <p class="section-desc">
        Como a aproximação de duas culturas aparentemente distantes enriquece a formação técnica, cidadã e criativa.
      </p>
    </div>

    <div class="feiras-principais-grid" style="grid-template-columns: 1fr 1fr;">
      <!-- Bloco: Apresentação -->
      <div class="feira-destaque-card" style="cursor: default;">
        <div class="feira-card-cabecalho">
          <div class="feira-card-icone" style="background: rgba(8, 117, 201, 0.15); color: var(--color-primary-accent);">🎯</div>
          <div>
            <h3 class="feira-card-titulo">A Proposta Central</h3>
            <small style="color: var(--color-text-muted);">Integração Multidisciplinar</small>
          </div>
        </div>
        <p style="font-size: 0.92rem; line-height: 1.65; color: var(--color-text-main);">
          O Projeto Integrador <strong>Uzbequistão &amp; Brasil: Conexões que Transformam</strong> foi concebido para desafiar os estudantes a explorarem as intersecções entre o Brasil e o Uzbequistão. A proposta visa demonstrar como o conhecimento histórico e a herança folclórica podem dialogar com propostas contemporâneas de empreendedorismo, design digital e hospitalidade.
        </p>
      </div>

      <!-- Bloco: Justificativa -->
      <div class="feira-destaque-card" style="cursor: default;">
        <div class="feira-card-cabecalho">
          <div class="feira-card-icone" style="background: rgba(0, 155, 112, 0.15); color: var(--color-accent-emerald);">💡</div>
          <div>
            <h3 class="feira-card-titulo">Por que Uzbequistão &amp; Brasil?</h3>
            <small style="color: var(--color-text-muted);">Diálogo Global &amp; Local</small>
          </div>
        </div>
        <p style="font-size: 0.92rem; line-height: 1.65; color: var(--color-text-main);">
          Enquanto o Uzbequistão preserva as tradições milenares da Rota da Seda, o acolhimento ao viajante e a exuberância de monumentos em azulejos azuis, o Brasil destaca-se por sua diversidade gastronômica popular, calor humano e capacidade inventiva. O contraste e a aproximação dessas duas realidades quebram visões eurocêntricas e ampliam o repertório cultural.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ===================================================================
     SEÇÃO 2: OBJETIVOS GERAIS E ESPECÍFICOS
==================================================================== -->
<section class="section section-bg-white" id="objetivos">
  <div class="container">
    <div class="section-header">
      <span class="section-badge gold">Metas do Projeto</span>
      <h2 class="section-title">
        <span class="ornamento-divisor"><span class="ornamento-bolinha"></span><span class="ornamento-linha"></span></span>
        Objetivos de Aprendizagem
        <span class="ornamento-divisor"><span class="ornamento-linha invertida"></span><span class="ornamento-bolinha"></span></span>
      </h2>
    </div>

    <div class="feiras-principais-grid">
      <!-- Objetivo 1 -->
      <div class="feira-destaque-card">
        <h3 class="feira-card-titulo" style="font-size: 1.1rem; color: var(--color-accent-emerald); margin-bottom: 8px;">1. Pesquisa &amp; Curadoria</h3>
        <p style="font-size: 0.88rem; color: var(--color-text-main); line-height: 1.55;">
          Levantar fontes bibliográficas e iconográficas confiáveis sobre monumentos, mitos fundacionais e culinária típica de ambos os países, combatendo estereótipos.
        </p>
      </div>

      <!-- Objetivo 2 -->
      <div class="feira-destaque-card">
        <h3 class="feira-card-titulo" style="font-size: 1.1rem; color: var(--color-ornamental-gold); margin-bottom: 8px;">2. Empreendedorismo Prático</h3>
        <p style="font-size: 0.88rem; color: var(--color-text-main); line-height: 1.55;">
          Planejar e estruturar o modelo de negócio do Gastro Bar <em>Paraíso Brazuca</em>, integrando fichas técnicas, atendimento ao público e gestão responsável.
        </p>
      </div>

      <!-- Objetivo 3 -->
      <div class="feira-destaque-card">
        <h3 class="feira-card-titulo" style="font-size: 1.1rem; color: var(--color-primary-accent); margin-bottom: 8px;">3. Aplicação Tecnológica Web</h3>
        <p style="font-size: 0.88rem; color: var(--color-text-main); line-height: 1.55;">
          Desenvolver um portal web responsivo, acessível e otimizado com tecnologias puras (HTML5, CSS3, Vanilla JS e PHP 8.2), sem dependência de frameworks externos.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ===================================================================
     SEÇÃO 3: LINHA DO TEMPO DA METODOLOGIA
==================================================================== -->
<section class="section" id="metodologia">
  <div class="container">
    <div class="section-header">
      <span class="section-badge">Etapas de Execução</span>
      <h2 class="section-title">
        <span class="ornamento-divisor"><span class="ornamento-bolinha"></span><span class="ornamento-linha"></span></span>
        Linha do Tempo do Projeto
        <span class="ornamento-divisor"><span class="ornamento-linha invertida"></span><span class="ornamento-bolinha"></span></span>
      </h2>
      <p class="section-desc">
        Da pesquisa conceitual à implementação do portal web e apresentação pública nas feiras integradas.
      </p>
    </div>

    <div style="display: flex; flex-direction: column; gap: 20px; max-width: 860px; margin: 0 auto;" id="linha-do-tempo">
      <!-- Etapa 1 -->
      <div class="feira-destaque-card" style="border-left: 6px solid var(--color-primary-navy);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
          <span style="font-size: 0.75rem; font-weight: 800; color: var(--color-primary-navy); background: rgba(8, 43, 80, 0.1); padding: 2px 10px; border-radius: var(--radius-pill);">FASE 01</span>
          <small style="color: var(--color-text-muted); font-weight: 600;">Diagnóstico Inicial</small>
        </div>
        <h4 style="font-family: var(--font-family-display); font-size: 1.05rem; font-weight: 800; color: var(--color-primary-navy);">Mapeamento Temático e Levantamento de Dados</h4>
        <p style="font-size: 0.88rem; color: var(--color-text-muted); line-height: 1.5; margin-top: 4px;">
          Definição dos eixos culturais Brasil-Uzbequistão, coleta de imagens de referência, estudo de cores institucionais e alinhamento pedagógico.
        </p>
      </div>

      <!-- Etapa 2 -->
      <div class="feira-destaque-card" style="border-left: 6px solid var(--color-accent-emerald);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
          <span style="font-size: 0.75rem; font-weight: 800; color: var(--color-accent-emerald); background: rgba(0, 155, 112, 0.1); padding: 2px 10px; border-radius: var(--radius-pill);">FASE 02</span>
          <small style="color: var(--color-text-muted); font-weight: 600;">Design &amp; Prototipagem</small>
        </div>
        <h4 style="font-family: var(--font-family-display); font-size: 1.05rem; font-weight: 800; color: var(--color-primary-navy);">Identidade Visual, Cardápio e Arquitetura de Informação</h4>
        <p style="font-size: 0.88rem; color: var(--color-text-muted); line-height: 1.5; margin-top: 4px;">
          Estruturação do Gastro Bar Paraíso Brazuca, formulação dos itens gastronômicos, seleção de monumentos históricos e concepção dos cards interativos.
        </p>
      </div>

      <!-- Etapa 3 -->
      <div class="feira-destaque-card" style="border-left: 6px solid var(--color-ornamental-gold);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
          <span style="font-size: 0.75rem; font-weight: 800; color: var(--color-ornamental-gold); background: rgba(217, 174, 88, 0.15); padding: 2px 10px; border-radius: var(--radius-pill);">FASE 03</span>
          <small style="color: var(--color-text-muted); font-weight: 600;">Desenvolvimento Full-Stack</small>
        </div>
        <h4 style="font-family: var(--font-family-display); font-size: 1.05rem; font-weight: 800; color: var(--color-primary-navy);">Programação Web em PHP 8.2, CSS3 Modular e Vanilla JS</h4>
        <p style="font-size: 0.88rem; color: var(--color-text-muted); line-height: 1.5; margin-top: 4px;">
          Construção semântica dos templates, implementação do sistema de modais, lightbox, filtros por categoria, segurança CSRF e suporte opcional a banco MySQL.
        </p>
      </div>

      <!-- Etapa 4 -->
      <div class="feira-destaque-card" style="border-left: 6px solid var(--color-primary-accent);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
          <span style="font-size: 0.75rem; font-weight: 800; color: var(--color-primary-accent); background: rgba(8, 117, 201, 0.12); padding: 2px 10px; border-radius: var(--radius-pill);">FASE 04</span>
          <small style="color: var(--color-text-muted); font-weight: 600;">Execução &amp; Apresentação</small>
        </div>
        <h4 style="font-family: var(--font-family-display); font-size: 1.05rem; font-weight: 800; color: var(--color-primary-navy);">Realização das Feiras Culturais e Avaliação</h4>
        <p style="font-size: 0.88rem; color: var(--color-text-muted); line-height: 1.5; margin-top: 4px;">
          Montagem dos estandes físicos, degustação orientada no gastro bar, sessões de contação de lendas e interação do público com o site oficial.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ===================================================================
     SEÇÃO 4: RESULTADOS, CRÉDITOS E PARTICIPANTES
==================================================================== -->
<section class="section section-bg-white" id="creditos">
  <div class="container">
    <div class="section-header">
      <span class="section-badge">Registro Técnico</span>
      <h2 class="section-title">
        <span class="ornamento-divisor"><span class="ornamento-bolinha"></span><span class="ornamento-linha"></span></span>
        Equipe &amp; Ficha Técnica
        <span class="ornamento-divisor"><span class="ornamento-linha invertida"></span><span class="ornamento-bolinha"></span></span>
      </h2>
      <p class="section-desc">
        Informações da equipe responsável pelo planejamento, pesquisa e execução do projeto.
      </p>
    </div>

    <div style="background: var(--color-bg-light); border-radius: var(--radius-lg); padding: 2.5rem; border: 1px solid var(--color-border); max-width: 780px; margin: 0 auto;">
      <h3 style="font-family: var(--font-family-display); font-size: 1.25rem; font-weight: 800; color: var(--color-primary-navy); margin-bottom: 1rem;">
        Estrutura de Coordenação e Execução
      </h3>
      <p style="font-size: 0.95rem; line-height: 1.6; color: var(--color-text-main); margin-bottom: 1.5rem;">
        Os dados nominais de estudantes e docentes orientadores podem ser editados pelo painel administrativo ou preenchidos diretamente conforme as orientações institucionais.
      </p>

      <ul style="display: flex; flex-direction: column; gap: 10px; font-size: 0.9rem;">
        <li><strong>Tema Integrador:</strong> Relações Culturais, Gastronômicas e Patrimoniais Brasil — Uzbequistão</li>
        <li><strong>Eixos Temáticos:</strong> História, Empreendedorismo, Gastronomia, Folclore e Tecnologia Web</li>
        <li><strong>Arquitetura Técnica:</strong> HTML5 W3C, CSS3 Puro (Grid/Flexbox), Vanilla JS ES6+, PHP 8.2+ e MySQL/PDO</li>
        <li><strong>Período de Realização:</strong> Ano Letivo de 2026</li>
      </ul>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

