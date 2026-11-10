<?php
/**
 * Funções Centrais do Projeto: Uzbequistão & Brasil
 * Segurança, Sanatização, CSRF, Repositório de Dados e Helpers de Visualização.
 */

declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/database.php';

/**
 * Escapa strings para saída segura em HTML (XSS prevention)
 */
function e(?string $value): string
{
    return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
}

/**
 * Gera e retorna um token CSRF seguro na sessão
 */
function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Valida um token CSRF fornecido
 */
function verify_csrf_token(?string $token): bool
{
    if (empty($_SESSION['csrf_token']) || empty($token)) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Retorna classe 'ativo' caso a página atual coincida
 */
function is_active(string $page, string $currentPage): string
{
    return ($page === $currentPage) ? 'ativo' : '';
}

/**
 * Retorna caminho seguro e relativo para assets
 */
function asset(string $path): string
{
    return ltrim($path, '/');
}

// =====================================================================
// REPOSITÓRIO DE DADOS COMPLETO (Fallback integrado ao banco de dados)
// =====================================================================

function get_static_gastronomia(): array
{
    return [
        'cartola' => [
            'id' => 'cartola',
            'titulo' => 'Cartola',
            'subtitulo' => 'Doce, tradicional e brasileiro',
            'pais' => 'br',
            'categoria' => 'Sobremesa',
            'img' => 'assets/img/gastronomia/cartola.jpg',
            'intro' => 'Sobremesa clássica pernambucana, tombada como Patrimônio Imaterial do estado de Pernambuco.',
            'itens' => [
                'Banana: banana-prata ou banana-da-terra frita na manteiga de garrafa até dourar.',
                'Queijo: queijo coalho ou de manteiga derretido delicadamente sobre as bananas.',
                'Cobertura: generosa camada de açúcar cristal e canela polvilhados a gosto.'
            ],
            'extra' => 'Servida quente na hora, une o contraste sublime do doce natural da fruta com o salgado tostado do queijo.'
        ],
        'pastel' => [
            'id' => 'pastel',
            'titulo' => 'Pastel de Feira',
            'subtitulo' => 'Crocante e cheio de sabor',
            'pais' => 'br',
            'categoria' => 'Lanche de Rua',
            'img' => 'assets/img/gastronomia/pastel.jpg',
            'intro' => 'O mais icônico alimento das feiras livres do Brasil, trazido e adaptado pela comunidade nipo-brasileira:',
            'itens' => [
                'Massa: artesanal fina com toque de cachaça para formar as famosas bolhas crocantes.',
                'Recheios populares: carne moída refogada com azeitonas, queijo muçarela, frango com catupiry ou palmito.',
                'Acompanhamento obrigatório: caldo de cana gelado com gotas de limão.'
            ],
            'extra' => 'Frito por imersão em óleo fervente até atingir coloração dourada irresistível.'
        ],
        'tapioca' => [
            'id' => 'tapioca',
            'titulo' => 'Tapioca',
            'subtitulo' => 'Leve, prática e deliciosa',
            'pais' => 'br',
            'categoria' => 'Herança Indígena',
            'img' => 'assets/img/gastronomia/tapioca.jpg',
            'intro' => 'Legado milenar dos povos originários tupis-guaranis, feita a partir do amido da mandioca.',
            'itens' => [
                'Goma de mandioca: hidratada e finamente peneirada na chapa bem aquecida.',
                'Sem glúten: forma um crepe natural e flexível sem adição de gordura ou farinha.',
                'Recheios: manteiga de garrafa e coco ralado (tradicional), queijo coalho ou carne seca.'
            ],
            'extra' => 'Presente em todo o território nacional, da merenda escolar aos menus da alta gastronomia.'
        ],
        'caldo' => [
            'id' => 'caldo',
            'titulo' => 'Caldo de Cana',
            'subtitulo' => 'Refrescante e natural',
            'pais' => 'br',
            'categoria' => 'Bebida Tradicional',
            'img' => 'assets/img/gastronomia/caldo-cana.jpg',
            'intro' => 'Bebida energética e refrescante extraída na hora pelo esmagamento de colmos de cana-de-açúcar.',
            'itens' => [
                'Cana fresca: colhida e higienizada, moída a frio na moenda.',
                'Toque cítrico: suco de limão tahiti, limão galego ou abacaxi batido para equilibrar a doçura.',
                'Temperatura: servido imediatamente com cubos de gelo límpido.'
            ],
            'extra' => 'Tradição presente em todas as manhãs de feira livre de norte a sul do Brasil.'
        ],
        'caipirinha' => [
            'id' => 'caipirinha',
            'titulo' => 'Caipirinha',
            'subtitulo' => 'Drink brasileiro por excelência',
            'pais' => 'br',
            'categoria' => 'Drink Nacional',
            'img' => 'assets/img/gastronomia/caipirinha.jpg',
            'intro' => 'A bebida símbolo internacional do Brasil, protegida por lei como patrimônio histórico e cultural.',
            'itens' => [
                'Limão: limão tahiti fresco macerado levemente com casca.',
                'Açúcar: açúcar refinado ou cristal que ajuda a extrair os óleos essenciais da casca.',
                'Cachaça: destilado artesanal de cana-de-açúcar de alta pureza.',
                'Gelo: pedras de gelo moídas ou em cubos agitadas vigorosamente.'
            ],
            'extra' => 'Variações contemporâneas incluem frutas tropicais como morango, kiwi, caju e maracujá.'
        ],
        'banquete' => [
            'id' => 'banquete',
            'titulo' => 'Banquete Brazuca',
            'subtitulo' => 'Cultura em cada detalhe',
            'pais' => 'br',
            'categoria' => 'Prato Principal',
            'img' => 'assets/img/gastronomia/banquete-brazuca.jpg',
            'intro' => 'Uma seleção completa com feijoada, farofa temperada, vinagrete, arroz branco e mandioca frita.',
            'itens' => [
                'Feijão preto com carnes nobres e defumadas com folhas de louro.',
                'Couve fatiada fininha refogada no alho dourado.',
                'Laranja fatiada e torresmo pururuca ultra crocante.'
            ],
            'extra' => 'A celebração definitiva da hospitalidade e do almoço de domingo brasileiro.'
        ],
        'samsa' => [
            'id' => 'samsa',
            'titulo' => 'Samsa',
            'subtitulo' => 'Massa folhada uzbeque recheada',
            'pais' => 'uz',
            'categoria' => 'Salgado Tradicional',
            'img' => 'assets/img/gastronomia/samsa.jpg',
            'intro' => 'Prato típico do Uzbequistão assado nas paredes verticais de barro do forno tandyr tradicional.',
            'itens' => [
                'Massa: folhada com camadas finíssimas de manteiga ou gordura de cauda.',
                'Recheio: carne bovina ou de cordeiro cortada na ponta da faca com cebola abundante e cominho.',
                'Finalização: gergelim preto e branco polvilhados sobre a gema dourada.'
            ],
            'extra' => 'Crocante por fora e incrivelmente suculenta por dentro. Presente em cada esquina das cidades da Rota da Seda.'
        ],
        'plov' => [
            'id' => 'plov',
            'titulo' => 'Plov (Osh)',
            'subtitulo' => 'O prato nacional do Uzbequistão',
            'pais' => 'uz',
            'categoria' => 'Prato Patrimônio da Humanidade',
            'img' => 'assets/img/gastronomia/plov.jpg',
            'intro' => 'Patrimônio Cultural Imaterial da UNESCO, o Plov é a alma culinária e o centro de todas as celebrações uzbeques.',
            'itens' => [
                'Arroz especial devzira cozido em grande caldeirão de ferro fundido (kazan).',
                'Cordeiro tenro dourado lentamente com cebolas e cenouras amarelas cortadas em tiras.',
                'Especiarias: sementes de zira (cominho selvagem), bagas de berberis, alho inteiro e grão-de-bico.'
            ],
            'extra' => 'Preparado pelos mestres "oshpaz", serve centenas de pessoas em casamentos e festivais.'
        ],
        'manti' => [
            'id' => 'manti',
            'titulo' => 'Manti',
            'subtitulo' => 'Trouxinhas de massa ao vapor',
            'pais' => 'uz',
            'categoria' => 'Massa Típica',
            'img' => 'assets/img/gastronomia/manti.jpg',
            'intro' => 'Grandes trouxinhas de massa fina cozidas no vapor em panela especial de andares múltiplos (manti-kaskan).',
            'itens' => [
                'Recheio tradicional de carne picada com cebola caramelizada e pimenta preta.',
                'Versão vegetariana popular com abóbora doce uzbeque e nozes moídas.',
                'Servido com molho cremoso de iogurte azedo (suzma) ou manteiga derretida com ervas.'
            ],
            'extra' => 'Exige grande habilidade manual para moldar as dobras ornamentadas da borda da massa.'
        ],
        'non' => [
            'id' => 'non',
            'titulo' => 'Non (Pão Tandoor)',
            'subtitulo' => 'Pão sagrado e circular uzbeque',
            'pais' => 'uz',
            'categoria' => 'Pão Sagrado',
            'img' => 'assets/img/gastronomia/non.jpg',
            'intro' => 'O pão é reverenciado como sagrado no Uzbequistão; nunca deve ser cortado com faca nem colocado de cabeça para baixo.',
            'itens' => [
                'Massa fermentada aberta em círculo com bordas altas e centro prensado.',
                'Padrões geométricos estampados no centro com o carimbo tradicional de madeira e agulhas (chekich).',
                'Assado grudado diretamente na parede incandescente de argila do tandyr.'
            ],
            'extra' => 'O pão de Samarcanda é famoso por manter sua maciez e sabor por semanas após assado.'
        ]
    ];
}

function get_static_lendas(): array
{
    return [
        'mula' => [
            'id' => 'mula',
            'titulo' => 'Mula sem Cabeça',
            'subtitulo' => 'Folclore brasileiro',
            'pais' => 'br',
            'img' => 'assets/img/lendas/mula-sem-cabeca.jpg',
            'intro' => 'Uma das narrativas orais mais famosas e temidas de todo o território rural do Brasil.',
            'itens' => [
                'Origem e Maldição: narra a sina da mulher que se apaixonou por um sacerdote e recebeu uma punição sobrenatural.',
                'Aparência: uma mula vigorosa que cospe labaredas vivas no lugar da cabeça e possui ferraduras de prata ou aço reluzente.',
                'O Galope Noturno: surge nas noites de quinta para sexta-feira correndo por sete povoados antes do cantar do galo.'
            ],
            'narrativa' => 'A lenda da Mula sem Cabeça possui raízes medievais ibéricas que se fundiram com a tradição oral dos sertões brasileiros. Representa o medo das trevas noturnas e a transgressão de normas morais do Brasil colonial. O som dos seus relinchos misturado ao tinir das ferraduras ecoa como aviso aos viajantes para buscarem abrigo e esconderem objetos brilhantes.',
            'extra' => 'Para quebrar o encantamento, a lenda diz que um corajoso precisa furar a mula com um objeto de ferro para derramar uma gota de sangue ou retirar o freio de ferro de sua boca.'
        ],
        'saci' => [
            'id' => 'saci',
            'titulo' => 'Saci-Pererê',
            'subtitulo' => 'O guardião travesso da floresta',
            'pais' => 'br',
            'img' => 'assets/img/lendas/saci.jpg',
            'intro' => 'A lenda símbolo da resistência e da inventividade cultural popular brasileira.',
            'itens' => [
                'Aparência: menino negro de uma perna só, dotado de gorro vermelho mágico e cachimbo de barro (piteira).',
                'Poderes: controla os redemoinhos de poeira e vento seco, desaparecendo num piscar de olhos.',
                'Travessuras: esconde chaves, queima panelas, trança crina de cavalos e sopra as brasas do fogão à lenha.'
            ],
            'narrativa' => 'Nascido no Sul do Brasil a partir de mitos indígenas guaranis (o Yaci Yaterê), o Saci incorporou a herança africana durante o período da escravidão, ganhando seu cachimbo, o gorro de liberdade e a postura de quem desafia a ordem estabelecida dos senhores de terra com travessuras e astúcia.',
            'extra' => 'No Brasil, o dia 31 de outubro é oficialmente celebrado por lei como o Dia do Saci, valorizando o folclore nativo.'
        ],
        'tamerlao' => [
            'id' => 'tamerlao',
            'titulo' => 'A Maldição de Tamerlão',
            'subtitulo' => 'Mausoléu Gur-e-Amir em Samarcanda',
            'pais' => 'uz',
            'img' => 'assets/img/lendas/tumulo-tamerlao.jpg',
            'intro' => 'O túmulo do imperador Timur (Tamerlão) carrega uma das profecias históricas mais intrigantes do mundo.',
            'itens' => [
                'A Inscrição de Jade: na lápide de jade verde-escuro está gravada a sentença: "Quando eu me levantar dos mortos, o mundo tremerá".',
                'O Aviso dos Anciãos: dentro do sarcófago havia outra advertência: "Quem perturbar meu descanso soltará um invasor mais terrível que eu".',
                'A Coincidência Histórica: arqueólogos soviéticos liderados por Mikhail Gerasimov abriram o túmulo em 20 de junho de 1941. Dois dias depois, a Alemanha de Hitler deflagrou a Operação Barbarossa.'
            ],
            'narrativa' => 'Timur fundou o gigantesco Império Timúrida no século XIV e transformou Samarcanda na capital arquitetônica mais suntuosa do planeta. Sua figura une respeito militar, mecenato cultural e um fascínio lendário que atrai peregrinos e historiadores do mundo inteiro.',
            'extra' => 'O corpo foi reenterrado com honras islâmicas completas em novembro de 1942; pouco tempo depois, o exército soviético obteve sua vitória decisiva na Batalha de Stalingrado.'
        ],
        'alpamysh' => [
            'id' => 'alpamysh',
            'titulo' => 'Alpamysh, o Herói Épico',
            'subtitulo' => 'A grande epopeia nacional uzbeque',
            'pais' => 'uz',
            'img' => 'assets/img/lendas/alpamysh.jpg',
            'intro' => 'O herói imortal cantado há mais de mil anos pelos contadores de histórias e poetas (bakhshis) da Ásia Central.',
            'itens' => [
                'Força e Dignidade: guerreiro abençoado que protege a união das tribos Konrat e luta pela integridade de sua gente.',
                'O Cavalo Alce: seu cavalo de batalha lendário, Baychibar, dotado de inteligência superior e velocidade do vento.',
                'O Resgate do Amor: atravessa reinos hostis para resgatar sua amada Barchin e restaurar a paz justa.'
            ],
            'narrativa' => 'A epopeia de Alpamysh é para o Uzbequistão o que a Ilíada e a Odisseia são para o Ocidente. Cantada em verso ao som do instrumento tradicional dombra, ensina virtudes de fidelidade à palavra dada, respeito aos mais velhos, coragem diante da adversidade e amor à terra natal.',
            'extra' => 'Em 1999, o Uzbequistão e a UNESCO comemoraram oficialmente os 1.000 anos do Épico de Alpamysh com festivais internacionais de poesia e música.'
        ]
    ];
}

function get_static_arquitetura(): array
{
    return [
        'brasil' => [
            [
                'nome' => 'Igreja de São Francisco',
                'cidade' => 'Ouro Preto - MG',
                'desc' => 'Obra-prima do barroco e rococó brasileiro com relevos esculpidos pelo mestre Aleijadinho e teto pintado por Mestre Ataíde.',
                'img' => 'assets/img/arquitetura/igreja-sao-francisco-ourop.jpg'
            ],
            [
                'nome' => 'Pelourinho',
                'cidade' => 'Salvador - BA',
                'desc' => 'Coração histórico colonial da primeira capital do Brasil, famoso por seus casarões coloridos, calçamento de pedras e ritmo cultural.',
                'img' => 'assets/img/arquitetura/pelourinho.jpg'
            ],
            [
                'nome' => 'Congresso Nacional',
                'cidade' => 'Brasília - DF',
                'desc' => 'Marco mundial do modernismo arquitetônico projetado por Oscar Niemeyer, tombado pela UNESCO como Patrimônio Mundial da Humanidade.',
                'img' => 'assets/img/arquitetura/congresso.jpg'
            ],
            [
                'nome' => 'Cristo Redentor',
                'cidade' => 'Rio de Janeiro - RJ',
                'desc' => 'Uma das Novas Sete Maravilhas do Mundo moderno, monumento em art déco esculpido em pedra-sabão no topo do morro do Corcovado.',
                'img' => 'assets/img/arquitetura/cristo.jpg'
            ]
        ],
        'uzbequistao' => [
            [
                'nome' => 'Registan',
                'cidade' => 'Samarcanda',
                'desc' => 'O conjunto monumental mais espetacular da Ásia Central, composto por três madraças monumentais com portais e azulejos em majólica azul.',
                'img' => 'assets/img/arquitetura/registan.jpg'
            ],
            [
                'nome' => 'Mesquita Bibi-Khanym',
                'cidade' => 'Samarcanda',
                'desc' => 'Construída por Timur após sua campanha na Índia, erguida com proporções colossais e uma impressionante cúpula turquesa.',
                'img' => 'assets/img/arquitetura/mesquita.jpg'
            ],
            [
                'nome' => 'Minarete Kalta Minor',
                'cidade' => 'Khiva',
                'desc' => 'Minarete emblemático da cidadela murada de Ichan Kala, totalmente revestido de azulejos vidrados em tons de esmeralda e turquesa.',
                'img' => 'assets/img/arquitetura/minarete.jpg'
            ],
            [
                'nome' => 'Complexo Shah-i-Zinda',
                'cidade' => 'Samarcanda',
                'desc' => 'A "Avenida dos Mausoléus", renomada pela perfeição artística dos seus mosaicos cerâmicos azuis que cobrem séculos de história.',
                'img' => 'assets/img/arquitetura/complexo.jpg'
            ]
        ]
    ];
}

function get_static_galeria(): array
{
    return [
        [
            'id' => 1,
            'titulo' => 'Praça do Registan Iluminada',
            'categoria' => 'arquitetura',
            'pais' => 'uz',
            'img' => 'assets/img/galeria/samarcanda-noite.jpg',
            'desc' => 'Monumento símbolo da Rota da Seda em Samarcanda sob a luz mágica do entardecer.'
        ],
        [
            'id' => 2,
            'titulo' => 'Cristo Redentor & Baía de Guanabara',
            'categoria' => 'arquitetura',
            'pais' => 'br',
            'img' => 'assets/img/galeria/rio-de-janeiro.jpg',
            'desc' => 'Vista panorâmica do Rio de Janeiro unindo relevo montanhoso exuberante e arquitetura.'
        ],
        [
            'id' => 3,
            'titulo' => 'Cerâmica Azul de Rishtan',
            'categoria' => 'artesanato',
            'pais' => 'uz',
            'img' => 'assets/img/artesanato/ceramica-rishtan.jpg',
            'desc' => 'Louças vitrificadas e tigelas tradicionais elaboradas com corantes minerais naturais.'
        ],
        [
            'id' => 4,
            'titulo' => 'Renda e Tecelagem Tradicional',
            'categoria' => 'artesanato',
            'pais' => 'br',
            'img' => 'assets/img/artesanato/renda-brasil.jpg',
            'desc' => 'Artesanato têxtil delicado passado de mãe para filha nas comunidades do Nordeste.'
        ],
        [
            'id' => 5,
            'titulo' => 'Danças Folclóricas Uzbeques',
            'categoria' => 'dancas',
            'pais' => 'uz',
            'img' => 'assets/img/feiras/dancas-uzbeques.jpg',
            'desc' => 'Bailarinas em trajes tradicionais de seda com movimentos sinuosos e expressivos.'
        ],
        [
            'id' => 6,
            'titulo' => 'Ritmos do Frevo e Carnaval',
            'categoria' => 'dancas',
            'pais' => 'br',
            'img' => 'assets/img/feiras/frevo-brasil.jpg',
            'desc' => 'A energia contagiante das danças populares que arrastam multidões no Brasil.'
        ],
        [
            'id' => 7,
            'titulo' => 'Preparo do Plov no Kazan',
            'categoria' => 'gastronomia',
            'pais' => 'uz',
            'img' => 'assets/img/gastronomia/plov.jpg',
            'desc' => 'Arroz aromatizado com especiarias e carneiro em cozimento lento a fogo aberto.'
        ],
        [
            'id' => 8,
            'titulo' => 'Pastéis e Salgados de Feira',
            'categoria' => 'gastronomia',
            'pais' => 'br',
            'img' => 'assets/img/gastronomia/pastel.jpg',
            'desc' => 'Crocância e fartura das barracas gastronômicas das feiras comunitárias.'
        ],
        [
            'id' => 9,
            'titulo' => 'Centro Histórico de Bukhara',
            'categoria' => 'arquitetura',
            'pais' => 'uz',
            'img' => 'assets/img/galeria/bukhara.jpg',
            'desc' => 'Cidade-oásis milenar que abrigou poetas, cientistas e caravanas da Rota da Seda.'
        ],
        [
            'id' => 10,
            'titulo' => 'Cultura Viva em Salvador',
            'categoria' => 'brasil',
            'pais' => 'br',
            'img' => 'assets/img/galeria/salvador-cultura.jpg',
            'desc' => 'Casarios coloniais, gastronomia afro-brasileira e sincretismo cultural vibrante.'
        ],
        [
            'id' => 11,
            'titulo' => 'Estande Cultural Brasil & Uzbequistão',
            'categoria' => 'feiras',
            'pais' => 'ambos',
            'img' => 'assets/img/feiras/estande-cultural.jpg',
            'desc' => 'Intercâmbio estudantil com materiais didáticos, bandeiras e artefatos de ambos os países.'
        ],
        [
            'id' => 12,
            'titulo' => 'Samsas Douradas no Forno',
            'categoria' => 'gastronomia',
            'pais' => 'uz',
            'img' => 'assets/img/gastronomia/samsa.jpg',
            'desc' => 'Massa folhada recheada assada em temperatura precisa, servida com chá quente.'
        ]
    ];
}

/**
 * Consulta unificada para Gastronomia (Banco ou Fallback)
 */
function get_todos_pratos(): array
{
    $pdo = Database::getConnection();
    if ($pdo !== null) {
        try {
            $stmt = $pdo->query("SELECT * FROM gastronomia ORDER BY destaque DESC, id ASC");
            $rows = $stmt->fetchAll();
            if (!empty($rows)) {
                $result = [];
                foreach ($rows as $row) {
                    $itens = json_decode($row['ingredientes_json'] ?? '[]', true) ?: [];
                    $result[$row['slug']] = [
                        'id' => $row['slug'],
                        'titulo' => $row['titulo'],
                        'subtitulo' => $row['subtitulo'],
                        'pais' => $row['pais'],
                        'categoria' => $row['categoria'],
                        'img' => $row['imagem'],
                        'intro' => $row['intro'],
                        'itens' => $itens,
                        'extra' => $row['extra']
                    ];
                }
                return $result;
            }
        } catch (PDOException $e) {
            error_log('Erro ao consultar gastronomia: ' . $e->getMessage());
        }
    }
    return get_static_gastronomia();
}

/**
 * Consulta unificada para Lendas (Banco ou Fallback)
 */
function get_todas_lendas(): array
{
    $pdo = Database::getConnection();
    if ($pdo !== null) {
        try {
            $stmt = $pdo->query("SELECT * FROM lendas ORDER BY destaque DESC, id ASC");
            $rows = $stmt->fetchAll();
            if (!empty($rows)) {
                $result = [];
                foreach ($rows as $row) {
                    $itens = json_decode($row['itens_json'] ?? '[]', true) ?: [];
                    $result[$row['slug']] = [
                        'id' => $row['slug'],
                        'titulo' => $row['titulo'],
                        'subtitulo' => $row['subtitulo'],
                        'pais' => $row['pais'],
                        'img' => $row['imagem'],
                        'intro' => $row['intro'],
                        'narrativa' => $row['narrativa_completa'],
                        'itens' => $itens,
                        'extra' => $row['subtitulo']
                    ];
                }
                return $result;
            }
        } catch (PDOException $e) {
            error_log('Erro ao consultar lendas: ' . $e->getMessage());
        }
    }
    return get_static_lendas();
}

/**
 * Consulta unificada para Galeria (Banco ou Fallback)
 */
function get_todas_imagens_galeria(): array
{
    $pdo = Database::getConnection();
    if ($pdo !== null) {
        try {
            $stmt = $pdo->query("SELECT * FROM galeria ORDER BY destaque DESC, id ASC");
            $rows = $stmt->fetchAll();
            if (!empty($rows)) {
                return $rows;
            }
        } catch (PDOException $e) {
            error_log('Erro ao consultar galeria: ' . $e->getMessage());
        }
    }
    return get_static_galeria();
}

