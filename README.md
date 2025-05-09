<h1 align="center">🚀 API Laravel Profissional com Docker</h1>

<p align="center">
  Projeto autoral desenvolvido por [Seu Nome], pronto para uso em produção ou como base de novos sistemas internos.
</p>

---

## 🎯 Visão Geral

API desenvolvida com Laravel 10 e estrutura completa em Docker, seguindo práticas modernas de desenvolvimento.  
Ideal para sistemas internos, MVPs, APIs RESTful e projetos que exigem escalabilidade e organização.

---

## 🧰 Tecnologias

- PHP 8.2
- Laravel 10+
- MySQL 8
- Nginx (via Docker)
- Docker & Docker Compose
- Artisan CLI
- Testes automatizados (PHPUnit)

---

## 🐳 Rodando com Docker

1. Clone o projeto:
```bash
2. git clone https://github.com/seuusuario/api-laravel-pro.git
cd api-laravel-pro

3. Copie o .env.docker:
cp .env.docker .env

4. Torne os scripts executáveis:
chmod +x start.sh stop.sh

5. Suba a aplicação:
./start.sh

6. Acesse em:
http://localhost:8000
