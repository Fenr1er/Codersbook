<?php

// Der Namespace legt fest, in welchem Bereich des Projekts die Klasse sich befindet.
namespace App\Core;

// Import der Closure-Klasse für die Verwendung von anonymen Funktionen in PHP.
use Closure;

// Die Application-Klasse fungiert als zentraler Punkt der Anwendungslogik.
class Application
{
    // Eine statisch geschützte Variable, um eine Instanz der `Instance`-Klasse zu speichern.
    // Diese Instanz wird für das Management von Abhängigkeiten in der Anwendung verwendet.
    protected static Instance $instance;
    
    // Eine statische Methode zum Festlegen der `Instance`-Objektinstanz.
    // Diese Methode ermöglicht es, die zentrale Instanz von außerhalb zu definieren und zu steuern.
    public static function setInstance(Instance $instance)
    {
        // Das übergebene `Instance`-Objekt wird in der statischen Variable `$instance` gespeichert.
        // Dadurch wird es möglich, auf die gleiche Instanz von überall in der Anwendung zuzugreifen.
        self::$instance = $instance;
    }

    // Eine statische Methode, um einen Schlüssel an eine Closure oder Funktion zu binden.
    // Diese Methode ist nützlich für die Abhängigkeitsinjektion und Konfiguration von Diensten.
    public static function bind(string $key, Closure $resolver)
    {
        // Nutzt die `bind`-Methode des `Instance`-Objekts, um die Bindung durchzuführen.
        // Dieser Vorgang registriert eine gegebene Funktion oder Closure unter einem Schlüssel in der Instanz.
        self::$instance->bind($key, $resolver);
    }
}
