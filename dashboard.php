<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Dashboard</h2>
    
    <?php

    session_start();
    include_once 'config.php'; // Assicurati che questa includa correttamente il file di configurazione del database

    // Ottieni le task dell'utente loggato
    $user_id = $_SESSION['user_id']; // Assicurati che la sessione sia avviata
    $sql = "SELECT * FROM tasks WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Mostra le task
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<p>Scadenza: " . $row['due_date'] . "</p>";
            echo "<a href='edit_task.php?id=" . $row['id'] . "'>Modifica</a>";
            echo "<a href='delete_task.php?id=" . $row['id'] . "'>Cancella</a>";
            echo "</div>";
        }
    } else {
        echo "Nessuna task trovata.";
    }

    $stmt->close();
    $conn->close();
    ?>

    <br>
    <a href="add_task.php">Aggiungi Task</a>
</body>
</html>
