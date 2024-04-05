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
    //! überprüft ob bereits eine instanz in der objektvariable $instance gespeichert ist, wenn nicht wird eine neue instanz erzeugt.
    public static function getInstance()
    {
        // Erstellt eine neue Instanz des Routers, wenn noch keine existiert.
        if (self::$instance == null) {
            self::$instance = new Router();
        }
        // Gibt die Singleton-Instanz des Routers zurück.
        return self::$instance;
    }

    //!  
    private function add(Route $route)
    {
        if ($this->routes == null) {
            $this->routes = new RouteCollection([]);
        }
        $this->routes->append($route);
        return $this;
    }

    //! führt für jede Route in routes.php die funktion add() aus.
    //! erzeugt ein neues Route Objekt und übergibt diese an die add() funktion
    public function get($uri, $controller, $closure = 'index')
    {
        // Erstellt und fügt eine neue Route mit der HTTP-Methode GET hinzu.
        return $this->add(new Route($uri, 'GET', $controller, $closure));
    }

    // Verarbeitet die eingehenden Anfragen und leitet sie an die entsprechenden Controller weiter.
    public function route()
    {
        //! für jesen eintrag in der Objektvariable $routes wird die methode matchRoutes() aufgerufen.
        // Durchläuft alle definierten Routen.
        foreach ($this->routes as $route) {
            //! vergleicht jeden eintrag von routes.php mit der eingegeben Uri vom User
            // Ruft `matchRoutes` auf, um zu überprüfen, ob die aktuelle Anfrage zur Route passt.
            if ($this->matchRoutes($route)) {
                // Führt die Aktion aus, wenn die Route passt.
            }
        }
    }


    private function matchSimpleRoute(Route $route, string $server_uri, string $server_method): bool
    {
        $routeUri = $route->uri;

        if (!empty($server_uri)) {
            $routeUri = preg_replace("/(^\/)|(\/$)/", "", $route->uri);
            $reqUri = preg_replace("/(^\/)|(\/$)/", "", $server_uri);
        } else {
            $reqUri = "/";
        }

        return $reqUri == $routeUri && $route->method == $server_method;
    } 
    
 
    private function matchRoutes(Route $route): bool
    {
        //* aktuelle Request Methode finden.
        $server_method = strtoupper($_SERVER["REQUEST_METHOD"]);

        //* Abgleich der Request Methode von routes.php mit der Request Methode der Useranfrage
        if ($route->method != $server_method) {
            return false;
        }

        
        //! ersetzen des ersten "/" mit nichts in Wert $_SERVER["REQUEST_URI"])['path']
        $server_uri = preg_replace("/(^\/)|(\/$)/", "", parse_url($_SERVER["REQUEST_URI"])['path']);
        parse_str($_SERVER['QUERY_STRING'], $queries);

        //! anlegen deer Zwei Arrays
        $params = [];
        $paramKey = [];
        

        preg_match_all("/(?<={).+?(?=})/", $route->uri, $paramMatches);

        if (empty($paramMatches[0])) {
            $this->data = compact("queries");
            return $this->matchSimpleRoute($route, $server_uri, $server_method);
        }

        foreach ($paramMatches[0] as $key) {
            $paramKey[$key] = $key;
        }

        if (!empty($server_uri)) {
            $routeUri = preg_replace("/(^\/)|(\/$)/", "", $route->uri);
            $reqUri = preg_replace("/(^\/)|(\/$)/", "", $server_uri);
        } else {
            $reqUri = "/";
        }

        $uri = explode("/", $routeUri);

        $indexNum = [];

        foreach ($uri as $index => $param) {
            if (preg_match("/{.*}/", $param)) {
                $indexNum[] = $index;
            }
        }

        $reqUri = explode("/", $reqUri);

        foreach ($indexNum as $key => $index) {
            if (empty($regUri[$index])) {
                return false;
            }

            $params[$paramKey[$key]] = $reqUri[$index];
            $reqUri[$index] = "{.*}";
        }

        $reqUri = implode("/", $reqUri);
        $reqUri = str_replace("/", '\\/', $reqUri);

        if(preg_match("/$reqUri/", $routeUri)) {
            $this->data = compact("queries", "params");
            return true;
        }

        return false;
    }
} 

