# PHP Core System Overview

## Overview

This document outlines the core components within the `App\Core` namespace of our PHP application structure, focusing on object-oriented principles for managing database connections, routing, and application logic.

## Core Components

### Instance
Handles service instances and dependencies, allowing for key-based binding and resolution.

```php
class Instance {
    protected $bindings = [];
}
class Router {
    private static $instance = null;
    protected $routes = [];
}
class RouteCollection extends ArrayObject {
}
class Database {
    private PDO|null $pdo = null;
}
class Application {
    protected static Instance $instance;
}

Diese Zusammenfassung bietet einen schnellen Überblick über die Struktur und Funktionen der Kernkomponenten deiner Anwendung.
