<?php
require('cfg.php');
if (isset($_POST['nazwa']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $nazwa = $_POST['nazwa'];
    $matka = $_POST['matka'];

    $query = "UPDATE categories SET nazwa = '$nazwa', matka = '$matka' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: admin.php");
    } else {
        echo "Błąd zapisu kategorii";
    }
}
?>