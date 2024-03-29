<?php

// Der Namespace gibt an, wo diese Klasse im Gesamtprojekt eingeordnet ist.
namespace App\Core;

// Die Klasse Route wird definiert.
class Route
{
    // Eigenschaften der Klasse, die Details zur Route enthalten.
    public string $uri;             // Die URI (Uniform Resource Identifier) der Route.
    public string|null $method = null; // Die HTTP-Methode (GET, POST, usw.), nullable, standardmäßig null.
    public string $controller;      // Der Controller, der die Anfragen für diese Route verarbeitet.
    public string $closure = 'index';  // Die Methode im Controller, die aufgerufen wird, standardmäßig 'index'.

    // Konstruktor der Klasse, der beim Erstellen eines Route-Objekts aufgerufen wird.
    public function __construct(
        string $uri,                    // Erwartet die URI als String.
        string|null $method = null,     // Optional: die HTTP-Methode, standardmäßig null.
        string $controller,             // Erwartet den Namen des Controllers.
        string $closure = 'index'       // Optional: die Methode im Controller, standardmäßig 'index'.
    ) {
        // Initialisiert die Eigenschaften des Objekts mit den übergebenen Werten.
        $this->uri = $uri;
        $this->method = $method;
        $this->controller = $controller;
        $this->closure = $closure;
    }
}
