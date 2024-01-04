"ToDoList mit Benutzerauthentifizierung"


Das Projekt "Aufgabenliste mit Benutzerauthentifizierung" ist eine Webanwendung, die auf PHP, MySQL, HTML und CSS basiert. Sie verwaltet eine Liste von Aufgaben und ermöglicht es Benutzern, sich anzumelden, um Aufgaben zu ändern, zu löschen oder neue hinzuzufügen.

Verwendete Technologien
PHP 8.2.0
MySQL
HTML
CSS
MAMP (für die lokale Entwicklungsumgebung)



Installation und Start
Stellen Sie sicher, dass MAMP auf Ihrem System installiert ist.
Klonen Sie das Repository.

git clone https://github.com/deinbenutzername/todolist-php.git

Importieren Sie die MySQL-Datenbank mithilfe der Datei database.sql.

Starten Sie MAMP und stellen Sie sicher, dass der MySQL-Server läuft.

Navigieren Sie zum Projektverzeichnis und starten Sie den PHP-Server:
php -S localhost:8000

Öffnen Sie http://localhost:8000 in Ihrem Browser, um auf die Anwendung zuzugreifen.



Dateistruktur
add_task.php: Seite zum Hinzufügen neuer Aufgaben.
change_data.php: Seite zur Änderung von Datensätzen.
changed_data.php: Seite zur Änderung von Datensätzen.
config.php: Konfigurationsdatei.
dashboard.php: Hauptseite des Dashboards.
delete_task.php: Seite zum Löschen von Aufgaben.
edit_task.php: Seite zum Bearbeiten von Aufgaben.
index.php: Hauptseite der Anwendung.
login.php: Anmeldeseite.
process_add_task.php: Skript zur Verarbeitung des Hinzufügens von Aufgaben.
process_login.php: Skript zur Verarbeitung des Logins.
process_register.php: Skript zur Verarbeitung der Registrierung.
register.php: Registrierungsseite.
update_task.php: Seite zur Aktualisierung von Aufgaben.



Mitwirken
Forken Sie das Repository.
Erstellen Sie einen neuen Branch (git checkout -b Verbesserungen).
Committen Sie Ihre Änderungen (git commit -am 'Hinzufügen einer neuen Funktion').
Pushen Sie den Branch (git push origin Verbesserungen).
Erstellen Sie eine Pull-Anfrage.



Autoren
Mazlum Erceylan (@mazlumerceylan)



Lizenz
Dieses Projekt steht unter der MIT-Lizenz.

