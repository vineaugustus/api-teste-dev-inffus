
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
</head>
<body>

<h1>Rick and Morty API</h1>

<p>Este projeto consiste em uma API desenvolvida em Laravel, que fornece funcionalidades para listar, filtrar e acessar detalhes de personagens da série "Rick and Morty". Ele permite consultas detalhadas sobre os personagens, incluindo informações como nome, status, espécie, gênero, origem e localização atual.</p>

<h2>Tecnologias Utilizadas</h2>
<ul>
    <li><strong>Laravel 11.x</strong></li>
    <li><strong>PHP 8.3.13</strong></li>
    <li><strong>Composer</strong> para gerenciamento de dependências</li>
</ul>

<h2>Funcionalidades da API</h2>
<ul>
    <li><strong>Listagem de Personagens</strong>: Fornece uma lista paginada de personagens.</li>
    <li><strong>Filtragem de Personagens</strong>: Permite filtros avançados por atributos como nome, status (vivo, morto, desconhecido), espécie e gênero.</li>
    <li><strong>Detalhes do Personagem</strong>: Retorna informações completas sobre um personagem específico a partir do seu ID.</li>
</ul>

<h2>Endpoints Disponíveis</h2>

<h3>1. <code>GET /api/characters</code></h3>
<p>Retorna uma lista paginada de personagens, com suporte para filtros avançados.</p>
<p><strong>Parâmetros de Consulta:</strong></p>
<ul>
    <li><code>name</code>: Filtro pelo nome do personagem (exemplo: "Rick").</li>
    <li><code>status</code>: Filtro pelo status do personagem (<code>alive</code>, <code>dead</code>, <code>unknown</code>).</li>
    <li><code>species</code>: Filtro pela espécie do personagem (exemplo: "Human").</li>
    <li><code>gender</code>: Filtro pelo gênero (<code>male</code>, <code>female</code>, <code>unknown</code>).</li>
</ul>

<p><strong>Exemplo de Requisição:</strong></p>
<pre><code>GET /api/characters?name=Rick&status=alive&species=Human&gender=male</code></pre>

<p><strong>Exemplo de Resposta:</strong></p>
<pre><code>{
  "data": [
    {
      "id": 1,
      "name": "Rick Sanchez",
      "status": "Alive",
      "species": "Human",
      "gender": "Male",
      "origin": "Earth (C-137)",
      "location": "Earth (Replacement Dimension)",
      "image": "https://example.com/image.jpg"
    }
  ],
  "links": {
    "first": "http://localhost/api/characters?page=1",
    "last": "http://localhost/api/characters?page=10",
    "prev": null,
    "next": "http://localhost/api/characters?page=2"
  },
  "meta": {
    "current_page": 1,
    "last_page": 10,
    "per_page": 20,
    "total": 200
  }
}</code></pre>

<h3>2. <code>GET /api/characters/{id}</code></h3>
<p>Retorna as informações detalhadas de um personagem específico por ID.</p>
<p><strong>Parâmetro de URL:</strong></p>
<ul>
    <li><code>{id}</code>: ID do personagem desejado (exemplo: 1).</li>
</ul>

<p><strong>Exemplo de Requisição:</strong></p>
<pre><code>GET /api/characters/1</code></pre>

<p><strong>Exemplo de Resposta:</strong></p>
<pre><code>{
  "id": 1,
  "name": "Rick Sanchez",
  "status": "Alive",
  "species": "Human",
  "gender": "Male",
  "origin": "Earth (C-137)",
  "location": "Earth (Replacement Dimension)",
  "image": "https://example.com/image.jpg"
}</code></pre>

<h2>Configuração e Instalação</h2>

<h3>Pré-requisitos</h3>
<ul>
    <li>PHP 8.3.13 ou superior</li>
    <li>Composer para instalação de dependências</li>
    <li>MySQL (ou outro banco de dados compatível com Laravel)</li>
</ul>

<h3>Passo a Passo</h3>
<ol>
    <li><strong>Clone o Repositório:</strong></li>
</ol>
<pre><code>git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio</code></pre>

<ol start="2">
    <li><strong>Instale as Dependências do Projeto:</strong></li>
</ol>
<pre><code>composer install</code></pre>

<ol start="3">
    <li><strong>Configuração do Arquivo <code>.env</code>:</strong></li>
</ol>
<p>Crie o arquivo <code>.env</code> com base no <code>.env.example</code>:</p>
<pre><code>cp .env.example .env</code></pre>

<p>Configure as variáveis de ambiente do banco de dados:</p>
<pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sua_base_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha</code></pre>

<ol start="4">
    <li><strong>Gere a Chave da Aplicação:</strong></li>
</ol>
<pre><code>php artisan key:generate</code></pre>

<ol start="5">
    <li><strong>Execute as Migrações:</strong></li>
</ol>
<pre><code>php artisan migrate</code></pre>

<ol start="6">
    <li><strong>Importe os Personagens da API Rick and Morty:</strong></li>
</ol>
<pre><code>php artisan import:characters</code></pre>

<ol start="7">
    <li><strong>Inicie o Servidor Local:</strong></li>
</ol>
<pre><code>php artisan serve</code></pre>
<p>A API estará disponível em <span class="url">http://localhost:8000</span>.</p>

<h2>Como Usar a API</h2>
<ul>
    <li><strong>Listar Personagens:</strong> Acesse <span class="url">http://localhost:8000/api/characters</span> para obter a lista paginada de personagens.</li>
    <li><strong>Filtrar Personagens:</strong> Adicione parâmetros de consulta na URL, como <span class="url">http://localhost:8000/api/characters?name=Rick&status=alive</span>.</li>
    <li><strong>Consultar Detalhes de um Personagem:</strong> Acesse <span class="url">http://localhost:8000/api/characters/{id}</span>, substituindo <code>{id}</code> pelo ID do personagem.</li>
</ul>

<h2>Comando Artisan Personalizado</h2>
<p>Este projeto inclui um comando Artisan específico para importar os personagens da API oficial de Rick and Morty para o banco de dados local.</p>

<p><strong>Comando:</strong></p>
<pre><code>php artisan import:characters</code></pre>

<p><strong>Descrição:</strong> O comando realiza uma chamada à API de Rick and Morty, obtendo dados dos personagens e armazenando-os no banco de dados local.</p>

<h2>Estrutura do Projeto</h2>
<ul>
    <li><code>app/Models/Character.php</code>: Modelo Eloquent que representa os personagens.</li>
    <li><code>app/Http/Controllers/CharacterController.php</code>: Controlador responsável pelos endpoints da API de personagens.</li>
    <li><code>app/Console/Commands/ImportCharacters.php</code>: Comando Artisan personalizado para importação de personagens.</li>
</ul>

</body>
</html>



