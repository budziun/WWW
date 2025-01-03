<!-- Wersja 1.8 -->
<!DOCTYPE html>
<html lang="pl">
<head>
    <!-- Metadane -->
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Language" content="pl" />
    <meta name="Author" content="Jakub Budzich" />
    <title>Komputer moją pasją</title>

    <!-- Pliki stylów i skryptów -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/kolorujtlo.js" type="text/javascript"></script>
    <script src="js/timedate.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body onload="startclock()">
    <!-- Nagłówek strony -->
    <h1>Komputery moją pasją</h1>

    <!-- Menu nawigacyjne -->
    <table class="table1">
        <tr>
            <td><a href="index.php?idp=1"><img src="https://www.svgrepo.com/show/96177/home-button.svg" width="16px" height="16px" alt="home"></a></td>
            <td><h2><a href="index.php?idp=2"><b><i>Historia Komputerów</i></b></a></h2></td>
            <td><h2><a href="index.php?idp=3"><b><i>Podstawowe elementy komputera</i></b></a></h2></td>
            <td><h2><a href="index.php?idp=4"><b><i>Typy komputerów</i></b></a></h2></td>
            <td><h2><a href="index.php?idp=5"><b><i>Polskie komputery</i></b></a></h2></td>
            <td><h2><a href="index.php?idp=6"><b><i>Maszyny poprzedzające komputer</i></b></a></h2></td>
            <td><h2><a href="index.php?idp=7"><b><i>Filmy</i></b></a></h2></td>
            <td><h2><a href="index.php?idp=8"><b><i>Mail</i></b></a></h2></td>
            <td><h2><a href="index.php?idp=9"><b><i>Odzyskaj hasło</i></b></a></h2></td>
        </tr>
    </table>
    <br>

    <?php
    // Załączenie plików konfiguracyjnych
    include('admin/cfg.php');
    include('admin/showpage.php');
    include('admin/contact.php');

    // Weryfikacja i sanitacja zmiennej $_GET['idp']
    $idp = isset($_GET['idp']) ? intval($_GET['idp']) : 1;

    // Przełącznik stron w zależności od idp
    if ($idp == 8) {
        echo WyslijMailKontakt("169224@student.uwm.edu.pl");
        echo "<br><br>";
    } elseif ($idp == 9) {
        echo PrzypomnijHaslo("169224@student.uwm.edu.pl");
        echo "<br><br>";
    } else {
        $tresc_strony = PokazPodstrone($idp);

        // Obsługa braku zawartości
        if ($tresc_strony !== '[nie_znaleziono_strony]') {
            echo $tresc_strony;
        }
    }

    // Stopka
    echo '<hr>';
    echo '<footer>';
    $nr_indeksu = '169224';
    $nrGrupy = '1';
    echo "Jakub Budzich $nr_indeksu grupa $nrGrupy<br><br>";
    echo '</footer>';

    // Link do panelu admina
    echo '<a href="admin/admin.php"><b>Admin</b></a>';
    ?>
</body>
</html>
