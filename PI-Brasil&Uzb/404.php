<?php
/**
 * PÁGINA 404 — NÃO ENCONTRADO
 */
http_response_code(404);
$pagina = '404';
$titulo = 'Página Não Encontrada | Uzbequistão & Brasil';
$descricaoSeo = 'A página solicitada não foi localizada.';

include __DIR__ . '/includes/header.php';
?>

<section class="section" style="text-align: center; padding: clamp(4rem, 8vw, 7rem) 0;">
  <div class="container" style="max-width: 600px;">
    <div style="font-size: clamp(4rem, 8vw, 7rem); font-weight: 900; font-family: var(--font-family-display); color: var(--color-primary-navy); line-height: 1;">
      4<span style="color: var(--color-accent-emerald);">0</span>4
    </div>
    <div class="ornamento-divisor" style="margin: 1.5rem 0;">
      <span class="ornamento-linha"></span>
      <span class="ornamento-bolinha"></span>
      <span class="ornamento-linha invertida"></span>
    </div>
    <h1 style="font-family: var(--font-family-display); font-size: 1.6rem; color: var(--color-primary-navy); margin-bottom: 1rem;">
      Página Não Encontrada
    </h1>
    <p style="color: var(--color-text-muted); font-size: 1rem; line-height: 1.6; margin-bottom: 2rem;">
      O endereço que você tentou acessar não existe ou foi movido. Navegue pelas nossas atrações e feiras culturais através dos links abaixo:
    </p>
    <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
      <a href="index.php" class="btn btn-primary">Voltar ao Início</a>
      <a href="feiras.php" class="btn btn-outline" style="border-color: var(--color-primary-navy); color: var(--color-primary-navy);">Ver Feiras Culturais</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

