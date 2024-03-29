<?php

spl_autoload_register(function ($class) {//spl_autoload_register() registriert eine Funktion, die automatisch aufgerufen wird, wenn eine Klasse instanziiert wird, die noch nicht definiert ist
    require BASE_PATH.str_replace('\\', DIRECTORY_SEPARATOR, $class) . ".php"; // str_replace ersetzt alle Vorkommen des Suchstrings durch den Ersetzungsstring. DIRECTORY_SEPARATOR ist eine Konstante, die den Verzeichnistrenner des Betriebssystems zurückgibt
});