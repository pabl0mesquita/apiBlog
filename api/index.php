<?php

require __DIR__ . "/../vendor/autoload.php";

/**
 * BOOTSTRAP
 */
use CoffeeCode\Router\Router;

/**
 * API ROUTES
 * index
 */
$route = new Router(url(), ":");

$route->namespace("Source\App\Api");

################
### Api Blog ###
################
$route->get('/blog/posts',"Blog:index");
$route->get('/blog/posts/{id}',"Blog:get");
$route->get('/blog/test',"Blog:test");
$route->post('/blog/posts', "Blog:create");
$route->put('/blog/posts/{id}', "Blog:update");
$route->post('/blog/posts/cover/{id}', "Blog:coverUpdate");
$route->delete('/blog/posts/{id}','Blog:delete');

/**
 * ROUTE
 */
$route->dispatch();

/**
 * ERROR REDIRECT
 */
if ($route->error()) {
    header('Content-Type: application/json; charset=UTF-8');
    http_response_code(404);

    echo json_encode([
        "errors" => [
            "type " => "endpoint_not_found",
            "message" => "Não foi possível processar a requisição"
        ]
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}
