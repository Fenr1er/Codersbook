<?php










// ------------------ Constants ------------------

const BASE_PATH = __DIR__ . "/../"; // __DIR__ ist eine Konstante, die den Pfad des aktuellen Verzeichnisses zurückgibt



require BASE_PATH . "app/functions/helpers.php"; // require ist eine Funktion, die eine Datei einbindet, wenn sie nicht bereits eingebunden wurde
require BASE_PATH . "vendor/autoload.php";

use App\Core\Instance; // use wird verwendet, um eine Klasse zu importieren, die in einem anderen Namespace definiert ist, damit sie in diesem Namespace verwendet werden kann, ohne den vollständigen Namen der Klasse zu schreiben, Instance ist eine Klasse, die in einem anderen Namespace definiert ist.
use APP\Core\Application; // use wird verwendet, um eine Klasse zu importieren, die in einem anderen Namespace definiert ist, damit sie in diesem Namespace verwendet werden kann, ohne den vollständigen Namen der Klasse zu schreiben, Appliocaton ist eine Klasse, die in einem anderen Namespace definiert ist.
use APP\Core\Database;

session_start();

$instance = new Instance(); // new ist ein Operator, der verwendet wird, um ein Objekt zu instanziieren, Instance ist eine Klasse, die instanziiert wird.
Application::setInstance($instance); // Application ist eine Klasse, die verwendet wird, um eine Instanz zu setzen, $instance ist eine Eigenschaft, die auf die Klasse angewendet wird, setInstance ist eine Methode, die verwendet wird, um eine Instanz zu setzen, :: ist ein Operator, der verwendet wird, um auf eine statische Eigenschaft oder Methode zuzugreifen, $instance ist eine Eigenschaft, die auf die Klasse angewendet wird, $instance ist eine Eigenschaft, die auf die Klasse angewendet wird.

Application::bind(Database::class, function() {//Application ist eine Klasse, die verwendet wird, um eine Instanz zu setzen, Database ist eine Klasse, die verwendet wird, um eine Datenbank zu binden, :: ist ein Operator, der verwendet wird, um auf eine statische Eigenschaft oder Methode zuzugreifen, bind ist eine Methode, die verwendet wird, um eine Instanz zu binden, Database::class ist eine Eigenschaft, die auf die Klasse angewendet wird, function() ist eine anonyme Funktion, die verwendet wird, um eine Funktion zu erstellen und sie als Argument an eine andere Funktion zu übergeben oder sie als Rückgabewert zurückzugeben oder sie in Variablen zu speichern und sie zu verwenden oder zu übergeben oder zu speichern, :: ist ein Operator, der verwendet wird, um auf eine statische Eigenschaft oder Methode zuzugreifen, $instance ist eine Eigenschaft, die auf die Klasse angewendet wird, $instance ist eine Eigenschaft, die auf die Klasse angewendet wird, $instance ist eine Eigenschaft, die auf die Klasse angewendet wird.
    return new Database();
});

require BASE_PATH . "routes/routes.php"; // require ist eine Funktion, die eine Datei einbindet, wenn sie nicht bereits eingebunden wurde, BASE_PATH ist eine Konstante, die den Pfad des aktuellen Verzeichnisses zurückgibt, routes ist eine Datei, die eingebunden wird, routes.php ist eine Datei, die eingebunden wird.