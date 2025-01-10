<?php
require('cfg.php');
//sprawdzenie czy zostala przeslana nazwa i id
if (isset($_POST['nazwa']) && isset($_GET['id'])) {
    //zmienne dla id nazwy i informacji czy kategoria jest matka
    $id = $_GET['id'];
    $nazwa = $_POST['nazwa'];
    $matka = $_POST['matka'];
    //zapytanie sql i jego wykonanie
    $query = "UPDATE categories SET nazwa = '$nazwa', matka = '$matka' WHERE id = $id";
    $result = mysqli_query($conn, $query);
    //sprawdzenie czy zapytanie sie wykonało
    if ($result) {
        header("Location: admin.php");
    } else {
        echo "Błąd zapisu kategorii";
    }
}
?>