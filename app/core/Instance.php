<?php

// Der Namespace, der angibt, wo diese Klasse im Projektstruktur eingeordnet ist.
namespace App\Core;

// Importiert die Closure-Klasse für die Verwendung von anonymen Funktionen in PHP.
use Closure;

// Importiert die Exception-Klasse, die für die Fehlerbehandlung genutzt wird.
use Exception;

// Die Klasse `Instance` dient zum Verwalten von Bindungen zwischen Schlüsseln und den dazugehörigen Ressourcen oder Funktionen.
class Instance
{
    // Ein Array, das die Bindungen speichert. Die Schlüssel sind die Namen der Ressourcen oder Dienste.
    protected $bindings = [];
    
    // Diese Methode bindet einen Schlüssel an eine Ressource oder Funktion.
    public function bind(string $key, Closure $resolver)
    {
        // Speichert die übergebene Closure (anonyme Funktion) unter dem angegebenen Schlüssel im Bindungsarray.
        $this->bindings[$key] = $resolver;
    }

    // Löst eine Bindung basierend auf dem gegebenen Schlüssel auf und gibt das Ergebnis zurück.
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
