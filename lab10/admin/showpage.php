<?php
require('cfg.php');

/**
 * Funkcja PokazPodstrone
 * Pobiera zawartość strony na podstawie jej ID z bazy danych.
 *
 * @param int $id ID podstrony, którą chcemy wyświetlić.
 * @return string Zawartość podstrony lub odpowiedni komunikat o błędzie.
 */
function PokazPodstrone($id) {
    global $conn;

    // Sanitacja ID, aby zapobiec SQL Injection
    $id_clean = intval($id);

    // Przygotowanie zapytania SQL z użyciem parametrów
    $query = "SELECT page_content FROM page_list WHERE id = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Przypisanie parametru ID do zapytania
        mysqli_stmt_bind_param($stmt, 'i', $id_clean);

        // Wykonanie zapytania
        mysqli_stmt_execute($stmt);

        // Pobranie wyniku
        mysqli_stmt_bind_result($stmt, $page_content);
        mysqli_stmt_fetch($stmt);

        // Sprawdzenie, czy wynik jest pusty
        if (empty($page_content)) {
            $web = '[nie_znaleziono_strony]';
        } else {
            $web = $page_content;
        }

        // Zamknięcie przygotowanego zapytania
        mysqli_stmt_close($stmt);
    } else {
        // Obsługa błędu podczas przygotowywania zapytania
        $web = '[błąd_bazy_danych]';
    }

    return $web;
}
?>
