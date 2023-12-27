<?php
session_start();
include_once 'config.php'; // Stelle sicher, dass diese Datei die Konfigurationsdatei für die Datenbankverbindung korrekt einbindet

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $task_id = $_GET['id']; // Erhalte die Aufgaben-ID aus der URL

    // Lösche die Aufgabe aus der Datenbank
    $sql = "DELETE FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $task_id);
    
    if ($stmt->execute()) {
        header("Location: dashboard.php"); // Nach dem Löschen zur Dashboard weiterleiten
        exit();
    } else {
        echo "Fehler beim Löschen der Aufgabe.";
    }

    $stmt->close(); // Schließe das vorbereitete Statement
    $conn->close(); // Schließe die Datenbankverbindung
} else {
    header("Location: dashboard.php"); // Zur Dashboard weiterleiten, falls keine Aufgaben-ID vorhanden ist oder die Anfrage nicht vom Typ GET ist
    exit();
}
?>
