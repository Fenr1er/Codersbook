<?php

namespace App\Core;

use Closure;

class Application
{
    protected static Instance $instance; //protected ist ein Zugriffsmodifizierer, der nur in der Klasse selbst und in abgeleiteten Klassen verwendet werden kann. static ist ein Schlüsselwort, das verwendet wird, um eine Eigenschaft oder Methode als statisch zu deklarieren. Das bedeutet, dass die Eigenschaft oder Methode auf die Klasse selbst und nicht auf eine Instanz der Klasse angewendet wird. 

    public static function setInstance(Instance $instance)
    {
        self::$instance = $instance; //self ist ein Schlüsselwort, das verwendet wird, um auf die Eigenschaften und Methoden einer Klasse zuzugreifen, ohne ein Objekt der Klasse zu instanziieren. $instance ist eine Eigenschaft, die auf die Klasse angewendet wird.
    }

    public static function bind(string $key, Closure $resover)
    {
        self::$instance->bind($key, $resover); //self ist ein Schlüsselwort, das verwendet wird, um auf die Eigenschaften und Methoden einer Klasse zuzugreifen, ohne ein Objekt der Klasse zu instanziieren. $instance ist eine Eigenschaft, die auf die Klasse angewendet wird, bind ist eine Methode, die verwendet wird, um eine Instanz zu binden, $key ist eine Eigenschaft, die auf die Klasse angewendet wird, $resover ist eine Eigenschaft, die auf die Klasse angewendet wird.
    }
}
