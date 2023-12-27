<?php
session_start();
include_once 'config.php'; // Stelle sicher, dass diese Zeile die Konfigurationsdatei für die Datenbankverbindung korrekt einbindet

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $task_id = $_GET['id']; // Hole die ID der Aufgabe aus der GET-Anfrage

    // Führe die Abfrage durch, um die Details der ausgewählten Aufgabe zu erhalten
    $sql = "SELECT * FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $task_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $task = $result->fetch_assoc(); // Hole die Details der Aufgabe
        // Hier kannst du ein Formular anzeigen, um die Details der Aufgabe zu bearbeiten
        // Beispiel:
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Aufgabe bearbeiten</title>
            <link rel="stylesheet" href="/todolist_php/css/edit_task.css">
        </head>
        <body>
            <h2>Aufgabe bearbeiten</h2>
            <form action="update_task.php" method="POST">
                <!-- Felder zum Bearbeiten der Aufgaben -->
                <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                <label for="title">Titel:</label><br>
                <input type="text" id="title" name="title" value="<?php echo $task['title']; ?>"><br>
                <label for="description">Beschreibung:</label><br>
                <textarea id="description" name="description"><?php echo $task['description']; ?></textarea><br>
                <label for="due_date">Fälligkeitsdatum:</label><br>
                <input type="date" id="due_date" name="due_date" value="<?php echo $task['due_date']; ?>"><br><br>
                <input type="submit" value="Änderungen speichern">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Aufgabe nicht gefunden.";
    }

    $stmt->close(); // Schließe das vorbereitete Statement
    $conn->close(); // Schließe die Datenbankverbindung
} else {
    header("Location: dashboard.php");
    exit();
}
?>
