<?php

// Legt fest, dass dieser Code im 'App\Core' Bereich des Projekts ist.
namespace App\Core;

// Importiert die benötigten Klassen.
use ArrayObject;
use InvalidArgumentException;

// `RouteCollection` ist eine spezielle Art von Array, das für Routen verwendet wird.
class RouteCollection extends ArrayObject
{
    // Der Konstruktor wird aufgerufen, wenn eine neue `RouteCollection` erstellt wird.
    public function __construct(array $items = [])
    {
        // Geht jedes Element in dem übergebenen Array durch.
        foreach ($items as $item) {
            // Überprüft, ob jedes Element eine Instanz von `Route` ist.
            $this->validate($item);
        }
    }

    // Eine geschützte Methode, die überprüft, ob ein Wert eine Instanz von `Route` ist.
    protected function validate($value): void
    {
        if (!$value instanceof Route) {
            // Wenn nicht, wird eine Exception geworfen.
            throw new InvalidArgumentException('Not an instance of Route!');
        }
    }

    // Fügt einen neuen Wert zur Sammlung hinzu.
    public function append($value): void
    {
        // Überprüft den Wert, bevor er hinzugefügt wird.
        $this->validate($value);
        // Fügt den Wert zur Sammlung hinzu, indem die `append` Methode der Elternklasse (`ArrayObject`) aufgerufen wird.
        parent::append($value);
    }

    // Setzt einen Wert an einer bestimmten Stelle in der Sammlung.
    public function offsetSet($key, $value): void
    {
        // Überprüft den Wert, bevor er gesetzt wird.
        $this->validate($value);
        // Ruft die `offsetSet` Methode der Elternklasse auf, um den Wert zu setzen.
        parent::offsetSet($key, $value);
    }
}
