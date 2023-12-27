<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmeldung</title>
    <link rel="stylesheet" href="/todolist_php/css/login_style.css">
</head>
<body>
    <h2>Benutzeranmeldung</h2>
    <form action="process_login.php" method="POST">
        <label for="email">E-Mail:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Passwort:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Anmelden">
    </form>
    <p>Noch kein Konto? <a href="register.php">Registrieren</a></p>
</body>
</html>
