<?php

// Gibt an, in welchem Teil des Projekts die Klasse liegt.
namespace App\Core;

// Importiert die Closure-Klasse, die für anonyme Funktionen in PHP verwendet wird.
use Closure;

// Importiert die Exception-Klasse für Fehlerbehandlung.
use Exception;

// Die Klasse Instance verwaltet Bindungen von Schlüsseln zu Ressourcen oder Funktionen.
class Instance
{
    // Ein Array, um Bindungen zu speichern. Schlüssel sind die Namen der Ressourcen oder Dienste.
    protected $bindings = [];
    
    // Bindet einen Schlüssel an eine Funktion oder Ressource.
    public function bind(String $key, Closure $resolver){
        // Speichert die übergebene Closure unter dem angegebenen Schlüssel im Bindungsarray.
        $this->bindings[$key] = $resolver;
    }

    // Löst eine Bindung basierend auf dem Schlüssel auf und gibt das Ergebnis zurück.
    public function resolve(String $key){
        // Überprüft, ob der Schlüssel im Bindungsarray existiert.
        if (!array_key_exists($key, $this->bindings)) {
            // Wenn der Schlüssel nicht existiert, wird eine Exception geworfen.
            throw new Exception("No match found for {$key}");
        }

        // Ruft die Funktion auf, die dem Schlüssel zugeordnet ist, und gibt das Ergebnis zurück.
        return call_user_func($this->bindings[$key]);
    }
}
