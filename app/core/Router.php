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

    private function render(string $controller, string $closure, array $data = [])
    {
        if (count($this->data) > 0) {
            $data = $this->data;
        }
        $instance = new $controller($data);
        call_user_func(array($instance, $closure));
    }




    //! führt für jede Route in routes.php die funktion add() aus.
    //! erzeugt ein neues Route Objekt und übergibt diese an die add() funktion
    public function get($uri, $controller, $closure = 'index')
    {
        // Erstellt und fügt eine neue Route mit der HTTP-Methode GET hinzu.
        return $this->add(new Route($uri, 'GET', $controller, $closure));
    }
    
    public function post($uri, $controller, $closure = 'index')
    {
        // Erstellt und fügt eine neue Route mit der HTTP-Methode POST hinzu.
        return $this->add(new Route($uri, 'POST', $controller, $closure));
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
                $this->render($route->controller, $route->closure);
                exit();
            }
        }
    }

    // Gibt die zusätzlichen Daten zurück, die im Routing-Prozess gesammelt wurden.
    private function matchSimpleRoute(Route $route, string $server_uri, string $server_method): bool
    {
        // aktuelle Request Methode finden.
        $routeUri = $route->uri;

        // Überprüft, ob die URI der Route mit der Anfrage übereinstimmt.
        if (!empty($server_uri)) {
            // ersetzen des ersten "/" mit nichts in Wert $_SERVER["REQUEST_URI"])['path']
            $routeUri = preg_replace("/(^\/)|(\/$)/", "", $route->uri);
            // ersetzen des ersten "/" mit nichts in Wert $_SERVER["REQUEST_URI"])['path']
            $reqUri = preg_replace("/(^\/)|(\/$)/", "", $server_uri);
        } else {
            // Wenn die URI leer ist, wird ein "/" als Standardwert verwendet.
            $reqUri = "/";
        }
        // Überprüft, ob die URI der Route mit der Anfrage übereinstimmt und ob die HTTP-Methode übereinstimmt.
        return $reqUri == $routeUri && $route->method == $server_method;
    }

    /* -------------------------------------------------------------------------- */
    /*                              KomplizierterTeil                             */
    /* -------------------------------------------------------------------------- */
    /**
     * da die URI der Route und die URI der Anfrage nicht immer identisch sind, müssen wir die Parameter in der URI der Route mit den Werten in der URI der Anfrage abgleichen.
     * Dazu verwenden wir reguläre Ausdrücke, um die Parameter in der URI der Route zu finden und die Werte in der URI der Anfrage zu extrahieren.
     * Wenn die Parameter in der URI der Route gefunden werden, ersetzen wir sie durch reguläre Ausdrücke und vergleichen sie mit der URI der Anfrage.
     * Wenn die URI der Route und die URI der Anfrage übereinstimmen, wird die Route als passend betrachtet.
     * Wenn die Route passt, werden die zusätzlichen Daten in einem Array gespeichert, das später im Controller verwendet werden kann.
     * @param Route $route
     * @return bool
     * @throws \Exception
     * @throws \Throwable
     * @throws \Error
     * @throws \ErrorException
     */

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

        //! anlegen der Zwei Arrays
        $params = [];
        $paramKey = [];

        //! überprüft ob direkt nach dem "/" in der URI von routes.php ein "{" kommt. danach kann stehen was will. danach muss ein "}" kommen und direkt wieder ein "/".
        //!  Dies verwenden wir un den {slug} zu bekommen
        preg_match_all("/(?<={).+?(?=})/", $route->uri, $paramMatches);
        //! Überprüfuung ob $paramMatches leer ist
        //! wenn es leer ist wird die funktion matchSimpleRoute() aufgerufen
        if (empty($paramMatches[0])) {
            //! compact() erstellt ein Array aus Variablen und deren Werten
            $this->data = compact("queries");
            return $this->matchSimpleRoute($route, $server_uri, $server_method);
        }
        //! wenn $paramMatches nicht leer ist wird die foreach schleife ausgeführt
        //! 
        foreach ($paramMatches[0] as $key) {
            $paramKey[$key] = $key;
        }

        if (!empty($server_uri)) {
            $routeUri = preg_replace("/(^\/)|(\/$)/", "", $route->uri);
            $reqUri = preg_replace("/(^\/)|(\/$)/", "", $server_uri);
        } else {
            $reqUri = "/";
        }
        //! aufteilen der route aus routes. jeder teil der URL (durch / getrennt) wird als arrayeintrag eingefügt
        $uri = explode("/", $routeUri);

        $indexNum = [];

        //! jeder teil des uri arrays wird dursucht
        foreach ($uri as $index => $param) {
            if (preg_match("/{.*}/", $param)) {
                $indexNum[] = $index;
            }
        }
        //! aufteilen der route des Users. jeder teil der URL (durch / getrennt) wird als arrayeintrag eingefügt
        $reqUri = explode("/", $reqUri);

        //! für jeden gefundenen parameter wird überprüft ob eine einegabe des Users dazu passt -> localhost/products/{slug} in routes | localhost/products/Tischdecke
        foreach ($indexNum as $key => $index) {
            if (empty($regUri[$index])) {
                return false;
            }
            //! wenn der {slug} platzhalter mit der vom User eingegebenen URL (an dieser stelle ) eingesetzt wurde weise statt {slug} den entsprechenden parameter zu
            $params[$paramKey[$key]] = $reqUri[$index];


            $reqUri[$index] = "{.*}";
        }
        //! erzuegen eines strings aus dem array $reqUri
        $reqUri = implode("/", $reqUri);
        //! ersetzen der / durch \\
        $reqUri = str_replace("/", '\\/', $reqUri);

        //! 
        if (preg_match("/$reqUri/", $routeUri)) {
            //! compact() erstellt ein Array aus Variablen und deren Werten
            $this->data = compact("queries", "params");
            return true;
        }

        return false;
    }
}
