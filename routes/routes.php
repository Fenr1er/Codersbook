<?php

namespace Routes;

use App\Core\Router;

$router = Router::getInstance(); // Router ist eine Klasse, die verwendet wird, um eine Instanz zu erhalten, getInstance ist eine Methode, die verwendet wird, um eine Instanz zu erhalten. $router ist eine Eigenschaft, die auf die Klasse angewendet wird, $router ist eine Eigenschaft, die auf die Klasse angewendet wird. 


$router->get("/", HomeController::class, 'index');


$router->route(); // route ist eine Methode, die verwendet wird, um eine Route zu erstellen und zu verwenden.