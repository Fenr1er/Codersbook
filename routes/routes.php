<?php

namespace Routes;
use App\Core\Router;
use App\Controller\HomeController;
use App\Core\Auth;

$router = Router::getInstance();


//! definiert die zur Verfügungstehenden Routen
$router->get("/", HomeController::class, 'index');
$router->get("/signup", HomeController::class, 'signup');
$router->post("/login", Auth::class, 'login');

// $router->get("/est/supercool", HomeController::class, 'super');
// $router->get("/product/{slug}/edit", HomeController::class, 'index');


//! Starte route vorgang
$router->route();
