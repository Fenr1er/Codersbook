<?php

// Definiert, dass dieser Code im Bereich 'App\Core' des Projekts gehört.
namespace App\Core;

// Bezieht die notwendigen Klassen aus demselben Namespace.
use App\Core\Route;
use App\Core\RouteCollection;

// Die Router-Klasse verwaltet die Routen deiner Web-App.
class Router
{
    // Ein statisches Attribut, um die einzige Instanz des Routers zu speichern (Singleton-Pattern).
    private static $instance = null;

    // Speichert die definierten Routen.
    protected $routes = [];

    // Zusätzliche Daten, die während des Routings verwendet werden.
    private array $data = [];

    // Diese Methode gibt die einzige Instanz des Router-Objekts zurück.
    public static function getInstance()
    {
        // Wenn noch keine Instanz erstellt wurde, erstelle eine.
        if (self::$instance == null) {
            self::$instance = new Router();
        }
        return self::$instance;
    }

    // Fügt eine neue Route zur Liste der Routen hinzu.
    private function add(Route $route)
    {
        // Stellt sicher, dass $this->routes ein RouteCollection-Objekt ist.
        if ($this->routes == null) {
            $this->routes = new RouteCollection([]);
        }

        // Fügt die neue Route zu $this->routes hinzu.
        $this->routes->append($route);
        return $this;
    }

    // Definiert eine GET-Route.
    public function get($uri, $controller, $clousure = 'index')
    {
        // Erstellt eine neue Route und fügt sie zur Liste hinzu.
        return $this->add(new Route($uri, 'GET', $controller, $clousure));
    }

    // Verarbeitet eingehende Anfragen und leitet sie an die entsprechenden Controller weiter.
    public function route()
    {
        // Durchläuft alle definierten Routen.
        foreach ($this->routes as $route) {
            // Überprüft, ob die aktuelle Anfrage zu dieser Route passt.
            if ($this->matchRoutes($route)) {
                // Hier würde die entsprechende Aktion ausgeführt.
            }
        }
    }

    // Überprüft, ob die aktuelle Anfrage zu einer bestimmten Route passt.
    private function matchRoutes(Route $route): bool
    {
        // Holt die HTTP-Methode der Anfrage.
        $server_method = strtoupper($_SERVER['REQUEST_METHOD']);
        // Wenn die Methode nicht übereinstimmt, ist die Route nicht passend.
        if ($route->method != $server_method) {
            return false;
        }

        // Vergleicht die angeforderte URI mit dem Muster der Route.
        // Hier vereinfacht, um den Mechanismus darzustellen.
        $server_uri = preg_replace("/(^\/)|(\/$)/", "", parse_url($_SERVER['REQUEST_URI'])['path']);

        // Weitere Logik würde hier folgen, um die Route vollständig abzugleichen.

        // Falsch zurückgeben, wenn keine Übereinstimmung gefunden wird.
        return false;
    }
}
