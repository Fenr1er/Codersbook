<?php

// Definiert den Namespace, in dem sich die Klasse befindet.
namespace App\Core;

// Importiert die Closure-Klasse für die Verwendung von anonymen Funktionen.
use Closure;

// Die Application-Klasse dient als zentraler Punkt für die Anwendungslogik.
class Application
{
    // Eine statisch geschützte Variable, die eine Instanz der `Instance`-Klasse speichert.
    protected static Instance $instance;

    // Eine statische Methode zum Festlegen der `Instance`-Objekt.
    public static function setInstance(Instance $instance)
    {
        // Speichert das übergebene `Instance`-Objekt in der statischen `$instance`-Variable der Klasse.
        self::$instance = $instance;
    }

    // Eine statische Methode zum Binden eines Schlüssels an eine Closure oder Funktion.
    public static function bind(string $key, Closure $resolver)
    {
        // Ruft die `bind`-Methode des `Instance`-Objekts auf, um einen Schlüssel an eine Closure zu binden.
        self::$instance->bind($key, $resolver);
    }
}
