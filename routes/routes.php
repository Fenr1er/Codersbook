<?php

namespace Routes;

use App\Core\Router;
use App\Core\Auth;
use App\Controller\HomeController;
use App\Controller\DashboardController;


$router = Router::getInstance();


//! definiert die zur Verfügungstehenden Routen
$router->get("/", HomeController::class, 'index');
$router->get("/signup", HomeController::class, 'signup');
$router->post("/signup", Auth::class, 'signup');
$router->get("/login", HomeController::class, 'login');
$router->post("/login", Auth::class, 'login');

$router->get("/dashboard", DashboardController::class, 'index');
$router->get("/logout", HomeController::class, 'logout');


// $router->get("/est/supercool", HomeController::class, 'super');
// $router->get("/product/{slug}/edit", HomeController::class, 'index');


//! Starte route vorgang
$router->route();
