<?php
session_start();
include_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hier kannst du die Datenvalidierung hinzufügen

    // Aktualisierung der Daten in der Datenbank
    $sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param('ssssi', $first_name, $last_name, $email, $hashed_password, $user_id);
    $stmt->execute();

    // Überprüfe, ob die Aktualisierung erfolgreich war
    if ($stmt->affected_rows > 0) {
        $message = "Deine Daten wurden erfolgreich aktualisiert.";
    } else {
        $message = "Keine Änderungen vorgenommen.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daten bearbeiten</title>
    <link rel="stylesheet" href="change_data.css">
</head>
<body>
    <h2>Daten bearbeiten</h2>
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
        <a href="dashboard.php">Zurück zum Dashboard</a>
    <?php else : ?>
        <form action="change_data.php" method="POST">
            <label for="first_name">Vorname:</label><br>
            <input type="text" id="first_name" name="first_name" required><br>

            <label for="last_name">Nachname:</label><br>
            <input type="text" id="last_name" name="last_name" required><br>

            <label for="email">E-Mail:</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Neues Passwort:</label><br>
            <input type="password" id="password" name="password"><br>

            <input type="submit" value="Änderungen speichern">
        </form>
    <?php endif; ?>
</body>
</html>
