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
//! dd -> dump and die -> dient zur ausdgabe von Werten/Arrays/Objekten in einigermaßen lesbaren Form,
//! die() beendet das Skript
function dd($value) {
    echo '<pre>';            // Beginnt die Ausgabe in vorformatierter Weise, um sie lesbarer zu machen.
                             // `<pre>` sorgt dafür, dass die Ausgabe so erscheint, wie sie formatiert ist (mit Zeilenumbrüchen und Leerzeichen).
    print_r($value);         // Gibt den Wert der Variablen in einer für Menschen lesbaren Form aus.
                             // `print_r` ist hilfreich, um Arrays oder Objekte zu inspizieren.
    echo '</pre>';           // Beendet die vorformatierte Ausgabe.
    die();                   // Beendet das Skript sofort.
                             // `die()` ist nützlich, um die Ausführung an dieser Stelle zu stoppen, was beim Debuggen hilft.
}

// Definiert eine Funktion `base_path`, die einen absoluten Pfad basierend auf einem Basispfad generiert.
//! sorgt dafür das die constante nicht immer angesprochen werden muss.
function base_path($path) {
    // Verwendet `BASE_PATH`, eine globale Konstante, die den Basispfad des Projekts enthält.
    // `BASE_PATH` sollte irgendwo im Projekt definiert sein, normalerweise in einer zentralen Konfigurationsdatei.
    return BASE_PATH . $path; // Fügt den Basispfad und den übergebenen Pfad zusammen, um den vollständigen Pfad zu bilden.
}

// Definiert eine Funktion `config`, die eine Konfigurationsdatei lädt.
//! config -> lädt die config.php Datei
function config($name){
    // Der Pfad zur Konfigurationsdatei wird zusammengesetzt und die Datei wird mittels `require` eingebunden.
    // Erwartet wird, dass die Konfigurationsdatei ein Array zurückgibt, das dann von der Funktion zurückgegeben wird.
    return require BASE_PATH . "app/config/" . $name . "_config.php";
    // Dies ermöglicht den Zugriff auf Konfigurationseinstellungen, die in der angegebenen Datei definiert sind.
}

// Definiert eine Funktion `view`, die eine View-Datei lädt und optional Daten an die View übergeben kann.
function view($viewName, array $data = []) {
   extract($data);
   $viewName = str_replace(".", DIRECTORY_SEPARATOR, $viewName);
   require base_path("views/{$viewName}.view.php");
}

function component($name, array $data = []) {
    if($data != null){
        extract($data);
    }

    require base_path("views/components/". str_replace(".", DIRECTORY_SEPARATOR, $name) . ".php");
}