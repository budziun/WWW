<?php
require('cfg.php');
//utworzenie sesji i koszyka
session_start();
function Sklep() {
    if (!isset($_SESSION['koszyk'])) {
        $_SESSION['koszyk'] = [];
    }
    
    global $conn;
    
    echo '<div class="main">';
    echo '<div class="container-shop">';
    echo '<h1>Witamy w sklepie!</h1>';
    //pobieranie kategorii z bazy danych i wyświetlanie ich
    $query = "SELECT id, nazwa FROM categories";
    $result = mysqli_query($conn, $query);
    $kategorie = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kategorie[] = $row;
    }
    //obsługa wybranych parametrów
    $kategoriaId = isset($_GET['kategoria']) && is_numeric($_GET['kategoria']) ? (int)$_GET['kategoria'] : 0;
    $sortowanie = isset($_GET['sortowanie']) ? $_GET['sortowanie'] : 'nazwa';
    $idp = isset($_GET['idp']) ? htmlspecialchars($_GET['idp']) : 0; // Upewnij się, że idp jest ustawione

    $query = "SELECT p.id, p.tytul, c.nazwa AS kategoria, p.cena_netto, p.podatek_vat, 
                    (p.cena_netto * (1 + p.podatek_vat / 100)) AS cena_brutto, p.zdjecie, p.ilosc
            FROM produkty p
            LEFT JOIN categories c ON p.category_id = c.id";

    //filtrowanie według kategorii, uwzględniając kategorię nadrzędną
    if ($kategoriaId > 0) {
        // Warunek, aby uwzględnić kategorię nadrzędną
        $query .= " WHERE c.id = $kategoriaId OR c.matka = $kategoriaId";
    } else {
        // Jeżeli kategoria nie została wybrana
        // Domylsnie wyświetl wszystkie produkty
        $query .= " WHERE 1";
    }

    // Sortowanie według wybranego kryterium
    //domyslnie - nazwa alfabetycznie
    // inne opcje - cena rosnąco, cena malejąco
    switch ($sortowanie) {
        case 'cena_rosnaco':
            $query .= " ORDER BY cena_brutto ASC";
            break;
        case 'cena_malejaco':
            $query .= " ORDER BY cena_brutto DESC";
            break;
        default:
            $query .= " ORDER BY p.tytul ASC";
            break;
    }

    $result = mysqli_query($conn, $query);

    // Formularz filtrowania i sortowania
    echo '<form method="get" class="sort" action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '">';
    echo '<input type="hidden" name="idp" value="' . $idp . '">';
    echo '<label for="kategoria">Kategoria:</label>';
    echo '<select name="kategoria" id="kategoria">';
    echo '<option value="0"' . ($kategoriaId === 0 ? ' selected' : '') . '>Wszystkie</option>';
    foreach ($kategorie as $kategoria) {
        echo '<option value="' . $kategoria['id'] . '"' . ($kategoriaId === $kategoria['id'] ? ' selected' : '') . '>';
        echo htmlspecialchars($kategoria['nazwa']) . '</option>';
    }
    echo '</select>';
    echo '<label for="sortowanie">Sortowanie:</label>';
    echo '<select name="sortowanie" id="sortowanie">';
    echo '<option value="nazwa"' . ($sortowanie === 'nazwa' ? ' selected' : '') . '>Nazwa (domyślne)</option>';
    echo '<option value="cena_rosnaco"' . ($sortowanie === 'cena_rosnaco' ? ' selected' : '') . '>Cena rosnąco</option>';
    echo '<option value="cena_malejaco"' . ($sortowanie === 'cena_malejaco' ? ' selected' : '') . '>Cena malejąco</option>';
    echo '</select>';
    echo '<button type="submit" class="btn-dodaj">Filtruj</button>';
    echo '</form>';

    // Wyświetlanie produktów
        if ($result && mysqli_num_rows($result) > 0) {
        echo '<div class="produkty-lista">'; 
        
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $tytul = $row['tytul'];
            $kategoria = $row['kategoria'] ?? 'Brak';
            $cena_netto = number_format($row['cena_netto'], 2) . ' PLN';
            $cena_brutto = number_format($row['cena_brutto'], 2) . ' PLN';
            $zdjecie = $row['zdjecie'] ?: 'placeholder.jpg'; // Jeśli brak zdjęcia, użyj domyślnego
            $ilosc = $row['ilosc'];

            echo '<div class="produkt-boks">';
            echo '<img src="' . htmlspecialchars($zdjecie) . '" alt="' . htmlspecialchars($tytul) . '" class="produkt-zdjecie">';
            echo '<h4>' . htmlspecialchars($tytul) . '</h4>';
            echo '<p>Kategoria: ' . htmlspecialchars($kategoria) . '</p>';
            echo '<p>Cena netto: ' . $cena_netto . '</p>';
            echo '<p>Cena brutto: ' . $cena_brutto . '</p>';
            echo '<form method="get" action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '">';
            echo '<input type="hidden" name="idp" value="10">';
            echo '<input type="hidden" name="akcja" value="dodaj_do_koszyka">';
            echo '<input type="hidden" name="id" value="' . $id . '">';
            echo '<label for="ilosc_' . $id . '">Ilość:</label>';
            echo '<select name="ilosc" id="ilosc_' . $id . '">';
            for ($i = 1; $i <= $ilosc; $i++) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            echo '</select><br><br>';
            echo '<button type="submit" class="btn-dodaj">Dodaj do koszyka</button>';
            echo '</form>';

            echo '</div>';
        }

        echo '</div>';
    } 
    //jeżeli brak produktów w bazie wyswielt komunikat
    else {
        echo '<p>Brak produktów do wyświetlenia.</p>';
    }

    // Dodawanie do koszyka i pobieranie ilości z magazynu
if (isset($_GET['akcja']) && $_GET['akcja'] === 'dodaj_do_koszyka' && isset($_GET['id'], $_GET['ilosc'])) {
    $produktId = (int)$_GET['id'];
    $iloscDodana = (int)$_GET['ilosc'];

    $query = "SELECT ilosc FROM produkty WHERE id = $produktId";
    $result = mysqli_query($conn, $query);
    if ($result && $row = mysqli_fetch_assoc($result)) {
        $iloscDostepna = (int)$row['ilosc'];

        $iloscWKoszyku = $_SESSION['koszyk'][$produktId] ?? 0;

        // Sprawdzenie, czy nie przekracza ilości dostępnej
        if ($iloscDodana + $iloscWKoszyku <= $iloscDostepna) {
            $_SESSION['koszyk'][$produktId] = $iloscWKoszyku + $iloscDodana;
            echo '<p class="dodane">Produkt dodany do koszyka!</p>';
        } else {
            echo '<p class="dodane">Nie można dodać więcej produktów niż jest dostępnych w magazynie.</p>';
        }
    } else {
        echo '<p class="dodane">Produkt nie istnieje.</p>';
    }
}
    //usuwanie z koszyka
     if (isset($_GET['akcja']) && $_GET['akcja'] === 'usun_z_koszyka' && isset($_GET['id'])) {
        $produktId = (int)$_GET['id'];
    
        if (isset($_SESSION['koszyk'][$produktId])) {
            unset($_SESSION['koszyk'][$produktId]);
            echo '<p class="dodane">Produkt został usunięty z koszyka.</p>';
        } else {
            echo '<p class="dodane">Produkt nie znajduje się w koszyku.</p>';
        }
    }
    echo '<div class="koszyk">';
    echo '<h3>Koszyk</h3>';
    //wyswietlanie tabeli dla koszyka
    if (!empty($_SESSION['koszyk'])) {
        echo '<table class="tabela-koszyk">';
        echo '<tr><th>Nazwa</th><th>Ilość</th><th>Cena netto</th><th>Cena brutto</th><th>Akcje</th></tr>';

        $sumaNetto = 0;
        $sumaBrutto = 0;

        foreach ($_SESSION['koszyk'] as $produktId => $ilosc) {
            $query = "SELECT tytul, cena_netto, podatek_vat FROM produkty WHERE id = $produktId";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $produkt = mysqli_fetch_assoc($result);
                $nazwa = htmlspecialchars($produkt['tytul']);
                $cenaNetto = (float)$produkt['cena_netto'];
                $podatekVAT = (float)$produkt['podatek_vat'];
                $cenaBrutto = $cenaNetto * (1 + $podatekVAT / 100);

                $kosztNetto = $ilosc * $cenaNetto;
                $kosztBrutto = $ilosc * $cenaBrutto;

                $sumaNetto += $kosztNetto;
                $sumaBrutto += $kosztBrutto;

                echo '<tr>';
                echo '<td>' . $nazwa . '</td>';
                echo '<td>' . $ilosc . '</td>';
                echo '<td>' . number_format($kosztNetto, 2) . ' PLN</td>';
                echo '<td>' . number_format($kosztBrutto, 2) . ' PLN</td>';
                $currentIdp = isset($_GET['idp']) ? (int)$_GET['idp'] : 0;
                echo '<td><a href="?akcja=usun_z_koszyka&id=' . $produktId . '&idp=' . $currentIdp . '" class="btn-usun">🗑️ Usuń</a></td>';
                echo '</tr>';
            }
        }
        //podsumowanie koszyka
        echo '</table>';
        echo '<div class="koszyk-podsumowanie">';
        echo '<p><strong>Razem (netto):</strong> ' . number_format($sumaNetto, 2) . ' PLN</p>';
        echo '<p><strong>Razem (brutto):</strong> ' . number_format($sumaBrutto, 2) . ' PLN</p>';
        echo '<button class="btn-dodaj" onclick="return confirmOrder();">Zamów</button>';
        echo '</div>';
    } else {
        echo '<p class="dodane">Koszyk jest pusty.</p>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    // działanie po kliknięciu przycisku zamów
    if (isset($_GET['akcja']) && $_GET['akcja'] === 'zloz_zamowienie') {
        unset($_SESSION['koszyk']);
        session_unset();
        session_destroy();
        echo "<script>window.location.href = 'index.php?idp=10';</script>";
        exit(); 
    }
}
?>
<!-- Działanie przycisku zamów
dla celów naukowych alret ze oplacono i koniec sesji, koszyk pusty -->
<script>
function confirmOrder() {
    alert('Przekierowano do płatności \n Zamówienie przyjęte \n Sesja zniszczona \n Koszyk Pusty');
    window.location.href = "index.php?idp=10&akcja=zloz_zamowienie";

    return true;
}
</script>