<?php
require('cfg.php');

if (isset($_POST['page_title']) && isset($_POST['page_content'])) {
    //pobranie danych z formularza
    $page_title = $_POST['page_title'];
    $page_content = $_POST['page_content'];
    $page_is_active = isset($_POST['page_is_active']) ? 1 : 0;
    
    //max id, zmiana AutoIncrement
    $query_max_id = "SELECT MAX(id) AS max_id FROM page_list";
    $result_max_id = mysqli_query($conn, $query_max_id);
    $row_max_id = mysqli_fetch_assoc($result_max_id);
    $max_id = $row_max_id['max_id'];
    $query_auto_increment = "ALTER TABLE page_list AUTO_INCREMENT = " . ($max_id + 1);
    mysqli_query($conn, $query_auto_increment);
    // zapytanie sql po zmianie AutoIncrement 
    $query = "INSERT INTO page_list (page_title, page_content, status) VALUES ('$page_title', '$page_content', '$page_is_active')";
    $result = mysqli_query($conn, $query);
    //Sprawdzenie czy dodano podstronę
    if ($result) {
        header("Location: admin.php");
    } else {
        echo "Błąd dodawania podstrony";
    }
}
?>
