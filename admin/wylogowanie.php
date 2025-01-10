<?php
//rozpoczenie sesji
session_start();
//sprawdz czy admin jest juz zalogowany i sesja jest utworzona 
//jesli tak wyloguj (zniszcz sesje) i przenies na strone admin 
if (isset($_SESSION['admin_logged_in'] ) && $_SESSION['admin_logged_in'] === true) {
    
    session_destroy();
    header('Location: ./admin.php');
} else {
    header('Location: ./admin.php');
}
?>