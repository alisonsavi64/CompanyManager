# Company Manager
Desenvolvi este projeto para fins de estudo. Trata-se de uma API simples que gerencia empresas e seus associados. Usei Symfony e Docker para construir a aplicação, implementando operações CRUD básicas. Foi uma ótima oportunidade para colocar em prática metodologias como DDD e TDD enquanto estudava o framework Symfony e aprofundava meus conhecimentos.

## Como Executar

### Pré-requisitos

- Docker
- Docker Compose

### Passos

1. **Navegue até o diretório da API:**

    ```sh
    cd /api
    ```

2. **Inicie os containers Docker:**

    ```sh
    sudo docker-compose up -d
    ```

3. **Instale as dependências do PHP:**

    ```sh
    sudo docker-compose exec php composer install
    ```

4. **Execute as migrações do banco de dados:**

    ```sh
    sudo docker-compose exec php php bin/console doctrine:migrations:migrate
    ```

## Exemplos de retornos

## Company

    {
        'id' => "40164969-72a9-4af2-8ef6-bb0238c3c7c4",
        'name' => "Empresa 1",
    }

## Associado

    {
        "id": "608de890-54c1-4930-8faa-b497170f8521",
        "name": "Empresa 1",
        "company": {
            "id": "40164969-72a9-4af2-8ef6-bb0238c3c7c4",
            "name": "Empresa 1"
        }
    }

## Endpoints da API

### Rotas de Empresa

- **Criar Empresa:**

    ```http
    POST /api/company
    ```

- **Obter Todas as Empresas:**

    ```http
    GET /api/company
    ```

- **Obter Empresa por ID:**

    ```http
    GET /api/company/{id}
    ```

- **Atualizar Empresa:**

    ```http
    PUT /api/company/{id}
    ```

- **Deletar Empresa:**

    ```http
    DELETE /api/company/{id}
    ```

### Rotas de Associado

- **Criar Associado:**

    ```http
    POST /api/associate
    ```

- **Obter Todos os Associados:**

    ```http
    GET /api/associate
    ```

- **Obter Associado por ID:**

    ```http
    GET /api/associate/{id}
    ```

- **Atualizar Associado:**

    ```http
    PUT /api/associate/{id}
    ```

- **Deletar Associado:**

    ```http
    DELETE /api/associate/{id}
    ```
