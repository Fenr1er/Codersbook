<?php

// Der Code gehört zum Namespace 'App\Core', was hilft, die Klassennamen im Projekt zu organisieren.
namespace App\Core;

// Importiert die Klassen 'Route' und 'RouteCollection' aus demselben Namespace.
use App\Core\Route;
use App\Core\RouteCollection;

// Die Router-Klasse ist zuständig für die Verwaltung der Routen in der Webanwendung.
class Router
{
    // Ein privates statisches Attribut für die Singleton-Instanz des Routers.
    private static $instance = null;

    // Ein geschütztes Attribut, um die definierten Routen zu speichern.
    protected $routes = [];

    // Ein privates Attribut für zusätzliche Daten, die im Routing-Prozess verwendet werden können.
    private array $data = [];

    // Die `getInstance`-Methode implementiert das Singleton-Muster. Sie gibt immer dieselbe Instanz des Routers zurück.
    public static function getInstance()
    {
        // Erstellt eine neue Instanz des Routers, wenn noch keine existiert.
        if (self::$instance == null) {
            self::$instance = new Router();
        }
        // Gibt die Singleton-Instanz des Routers zurück.
        return self::$instance;
    }

    // Eine private Methode `add`, um eine neue Route zum Router hinzuzufügen.
    private function add(Route $route)
    {
        // Initialisiert $this->routes mit einem RouteCollection-Objekt, falls noch nicht geschehen.
        if ($this->routes == null) {
            $this->routes = new RouteCollection([]);
        }

        // Fügt die Route zur RouteCollection hinzu.
        $this->routes->append($route);
        return $this;
    }

    // Eine öffentliche Methode, um eine GET-Route zu definieren.
    public function get($uri, $controller, $closure = 'index')
    {
        // Erstellt und fügt eine neue Route mit der HTTP-Methode GET hinzu.
        return $this->add(new Route($uri, 'GET', $controller, $closure));
    }

    // Verarbeitet die eingehenden Anfragen und leitet sie an die entsprechenden Controller weiter.
    public function route()
    {
        // Durchläuft alle definierten Routen.
        foreach ($this->routes as $route) {
            // Ruft `matchRoutes` auf, um zu überprüfen, ob die aktuelle Anfrage zur Route passt.
            if ($this->matchRoutes($route)) {
                // Führt die Aktion aus, wenn die Route passt.
            }
        }
    }

    // Eine private Methode, um zu überprüfen, ob eine Route zur aktuellen Anfrage passt.
    private function matchRoutes(Route $route): bool
    {
        // Überprüft, ob die HTTP-Methode der Anfrage mit der der Route übereinstimmt.
        $server_method = strtoupper($_SERVER['REQUEST_METHOD']);
        if ($route->method != $server_method) {
            return false;
        }

        // Vereinfachte Überprüfung der Übereinstimmung der URI.
        $server_uri = preg_replace("/(^\/)|(\/$)/", "", parse_url($_SERVER['REQUEST_URI'])['path']);

        // Die Logik, um die Übereinstimmung der Route vollständig zu überprüfen, würde hier folgen.

        // Gibt `false` zurück, wenn keine Übereinstimmung gefunden wird.
        return false;
    }
}
