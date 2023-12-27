<?php
session_start(); // Stelle die Sitzung

include_once 'config.php'; // Einbindung der Konfigurationsdatei

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; // ID des aktuellen Benutzers
    $title = $_POST['title']; // Titel der Aufgabe
    $description = $_POST['description']; // Beschreibung der Aufgabe
    $due_date = $_POST['due_date']; // Fälligkeitsdatum der Aufgabe

    $sql = "INSERT INTO tasks (user_id, title, description, due_date) VALUES (?, ?, ?, ?)"; // SQL-Anweisung zum Einfügen einer Aufgabe
    $stmt = $conn->prepare($sql); // Vorbereiten der SQL-Anweisung
    $stmt->bind_param('isss', $user_id, $title, $description, $due_date); // Binden der Parameter

    if ($stmt->execute()) { // Überprüfen, ob die Aufgabe erfolgreich hinzugefügt wurde
        echo "Aufgabe erfolgreich hinzugefügt. <a href='add_task.php'>Eine weitere Aufgabe hinzufügen</a> | <a href='dashboard.php'>Zurück zur Dashboard</a>";
    } else {
        echo "Fehler beim Hinzufügen der Aufgabe: " . $conn->error; // Fehlermeldung bei einem Problem beim Hinzufügen der Aufgabe
    }
    $stmt->close(); // Schließen des vorbereiteten Statements
} else {
    header("Location: add_task.php"); // Weiterleitung zur Seite für die Aufgabenerstellung
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/todolist_php/css/processed_tasks.css">
</head>
<body>
    
</body>
</html>