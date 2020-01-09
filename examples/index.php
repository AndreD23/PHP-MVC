<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

/*
 * Controllers
 */
$router->namespace("Source\App");

/*
 * WEB
 * home
 */
$router->group(null);
$router->get("/", "Web:home");
$router->get("/{filter}", "Web:home");

/*
 * contato
 */
$router->get("/contato", "Web:contact");

/*
 * blog
 */
$router->group("blog");
$router->get("/", "Web:blog");
$router->get("/{post_uri}", "Web:post");
$router->get("/categoria/{cat_url}", "Web:category");

/*
 * ADMIN
 * home
 */
$router->group("admin");
$router->get("/", "Admin:home");

/*
 * ERROS
 */
$router->group("ops");
$router->get("/{errcode}", "Web:error");

$router->dispatch();

if($route_error = $router->error()){
    $router->redirect("/ops/{$route_error}");
}
