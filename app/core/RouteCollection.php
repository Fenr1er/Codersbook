<?php

namespace App\Core;

use ArrayObject;
use InvalidArgumentException;

class RouteCollection extends ArrayObject
{
    public function __construct(array $items = [])
    {
        foreach ($items as $item) {
            $this->validate($item);
        }
    }

    protected function validate($value): void
    {
        if (!$value instanceof Route) {
            throw new InvalidArgumentException('Not an instance of Route!');
        }
    }

    public function append($value): void
    {
        $this->validate($value);
        parent::append($value); //parent ist ein Schlüsselwort, das verwendet wird, um auf die Eigenschaften und Methoden einer Elternklasse zuzugreifen, :: ist ein Operator, der verwendet wird, um auf eine statische Eigenschaft oder Methode zuzugreifen, append ist eine Methode, die verwendet wird, um ein Element an das Ende eines Arrays anzuhängen, $value ist eine Eigenschaft, die auf die Klasse angewendet wird, $value ist eine Eigenschaft, die auf die Klasse angewendet wird, $value ist eine Eigenschaft, die auf die Klasse angewendet wird, $value ist eine Eigenschaft, die auf die Klasse angewendet wird.
    }

    public function offsetSet($key, $value): void
    {
        $this->validate($value);
        parent::offsetSet($key, $value);
    }
}
