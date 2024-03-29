<?php

namespace App\Core;

use App\Core\Route;
use App\Core\RouteCollection;

class Router
{

    private static $instance = null;
    protected $routes = [];
    private array $data = [];

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Router();
        }
        return self::$instance;
    }

    private function add(Route $route)
    {
        if ($this->routes == null) {
            $this->routes = new RouteCollection([]);
        }

        $this->routes->append($route);
        return $this;
    }

    public function get($uri, $controller, $clousure = 'index')
    {
        return $this->add(new Route($uri, 'GET', $controller, $clousure));
    }

    public function route()
    {
        foreach ($this->routes as $route) {
            if ($this->matchRoutes($route)) {
                # Route anzeigen
            }
        }
    }

    private function matchRoutes(Route $route): bool
    {
        $server_method = strtoupper($_SERVER['REQUEST_METHOD']);
        if ($route->method != $server_method) {
            return false;
        }

        $server_uri = preg_replace("/(^\/)|(\/$)/", "", parse_url($_SERVER['REQUEST_URI'])['path']);
        parse_str($_SERVER['QUERY_STRING'], $queries);

        $params = [];
        $paramKey = [];

        preg_match_all("/(?<={).+?(?=})/", $route->uri, $paramMatches);

        if (empty($paramMatches[0])) {
            $this->data = compact('queries');
            return $this->matchSimpleRoute($route, $server_uri, $server_method);
        }
        foreach ($paramMatches[0] as $key) {
            $paramKey[] = $key;
        }

        if (!empty($server_uri)) {
            $routeUri = preg_replace("/(^\/)|(\/$)/", "", $route->uri);
            $requestUri = preg_replace("/(^\/)|(\/$)/", "", $server_uri);
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
            if (empty($reqUri[$index])) {
                return false;
            }

            $params[$paramKey[$key]] = $reqUri[$index];
            $reqUri[$index] = "{.*}";
        }

        $reqUri = implode("/", $reqUri);
        $reqUri = str_replace("/", '\\/', $reqUri);

        if (preg_match('/$reqUri/', $reqUri)) {
            $this->data = compact("queries", "params");
            return true;
        }
        return false;
    }
}
