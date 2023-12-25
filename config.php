<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli('localhost', 'todolist_db', 'j9qrsltCaGp]vSXf', 'todolist_db');
if ($mysqli->connect_errno) {
    throw new RuntimeException('mysqli-Verbindungsfehler: ' . $mysqli->connect_error);
}

?>
