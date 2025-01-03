<?php
require('cfg.php');
if (isset($_POST['nazwa'])) {
    $nazwa = $_POST['nazwa'];
    $matka = $_POST['matka'];

    $query = "INSERT INTO categories (nazwa, matka) VALUES ('$nazwa', '$matka')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: admin.php");
    } else {
        echo "Błąd dodawania kategorii";
    }
}
?>