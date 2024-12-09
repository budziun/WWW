<?php
/**
 * Ustawienia połączenia z bazą danych
 */
$host = "localhost"; // Host bazy danych
$username = "root";  // Nazwa użytkownika bazy danych
$password = "";      // Hasło użytkownika bazy danych
$database = "moja_strona"; // Nazwa bazy danych

/**
 * Próba połączenia z bazą danych
 */
$conn = mysqli_connect($host, $username, $password, $database);

// Sprawdzenie poprawności połączenia
if (!$conn) {
    // Wyświetlenie komunikatu o błędzie połączenia
    die("Connection failed: " . mysqli_connect_error());
}

// Dane logowania do celów testowych (należy przenieść do bezpiecznego miejsca)
$login = 'admin';
$pass = 'admin';

/**
 * Informacja o powodzeniu połączenia
 * W środowisku produkcyjnym takie komunikaty nie powinny być wyświetlane.
 */
// echo "Połączono z bazą danych!";
?>
