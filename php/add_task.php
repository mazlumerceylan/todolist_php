<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neue Aufgabe hinzufügen</title>
    <link rel="stylesheet" href="/todolist_php/css/add_task.css">
</head>
<body>
    <h2>Neue Aufgabe hinzufügen</h2>
    <form action="process_add_task.php" method="POST">
        <label for="title">Titel:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="description">Beschreibung:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <label for="due_date">Fälligkeitsdatum:</label><br>
        <input type="date" id="due_date" name="due_date" required><br><br>
        <input type="submit" value="Aufgabe hinzufügen">
    </form>
</body>
</html>