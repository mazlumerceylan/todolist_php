<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/todolist_php/css/dashboard.css">
</head>
<body>
    <h2>Dashboard</h2>
    
    <?php

    session_start();
    include_once 'config.php'; // Stelle sicher, dass diese Datei die Konfigurationsdatei für die Datenbankverbindung korrekt einbindet

    // Abrufen der Aufgaben des angemeldeten Benutzers
    $user_id = $_SESSION['user_id']; // Stelle sicher, dass die Sitzung gestartet wurde
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
    $sql = "SELECT * FROM tasks WHERE user_id = ?"; // SQL-Abfrage, um Aufgaben des Benutzers abzurufen
    $stmt = $conn->prepare($sql); // Vorbereiten der SQL-Abfrage
    $stmt->bind_param('i', $user_id); // Binden des Benutzer-IDs als Parameter
    $stmt->execute(); // Ausführen der SQL-Abfrage
    $result = $stmt->get_result();  // Abrufen des Ergebnisses

    if ($result->num_rows > 0) {   // Überprüfen, ob Aufgaben vorhanden sind
        // Anzeigen der Aufgaben, falls vorhanden
        while ($row = $result->fetch_assoc()) {  // Schleife zur Anzeige der Aufgaben
            echo "<div>"; // Start des Containers für jede Aufgabe
            echo "<h3>" . $row['title'] . "</h3>"; // Titel der Aufgabe
            echo "<p>" . $row['description'] . "</p>"; // Beschreibung der Aufgabe
            echo "<p>Fälligkeitsdatum: " . $row['due_date'] . "</p>"; // Fälligkeitsdatum der Aufgabe
            echo "<div class='task-links'>"; // Start des Containers für die Links
            echo "<a href='edit_task.php?id=" . $row['id'] . "'>Bearbeiten</a>"; // Link zum Bearbeiten
            echo "<span></span>"; // Visueller Abstand zwischen den Links
            echo "<a href='delete_task.php?id=" . $row['id'] . "'>Löschen</a>"; // Link zum Löschen
            echo "</div>"; // Ende des Containers für die Links
            echo "</div>"; // Ende des Containers für jede Aufgabe

        }
    } else {
        echo "Keine Aufgaben gefunden."; // Ausgabe, falls keine Aufgaben vorhanden sind
    }
    

    $stmt->close(); // Schließen des vorbereiteten Statements
    $conn->close(); // Schließen der Datenbankverbindung
    ?>

    <br>
    <a href="add_task.php">Aufgabe hinzufügen</a> <!-- Link zum Hinzufügen einer Aufgabe -->
    
    <br>
    <a href="change_data.php">Ändern Sie Ihre Anmeldeinformationen</a>
    <br>
    <a href="login.php">Logout</a>

</body>
</html>
