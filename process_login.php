<?php
session_start();
include_once 'config.php'; // Assicurati che questa riga includa correttamente il file di configurazione del database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verifica delle credenziali nel database
    $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id']; // Imposta la sessione per l'utente loggato
            header("Location: dashboard.php"); // Reindirizza dopo il login
            exit();
        } else {
            echo "Password non valida.";
        }
    } else {
        echo "Utente non trovato.";
    }
    $stmt->close();
} else {
    header("Location: login.php"); // Se l'accesso non è tramite metodo POST, reindirizza
    exit();
}
?>
