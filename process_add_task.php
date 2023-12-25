<?php
session_start(); // Stelle die Sitzung

include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; // ID des aktuellen Benutzers
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];

    $sql = "INSERT INTO tasks (user_id, title, description, due_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isss', $user_id, $title, $description, $due_date);

    if ($stmt->execute()) {
        echo "Aufgabe erfolgreich hinzugefügt. <a href='add_task.php'>Eine weitere Aufgabe hinzufügen</a>";
    } else {
        echo "Fehler beim Hinzufügen der Aufgabe: " . $conn->error;
    }
    $stmt->close();
} else {
    header("Location: add_task.php");
    exit();
}
?>
