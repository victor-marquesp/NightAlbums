# NightAlbums

> Um diário pessoal de experiências musicais desenvolvido em PHP, com foco em arquitetura de software, boas práticas e evolução incremental.

## 📖 Sobre o projeto

O **NightAlbums** é uma aplicação **CLI (Command Line Interface)** desenvolvida em PHP que permite registrar e gerenciar experiências pessoais com 
álbuns musicais.

No sistema, **Experiências** são a entidade principal do domínio. Cada experiência está associada a um Álbum e representa um registro pessoal contendo avaliação, 
descrição e sentimento do usuário durante a audição.

## ✨ Funcionalidades

Atualmente o projeto possui:

* Cadastro e gerenciamento de experiências
* Visualização de álbuns
* Navegação entre telas utilizando um sistema próprio de rotas
* Repositórios em memória

## 🚀 Tecnologias

* PHP 8.5.
* Composer
* PSR-4 Autoload

## Como usar

Para conseguir utilizar, você deve ter **PHP 8+** e **Composer**.

### Copie o repositório

```bash
git clone https://github.com/victor-marquesp/NightAlbums/new/master?filename=README.md
cd NightAlbums
```

### Instale as dependências

```bash
composer install
```

### Inicie a aplicação

```bash
php main.php
```

## 🏗 Arquitetura

O projeto utiliza uma arquitetura inspirada em princípios de Clean Architecture e MVC, adaptada para uma aplicação CLI.

```text

Presentation
├── Screens
├── Views
├── Controllers

↓

Domain
├── Models
├── Services

↓

Data
└── Repositories

↓

Memory Storage
```

### Responsabilidades

### Presentation

Responsável por toda a interação com o usuário.

Contém:

* Screens
* Views
* Controllers
* Componentes de renderização

### Domain

Contém as regras de negócio da aplicação.

* Models
* Services

### Data

Responsável pela persistência.
* Repositories
* MemoryStorage

Atualmente utiliza armazenamento em memória.

## 📂 Estrutura

```
/src
├── 📁 Bootstrap
│   └── 🐘 Application.php
├── 📁 Data
│   ├── 📁 IDB
│   └── 📁 Repositories
├── 📁 Domain
│   ├── 📁 Models
│   └── 📁 Services
├── 📁 Navigation
├── 📁 Presentation
│   ├── 📁 CLI
│   ├── 📁 Controllers
│   ├── 📁 Screens
│   └── 📁 Views
└── 📁 Shared
    ├── 📁 DTO
    ├── 📁 Exceptions
    ├── 📁 Results
    └── 📁 Traits
```

## 🎯 Objetivos do projeto

Este projeto tem como objetivo praticar conceitos como:

* Arquitetura em camadas
* Separação de responsabilidades
* Injeção de Dependência
* Organização de projetos PHP sem frameworks
* Navegação em aplicações CLI

---

## 🔮 Próximos passos

Algumas melhorias planejadas para o projeto incluem:

* Substituir a persistência em memória por **SQLite**.
* Integrar uma **API de álbuns** para consulta automática de informações (como título, artista, duração e gênero).
* Adicionar busca e filtros.
* Adicionar testes automatizados.

## 💡 Motivação

O NightAlbums nasceu como um projeto de estudo para aprofundar conhecimentos em PHP além do uso de frameworks, explorando como arquitetar uma aplicação do zero, 
desde a organização das camadas até a construção de um sistema de navegação próprio para aplicações CLI.

## 📄 Licença

Este projeto foi desenvolvido para fins de estudo e aprendizado. Sinta-se à vontade para utilizá-lo como referência ou adaptá-lo aos seus próprios projetos.
