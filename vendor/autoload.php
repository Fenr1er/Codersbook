<?php

// Registriert eine Funktion, die automatisch aufgerufen wird, wenn eine Klasse verwendet wird, die noch nicht geladen ist.
spl_autoload_register(function ($class) {
    // Erstellt den Pfad zur Klassendatei:
    // 1. `BASE_PATH` ist der Basispfad des Projekts, wo die Suche beginnt.
    // 2. `str_replace` ändert die Backslashes (`\`) in den Klassennamen zu dem Verzeichnistrennzeichen des Betriebssystems,
    //    damit der Pfad auf allen Betriebssystemen korrekt ist.
    // 3. `.php` wird an das Ende des Pfades angehängt, um die vollständige Dateiname der Klassendatei zu erhalten.
    require BASE_PATH . str_replace('\\', DIRECTORY_SEPARATOR, $class) . ".php";
});
