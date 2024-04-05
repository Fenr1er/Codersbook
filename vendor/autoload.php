<?php

// Registriert eine Funktion, die automatisch aufgerufen wird, wenn eine Klasse verwendet wird, die noch nicht geladen ist.
// Dieser Mechanismus wird als "Autoloading" bezeichnet und ist eine effiziente Methode, um Klassen bei Bedarf zu laden.
//! 
spl_autoload_register(function ($class) {
    // Erstellt den Pfad zur Klassendatei, indem dynamisch der Pfad zusammengesetzt wird:
    // 1. `BASE_PATH` ist eine Konstante, die den Basispfad des Projekts definiert, wo die Suche nach der Klasse beginnt.
    //    Dieser Pfad dient als Ausgangspunkt für das Auffinden der benötigten Klassendatei.
    // 2. `str_replace` wird verwendet, um die Backslashes (`\`) in den Klassennamen zu dem Verzeichnistrennzeichen des Betriebssystems zu ändern.
    //    Dies ist notwendig, weil die Verzeichnistrennzeichen zwischen Windows (`\`) und UNIX-basierten Systemen (`/`) variieren.
    //    Diese Anpassung sorgt dafür, dass der Pfad auf allen Betriebssystemen korrekt interpretiert wird.
    // 3. `.php` wird an das Ende des Pfades angehängt, um die vollständige Dateiname der Klassendatei zu erhalten.
    //    Damit wird der Pfad vervollständigt, und `require` kann die entsprechende Datei einbinden.
    //! 
    require BASE_PATH . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
});
