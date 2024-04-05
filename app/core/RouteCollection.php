<?php

// Gibt an, dass dieser Code im Namespace 'App\Core' gehört, was für die Organisation des Projekts hilft.
namespace App\Core;

// Importiert die notwendigen Standardklassen aus PHP.
use ArrayObject;
use InvalidArgumentException;

// `RouteCollection` ist eine Sammlung, die speziell für das Speichern von Routenobjekten entwickelt wurde.
class RouteCollection extends ArrayObject
{
    // Konstruktor der Klasse, der beim Erstellen eines neuen `RouteCollection`-Objekts aufgerufen wird.
    public function __construct(array $items = [])
    {
        // Durchläuft jedes Element im übergebenen Array.
        foreach ($items as $item) {
            // Überprüft, ob jedes Element eine Instanz der `Route`-Klasse ist.
            $this->validate($item);
        }
    }

    // Geschützte Methode, die sicherstellt, dass ein übergebener Wert eine Instanz von `Route` ist.
    protected function validate($value): void
    {
        // Wirft eine Exception, wenn der Wert keine Instanz von `Route` ist.
        if (!$value instanceof Route) {
            throw new InvalidArgumentException('Not an instance of Route!');
        }
    }

    // Methode, um ein Element zur Sammlung hinzuzufügen.
    public function append($value): void
    {
        // Validiert das hinzuzufügende Element.
        $this->validate($value);
        // Fügt das Element zur Sammlung hinzu, indem die `append` Methode der Basisklasse `ArrayObject` aufgerufen wird.
        parent::append($value);
    }

    // Setzt ein Element an einer bestimmten Stelle in der Sammlung.
    public function offsetSet($key, $value): void
    {
        // Validiert das zu setzende Element.
        $this->validate($value);
        // Ruft die `offsetSet` Methode der Basisklasse auf, um das Element an der angegebenen Stelle zu setzen.
        parent::offsetSet($key, $value);
    }
}

