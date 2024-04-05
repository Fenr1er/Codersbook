<?php

namespace Routes;
use App\Core\Router;

$router = Router::getInstance();


//! definiert die zur Verfügungstehenden Routen
$router->get("/", HomeController::class, 'index');
$router->get("/est/supercool", HomeController::class, 'super');
$router->get("/product/{slug}/edit", HomeController::class, 'index');


//! Starte route vorgang
$router->route();
