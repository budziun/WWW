
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
            <td><a href="index.php"><img src="https://www.svgrepo.com/show/96177/home-button.svg" width="16px" height="16px" alt="home"></td>
            <td><h2><a href="index.php?idp=history"><b><i>Historia Komputerów</b></i></a></h2></td>
            <td><h2><a href="index.php?idp=basic"><b><i>Podstawowe elementy komputera</b></i></a></h2></td>
            <td><h2><a href="index.php?idp=types"><b><i>Typy komputerów</b></i></a></h2></td>
            <td><h2><a href="index.php?idp=polish"><b><i>Polskie komputery</b></i></a></h2></td>
            <td><h2><a href="index.php?idp=before"><b><i>Maszyny poprzedzające komputer</b></i></a></h2></td>
            <td><h2><a href="index.php?idp=movie"><b><i>Filmy</b></i></a></h2></td>
          </tr>
        </table>
       <br>
        
        <?php
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

    if (empty($_GET['idp'])) {
        $strona = './html/glowna.html';
    } 
    elseif ($_GET['idp'] == 'history') {
        $strona = './html/history.html';
    } 
    elseif ($_GET['idp'] == 'basic') {
        $strona = './html/basic.html';
    } 
    elseif ($_GET['idp'] == 'types') {
        $strona = './html/types.html';
    }
    elseif ($_GET['idp'] == 'kontakt') {
			$strona = './html/kontakt.html';
    }
    elseif ($_GET['idp'] == 'polish') {
        $strona = './html/polish.html';
    }
    elseif ($_GET['idp'] == 'before') {
        $strona = './html/before.html';
    }
    elseif ($_GET['idp'] == 'movie') {
        $strona = './html/movie.html';
    }
    else {
        $strona = './html/glowna.html';
    }

    if (file_exists($strona)) {
        include($strona);
    } else {
        echo 'Strony brak';
    }

    $nr_indeksu ='169224';
    $nrGrupy = '1';

    echo 'Jakub Budzich '. $nr_indeksu.' grupa '. $nrGrupy.' <br /><br />';
    ?>

</body>
</html>