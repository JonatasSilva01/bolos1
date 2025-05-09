# 🚀 Deploy Automático com GitHub Actions + Docker

Este guia explica como configurar um **deploy automático** para seu projeto Laravel com Docker, usando **GitHub Actions** e um servidor Linux com **Docker Compose**.

---

## Pré-requisitos

1. **Servidor VPS (Linux)** com Docker e Docker Compose instalados.
2. **Repositório GitHub** para o projeto.
3. Acesso SSH ao servidor de produção.

---

## Passos para configurar o Deploy Automático

### 1. **Criar uma chave SSH para o GitHub**

Primeiro, crie uma chave SSH no seu computador para o GitHub usar no servidor de produção.

Execute no terminal:

```bash
ssh-keygen -t rsa -b 4096 -C "deploy@seuservidor" -f ~/.ssh/id_rsa_github


mkdir -p ~/.ssh
echo "<conteúdo do id_rsa_github.pub>" >> ~/.ssh/authorized_keys

## Deploy yml

name: 🚀 Deploy Automático

on:
  push:
    branches: [ main ]

jobs:
  deploy:
    runs-on: ubuntu-latest

    steps:
    - name: 📥 Checkout do código
      uses: actions/checkout@v3

    - name: 📡 Deploy via SSH
      uses: appleboy/ssh-action@v1.0.0
      with:
        host: ${{ secrets.SSH_HOST }}
        username: ${{ secrets.SSH_USER }}
        key: ${{ secrets.SSH_KEY }}
        port: 22
        script: |
          cd ${{ secrets.DEPLOY_PATH }}

          echo "Atualizando código..."
          git pull origin main

          echo "Subindo containers..."
          docker-compose down
          docker-compose up -d --build

          echo "Rodando migrations..."
          docker exec -it laravel_app php artisan migrate --force

          echo "✅ Deploy finalizado!"



# Clone o repositório
git clone git@github.com:seuusuario/seuprojeto.git /var/www/laravel-docker

# Entre na pasta
cd /var/www/laravel-docker

# Copie o arquivo .env.docker para .env
cp .env.docker .env

# Execute o Docker pela primeira vez
./start.sh


🔒 Segurança

    Chave privada: Nunca coloque sua chave privada no repositório ou no GitHub. Use GitHub Secrets para armazená-la de forma segura.

    Usuário de deploy: Evite usar o usuário root. Crie um usuário específico para o deploy (ex: deploy).

    Restrição por IP: Se possível, restrinja o acesso SSH ao servidor apenas aos IPs usados no GitHub Actions ou configure um firewall.


Conclusão

Agora, sempre que você fizer um push para o branch main, o GitHub Actions automaticamente fará o deploy do seu projeto para o servidor de produção.

Com esse fluxo, você tem um ambiente de produção robusto e automatizado, sem a necessidade de intervenção manual.

---

Agora você tem um passo a passo bem documentado para configurar o deploy automático via GitHub Actions e Docker. Esse arquivo `README.md` pode ser útil para você e também para outras pessoas que forem utilizar seu projeto no futuro!

Se precisar de mais alguma coisa, estou à disposição!
