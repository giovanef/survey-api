# Survey API

API para criação e votação em enquetes.


## Inicialização

### Pré-requisitos

Para a execução deste projeto, é necessária a instalação do PHP e do Composer, além de um banco de dados MySql;


### Instalação

1. Após o download do repositório, instale as dependências usando o composer:
    ```
    composer install
    ```

2. Crie um novo banco de dados com o nome que preferir (ou procure pelas credenciais de um banco já existente).

3. Faça uma cópia do arquivo *```env.example```* renomeie-a para *```.env```* e preencha as opções *```DB_```* com as suas credenciais de banco de dados.

4. Dentro da pasta do projeto, crie as tabelas necessárias, usando o comando:
    ```
    php artisan migrate
    ```

5. Faça a inserção de dados do seed, com o comando:
    ```
    php artisan db:seed
    ```

6. E execute o servidor buit-in do php, usando o comando:
    ```
    php -S localhost:8000 -t public
    ```


### Testando

Para rodar os testes, execute o comando:
```
./vendor/bin/phpunit 
```


## Endpoints

### Get /pools
Retorna a lista de enquetes.


### Get /pools/:id

Retorna as informações da enquete com o ```:id``` informado no endpoint.


### Get /pools/:id/stats

Retorna as estatísticas da enquete com o ```:id``` informado no endpoint.


### Post /pools

Cria uma enquente.

Exemplo de corpo da requisição:
```
{
  "description": "Description of the pool",
  "options": [
    "Description of option 1",
    "Description of option 2",
    "Description of option 3"
  ]
}
```


### Post /pools/:id/vote

Registra o voto em uma opção da enquente com o ```:id``` informado no endpoint.

Exemplo de corpo da requisição:
```
{
  "id": 6
}
```
