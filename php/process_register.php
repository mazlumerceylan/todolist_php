<?php
include_once 'config.php'; // Stelle sicher, dass diese Zeile die Konfigurationsdatei für die Datenbankverbindung korrekt einbindet

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash des Passworts für die Sicherheit

    // Überprüfen, ob die E-Mail bereits in der Datenbank registriert ist
    $sql_check = "SELECT id FROM users WHERE email = ? LIMIT 1";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param('s', $email);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows == 0) {
        // Wenn die E-Mail noch nicht registriert ist, fahre mit der Registrierung fort
        $sql_register = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
        $stmt_register = $conn->prepare($sql_register);
        $stmt_register->bind_param('ssss', $first_name, $last_name, $email, $password);
        if ($stmt_register->execute()) {
            echo "Registrierung erfolgreich abgeschlossen. <a href='login.php'>Anmelden</a>";
        } else {
            echo "Fehler bei der Registrierung: " . $conn->error;
        }
        $stmt_register->close();
    } else {
        echo "Diese E-Mail ist bereits registriert.";
    }
    $stmt_check->close();
} else {
    header("Location: register.php"); // Wenn der Zugriff nicht über die POST-Methode erfolgt, leite um
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/todolist_php/css/register_processed.css">
</head>
<body>
    
</body>
</html>