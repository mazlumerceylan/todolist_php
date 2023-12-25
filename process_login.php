<?php
session_start();
include_once 'config.php'; // Stelle sicher, dass diese Zeile die Konfigurationsdatei für die Datenbankverbindung korrekt einbindet

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Überprüfung der Anmeldeinformationen in der Datenbank
    $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
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
