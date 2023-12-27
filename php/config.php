
<?php
$servername = "localhost"; // Servername: Name des Servers
$username = "todolist_db"; // Username der Datenbank: Benutzername der Datenbank
$password = "j9qrsltCaGp]vSXf"; // Passwort der Datenbank: Datenbankpasswort
$dbname = "todolist_db"; // Datenbankname: Name der Datenbank

// Verbindung zur Datenbank herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen der Verbindung
if ($conn->connect_error) {
    die("Connection failed!: " . $conn->connect_error);
}

?>
