
<?php
$servername = "localhost"; // Nome del server
$username = "todolist_db"; // Nome utente del database
$password = "j9qrsltCaGp]vSXf"; // Password del database
$dbname = "todolist_db"; // Nome del database

// Connessione al database
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
echo "Connessione riuscita";
?>
