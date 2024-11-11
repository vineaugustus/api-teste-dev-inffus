Este projeto consiste em uma API desenvolvida em Laravel, que fornece funcionalidades para listar, filtrar e acessar detalhes de personagens da série "Rick and Morty". Ele permite consultas detalhadas sobre os personagens, incluindo informações como nome, status, espécie, gênero, origem e localização atual.

Tecnologias Utilizadas
Laravel 11.x
PHP 8.3.13
Composer para gerenciamento de dependências

Funcionalidades da API
Listagem de Personagens: Fornece uma lista paginada de personagens.
Filtragem de Personagens: Permite filtros avançados por atributos como nome, status (vivo, morto, desconhecido), espécie e gênero.
Detalhes do Personagem: Retorna informações completas sobre um personagem específico a partir do seu ID.
Endpoints Disponíveis

1. GET /api/characters
Retorna uma lista paginada de personagens, com suporte para filtros avançados.

Parâmetros de Consulta (Query Parameters):

name: Filtro pelo nome do personagem (exemplo: "Rick").
status: Filtro pelo status do personagem (alive, dead, unknown).
species: Filtro pela espécie do personagem (exemplo: "Human").
gender: Filtro pelo gênero (male, female, unknown).
Exemplo de Requisição:

http
Copiar código
GET /api/characters?name=Rick&status=alive&species=Human&gender=male
Exemplo de Resposta:

json
Copiar código
{
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
    },
    ...
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
}
2. GET /api/characters/{id}
Retorna as informações detalhadas de um personagem específico por ID.

Parâmetro de URL:

{id}: ID do personagem desejado (exemplo: 1).
Exemplo de Requisição:

http
Copiar código
GET /api/characters/1
Exemplo de Resposta:

json
Copiar código
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
Configuração e Instalação
Pré-requisitos
PHP 8.3.13 ou superior
Composer para instalação de dependências
MySQL (ou outro banco de dados compatível com Laravel)
Passo a Passo
Clone o Repositório:

bash
Copiar código
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
Instale as Dependências do Projeto:

bash
Copiar código
composer install
Configuração do Arquivo .env:

Crie o arquivo .env com base no .env.example:
bash
Copiar código
cp .env.example .env
Configure as variáveis de ambiente do banco de dados:
env


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sua_base_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
Gere a Chave da Aplicação:

php artisan key:generate
Execute as Migrações:


php artisan migrate
Importe os Personagens da API Rick and Morty:


php artisan import:characters
Inicie o Servidor Local:


php artisan serve
A API estará disponível em http://localhost:8000.

Como Usar a API
Listar Personagens:

Acesse http://localhost:8000/api/characters para obter a lista paginada de personagens.
Filtrar Personagens:

Adicione parâmetros de consulta na URL, como http://localhost:8000/api/characters?name=Rick&status=alive.
Consultar Detalhes de um Personagem:

Acesse http://localhost:8000/api/characters/{id}, substituindo {id} pelo ID do personagem.
Comando Artisan Personalizado
Este projeto inclui um comando Artisan específico para importar os personagens da API oficial de Rick and Morty para o banco de dados local.


php artisan import:characters
Descrição: O comando realiza uma chamada à API de Rick and Morty, obtendo dados dos personagens e armazenando-os no banco de dados local.
Estrutura do Projeto
app/Models/Character.php: Modelo Eloquent que representa os personagens.
app/Http/Controllers/CharacterController.php: Controlador responsável pelos endpoints da API de personagens.
app/Console/Commands/ImportCharacters.php: Comando Artisan personalizado para importação de personagens.
