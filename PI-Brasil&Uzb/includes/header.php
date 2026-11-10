<?php
/**
 * Cabeçalho Global Reutilizável
 */
require_once __DIR__ . '/functions.php';

$pagina = $pagina ?? 'inicio';
$titulo = $titulo ?? 'Uzbequistão & Brasil — Conexões que Transformam';
$descricaoSeo = $descricaoSeo ?? 'Projeto cultural integrador unindo a rica história milenar da Rota da Seda no Uzbequistão e a vibrante diversidade cultural do Brasil.';
$imagemOg = $imagemOg ?? 'assets/img/heroes/hero-inicio.jpg';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title><?= e($titulo) ?></title>
  <meta name="description" content="<?= e($descricaoSeo) ?>">
  <meta name="author" content="Projeto Integrador — Uzbequistão & Brasil">
  <meta name="theme-color" content="#082B50">

  <!-- Open Graph / Redes Sociais -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= e($titulo) ?>">
  <meta property="og:description" content="<?= e($descricaoSeo) ?>">
  <meta property="og:image" content="<?= e($imagemOg) ?>">
  <meta property="og:locale" content="pt_BR">

  <!-- Tipografia: Inter & Montserrat com alternativas locais nativas -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Folhas de Estilos Modulares -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/animations.css">
  <link rel="stylesheet" href="assets/css/responsive.css">

  <link rel="icon" type="image/png" href="assets/img/logos/brasao-brasil.png">
</head>
<body class="pagina-<?= e($pagina) ?>">

<!-- Link de acessibilidade para saltar ao conteúdo -->
<a href="#conteudo-principal" class="pular-navegacao">Pular para o conteúdo principal</a>

<!-- Cabeçalho Institucional Fixo/Sticky -->
<header class="topo-site" id="topo-site" role="banner">
  <div class="container header-container">
    <a href="index.php" class="logo-projeto" aria-label="Página inicial do Projeto Uzbequistão e Brasil">
      <img src="assets/img/logos/brasao-brasil.png" alt="Brasão de Armas do Brasil" class="logo-brasao br" width="46" height="56">
      <div class="logo-textos">
        <span class="logo-titulo">Uzbequistão &amp; Brasil</span>
        <span class="logo-subtitulo">Conexões que transformam</span>
      </div>
      <img src="assets/img/logos/brasao-uzbequistao.png" alt="Emblema do Estado do Uzbequistão" class="logo-brasao uz" width="48" height="56">
    </a>

    <!-- Botão Hambúrguer Mobile -->
    <button class="menu-toggle" id="menu-toggle" aria-expanded="false" aria-controls="nav-principal" aria-label="Abrir menu de navegação">
      <span class="hamburguer-linha" aria-hidden="true"></span>
      <span class="hamburguer-linha" aria-hidden="true"></span>
      <span class="hamburguer-linha" aria-hidden="true"></span>
    </button>

    <!-- Componente de Navegação -->
    <?php include __DIR__ . '/navigation.php'; ?>
  </div>
</header>

<main id="conteudo-principal" role="main" tabindex="-1">
