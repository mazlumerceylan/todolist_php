<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regiestrieren</title>
</head>
<body>
    <h2>Benutzerregistrierung</h2>
    <form action="process_register.php" method="POST">
        <label for="first_name">Vorname:</label><br>
        <input type="text" id="first_name" name="first_name" required><br>
        <label for="last_name">Nachname:</label><br>
        <input type="text" id="last_name" name="last_name" required><br>
        <label for="email">E-Mail:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Passwort:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Registrieren">
    </form>
</body>
</html>