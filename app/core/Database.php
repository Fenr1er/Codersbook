<?php

// Legt fest, dass diese Klasse im Namespace 'App\Core' ist, der Teil der Kernlogik der Anwendung ist.
namespace App\Core;

// Importiert die PDO-Klasse für Datenbankverbindungen.
use PDO;
// Importiert die PDOStatement-Klasse für die Ausführung von SQL-Anweisungen.
use PDOStatement;

// Die Database-Klasse ist verantwortlich für die Verbindung zur Datenbank und deren Interaktionen.
class Database
{
    // Speichert die Verbindungsinstanz zur Datenbank.
    private PDO|null $pdo = null;

    // Wird verwendet, um vorbereitete SQL-Anweisungen zu speichern.
    private PDOStatement $statement;

    // Der Konstruktor initialisiert die Datenbankverbindung.
    public function __construct()
    {
        // Lädt die Konfiguration für die Datenbank aus einer Konfigurationsdatei.
        $config = config("database");

        // Erstellt den Data Source Name (DSN) für die PDO-Verbindung aus der Konfiguration.
        $dsn = $config['db'] . ":" . http_build_query($config, '', ';');

        try {
            // Erstellt eine neue PDO-Instanz für die Datenbankverbindung.
            $this->pdo = new PDO($dsn, options: [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // Legt den Standard-Fetch-Modus fest.
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Aktiviert Exceptions für Fehlermeldungen.
            ]);
        } catch (\PDOException $e) {
            // Zeigt eine Fehlermeldung an, wenn die Verbindung fehlschlägt.
            dd($e->getMessage());
        }
    }

    // Führt eine SQL-Anfrage aus und bereitet sie vor.
    public function query(string $query, $params = [])
    {
        // Prüft, ob eine PDO-Verbindung besteht.
        if ($this->pdo != null) {
            // Bereitet die SQL-Anweisung vor.
            $this->statement = $this->pdo->prepare($query);
            // Führt die Anweisung mit den gegebenen Parametern aus.
            $this->statement->execute($params);
            return $this;
        }
    }

    // Holt das erste Ergebnis einer SQL-Anfrage.
    public function find()
    {
        // Holt das erste Ergebnis der Anfrage.
        $data = $this->statement->fetch();
        // Schließt die Datenbankverbindung.
        $this->close();
        return $data;
    }

    // Holt alle Ergebnisse einer SQL-Anfrage.
    public function all()
    {
        // Holt alle Ergebnisse der Anfrage.
        $data = $this->statement->fetchAll();
        // Schließt die Datenbankverbindung.
        $this->close();
        return $data;
    }

    // Gibt die ID des zuletzt eingefügten Datensatzes zurück.
    public function lastInsertId()
    {
        // Holt die letzte eingefügte ID aus der Datenbank.
        $data = $this->pdo->lastInsertId();
        // Schließt die Datenbankverbindung.
        $this->close();
        return $data;
    }

    // Schließt die Verbindung zur Datenbank.
    public function close()
    {
        // Setzt die PDO-Instanz auf null, um die Verbindung zu schließen.
        if ($this->pdo != null) {
            $this->pdo = null;
        }
    }
}
