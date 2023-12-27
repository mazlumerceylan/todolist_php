<?php
session_start();

include_once 'config.php'; // Assicurati che questa includa correttamente il file di configurazione del database

// Controllo se il form di login è stato inviato
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ...codice di autenticazione già fornito...
    // Se l'autenticazione è corretta, l'utente verrà reindirizzato a dashboard.php
    // altrimenti verranno mostrati i messaggi di errore
}

// Se l'utente è già autenticato, reindirizzalo alla dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Il tuo Todolist</title>
</head>
<body>
    <h2>Login</h2>
    <!-- Form di login -->

    <form action="login.php" method="post">
        <!-- Campi di input per l'email e la password -->
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" value="Accedi">
    </form>

    <p>Non hai un account? <a href="register.php">Registrati</a></p>

</body>
</html>
