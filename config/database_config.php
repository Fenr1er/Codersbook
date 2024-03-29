<?php

// Definiert den Namespace für diese Datei. Namespaces helfen, Konflikte zwischen Klassennamen in großen Anwendungen zu vermeiden.
namespace App\Core;

// Gibt ein assoziatives Array mit Konfigurationseinstellungen für eine Datenbankverbindung zurück.
return [
    'db' => 'mysql',          // Typ der Datenbank, hier MySQL.
    'host' => 'localhost',    // Der Hostname, auf dem die Datenbank läuft, hier lokal.
    'port' => '3306',         // Der Port, über den die Verbindung zur Datenbank hergestellt wird, 3306 ist der Standard-MySQL-Port.
    'dbname' => 'codersbook', // Der Name der Datenbank, zu der eine Verbindung hergestellt werden soll.
    'charset' => 'utf8mb4',   // Der Zeichensatz, der für die Verbindung verwendet wird, utf8mb4 unterstützt alle Unicode-Zeichen.
    'user' => 'root',         // Der Benutzername für die Datenbankanmeldung.
    'password' => '',         // Das Passwort für die Datenbankanmeldung, hier leer, was in Produktionsumgebungen vermieden werden sollte.
];
