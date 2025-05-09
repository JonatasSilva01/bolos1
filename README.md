<h1 align="center">🚀 API Laravel Profissional com Docker</h1>

<p align="center">
  Projeto autoral desenvolvido por Jonatas silva dos santos, pronto para uso em produção ou como base de novos sistemas internos.
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



name: CI/CD Full-Stack

on:
  push:
    branches: [main]

jobs:
  backend_test:
    runs-on: ubuntu-latest
    
    steps:
      - name: 📥 Checkout do código
        uses: actions/checkout@v3

      - name: 🔧 Rodar testes do Back-End
        run: |
          composer install
          php artisan migrate --env=testing
          php artisan test --env=testing

  frontend_test:
    runs-on: ubuntu-latest
    
    steps:
      - name: 📥 Checkout do código
        uses: actions/checkout@v3

      - name: 📦 Instalar dependências do Front-End
        run: |
          cd frontend
          npm install

      - name: 🧪 Rodar testes do Front-End
        run: |
          cd frontend
          npm run test -- --coverage

  deploy:
    needs: [backend_test, frontend_test]  # O deploy só ocorrerá se os testes do back-end e front-end forem bem-sucedidos
    runs-on: ubuntu-latest
    
    steps:
      - name: 📥 Checkout do código
        uses: actions/checkout@v3

      - name: 🚀 Deploy do Back-End
        uses: appleboy/ssh-action@v1.0.0
        with:
          host: ${{ secrets.SSH_HOST }}
          username: ${{ secrets.SSH_USER }}
          key: ${{ secrets.SSH_KEY }}
          port: 22
          script: |
            cd /var/www/my-backend
            git pull origin main
            docker-compose down
            docker-compose up -d --build

      - name: 🚀 Deploy do Front-End
        uses: appleboy/ssh-action@v1.0.0
        with:
          host: ${{ secrets.SSH_HOST }}
          username: ${{ secrets.SSH_USER }}
          key: ${{ secrets.SSH_KEY }}
          port: 22
          script: |
            cd /var/www/my-app
            cp -R frontend/dist/* /var/www/html
            echo "✅ Deploy completo!"
