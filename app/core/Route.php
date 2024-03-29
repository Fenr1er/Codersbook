<?php

namespace App\Core;

class Route
{
    public string $uri;
    public string|null $method = null;
    public string $controller;
    public string $closure = 'index';

    public function __construct(string $uri, string|null $method = null, string $controller, string $closure = 'index')
    {
        $this->uri = $uri;
        $this->method = $method;
        $this->controller = $controller;
        $this->closure = $closure;
    }
}
