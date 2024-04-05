<?php

// Der Namespace, der angibt, wo diese Klasse im Projektstruktur eingeordnet ist.
//! Nur den pfad angeben, wo die Klasse liegt
namespace App\Core;

// Importiert die Closure-Klasse für die Verwendung von anonymen Funktionen in PHP.
//! Closure einfacheres arbeiten mit anonymen Funktionen.
use Closure;

// Importiert die Exception-Klasse, die für die Fehlerbehandlung genutzt wird.
//! Excwption Klasse für Fehlerbehandlung
use Exception;

// Die Klasse `Instance` dient zum Verwalten von Bindungen zwischen Schlüsseln und den dazugehörigen Ressourcen oder Funktionen.
class Instance
{
    // Ein Array, das die Bindungen speichert. Die Schlüssel sind die Namen der Ressourcen oder Dienste.
    //! Array welches die Daten enhält die an die Instanz gebunden werden.
    protected $bindings = [];

    // Diese Methode bindet einen Schlüssel an eine Ressource oder Funktion.

    public function bind(string $key, Closure $resolver)
    {
        // Speichert die übergebene Closure (anonyme Funktion) unter dem angegebenen Schlüssel im Bindungsarray.
        $this->bindings[$key] = $resolver;
    }

    // Löst eine Bindung basierend auf dem gegebenen Schlüssel auf und gibt das Ergebnis zurück.
    //! Auflösen der bindings und deren Fuktionen.
    public function resolve(string $key)
    {
        // Überprüft, ob der Schlüssel im Bindungsarray vorhanden ist.
        if (!array_key_exists($key, $this->bindings)) {
            // Wirft eine Exception, falls kein Eintrag unter diesem Schlüssel existiert.
            throw new Exception("No match found for {$key}");
        }

        // Ruft die der Schlüsselbindung zugeordnete Closure (Funktion) auf und gibt deren Ergebnis zurück.
        return call_user_func($this->bindings[$key]);
    }
}
