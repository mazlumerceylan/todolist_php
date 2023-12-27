<?php
session_start(); // Sitzung starten

include_once 'config.php'; // Einbindung der Konfigurationsdatei

// Überprüfen, ob der Benutzer angemeldet ist, andernfalls zur Anmeldeseite umleiten
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Verarbeitung der Änderungen an den Benutzerdaten
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Beachte: Passwortänderungen erfordern möglicherweise zusätzliche Logik zur Überprüfung und Hashing

    // Hier die entsprechenden SQL-Statements für die Aktualisierung der Benutzerdaten
    // Zum Beispiel: 
    // $sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, password = ? WHERE id = ?";
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param('ssssi', $first_name, $last_name, $email, $hashed_password, $user_id);
    // ...

    // Annahme: Die Aktualisierung der Daten war erfolgreich
    $message = "Die Änderungen wurden erfolgreich gespeichert.";
} else {
    // Wenn keine POST-Anfrage gesendet wurde, den Benutzer zur Modifikationsseite zurückleiten
    header("Location: change_data.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daten bearbeiten</title>
</head>
<body>
    <h2>Daten bearbeiten</h2>
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
        <a href="dashboard.php">Zurück zum Dashboard</a>
    <?php else : ?>
        <p>Es gab ein Problem beim Speichern der Änderungen.</p>
        <a href="change_data.php">Zurück</a>
    <?php endif; ?>
</body>
</html>
