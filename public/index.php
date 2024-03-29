<?php

// Definiere eine Konstante `BASE_PATH`, die den Basispfad des Projekts angibt.
// `__DIR__` gibt den Pfad des aktuellen Verzeichnisses zurück.
// Durch Hinzufügen von "/../" navigieren wir eine Ebene höher im Verzeichnisbaum.
const BASE_PATH = __DIR__ . "/../";

// Die `require`-Anweisung fügt die spezifizierten PHP-Dateien ein.
// Hier binden wir die Datei `helpers.php` aus dem `app/functions` Verzeichnis ein.
require BASE_PATH . "app/functions/helpers.php";

// Bindet die Composer-Autoloader-Datei ein, die für das automatische Laden von Klassen erforderlich ist.
require BASE_PATH . "vendor/autoload.php";

// Importiert die `Instance` Klasse aus dem Namespace `App\Core`.
use App\Core\Instance;

// Importiert die `Application` Klasse aus dem Namespace `App\Core`.
use App\Core\Application;

// Importiert die `Database` Klasse aus dem Namespace `App\Core`.
use App\Core\Database;

// Startet eine neue Session oder setzt eine bestehende fort.
session_start();

// Erstellt ein neues `Instance` Objekt.
$instance = new Instance();

// Ruft die statische Methode `setInstance` der `Application` Klasse auf und übergibt das `Instance` Objekt.
Application::setInstance($instance);

// Bindet die `Database` Klasse an eine anonyme Funktion, die ein neues `Database` Objekt zurückgibt.
// Dies wird typischerweise in Dependency-Injection-Containern verwendet, um Abhängigkeiten zu verwalten.
Application::bind(Database::class, function() {
    return new Database();
});

// Bindet die Routendefinitionen des Projekts ein, indem die Datei `routes.php` im `routes` Verzeichnis eingebunden wird.
require BASE_PATH . "routes/routes.php";
