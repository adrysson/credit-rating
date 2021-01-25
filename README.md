# credit-rating
Proposta de plataforma para avaliação de crédito para fins de teste.

## Proposta
A proposta do projeto está em um arquivo PDF na pasta docs, esta é a ideia final deste teste, mas não representa seu estado atual.

## Instruções de instalação
O projeto foi desenvolvido com docker, então basta ter o docker e o docker-compose instalado para conseguir rodar o projeto.
1. Clone o projeto:
```
git clone git@github.com:adrysson/credit-rating.git
```
2. Copie o arquivo de exemplo das variáveis de ambiente:
```
cp .env.example .env
```
3. Suba os containers da aplicação:
```
docker-compose up -d
```
4. Instale as dependências:
```
docker-compose exec laravel.test composer install
```
5. Gere a chave do Laravel:
```
docker-compose exec laravel.test php artisan key:generate
```
6. Rode as migrations para criar as tabelas no banco:
```
docker-compose exec laravel.test php artisan migrate --seed
```
7. A aplicação estará rodando no ambiente local na porta especificada na variável de ambiente "APP_PORT".

## Instruções de utilização
1. Cadastre-se em /register
2. Gere um password grant client pelo seguinte comando:
```
docker-compose exec laravel.test php artisan passport:client --password
```
3. Copie o client_id e o client_secret e envie no endpoint /oauth/token para obter o token de acesso à API, enviando os seguintes dados:

```
grant_type=password
client_id=[SEU_CLIENT_ID]
client_secret=[SEU_CLIENT_SECRET]
username=[SEU_USERNAME]
password=[SEU_PASSWORD]
scope=
```
4. Com o token em mãos, você já pode utilizar os endpoints disponíveis na API. Para facilitar, há um registro de Seed com um CPF inserido manualmente, que é o 161.761.547-15, você já pode utilizá-lo para consultar.

## Endpoints disponíveis
Registros sensíveis dos CPFs:
```
Cadastrar CPF - POST /api/v1/persons
Buscar CPF - GET /api/v1/persons/{cpf}
Editar CPF - PUT /api/v1/persons/{cpf}
Apagar CPF - DELETE /api/v1/persons/{cpf}

Form:
name, cpf, address[postcode], address[address], address[city], address[state]
```

Registros das dívidas dos CPFs:
```
Listar dívidas - GET /api/v1/persons/{cpf}/debts
Cadastrar dívida - POST /api/v1/persons/{cpf}/debts
Buscar dívida - GET /api/v1/persons/{cpf}/debts/{debt_id}
Editar dívida - PUT /api/v1/persons/{cpf}/debts/{debt_id}
Apagar dívida - DELETE /api/v1/persons/{cpf}/debts/{debt_id}

Form:
value
```

Registros de cálculo de score de cŕedito dos CPFs:
```
Cadastrar CPF - POST /api/v1/citizens
Buscar CPF - GET /api/v1/citizens/{cpf}
Editar CPF - PUT /api/v1/citizens/{cpf}
Apagar CPF - DELETE /api/v1/citizens/{cpf}

Form:
cpf, age, source_of_income, address[postcode], address[address], address[city], address[state]
```

Registros dos bens dos CPFs:
```
Listar bens - GET /api/v1/citizens/{cpf}/assets
Cadastrar bem - POST /api/v1/citizens/{cpf}/assets
Buscar bem - GET /api/v1/citizens/{cpf}/assets/{asset_id}
Editar bem - PUT /api/v1/citizens/{cpf}/assets/{asset_id}
Apagar bem - DELETE /api/v1/citizens/{cpf}/assets/{asset_id}

Form:
name, value
```

Registros de eventos:
```
Exibir úlima consulta do CPF - GET /api/v1/persons/{cpf}/last-query
```
