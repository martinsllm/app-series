# 🎬 Laravel Series Manager

Aplicação Fullstack desenvolvida com Laravel para gerenciamento de séries que o usuário deseja assistir, permitindo acompanhar temporadas, episódios e progresso de visualização.

O projeto inclui interface web com Blade e uma API REST estruturada, ambas protegidas por autenticação e controle de acesso baseado em papéis (RBAC).

O sistema foi desenvolvido com foco em boas práticas, separação de responsabilidades e organização em camadas.

---

## 🚀 Tecnologias Utilizadas

- PHP 8+
- Laravel
- SQLite (ambiente de desenvolvimento)
- Blade
- API REST
- spatie/laravel-permission
- Composer

---

## 🖥 Estrutura da Aplicação

O projeto é dividido em duas camadas principais:

### 🌐 Aplicação Web (Blade)

Interface para interação dos usuários com o sistema.

### 🔌 API REST

Camada de API para manipulação dos recursos da aplicação, retornando dados em formato JSON e protegida por autenticação e permissões.

---

## 👤 Funcionalidades

### 🔐 Usuário Autenticado pode:

- Cadastrar novas séries
- Informar número de temporadas
- Definir quantidade de episódios por temporada
- Visualizar a lista de séries cadastradas
- Editar informações de uma série
- Remover séries (conforme permissões)
- Marcar episódios como **assistidos**
- Acompanhar o progresso da série com base nos episódios visualizados
- Utilizar filtros para busca

---

## 🔐 API REST

A API permite:

- Autenticação de usuários
- CRUD completo de séries
- Gerenciamento de temporadas e episódios
- Marcação de episódios como assistidos
- Controle de acesso baseado em roles e permissions
- Proteção de rotas via middleware

---

## 🧠 Regras de Negócio Implementadas

- Cada série possui múltiplas temporadas
- Cada temporada possui múltiplos episódios
- Episódios podem ser marcados individualmente como assistidos
- Ações de edição e exclusão respeitam permissões definidas via RBAC
- Envio de e-mails executado de forma assíncrona utilizando Events e Jobs
- Separação clara entre regra de negócio e camada de controle

---

## 🏗 Arquitetura e Organização

O projeto foi estruturado utilizando:

- Padrão MVC
- Service Layer para centralização da regra de negócio
- Repository Pattern para abstração do acesso a dados
- Validações customizadas
- Events e Jobs para desacoplamento e processamento assíncrono
- Separação de responsabilidades entre camadas

O objetivo foi desenvolver uma aplicação próxima de um cenário real de mercado, indo além de um CRUD simples.

---

## ⚙️ Instalação

```bash
git clone https://github.com/seu-usuario/laravel-series-app.git
cd laravel-series-app
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve