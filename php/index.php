<?php
session_start(); // Sitzung starten

include_once 'config.php'; // Einbindung der Konfigurationsdatei für die Datenbankverbindung

// Überprüfen, ob das Login-Formular gesendet wurde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ...Authentifizierungscode (nicht mitgeliefert)...
    // Wenn die Authentifizierung erfolgreich ist, wird der Benutzer zur dashboard.php weitergeleitet
    // Andernfalls werden Fehlermeldungen angezeigt
}


// Wenn der Benutzer bereits authentifiziert ist, leite ihn zur dashboard.php um
if (isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dein ToDo-Liste</title>
</head>
<body>
    <h2>Login</h2>
    <!-- Form login -->

    <form action="login.php" method="post">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" value="Login">
    </form>

    <p>Noch kein Konto?<a href="register.php">Registrieren</a></p>

</body>
</html>
