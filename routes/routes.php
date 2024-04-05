<?php

// Verwendet den Namespace `Routes`, um den Code innerhalb eines logischen Bereichs zu organisieren.
// Dies hilft bei der Strukturierung des Projekts und verhindert Namenskonflikte.
namespace Routes;

// Importiert die `Router` Klasse aus dem Namespace `App\Core`.
// `use` erlaubt es, die Klasse im aktuellen Namespace ohne den vollständigen Namespace-Pfad zu verwenden.
use App\Core\Router;

// Ruft die statische Methode `getInstance` der `Router` Klasse auf, um eine Instanz des Routers zu erhalten.
// Dieses Vorgehen folgt dem Singleton-Designmuster, welches sicherstellt, dass von dieser Klasse nur eine Instanz existiert.
$router = Router::getInstance();

// Definiert eine GET-Route für die Homepage.
// Der erste Parameter ist der Pfad ("/"), der zweite der Klassenname und der dritte die Methode, die aufgerufen werden soll.
// Diese Zeile sagt aus, dass bei einem HTTP GET-Request an die Wurzel-URL ("/") die `index` Methode der `HomeController` Klasse ausgeführt werden soll.
$router->get("/", "HomeController::index");

// Startet das Routing, indem die `route` Methode des Router-Objekts aufgerufen wird.
// Diese Methode analysiert die HTTP-Anfrage und leitet sie basierend auf den definierten Routen an die entsprechenden Controller und Methoden weiter.
$router->route();
