<?php
require('cfg.php');

if (isset($_POST['nazwa'])) {
    //pobranie danych z formularza
    $nazwa = $_POST['nazwa'];
    $matka = $_POST['matka'];

    //max id pobierane aby byly po sobie rekordy
    $query_max_id = "SELECT MAX(id) AS max_id FROM categories";
    $result_max_id = mysqli_query($conn, $query_max_id);
    $row_max_id = mysqli_fetch_assoc($result_max_id);
    $max_id = $row_max_id['max_id'];
    $query_auto_increment = "ALTER TABLE categories AUTO_INCREMENT = " . ($max_id + 1);
    mysqli_query($conn, $query_auto_increment);
    // zapytanie sql po zmianie AutoIncrement
    $query = "INSERT INTO categories (nazwa, matka) VALUES ('$nazwa', '$matka')";
    $result = mysqli_query($conn, $query);
    //Sprawdzenie czy dodano podstronę
    if ($result) {
        header("Location: admin.php");
    } else {
        echo "Błąd dodawania kategorii";
    }
}
?>
