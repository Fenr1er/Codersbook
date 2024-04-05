<?php

// Definiere eine Konstante `BASE_PATH`, die den Basispfad des Projekts angibt.
// `__DIR__` gibt den Pfad des aktuellen Verzeichnisses zurück, und durch Hinzufügen von "/../" navigieren wir eine Ebene höher.
// Dies ist nützlich, um relative Pfade im Projekt konsistent zu halten.
const BASE_PATH = __DIR__ . "/../";

// Die `require`-Anweisung fügt die spezifizierten PHP-Dateien ein.
// Hier binden wir die Datei `helpers.php` aus dem `app/functions` Verzeichnis ein, die Hilfsfunktionen für das Projekt bereitstellt.
require BASE_PATH . "app/functions/helpers.php";

// Bindet die Composer-Autoloader-Datei ein, die für das automatische Laden von Klassen erforderlich ist.
// Composer ist ein Tool für die Abhängigkeitsverwaltung in PHP, das automatisches Laden von Klassen ermöglicht.
require BASE_PATH . "vendor/autoload.php";

// Importiert die `Instance` Klasse aus dem Namespace `App\Core`.
// Diese Klasse könnte eine zentrale Rolle in der Anwendungslogik spielen, wie das Verwalten von Instanzen.
use App\Core\Instance;

// Importiert die `Application` Klasse aus dem Namespace `App\Core`.
// Diese Klasse könnte die Hauptanwendung oder den Kern des Frameworks repräsentieren.
use App\Core\Application;

// Importiert die `Database` Klasse aus dem Namespace `App\Core`.
// Diese Klasse ist für die Datenbankinteraktionen innerhalb der Anwendung zuständig.
use App\Core\Database;

// Startet eine neue Session oder setzt eine bestehende fort.
// Sessions werden verwendet, um Informationen über den Benutzer über mehrere Seitenanfragen hinweg zu speichern.
session_start();

// Erstellt ein neues `Instance` Objekt.
// Dies könnte eine spezielle Instanz sein, die für die Initialisierung und Verwaltung von Anwendungsressourcen verwendet wird.
$instance = new Instance();

// Ruft die statische Methode `setInstance` der `Application` Klasse auf und übergibt das `Instance` Objekt.
// Dies etabliert das `Instance` Objekt als zentralen Punkt für den Zugriff innerhalb der Anwendung.
Application::setInstance($instance);

// Bindet die `Database` Klasse an eine anonyme Funktion, die ein neues `Database` Objekt zurückgibt.
// Diese Technik wird oft in Dependency-Injection-Containern verwendet, um Klassen und ihre Abhängigkeiten zu verwalten.
Application::bind(Database::class, function() {
    return new Database();
});

// Bindet die Routendefinitionen des Projekts ein, indem die Datei `routes.php` im `routes` Verzeichnis eingebunden wird.
// Die Routendefinitionen bestimmen, wie eingehende Anfragen verarbeitet und an die entsprechenden Controller und Methoden weitergeleitet werden.
require BASE_PATH . "routes/routes.php";
