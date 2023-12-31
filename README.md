Projeto API CRUD - Guia de Iniciação Rápida
Seja bem-vindo ao Projeto API CRUD! Este guia fornece instruções detalhadas para ajudá-lo a configurar e começar a utilizar o nosso projeto. Siga as etapas abaixo para uma implantação rápida e eficaz.

Etapa 1: Configuração do Ambiente

Após clonar o projeto, você precisará executar o comando composer install para instalar todas as dependências necessárias. Com o composer devidamente configurado, você poderá usar o Docker para criar o container do projeto que irá instanciar o Laravel e o banco de dados MySQL.

Para subir os containers do Docker, utilize o comando docker-compose up. Caso prefira, também é possível usar o Laravel Sail, uma interface de linha de comando para interagir com os containers do Laravel Docker, usando o comando ./vendor/bin/sail up -d.

Etapa 2: Executando as Migrations

Com o ambiente pronto, é hora de criar as tabelas no banco de dados. Utilize o comando php artisan migrate para executar todas as migrations existentes.

Etapa 3: Configurando o Passport

Antes de iniciar o projeto, é necessário configurar o Laravel Passport, uma maneira de adicionar a autenticação OAuth2 ao seu aplicativo Laravel. Para instalar o Passport, execute o comando sail artisan passport:install.

Etapa 4: Configuração do Usuário Administrador

Por fim, você precisará configurar um e-mail e senha para o primeiro usuário administrador no arquivo .env. Assegure-se de atualizar essas credenciais quando adicionar seeders com outros usuários.
#