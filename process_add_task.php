<?php
include_once 'config.php'; // Stelle sicher, dass diese Zeile die Konfigurationsdatei für die Datenbankverbindung korrekt einbindet

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];

    $sql = "INSERT INTO tasks (title, description, due_date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $title, $description, $due_date);
    
    if ($stmt->execute()) {
        echo "Aufgabe erfolgreich hinzugefügt. <a href='add_task.php'>Eine weitere Aufgabe hinzufügen</a>";
    } else {
        echo "Fehler beim Hinzufügen der Aufgabe: " . $conn->error;
    }
    $stmt->close();
} else {
    header("Location: add_task.php"); // Wenn der Zugriff nicht über die POST-Methode erfolgt, leite um
    exit();
}
?>
