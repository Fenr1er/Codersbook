<?php

namespace App\Core;

use Closure; // Closure ist ein Objekt, das eine anonyme Funktion repräsentiert und es ermöglicht, Funktionen als Argumente an andere Funktionen zu übergeben oder sie als Rückgabewerte zurückzugeben oder sie in Variablen zu speichern und sie zu verwenden oder zu übergeben oder zu speichern 
use Exception; // Exception ist eine Klasse, die die Ausnahme repräsentiert, die von PHP oder von Benutzern erzeugt wird 

class Instance
{
    protected $bindings = [];
    
    public function bind(String $key, Closure $resolver){
        $this->bindings[$key] = $resolver;
    }

    public function resolve(String $key){
        if (!array_key_exists($key, $this->bindings)) {//array_key_exists() prüft, ob ein Schlüssel in einem Array vorhanden ist oder nicht. Der Schlüssel wird als erster Parameter übergeben und das Array als zweiter Parameter.
            throw new Exception("No match found for {$key}");//throw wird verwendet, um eine Ausnahme zu erzeugen und zu werfen 
    }

    return call_user_func($this->bindings[$key]); // call_user_func() ruft eine Funktion mit den Argumenten auf, die in einem Array übergeben werden, und gibt das Ergebnis zurück.
    }
}
