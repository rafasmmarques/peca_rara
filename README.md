# Introdução

Sistema de teste para a Peça Rara usando API REST.

Tecnologias utilizadas:

 - PHP 7.3+
 - Laravel 8+
 - TailwindCSS 3
 - MySQL 5.6+

# Instalação
Duplicar o arquivo `.env.example` e renomear a cópia para `.env`.

Criar o banco de dados `peca_rara` e salvar as credenciais de conexão no arquivo `.env`.

Executar os seguintes comandos:

> `composer install`
> `npm install`
> `php artisan key:generate`
> `php artisan migrate:fresh --seed`
> `php artisan storage:link`

# Utilizando a API
Nessa versão atual, a integração da API com o front-end não está pronta. Apenas se consegue:
- Visualizar os pedidos no dashboard
- Deletar um pedido no dashboard
- Visualizar os produtos na página de criar um novo pedido

Para se utilizar 100% da API é necessário usar alguma ferramenta de *Request*, como o [Postman](https://www.postman.com/postman/workspace/postman-answers/request/) por exemplo.