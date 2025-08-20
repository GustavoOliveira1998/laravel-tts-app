# 🎤 Laravel TTS App

![Laravel](https://img.shields.io/badge/Laravel-8.x-red)
![PHP](https://img.shields.io/badge/PHP-8.1-blue)
![License](https://img.shields.io/badge/License-MIT-green)

# 🎤 Laravel TTS App

Este projeto é uma aplicação simples desenvolvida em **Laravel 8+** com o objetivo de transformar um texto digitado pelo usuário em **áudio**, utilizando a API de **Text-to-Speech (TTS)** do [VoiceRSS](https://www.voicerss.org/).  

A ideia foi criada como um **desafio prático para estágio** e tem como objetivo demonstrar:  
- Organização de código seguindo boas práticas do framework Laravel.  
- Integração com uma API externa.  
- Criação de rotas, controllers e views.  
- Uso de Blade Templates para exibir formulários e resultados.  
- Funcionalidades extras como **download do áudio** gerado.  

---

## 🚀 Funcionalidades

✅ Inserir texto em um formulário simples.  
✅ Converter o texto em áudio usando a API VoiceRSS.  
✅ Reproduzir o áudio diretamente no navegador.  
✅ **Baixar o áudio** como arquivo `.mp3`.  
✅ Histórico de textos convertidos durante a sessão.  
✅ Estrutura organizada com rotas, controllers e views.  
✅ README explicativo para facilitar instalação e execução.  

---

## 🛠️ Tecnologias Utilizadas

- **PHP** 8+  
- **Laravel** 8+  
- **MySQL** (opcional, para ambiente)  
- **Blade Templates** (para views)  
- **VoiceRSS API** (para conversão de texto em áudio)  

---

## 📂 Estrutura do Projeto

```bash
laravel-tts-app/
│
├── app/
│   └── Http/
│       └── Controllers/
│           └── TtsController.php   # Controller principal
│
├── resources/
│   └── views/
│       └── tts.blade.php           # View com formulário, player e download
│
├── routes/
│   └── web.php                     # Definição das rotas
│
├── .env                            # Configurações do ambiente (API Key)
├── .env.example                    # Exemplo de arquivo .env
├── README.md                       # Este arquivo

## INSTALAÇÃO E EXECUÇÃO

1. CLONAR O REPOSITÓRIO

git clone https://github.com/GustavoOliveira1998/laravel-tts-app.git
cd laravel-tts-app

2. INSTALAR DEPENDÊNCIAS

composer install

3. CONFIGURAR O .env

Copie o ".env.example" para criar seu ".env" local
cp .env.example .env

Depois adicione sua chave da API VoiceRSS
VOICERSS_KEY=sua_chave_aqui

4. GERAR A CHAVE DA APLICAÇÃO

php artisan key:generate

5. RODAR O SERVDIDOR LOCAL

php artisan serve

Abre no navegador: http://127.0.0.1:8000

🎧 Como Usar

Digite qualquer texto no formulário.

Escolha o idioma desejado (pt-BR, en-US, es-ES, fr-FR, de-DE).

Clique ▶️ Ouvir.

O áudio será reproduzido no player.

Clique em ⬇️ Baixar Áudio para salvar o .mp3.

O histórico aparece abaixo do player, mostrando textos convertidos durante a sessão.

📌 Exemplo de Uso

Texto digitado:
--- Olá, este é um teste de conversão de texto para fala em Laravel!

Resultado:

Áudio gerado pelo VoiceRSS, tocando automaticamente no navegador.

Possibilidade de download direto do arquivo .mp3.

👨‍💻 Autor

Desenvolvido por Gustavo Oliveira