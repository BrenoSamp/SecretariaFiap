# Instruções de uso

## Referências

1 - Ter instalado no computador o Docker: https://docs.docker.com/engine/install/

2 - Ter instalado no computador o Docker Compose: https://docs.docker.com/compose/install/

## Execução

1 - Adicione as variáveis de configuração de conexão com o banco no arquivo ".env"

2 - Execute no terminal o comando: 
```bash
docker compose build
```
Em seguida execute:
```bash
docker compose up
```
Após a execução desses comandos a aplicação estará em execução na porta 5000

3 - Em outra aba de terminal, execute o comando para acessar o container do php:

```bash
docker exec -it -u nginx secretaria-fiap-php /bin/bash
```

Após acessar o container php executa o comando:

```bash
composer install
```

Para executar o teste basta executar o comando no container php

```bash
vendor/bin/phpunit --filter AlunoOperationsTest
```

Dentro do container php é possível rodar as migrações/seeds, além de executar os testes.

4 - Em outra aba de terminal, execute o seguinte comando para acessar o banco de dados:

```bash
docker exec -it -u nginx secretaria-fiap-php /bin/bash
```

## Observações

Os dados para realizar os testes estão nas seeds, as seeds podem ser executadas no container php por meio do comando

```bash
vendor/bin/phinx seed:run -s {NomeDoArquivo}
```  