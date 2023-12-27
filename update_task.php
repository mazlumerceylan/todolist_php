<?php
session_start();
include_once 'config.php'; // Stelle sicher, dass diese Zeile die Konfigurationsdatei für die Datenbankverbindung korrekt einbindet

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_id = $_POST['task_id']; // Hole die ID der zu aktualisierenden Aufgabe aus dem Formular
    $title = $_POST['title']; // Hole den aktualisierten Titel der Aufgabe aus dem Formular
    $description = $_POST['description']; // Hole die aktualisierte Beschreibung der Aufgabe aus dem Formular
    $due_date = $_POST['due_date']; // Hole das aktualisierte Fälligkeitsdatum der Aufgabe aus dem Formular

    // Aktualisiere die Details der Aufgabe in der Datenbank
    $sql = "UPDATE tasks SET title = ?, description = ?, due_date = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $title, $description, $due_date, $task_id);
    
    if ($stmt->execute()) {
        header("Location: dashboard.php"); // Weiterleitung zur Dashboard-Seite nach erfolgreicher Aktualisierung
        exit();
    } else {
        echo "Fehler beim Aktualisieren der Aufgabe: " . $conn->error;
    }
    $stmt->close(); // Schließe das vorbereitete Statement
    $conn->close(); // Schließe die Datenbankverbindung
} else {
    header("Location: dashboard.php");
    exit();
}
?>
