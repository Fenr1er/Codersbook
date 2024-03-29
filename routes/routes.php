<?php

// Definiert den Namespace `Routes`, um den Code organisatorisch zu gruppieren.
namespace Routes;

// Importiert die `Router` Klasse aus dem Namespace `App\Core`.
use App\Core\Router;

// Ruft die statische Methode `getInstance` der `Router` Klasse auf, um eine Instanz des Routers zu erhalten.
// Diese Methode stellt sicher, dass nur eine Instanz des Router-Objekts existiert (Singleton-Muster).
$router = Router::getInstance();

// Definiert eine GET-Route für die Homepage.
// Wenn eine Anfrage an die Wurzel-URL ("/") gesendet wird, wird die `index` Methode der `HomeController` Klasse aufgerufen.
$router->get("/", HomeController::class, 'index');

// Startet das Routing, indem die `route` Methode aufgerufen wird.
// Diese Methode prüft die eingehende Anfrage und leitet sie entsprechend den definierten Routen weiter.
$router->route();
