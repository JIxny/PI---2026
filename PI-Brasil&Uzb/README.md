# UZBEQUISTÃO & BRASIL — CONEXÕES QUE TRANSFORMAM
### Portal Institucional e Cultural do Projeto Integrador

Um site cultural completo, responsivo, acessível e profissional desenvolvido exclusivamente com **HTML5 Semântico**, **CSS3 Puro**, **JavaScript Vanilla** e **PHP 8.2+**, integrando a riqueza histórica da Rota da Seda no Uzbequistão à vibrante diversidade cultural e gastronômica do Brasil.

---

## 🚀 Tecnologias Utilizadas

- **Frontend Estrutural:** HTML5 semântico com foco em SEO e diretrizes de acessibilidade WCAG 2.2 AA.
- **Estilização e Layout:** CSS3 puro, CSS Variables (`:root`), Flexbox, CSS Grid, tipografia fluida com `clamp()`, media queries e transições suaves.
- **Comportamentos Interativos:** JavaScript Puro (Vanilla JS ES6+), sem dependência de jQuery ou frameworks frontend.
  - Modais universais acessíveis com navegação por teclado (`Escape`) e bloqueio de rolagem;
  - Visualizador Lightbox de galeria com suporte a setas e gestos *touch swipe* para celulares;
  - Filtragem dinâmica em tempo real por categoria e busca instantânea;
  - Menu responsivo com botão hambúrguer acessível por leitores de tela e ARIA.
- **Backend:** PHP 8.2 ou superior com arquitetura modular de componentes (`header`, `footer`, `navigation`, `functions`).
- **Persistência de Dados:** Suporte duplo:
  1. **Modo Autônomo com Repositório Estruturado:** O site público funciona 100% imediatamente sem necessidade de configuração prévia de banco de dados;
  2. **MySQL / MariaDB via PDO:** Conexão segura com *prepared statements*, migrations automáticas via script SQL e painel administrativo para gerenciamento.

---

## 📁 Estrutura de Arquivos e Diretórios

```text
uzbequistao-brasil/
├── index.php                  # Página inicial com hero panorâmico e resumo das atrações
├── feiras.php                 # Página de feiras, Semana Cultural e Gastro Bar Paraíso Brazuca
├── projeto-integrador.php     # Metodologia, justificativa, objetivos e linha do tempo
├── sobre-paises.php           # Apresentação comparativa factual Brasil vs Uzbequistão
├── lendas.php                 # Folclore brasileiro e uzbeque + painel de arquitetura comparada
├── galeria.php                # Galeria com filtros temáticos e visualizador lightbox
├── contato.php                # Formulário com validação no servidor e proteção CSRF
├── 404.php                    # Página personalizada de erro 404
│
├── includes/
│   ├── header.php             # Cabeçalho global com logo dos dois países e meta tags
│   ├── footer.php             # Rodapé institucional, modal universal e lightbox
│   ├── navigation.php         # Menu com detecção automática da página ativa
│   └── functions.php          # Funções de segurança, CSRF, sanitização e repositório
│
├── assets/
│   ├── css/
│   │   ├── style.css          # Design tokens, tipografia, componentes e painéis
│   │   ├── responsive.css     # Adaptações mobile-first (320px a monitores 4K)
│   │   └── animations.css     # Animações sutis e respeito a prefers-reduced-motion
│   │
│   ├── js/
│   │   ├── main.js            # Menu mobile hambúrguer, scroll do header e navegação
│   │   ├── modals.js          # Abertura/fechamento dinâmico de modais de detalhes
│   │   ├── gallery.js         # Lightbox com contador, teclas de seta e swipe
│   │   └── filters.js         # Filtragem de feiras e galeria em tempo real
│   │
│   ├── img/
│   │   ├── logos/             # Brasões de armas oficiais, bandeiras e símbolos
│   │   ├── heroes/            # Banners panorâmicos de alta resolução
│   │   ├── arquitetura/       # Monumentos do Brasil e do Uzbequistão
│   │   ├── gastronomia/       # Fotos dos pratos típicos dos dois países
│   │   ├── feiras/            # Atividades, oficinas, danças e estantes
│   │   ├── lendas/            # Personagens folclóricos e ilustrações
│   │   ├── artesanato/        # Tapeçaria ikat e cerâmica azul de Rishtan
│   │   └── galeria/           # Acervo fotográfico para a galeria
│   │
│   └── icons/                 # Padrões geométricos arabescos e silhuetas SVG
│
├── config/
│   └── database.php           # Conexão PDO segura com fallback silencioso
│
├── admin/
│   ├── index.php              # Redirecionamento inteligente
│   ├── login.php              # Autenticação segura com password_verify e CSRF
│   ├── dashboard.php          # Métricas gerais e atalhos rápidos
│   ├── feiras.php             # Gerenciamento de feiras e atrações
│   ├── imagens.php            # Upload seguro com verificação de MIME real
│   └── logout.php             # Encerramento de sessão
│
├── database/
│   └── schema.sql             # Estrutura completa de tabelas e dados iniciais
│
├── uploads/
│   └── .htaccess              # Bloqueio total de execução de scripts maliciosos
│
└── README.md                  # Documentação completa de instalação e uso
```

---

## ⚙️ Como Executar Localmente

### Opção 1: Servidor Embutido do PHP (Recomendado e mais rápido)

Abra o terminal (PowerShell, Prompt de Comando ou Bash) na pasta raiz do projeto e execute:

```powershell
php -S localhost:8000
```

> **Nota:** Caso utilize o PHP do XAMPP no Windows:
> ```powershell
> C:\xampp\php\php.exe -S localhost:8000
> ```

Abra o navegador em: [http://localhost:8000](http://localhost:8000)

### Opção 2: XAMPP / WampServer / Laragon

1. Copie ou mova a pasta do projeto para o diretório de documentos web:
   - XAMPP: `C:\xampp\htdocs\uzbequistao-brasil\`
   - Laragon: `C:\laragon\www\uzbequistao-brasil\`
2. Inicie o módulo Apache pelo painel de controle do XAMPP/Laragon.
3. Acesse no navegador: [http://localhost/uzbequistao-brasil/](http://localhost/uzbequistao-brasil/)

---

## 🗄️ Configuração do Banco de Dados (Opcional)

O site foi projetado com resiliência: **ele funciona perfeitamente sem banco de dados**, servindo todas as informações de pratos, lendas e feiras através de estruturas em PHP.

Para habilitar a persistência dinâmica via MySQL/MariaDB:

1. Abra o **phpMyAdmin** ([http://localhost/phpmyadmin](http://localhost/phpmyadmin)) ou o cliente MySQL de sua preferência.
2. Crie a base de dados ou importe diretamente o arquivo:
   ```text
   database/schema.sql
   ```
3. Caso suas credenciais sejam diferentes das do XAMPP padrão (`root` sem senha), você pode configurar as seguintes variáveis de ambiente ou editar `config/database.php`:
   - `DB_HOST`: `127.0.0.1`
   - `DB_PORT`: `3306`
   - `DB_NAME`: `uzbequistao_brasil`
   - `DB_USER`: `root`
   - `DB_PASS`: `` (vazio por padrão)

---

## 🔐 Acesso à Área Administrativa

- **URL:** [http://localhost:8000/admin/login.php](http://localhost:8000/admin/login.php)
- **E-mail Padrão:** `admin@uzbequistao.br`
- **Senha Padrão:** `Admin@2026!`

### Medidas de Segurança Implementadas:
- Hash de senhas via `password_hash()` com algoritmo seguro `BCrypt`;
- Proteção contra ataques CSRF em todos os formulários via tokens de 32 bytes gerados criptograficamente;
- Proteção contra fixação de sessão via `session_regenerate_id(true)`;
- Validação estrita de arquivos no upload: checagem de tamanho máximo, renomeação aleatória no servidor e verificação do MIME type real com `FILEINFO_MIME_TYPE`;
- Diretiva restritiva de segurança em `uploads/.htaccess` que impede a execução de scripts PHP ou CGI mesmo que enviados.

---

## 🎨 Paleta de Cores e Identidade Visual

| Elemento | Hexadecimal | Descrição |
| :--- | :--- | :--- |
| **Azul-marinho** | `#082B50` | Fundo principal de cabeçalhos e autoridade institucional |
| **Azul profundo** | `#063B69` | Gradientes e contrastes secundários |
| **Azul de destaque** | `#0875C9` | Elementos do Uzbequistão e botões de ação secundária |
| **Verde institucional** | `#008844` | Identidade brasileira e botões primários |
| **Verde-esmeralda** | `#009B70` | Destaques da arquitetura islâmica e indicador de página ativa |
| **Dourado ornamental** | `#D9AE58` | Arabescos, divisores finos e detalhes de prestígio |
| **Fundo claro** | `#F7F9FC` | Conforto visual e legibilidade dos blocos |
| **Cinza para textos** | `#344054` | Alto contraste e conformidade com WCAG AA |

---

## ♿ Acessibilidade e SEO

- Hierarquia estrita de cabeçalhos (`<h1>` a `<h5>`);
- Indicador visual e semântico de página ativa (`aria-current="page"`);
- Fechamento de modais com a tecla `Escape` e restauração de foco no disparador;
- Link de salto direto para o conteúdo (`.pular-navegacao`);
- Atributos `alt` em todas as imagens relevantes e `aria-hidden` em elementos puramente decorativos;
- Respeito à preferência do sistema por menos movimento (`@media (prefers-reduced-motion: reduce)`).

