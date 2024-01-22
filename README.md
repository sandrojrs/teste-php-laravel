![Logo AI Solutions](http://aisolutions.tec.br/wp-content/uploads/sites/2/2019/04/logo.png)

# AI Solutions

## Teste para novos candidatos (PHP/Laravel)

### Introdução

Este teste utiliza PHP 8.1, Laravel 10 e um banco de dados SQLite simples.

1. Faça o clone desse repositório;
1. Execute o `composer install`;
1. Crie e ajuste o `.env` conforme necessário
1. Execute as migrations e os seeders;

### Primeira Tarefa:

Crítica das Migrations e Seeders: Aponte problemas, se houver, e solucione; Implemente melhorias;

### Segunda Tarefa:

Crie a estrutura completa de uma tela que permita adicionar a importação do arquivo `storage/data/2023-03-28.json`, para a tabela `documents`. onde cada registro representado neste arquivo seja adicionado a uma fila para importação.

Feito isso crie uma tela com um botão simples que dispara o processamento desta fila.

Utilize os padrões que preferir para as tarefas.

### Terceira Tarefa:

Crie um test unitário que valide o tamanho máximo do campo conteúdo.

Crie um test unitário que valide a seguinte regra:

Se a categoria for "Remessa" o título do registro deve conter a palavra "semestre", caso contrário deve emitir um erro de registro inválido.
Se a caterogia for "Remessa Parcial", o titulo deve conter o nome de um mês(Janeiro, Fevereiro, etc), caso contrário deve emitir um erro de registro inválido.


Boa sorte!

-------------------------------------------------------------------------------------------------------

# Tutorial instalação

Este tutorial fornecerá uma introdução básica sobre como usar o Docker para criar e executar contêineres.

## Instalação do Docker

Antes de começar, certifique-se de ter o Docker instalado. Siga as instruções adequadas para o seu sistema operacional:
- [Instalação do Docker no Windows](https://docs.docker.com/desktop/install/windows/)
- [Instalação do Docker no macOS](https://docs.docker.com/desktop/install/mac/)
- [Instalação do Docker no Linux](https://docs.docker.com/desktop/install/linux/)

## melhorias no migrate e seeder

foram realizadas melhorias no migrate adicionando classes com nomes que pudessem melhorar a indentificação, outra melhoria foi a respeito do indice para melhorar as buscas bem como o unique para aprimorar a duplicidade de categorias.

## testes unitário, migrate e seeder 

O docker está automatizado para poder rodar o migrate, seeder e os testes você pode acompanhar nos logs

## teste do arquivo json

para fazer teste no arquivo de importação json altere os dados do titulo e aumente a quantidade de palavras no conteúdo.

## arquivo env

Defina as seguintes variaveis no arquivo env caso não tenha

DB_CONNECTION=sqlite
QUEUE_CONNECTION=sqlite

## buildando o container

Após a instalação, abra um terminal no projeto e execute o seguinte comando para inicialização:

```bash
docker-compose up -d --build