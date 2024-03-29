<?php

// Der Namespace für die Klassendefinition.
namespace App\Core;

// Verwendet die PDO-Klasse für die Datenbankverbindung.
use PDO;
// Verwendet die PDOStatement-Klasse für die Vorbereitung und Ausführung von SQL-Anweisungen.
use PDOStatement;

// Die Database-Klasse verwaltet die Verbindung zur Datenbank und führt SQL-Anweisungen aus.
class Database
{
    // Speichert die PDO-Instanz.
    private PDO|null $pdo = null;

    // Wird verwendet, um vorbereitete Anweisungen zu speichern und auszuführen.
    private PDOStatement $statement;

    // Der Konstruktor erstellt die Datenbankverbindung.
    public function __construct()
    {
        // Lädt die Datenbankkonfiguration.
        $config = config("database");

        // Erstellt den DSN-String basierend auf der Konfiguration.
        $dsn = $config['db'] . ":" . http_build_query($config, '', ';');

        try {
            // Versucht, eine neue PDO-Instanz zu erstellen.
            $this->pdo = new PDO($dsn, options: [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // Setzt den Standard-Fetch-Modus auf Objekt.
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Setzt den Error-Modus, um Exceptions zu werfen.
            ]);
        } catch (\PDOException $e) {
            // Zeigt den Fehler an, wenn die Verbindung fehlschlägt.
            dd($e->getMessage());
        }
    }

    // Bereitet eine SQL-Anfrage vor und führt sie aus.
    public function query(string $query, $params = [])
    {
        if ($this->pdo != null) {
            $this->statement = $this->pdo->prepare($query); // Bereitet die SQL-Anweisung vor.
            $this->statement->execute($params); // Führt die Anweisung mit den übergebenen Parametern aus.
            return $this;
        }
    }

    // Holt das erste Ergebnis einer Anfrage.
    public function find()
    {
        $data = $this->statement->fetch(); // Holt das nächste Ergebnis der Anfrage.
        $this->close(); // Schließt die Datenbankverbindung.
        return $data; // Gibt das Ergebnis zurück.
    }

    // Holt alle Ergebnisse einer Anfrage.
    public function all()
    {
        $data = $this->statement->fetchAll(); // Holt alle Ergebnisse der Anfrage.
        $this->close(); // Schließt die Datenbankverbindung.
        return $data; // Gibt die Ergebnisse zurück.
    }

    // Gibt die ID des zuletzt eingefügten Eintrags zurück.
    public function lastInsertId()
    {
        $data = $this->pdo->lastInsertId(); // Holt die ID des zuletzt eingefügten Eintrags.
        $this->close(); // Schließt die Datenbankverbindung.
        return $data; // Gibt die ID zurück.
    }

    // Schließt die Datenbankverbindung.
    public function close(){
        if ($this->pdo != null) {
            $this->pdo = null; // Setzt die PDO-Instanz auf null, um die Verbindung zu schließen.
        }
    }
}
