# DESAFIO BASIS

## REQUISITOS PARA O FUNCIONAMENTO NO AMBIENTE

* Laravel Framework 7.21.0
* PHP 7.4.0
* MySQL 10.4.10
* Composer


## INSTRUÇÕES PARA CONFIGURAÇÃO DO AMBIENTE

* Baixe o repositório contendo os arquivos do projeto:

	    $ git clone https://github.com/jonas-rodrigues-r/desafio.git


* Na raiz do projeto, execute os comandos:

        $ cd desafio

        $ cp .env.example .env
        
        $ composer install

        $ php artisan key:generate


* Para criar seu banco de dados, execute o comando abaixo na raiz do seu projeto:

	    $ mysql -h *HOST* -u *USUARIO* -p*SENHA* -e "create database *NOME_DATABASE*; use mysql; grant all on *NOME_DATABASE* to *USUARIO*;"
	
        - HOST: Seu IP local
        - USUARIO: Seu usuário do banco de dados MySQL
        - SENHA: Sua senha do banco de dados MySQL
        - NOME_DATABASE: O nome do banco de dados a ser criado


* No arquivo .env, localizado na raiz do projeto, configure os dados de acordo com os citados acima, correspondente ao seu ambiente local:

        DB_CONNECTION=mysql
        DB_HOST=SEU_HOST
        DB_PORT=3306
        DB_DATABASE=NOME_DATABASE
        DB_USERNAME=USUARIO_DATABASE
        DB_PASSWORD=SENHA_DATABASE


* Para criar as tabelas que serão utilizadas, na raiz do projeto, execute o seguinte comando:
	
	    $ php artisan migrate


* Para gerar os primeiros registros, incluindo o usuário administrador, execute o comando:

	    $ php artisan db:seed


## ACESSANDO O PROJETO

        LINK: http://localhost:8000
        USUÁRIO: 38222419030
        SENHA: #Adm91!
