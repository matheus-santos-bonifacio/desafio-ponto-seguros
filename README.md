# desafio-ponto-seguros
## Edição português
Aplicação CRUD (Create-Update-Delete) com docker, bootstrap e php

### Requisitos
- Docker >= 20.10
- Docker Compose >= 2.2.3

### Iniciando a aplicação
No root do projeto insira o seguinte commando no terminal
```
docker-compose --profile dev up -d
```
Espere até carregar toda aplicação e após 2 minutos (tempo da iniciação do banco) aplique o comando
```
docker exec -it ponto_seguros_application bash
```
E após inserir o seguinte commando é só acessar `http://localhost:3000`
```
php startDatabase.php
```

## English edition

# Requirements
- Docker >= 20.10
- Docker Compose >= 2.2.3

# Starting our application
In the root project run the below command in terminal
```
docker-compose --profile dev up -d
```
Wait until load the whole application container and wait more 2 minutes (database initialize time) and apply the follow command
```
docker-compose --profile dev up -d
```
And after run the follow command you need access `http://localhost:3000`
```
php startDatabase.php
```
