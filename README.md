# API de Empresas e Associados

## Visão Geral

Esta API permite gerenciar empresas e seus associados. A API fornece endpoints para criar, ler, atualizar e excluir tanto empresas quanto associados. As seções seguintes detalham os endpoints disponíveis e fornecem exemplos de solicitações e respostas.

## Endpoints da API

### Endpoints de Empresa

#### Obter Todas as Empresas
- **Endpoint:** `GET /api/company`
- **Resposta:**
  ```json
  [
    {
      "id": "b1ba8817-0d9b-41ff-af7e-f1b3d9e08f7c",
      "name": "company_master"
    },
    ...
  ]
