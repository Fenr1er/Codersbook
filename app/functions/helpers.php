<?php
/**
 * Dieser Abschnitt ist ein mehrzeiliger Kommentar, der verschiedene Arten von Notizen enthält:
 * Allgemeiner Kommentar zur Datei oder zum Abschnitt.
 * ! Alerts: Wichtiges, das besondere Aufmerksamkeit erfordert.
 * ? Queries: Notizen oder Fragen zur Funktionsweise des Codes.
 * TODO: Aufgaben, die noch erledigt werden müssen.
 * @param test: Dient in der Dokumentation oft zur Beschreibung eines Parameters einer Funktion.
 */

// Definiert eine Funktion `dd`, die zum Debuggen verwendet wird, um den Wert einer Variablen formatiert auszugeben und das Skript zu beenden.
function dd($value) {
    echo '<pre>';            // Beginnt die Ausgabe in vorformatierter Weise, um sie lesbarer zu machen.
    print_r($value);         // Gibt den Wert der Variablen in einer für Menschen lesbaren Form aus.
    echo '</pre>';           // Beendet die vorformatierte Ausgabe.
    die();                   // Beendet das Skript sofort.
}

// Definiert eine Funktion `base_path`, die einen absoluten Pfad basierend auf einem Basispfad generiert.
function base_path($path) {
    // Verwendet `BASE_PATH`, eine globale Konstante, die den Basispfad des Projekts enthält.
    // `BASE_PATH` sollte irgendwo im Projekt definiert sein, normalerweise in einer zentralen Konfigurationsdatei.
    return BASE_PATH . $path;
}

// Definiert eine Funktion `config`, die eine Konfigurationsdatei lädt.
function config($name){
    // Der Pfad zur Konfigurationsdatei wird zusammengesetzt und die Datei wird mittels `require` eingebunden.
    // Erwartet wird, dass die Konfigurationsdatei ein Array zurückgibt, das dann von der Funktion zurückgegeben wird.
    return require BASE_PATH . "app/config/" . $name . "_config.php";
}
