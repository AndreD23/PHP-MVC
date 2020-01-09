<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

/*
 * APP
 */
$router->namespace("Source\App");

/*
 * web
 */
$router->group(null);
$router->get("/", "Web:home");
$router->get("/contato", "Web:contact");
$router->post("/contato", "Web:contact");

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
 * ERROR
 */
$router->group("ops");
$router->get("/{errcode}", "Web:error");

/*
 * PROCESS
 */
$router->dispatch();

if ($route_error = $router->error()) {
    $router->redirect("/ops/{$route_error}");
}