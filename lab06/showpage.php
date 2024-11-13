<?php
require('cfg.php');
function PokazPodstrone($id){
    global $conn;
    $id_clear = htmlspecialchars($id);
    
    $query = "SELECT * FROM page_list WHERE id='$id_clear' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        if(empty($row['id'])){
            $web = '[nie_znaleziono_strony]';
        }
        else{
            $web = $row['page_content'];
        }
    } else {
        $web = '[błąd_bazy_danych]';
    }
    return $web;
}
?>