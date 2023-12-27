<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Dashboard</h2>
    
    <?php

    session_start();
    include_once 'config.php'; // Stelle sicher, dass diese Datei die Konfigurationsdatei für die Datenbankverbindung korrekt einbindet

    // Abrufen der Aufgaben des angemeldeten Benutzers
    $user_id = $_SESSION['user_id']; // Stelle sicher, dass die Sitzung gestartet wurde
    $sql = "SELECT * FROM tasks WHERE user_id = ?"; // SQL-Abfrage, um Aufgaben des Benutzers abzurufen
    $stmt = $conn->prepare($sql); // Vorbereiten der SQL-Abfrage
    $stmt->bind_param('i', $user_id); // Binden des Benutzer-IDs als Parameter
    $stmt->execute(); // Ausführen der SQL-Abfrage
    $result = $stmt->get_result();  // Abrufen des Ergebnisses

    if ($result->num_rows > 0) {   // Überprüfen, ob Aufgaben vorhanden sind
        // Anzeigen der Aufgaben, falls vorhanden
        while ($row = $result->fetch_assoc()) {  // Schleife zur Anzeige der Aufgaben
            echo "<div>"; // Anfang des Div-Containers für jede Aufgabe
            echo "<h3>" . $row['title'] . "</h3>"; // Anzeigen des Titels der Aufgabe
            echo "<p>" . $row['description'] . "</p>"; // Anzeigen der Beschreibung der Aufgabe
            echo "<p>Fälligkeitsdatum: " . $row['due_date'] . "</p>"; // Anzeigen des Fälligkeitsdatums der Aufgabe
            echo "<a href='edit_task.php?id=" . $row['id'] . "'>Bearbeiten</a>"; // Link zum Bearbeiten der Aufgabe
            echo "<a href='delete_task.php?id=" . $row['id'] . "'>Löschen</a>"; // Link zum Löschen der Aufgabe
            echo "</div>"; // Ende des Div-Containers für jede Aufgabe
        }
    } else {
        echo "Keine Aufgaben gefunden."; // Ausgabe, falls keine Aufgaben vorhanden sind
    }
    

    $stmt->close(); // Schließen des vorbereiteten Statements
    $conn->close(); // Schließen der Datenbankverbindung
    ?>

    <br>
    <a href="add_task.php">Aufgabe hinzufügen</a> <!-- Link zum Hinzufügen einer Aufgabe -->
</body>
</html>
