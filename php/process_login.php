<?php
session_start(); // Starte die Sitzung
include_once 'config.php'; // Einbindung der Datenbank-Konfigurationsdatei

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email']; // E-Mail vom Formular übergeben
    $password = $_POST['password'];  // Passwort vom Formular übergeben

    // Überprüfung der Anmeldeinformationen in der Datenbank
    $sql = "SELECT * FROM users WHERE email = ? LIMIT 1"; // SQL-Abfrage, um den Benutzer anhand der E-Mail zu finden
    $stmt = $conn->prepare($sql); // Vorbereiten der SQL-Abfrage
    $stmt->bind_param('s', $email); // Binden des Parameters
    $stmt->execute(); // Ausführung der SQL-Abfrag
    $result = $stmt->get_result(); // Abrufen des Abfrageergebnisses

    if ($result->num_rows == 1) { // Überprüfen, ob ein Benutzer mit der E-Mail gefunden wurde
        $row = $result->fetch_assoc(); // Abrufen der Benutzerdaten
        if (password_verify($password, $row['password'])) { // Überprüfen des Passworts
            $_SESSION['user_id'] = $row['id']; // Setze die Sitzung für den eingeloggten Benutzer
            header("Location: dashboard.php"); // Weiterleitung nach dem Login
            exit();
        } else {
            echo "Ungültiges Passwort.";
        }
    } else {
        echo "Benutzer nicht gefunden.";
    }
    $stmt->close();
} else {
    header("Location: login.php"); // Wenn der Zugriff nicht per POST-Methode erfolgt, leite weiter
    exit();
}
?>
