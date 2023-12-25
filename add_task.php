<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
</head>
<body>
    <h2>Neue Aufgabe hinzufügen</h2>
    <form action="process_add_task.php" method="POST">
        <label for="title">Titel:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="description">Beschreibung:</label><br>
        <textarea id="description" name="description"></textarea><br>
        <label for="deadline">Frist:</label><br>
        <input type="date" id="deadline" name="deadline"><br><br>
        <input type="submit" value="Aufgabe hinzufügen">
    </form>

</body>
</html>