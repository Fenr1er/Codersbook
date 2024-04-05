<?php

// Der Namespace `App\Core` zeigt an, dass diese Klasse Teil des Core-Systems der Anwendung ist.
namespace App\Core;

// Definition der Klasse `Route`.
class Route
{
    // Die Eigenschaften der Klasse definieren die wesentlichen Merkmale einer Route.

    // `uri` speichert den Pfad der Route als String.
    public string $uri;

    // `method` speichert die HTTP-Methode (z.B. GET, POST) als String oder null, falls nicht festgelegt.
    public string|null $method = null;

    // `controller` gibt den Namen des Controllers an, der für diese Route zuständig ist.
    public string $controller;

    // `closure` speichert den Namen der Methode des Controllers, die aufgerufen wird, standardmäßig 'index'.
    public string $closure = 'index';

    // Der Konstruktor der Klasse, der beim Erstellen eines Route-Objekts aufgerufen wird.
    public function __construct(
        string $uri,                  // Die URI der Route wird als Parameter übergeben.
        string|null $method = null,   // Die HTTP-Methode ist optional und standardmäßig null.
        string $controller,           // Der Name des Controllers, der die Anfrage bearbeitet.
        string $closure = 'index'     // Der Name der Controller-Methode, die ausgeführt wird, standardmäßig 'index'.
    ) {
        // Die Eigenschaften des Route-Objekts werden mit den übergebenen Parametern initialisiert.
        $this->uri = $uri;
        $this->method = $method;
        $this->controller = $controller;
        $this->closure = $closure;
    }
}

