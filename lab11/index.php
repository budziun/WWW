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
    <script src="js/pasek.js" type="text/javascript"></script>
    <script src="js/timedate.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body onload="startclock()">
    <!-- Menu Nawigacyjne -->
    <div class="navbar">
    <!-- Nagłówek -->
    <div class="title_page"><h1>Komputery moją pasją</h1></div>
    <!-- Linki menu -->
    <div class="navbar-links">
        <a href="index.php?idp=1">Strona główna</a>
        <a href="index.php?idp=2">Historia</a>
        <a href="index.php?idp=3">Podstawowe elementy</a>
        <a href="index.php?idp=4">Typy komputerów</a>
        <a href="index.php?idp=5">Polskie komputery</a>
        <a href="index.php?idp=6">Maszyny poprzedzające</a>
        <a href="index.php?idp=7">Filmy</a>
        <a href="index.php?idp=8">Mail</a>
        <a href="index.php?idp=9">Odzyskaj hasło</a>
        <!-- Link do panelu admina -->
        <a href="admin/admin.php"><b>Zaloguj się</b></a>
    </div>
</div>
<div class="progress-bar"></div>
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
    ?>
</body>
</html>
