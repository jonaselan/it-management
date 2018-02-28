## It Management

O tutorial aqui apresentado segue a [documentação oficial do laradock](http://laradock.io/getting-started/) e aborda o básico para rodar esse projeto ou um projeto laravel qualquer.

### 1 - Faça o clone do laradock

```bash
git clone https://github.com/laradock/laradock
```

### 2 - Copie o `.env`

Há um exemplo do arquivo de configuração que deve ser tomado como exemplo. Para isso utilize o comando:

```bash
cp env-example .env
```

### 3 - Configurar o `.env`

Aqui é onde vai ser definido os softwares necessários para o desenvolvimento do projeto. Eles irão ser referenciados no `docker-compose.yml`, então se for do seu interesse, pode verificar nesse arquivo também. Abaixo é exposto o modelo de como o seu `.env` deve estar:

``` 
### Application Path 
# Se código estará disponivel em `/var/www`.

APPLICATION=../

### PHP Version
PHP_VERSION=71
[...]

### WORKSPACE 
WORKSPACE_INSTALL_XDEBUG=true
[...]

### PHP_FPM 
PHP_FPM_INSTALL_XDEBUG=true
[...]

```

### 4 - Configurar ngix
Dentro do diretório que você baixou, vá até `ngix/sites`. Lá existem alguns exemplos de como podem ser feito o redirecionamento para diferentes projetos de acordo com o domínio. Crie ou edite algum, com a extensão `.conf` (e não `.conf.example`).

Nesse novo arquivo, você vai precisar alterar somente duas linhas: `server_name` e `root`. No primeiro você deve colocar o host de sua aplicação (no que você vai conseguir acessar atráves do navegador) e no segundo o mapeamento. Por exemplo, se o sistema for *PROJETO*, o seu arquivo `PROJETO.conf` ficara assim:

```
[...]
    server_name PROJETO.test;
    root /var/www/PROJETO/public;
[...]
```

Lembrando que o diretório do seu projeto deve estar no mesmo que o laradock, para que o mapeamento seja feito com sucesso, dessa forma:

```
  + laradock
    - PROJETO
      - public
          - index.html
```

### 5 - Adicione o(s) host(s)

Vá até o `/etc/hosts` na sua máquina local e adicione o(s) host(s) que você colocou em `PROJETO.conf`

```
127.0.0.1  PROJETO.test
...
```

### 6 - Construir e rodar ambiente 

Nesse exemplo você verá o NGINX (web server) e o Postgres (banco de dados) 

```bash
docker-compose up -d nginx postgres
```

Mas você pode levantar quantos você quiser

### 7 - Acesse no navegador 

No endereço `http://PROJETO.test` você deverá ver o conteúdo do index. Se isso ocorre, está tudo pronto :)

## Novo por aqui?

Se você pretende criar um novo projeto, é importante prestar atenção em alguns detalhes:

1 - Sempre que você subir seu container utilize o comando `docker-compose exec workspace bash`, para executar outros comandos como compose e gulp. A sua pasta raiz (com os seus projetos), estará dentro de `/var/www/`.

2 - Quando entrar no container workspace, não execute comandos compose como root, em vez disso crie um usuário, por exemplo:

```bash
# criar 
passwd laradock

# logar 
login laradock
```

Para não haver a necessidade de logar neste usuário sempre que subir o container, você poderá subi-lo usando a flag `--user`. Dessa forma, você já entrará na sua pasta raiz, e com seu usuário padrão.

```
docker-compose exec --user=laradock workspace bash
``` 
 

3 - Para criar um novo projeto laravel use:

```bash
composer create-project laravel/laravel NOME-PROJETO
```

## Clonando projeto laravel

Quando você clona um projeto laravel para sua máquina, alguns arquivos/pastas essenciais para a execução perfeita do projeto não são baixados, como o arquivo `.env` (contém as variáveis de ambiente, que pode mudar de acordo com cada ambiente, por isso não é recomendavél versioná-lo) e o diretório vendor (é onde fica o source code laravel, plugins e outras dependências. Tudo que você usar de terceiros fica aqui). Logo é preciso executar alguns comandos para gerar no seu ambiente.

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
