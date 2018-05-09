# It Management

O tutorial aqui apresentado segue a [documentação oficial do laradock](http://laradock.io/getting-started/) e aborda o básico para rodar esse projeto ou um projeto laravel qualquer.

## Configurando

### 1 - Faça o clone do projeto

```bash
git clone git@github.com:jonaselan/it-management.git
```

### 2 - Copie o `.env`

O Laradock já está inserido na aplicação como [submodulo](https://blog.github.com/2016-02-01-working-with-submodules/), por isso quando se clona o projeto, ele já vem na raiz do projeto. É necessário Há um exemplo do arquivo de configuração que deve ser tomado como exemplo. Para isso utilize o comando:

```bash
# dentro de laradockit e it-management
cp env-example .env
```

### 3 - Configurar o `.env`

Dentro de laradockit é onde vai ser definido os softwares necessários para o desenvolvimento do projeto. Eles irão ser referenciados no `docker-compose.yml`, então se for do seu interesse, pode verificar nesse arquivo também. 

Quando clona-se um projeto laravel para sua máquina, alguns arquivos/pastas essenciais para a execução perfeita do projeto não são baixados, como o arquivo `.env` (contém as variáveis de ambiente, que pode mudar de acordo com cada ambiente, por isso não é recomendavél versioná-lo) e o diretório vendor (é onde fica o source code laravel, plugins e outras dependências. Tudo que você usar de terceiros fica aqui). Logo é preciso executar alguns comandos para gerar no seu ambiente.

```bash
composer install

# você deve adaptar o .env para suas necessidades, como o banco de dados (DB_DATABASE, DB_USERNAME, etc)
cp .env.example .env

# gera key unica da sua aplicação, por questões de segurança
php artisan key:generate

# rodar migration
php artisan migrate

# outras dependências
npm install

# compilar assets
npm run watch
```

### 6 - Construir e rodar ambiente 

Nesse exemplo você verá o NGINX (web server) e o Postgres (banco de dados) 

```bash
docker-compose up -d nginx postgres
```

Mas você pode levantar quantos você quiser

### 7 - Acesse no navegador 

No endereço `http://localhost` você deverá ver o conteúdo do index. Se isso ocorre, está tudo pronto :)

## Novo por aqui?

Se você pretende criar um novo projeto, é importante prestar atenção em alguns detalhes:

1 - Sempre que você subir seu container utilize o comando `docker-compose exec workspace bash`, para executar outros comandos como compose e gulp. A sua pasta raiz (com os seus projetos), estará dentro de `/var/www/`.

2 - Quando entrar no container workspace, não execute comandos compose como root, em vez disso, entre com um usuário default

```
docker-compose exec --user=laradock workspace bash
``` 

3 - Para criar um novo projeto laravel use:

```bash
composer create-project laravel/laravel NOME-PROJETO
```


## Configurando a AWS (Amazon Web Service)

Quando você tentar criar/editar um sitema ou cliente, provavelmente receberá um erro. Isso ocorreu porque o sistema utiliza recursos da [AWS](https://aws.amazon.com), mais precisamente o [S3](https://aws.amazon.com/pt/s3/), e necessita de algumas credenciais para funcionar perfeitamente. Essas informações podem ser recuperadas na sua conta AWS, e deverão ser colocadas no `.env`. Abaixo, um exemplo de como deve ficar:

```
FILESYSTEM_DRIVER=s3
FILESYSTEM_CLOUD=s3
AWS_KEY=AKIAJ4U7BI3KQQWKOEMQ
AWS_SECRET=z0OFjR52ojPeFfiNVqVOrlVpDVgUEUmMp4CpMR
AWS_REGION=sa-east-1
AWS_BUCKET=seu-bucket-s3
AWS_API_VERSION=2006-03-01

```     
