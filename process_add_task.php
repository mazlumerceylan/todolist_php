<?php
session_start(); // Assicurati di avviare la sessione

include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; // ID dell'utente corrente
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];

    $sql = "INSERT INTO tasks (user_id, title, description, due_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isss', $user_id, $title, $description, $due_date);

    if ($stmt->execute()) {
        echo "Task aggiunta con successo. <a href='add_task.php'>Aggiungi un'altra task</a>";
    } else {
        echo "Errore durante l'aggiunta della task: " . $conn->error;
    }
    $stmt->close();
} else {
    header("Location: add_task.php");
    exit();
}
?>
