
<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Language" content="pl" />
    <meta name="Author" content="Jakub Budzich" />
    <title>Komputer moją pasją</title>
    <script src="js/kolorujtlo.js" type="text/javascript"></script>
    <script src="js/timedate.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body onload="startclock()">
        <table class="table1">
        <tr>
            <h1>Komputery moją pasją</h1>
        </tr>
        <tr>
            <td><a href="index.php?idp=1"><img src="https://www.svgrepo.com/show/96177/home-button.svg" width="16px" height="16px" alt="home"></td>
            <td><h2><a href="index.php?idp=2"><b><i>Historia Komputerów</b></i></a></h2></td>
            <td><h2><a href="index.php?idp=3"><b><i>Podstawowe elementy komputera</b></i></a></h2></td>
            <td><h2><a href="index.php?idp=4"><b><i>Typy komputerów</b></i></a></h2></td>
            <td><h2><a href="index.php?idp=5"><b><i>Polskie komputery</b></i></a></h2></td>
            <td><h2><a href="index.php?idp=6"><b><i>Maszyny poprzedzające komputer</b></i></a></h2></td>
            <td><h2><a href="index.php?idp=7"><b><i>Filmy</b></i></a></h2></td>
          </tr>
        </table>
       <br>
        
        <?php
    include('cfg.php');
    include('showpage.php');
    
    if (empty($_GET['idp'])) {
        $strona_id = 1;
    } else {
        $strona_id = $_GET['idp'];
    }
    
    $tresc_strony = PokazPodstrone($strona_id);
    
    if ($tresc_strony === '[nie_znaleziono_strony]') {
        echo 'ni ma strony sad';
    } else {
        echo $tresc_strony;
    }

    $nr_indeksu ='169224';
    $nrGrupy = '1';

    echo 'Jakub Budzich '. $nr_indeksu.' grupa '. $nrGrupy.' <br /><br />';
    ?>

</body>
</html>