<?php
/**
 * Componente Reutilizável de Navegação
 */
$currentPage = $pagina ?? 'inicio';

$navLinks = [
    'inicio' => [
        'label' => 'Início',
        'url' => 'index.php'
    ],
    'feiras' => [
        'label' => 'Feiras',
        'url' => 'feiras.php',
        'sublinks' => [
            ['label' => 'Todas as Feiras', 'url' => 'feiras.php'],
            ['label' => 'Semana Cultural Uzbeque', 'url' => 'feiras.php#semana-cultural'],
            ['label' => 'Feira do Empreendedorismo', 'url' => 'feiras.php#feira-empreendedorismo'],
            ['label' => 'Feira do Conhecimento', 'url' => 'feiras.php#feira-conhecimento']
        ]
    ],
    'projeto' => [
        'label' => 'Projeto Integrador',
        'url' => 'projeto-integrador.php'
    ],
    'sobre' => [
        'label' => 'Sobre os Países',
        'url' => 'sobre-paises.php'
    ],
    'lendas' => [
        'label' => 'Lendas e Mitos',
        'url' => 'lendas.php'
    ],
    'galeria' => [
        'label' => 'Galeria',
        'url' => 'galeria.php'
    ],
    'contato' => [
        'label' => 'Contato',
        'url' => 'contato.php'
    ]
];
?>
<nav class="nav-principal" id="nav-principal" aria-label="Navegação principal">
  <ul class="nav-lista">
    <?php foreach ($navLinks as $key => $item): 
        $isActive = ($currentPage === $key) || 
                    ($key === 'feiras' && in_array($currentPage, ['feiras', 'semana', 'empreendedorismo', 'conhecimento']));
    ?>
      <li class="nav-item <?= !empty($item['sublinks']) ? 'has-dropdown' : '' ?>">
        <a href="<?= e($item['url']) ?>" 
           class="nav-link <?= $isActive ? 'ativo' : '' ?>"
           <?= $isActive ? 'aria-current="page"' : '' ?>>
          <?= e($item['label']) ?>
          <?php if (!empty($item['sublinks'])): ?>
            <span class="dropdown-chevron" aria-hidden="true">▾</span>
          <?php endif; ?>
        </a>
        <?php if (!empty($item['sublinks'])): ?>
          <ul class="dropdown-menu" aria-label="Submenu de <?= e($item['label']) ?>">
            <?php foreach ($item['sublinks'] as $sub): ?>
              <li>
                <a href="<?= e($sub['url']) ?>" class="dropdown-link">
                  <?= e($sub['label']) ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>

