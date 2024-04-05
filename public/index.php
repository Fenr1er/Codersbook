<?php
//! alle Requeusts laufen über index.php -> ist über htaccess geregelt.



// Definiere eine Konstante `BASE_PATH`, die den Basispfad des Projekts angibt.
// `__DIR__` gibt den Pfad des aktuellen Verzeichnisses zurück, und durch Hinzufügen von "/../" navigieren wir eine Ebene höher.
// Dies ist nützlich, um relative Pfade im Projekt konsistent zu halten.
//! constante BASE_PATH anlegen und mit projekt-root-order initialisieren
const BASE_PATH = __DIR__.'/../';


// Die `require`-Anweisung fügt die spezifizierten PHP-Dateien ein.
// Hier binden wir die Datei `helpers.php` aus dem `app/functions` Verzeichnis ein, die Hilfsfunktionen für das Projekt bereitstellt.
//! helpers.php einbinden
require BASE_PATH . "app/functions/helpers.php";

// Bindet die Composer-Autoloader-Datei ein, die für das automatische Laden von Klassen erforderlich ist.
// Composer ist ein Tool für die Abhängigkeitsverwaltung in PHP, das automatisches Laden von Klassen ermöglicht.
//! composer autoload einbinden
require BASE_PATH . "vendor/autoload.php";

// Importiert die `Instance` Klasse aus dem Namespace `App\Core`.
// Diese Klasse könnte eine zentrale Rolle in der Anwendungslogik spielen, wie das Verwalten von Instanzen.
//! verwenden von dem namespace App\Core
use App\Core\Instance;

// Importiert die `Application` Klasse aus dem Namespace `App\Core`.
// Diese Klasse könnte die Hauptanwendung oder den Kern des Frameworks repräsentieren.
//!verwenden von dem namespace App\Core
use App\Core\Application;

// Importiert die `Database` Klasse aus dem Namespace `App\Core`.
// Diese Klasse ist für die Datenbankinteraktionen innerhalb der Anwendung zuständig.
//!verwenden von dem namespace App\Core
use App\Core\Database;

// Startet eine neue Session oder setzt eine bestehende fort.
// Sessions werden verwendet, um Informationen über den Benutzer über mehrere Seitenanfragen hinweg zu speichern.
//! session_start() -> startet eine neue Session oder setzt eine bestehende fort
session_start();

// Erstellt ein neues `Instance` Objekt.
// Dies könnte eine spezielle Instanz sein, die für die Initialisierung und Verwaltung von Anwendungsressourcen verwendet wird.
//! Erzeugen einer Neuen Instanz
$instance = new Instance();

// Ruft die statische Methode `setInstance` der `Application` Klasse auf und übergibt das `Instance` Objekt.
// Dies etabliert das `Instance` Objekt als zentralen Punkt für den Zugriff innerhalb der Anwendung.
//! die oben erzeugte instanz zur application hinzufügen
Application::setInstance($instance);

// Bindet die `Database` Klasse an eine anonyme Funktion, die ein neues `Database` Objekt zurückgibt.
// Diese Technik wird oft in Dependency-Injection-Containern verwendet, um Klassen und ihre Abhängigkeiten zu verwalten.
//! Datenbankverbindung in instanz bindings hinzufügen
//! Als Array key in $bindings wird Database::class verwendet. der dazugehörige wert (Datenverbindung) wwird durch function(){return new Database();} erzeugt und hinzugefügt.
Application::bind(Database::class, function() {
    return new Database();
});

// Bindet die Routendefinitionen des Projekts ein, indem die Datei `routes.php` im `routes` Verzeichnis eingebunden wird.
// Die Routendefinitionen bestimmen, wie eingehende Anfragen verarbeitet und an die entsprechenden Controller und Methoden weitergeleitet werden.
//! inkludieren der routes.php
require BASE_PATH . "routes/routes.php";
