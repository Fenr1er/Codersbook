# PHP Web Application Core

Dieses Repository enthält den Kern einer PHP-Webanwendung, der grundlegende Funktionen wie Routing, Datenbankzugriff und Anwendungslogik bereitstellt.

## Komponenten

Die Hauptkomponenten des Systems sind:

- `Router`: Verwaltet die Routen der Webanwendung und leitet HTTP-Anfragen an die entsprechenden Controller und Methoden weiter.
- `Route`: Definiert eine einzelne Route, einschließlich URI-Pfad, HTTP-Methode, zugehörigem Controller und Methode (Closure).
- `RouteCollection`: Eine Sammlung, die alle Route-Objekte speichert und verwaltet.
- `Database`: Stellt Verbindung zur Datenbank her und führt SQL-Abfragen aus.
- `Instance`: Dient als Container zur Verwaltung von Diensten und Abhängigkeiten innerhalb der Anwendung.
- `Application`: Der zentrale Punkt der Anwendung, der die Hauptinstanz und die Dienstbindungen verwaltet.

## Setup

Um die Komponenten in Ihrer Anwendung zu verwenden, müssen Sie sicherstellen, dass Ihr Projekt korrekt konfiguriert ist.

1. Namespace:
   Alle Klassen befinden sich im `App\Core`-Namespace, was bei der Integration in Ihr Projekt zu beachten ist.

2. Autoloading:
   Nutzen Sie Composer oder ein ähnliches Tool für das Autoloading, um sicherzustellen, dass die Klassen automatisch geladen werden können.

3. Konfiguration:
   Einrichten der `config`-Funktion und der `BASE_PATH`-Konstante, um auf Konfigurationsdateien und Ressourcenpfade zugreifen zu können.

4. Datenbank:
   Konfigurieren Sie Ihre Datenbankverbindungen in einer `database`-Konfigurationsdatei, die von der `Database`-Klasse verwendet wird.

## Verwendung

Nachdem Sie die Grundkonfiguration abgeschlossen haben, können Sie die Funktionalitäten wie folgt nutzen:

- Definieren Sie Routen in Ihrem Router und binden Sie diese an Controller.
- Verwenden Sie die `Database`-Klasse für Datenbankoperationen.
- Nutzen Sie die `Instance`-Klasse, um Dienste zentral zu registrieren und aufzulösen.
- Initialisieren Sie die `Application`-Klasse am Anfang Ihres Projekts, um eine zentrale Verwaltung zu ermöglichen.

## Weiterentwicklung

Dieses Core-System bietet eine solide Basis für die Entwicklung einer PHP-Webanwendung. Sie können es erweitern, indem Sie zusätzliche Funktionen und Komponenten integrieren, die für Ihr spezifisches Projekt erforderlich sind.
