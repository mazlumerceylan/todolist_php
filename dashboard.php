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

    // Holen der Tasks des eingeloggten Benutzers
    $user_id = $_SESSION['user_id']; // Stelle sicher, dass die Sitzung gestartet wurde
    $sql = "SELECT * FROM tasks WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Zeige die Tasks an
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<p>Fälligkeitsdatum: " . $row['due_date'] . "</p>";
            echo "<a href='edit_task.php?id=" . $row['id'] . "'>Bearbeiten</a>";
            echo "<a href='delete_task.php?id=" . $row['id'] . "'>Löschen</a>";
            echo "</div>";
        }
    } else {
        echo "Keine Aufgaben gefunden.";
    }

    $stmt->close();
    $conn->close();
    ?>

    <br>
    <a href="add_task.php">Aufgabe hinzufügen</a>
</body>
</html>
