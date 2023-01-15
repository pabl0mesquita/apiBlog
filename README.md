# Projeto Api Blog
 Este projeto foi desenvolvido no padrão MVC utilizando componentes do packgist.org para compor as camadas de <i><b>Model</b></i>, <i><b>View</b></i> e <i><b>Controller</b></i>. Nosso gerênciador de dependência é o <b><i>Composer</i></b>. Decidimos trabalhar no padrão <i><b>JSON</i></b> devido a sua  compatibilidade com diversas linguagens de programação e facilidade de uso.

## Organização do Projeto

O projeto foi separado no padrão MVC para melhor interoperabilidade e escalabilidade do sistema.

![](/themes/Web/assets/img/api/blog/org.png)


O arquivo de configuração se encontra no diretório: <b><i>source/Boot/Config.php</i></b>. Nele, devemos configurar as credenciais do banco de dados, bem como informar a url do projeto - teste e  produção.

![](/themes/Web/assets/img/api/blog/conf.png)


## ROTAS

```php
use CoffeeCode\Router\Router;

$route = new Router(url(), ":");

$route->namespace("Source\App\Api");

$route->get('/blog/posts',"Blog:index");
$route->get('/blog/posts/{id}',"Blog:get");
$route->get('/blog/test',"Blog:test");
$route->post('/blog/posts', "Blog:create");
$route->put('/blog/posts/{id}', "Blog:update");
$route->post('/blog/posts/cover/{id}', "Blog:coverUpdate");
$route->delete('/blog/posts/{id}','Blog:delete');

```

Method    | Endpoint |     O que faz       | limit
--------- | ------   |      ----            | -----
POST      | /api/blog/post       | <i>Adiciona novos posts<i>        | 3
GET       | /api/blog/post       | <i>Encontra conjunto de postos, aceita filtros de busca <i>           | 3
GET       | /api/blog/post/{id}  | <i>Encontra um post, aceita filtro de busca<i>           | 3
PUT       | /api/blog/post/{id}  | <i>Atualiza post<i>           | 3
DELETE    | /api/blog/post/{id}  | <i>Deleta um post<i>           | 3

## Como usar?

> 1) Devemos ter em mãos um programa para fazer requisições HTTP. Sugerimos o <b><i>postman</i></b> que pode ser encontrado <a href='https://www.postman.com/'>aqui</a>, mas podemos também usar <i><b>JavaScript Puro</i></b> ou a biblioteca <i><b>JQuery</i></b> com recursos do Ajax.


> 2) A URL para requisição é: <b><i>https://pablomesquita.com/api/blog</i></b>

> 3) No cabecalho da requisição, o usuário e senha para autenticação. Disponibilizamos um usuário teste: teste@gmail.com. Senha: 12345678.

> 4) Exemplo de requisição pelo postman:

![](/themes/Web/assets/img/api/blog/postexemple1.png)




