<?php
session_start();
include_once 'config.php'; // Einbinden der Konfigurationsdatei für die Datenbankverbindung

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $user_id = $_SESSION['user_id']; // Abrufen der Benutzer-ID aus der Session

    // Vorbereiten des Einfügens der neuen Aufgabe in die Datenbank
    $sql = "INSERT INTO tasks (user_id, title, description, deadline) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isss', $user_id, $title, $description, $deadline);
    
    if ($stmt->execute()) {
        header("Location: dashboard.php"); // Weiterleitung nach Hinzufügen der Aufgabe
        exit();
    } else {
        echo "Fehler beim Hinzufügen der Aufgabe: " . $conn->error;
    }
    $stmt->close();
} else {
    header("Location: add_task.php"); // Wenn Zugriff nicht über POST-Methode erfolgt, weiterleiten
    exit();
}
?>
