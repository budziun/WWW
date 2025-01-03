<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsola Admina</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class='main'>
<?php
ob_start();
session_start();
require('cfg.php');
echo "<div class='main'>";
function FormularzLogowania() {
    $wynik = '
    <div class="login-wrapper">
    <h1 class="heading">LOGOWANIE </h1>
    <a href="../index.php" > Strona główna </a><br><br>
    <form class="formularz_logowania" method="POST" name="LoginForm" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'"
    <table class="logowanie">
    <tr><td class="log4_t">login</td><td><input type="text" name="login_email" class="logowanie"/></td></tr>
    <tr><td class="log4_t">haslo</td><td><input type="password" name="login_pass" class="logowanie"/></td></tr>
    <tr><td><br/></td><td><input type="submit" name="xl_submit" class="logowanie1" value="Zaloguj"/></td></tr>
    </table>
    </form>
    </div>
    
    ';
    return $wynik;
}

function ListaPodstron() {
    global $conn;

    $wynik = '<h3>Podstrony:</h3>'.'<table class="tabela_akcji">'.'<tr><th>ID</th><th>Tytuł podstrony</th><th>Akcje</th></tr>';
    $wynik .= '<a href="'.$_SERVER['PHP_SELF'].'?action=dodaj">Dodaj podstronę</a> <br /> <br />';

    $query = "SELECT id, page_title FROM page_list";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $page_title = $row['page_title'];

            $wynik .= '<tr>'.'<td>' . $id . '</td>'.'<td>' . $page_title . '</td>'.'<td><a href="'.$_SERVER['PHP_SELF'].'?action=edytuj&id='.$id.'">Edytuj</a> | <a href="'.$_SERVER['PHP_SELF'].'?action=usun&id='.$id.'">Usuń</a></td>'.'</tr>';
        }
    } else {
        $wynik .= '<tr><td colspan="3">Brak podstron do wyświetlenia.</td></tr>';
    }

    $wynik .= '</table>';

    echo $wynik;

    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'edytuj' && isset($_GET['id'])) {
            echo EdytujPodstrone();
        } else if ($_GET['action'] === 'usun' && isset($_GET['id'])) {
            echo UsunPodstrone();
        } else if ($_GET['action'] === 'dodaj') {
            echo DodajNowaPodstrone();
        }
}
}

function EdytujPodstrone() {
    global $conn;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        echo "Brak podstrony z tym ID";
        exit;
    }

    $query = "SELECT page_title, page_content, status FROM page_list WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0 && $result) {
        $row = mysqli_fetch_assoc($result);
        $page_title = $row['page_title'];
        $page_content = $row['page_content'];
        $page_is_active = $row['status'];

        $wynik = '<h3>Edycja Podstrony o id:'.$id.'</h3>'.'<form method="POST" action="zapiszEdytowany.php?id='.$id.'">';
        $wynik .= '<input class="tytul" type="text" name="page_title" value="'.$page_title.'"><br />';
        $wynik .= '<textarea class="tresc" rows=20 cols=100 name="page_content">'.$page_content.'</textarea><br />';
        $wynik .= 'Podstrona aktywna: <input class="aktywna" type="checkbox" name="page_is_active" value="1"'.($page_is_active == 1 ? 'checked="checked"' : '').'><br />';
        $wynik .= '<input class="zapisz" type="submit" name="zapisz" value="zapisz">'.'</form>';

        return $wynik;
    }
}

function DodajNowaPodstrone() {
    global $conn;

        $wynik = '<h3>Dodaj podstronę:</h3>'.'<form method="POST" action="dodajStrone.php">';
        $wynik .= 'Tytuł: <input class="tytul" type="text" name="page_title" value=""><br /> <br />';
        $wynik .= 'Treść: <textarea class="tresc" rows=20 cols=100 name="page_content"></textarea><br /> <br />';
        $wynik .= 'Podstrona aktywna: <input class="aktywna" type="checkbox" name="page_is_active" value="1"><br /> <br />';
        $wynik .= '<input class="zapisz" type="submit" value="Dodaj">'.'</form>';

        return $wynik;
 }

 function ListaKategorii() {
    global $conn;

    $wynik = '<h3>Kategorie:</h3>'.'<table class="tabela_akcji">'.'<tr><th>ID</th><th>Nazwa kategorii</th><th>Matka</th><th>Akcje</th></tr>';
    $wynik .= '<a href="'.$_SERVER['PHP_SELF'].'?action_kategoria=dodaj">Dodaj kategorię</a> <br /> <br />';
    $query = "SELECT c.id, c.nazwa, IFNULL(m.nazwa, 'Brak') AS matka_nazwa 
              FROM categories c 
              LEFT JOIN categories m ON c.matka = m.id";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $nazwa = $row['nazwa'];
            $matka = $row['matka_nazwa']; 

            $wynik .= '<tr>'.'<td>' . $id . '</td>'.'<td>' . $nazwa . '</td>'.'<td>' . $matka . '</td>'.'<td><a href="'.$_SERVER['PHP_SELF'].'?action_kategoria=edytuj&id='.$id.'">Edytuj</a> | <a href="'.$_SERVER['PHP_SELF'].'?action_kategoria=usun&id='.$id.'">Usuń</a></td>'.'</tr>';
        }
    } else {
        $wynik .= '<tr><td colspan="4">Brak kategorii do wyświetlenia.</td></tr>';
    }

    $wynik .= '</table>';

    echo $wynik;

    if (isset($_GET['action_kategoria'])) {
        if ($_GET['action_kategoria'] === 'edytuj' && isset($_GET['id'])) {
            echo EdytujKategorie();
        } else if ($_GET['action_kategoria'] === 'usun' && isset($_GET['id'])) {
            echo UsunKategorie();
        } else if ($_GET['action_kategoria'] === 'dodaj') {
            echo DodajKategorie();
        }
    }
}

function DodajKategorie() {
    global $conn;

    $wynik = '<h3>Dodaj kategorię:</h3><form method="POST" action="dodajKategorie.php">';
    $wynik .= 'Nazwa kategorii: <input class="tytul" type="text" name="nazwa" value=""><br /> <br />';
    $wynik .= 'Matka: <select class="matka" name="matka">';
    $wynik .= '<option value="0">Brak</option>';
    $query = "SELECT id, nazwa FROM categories";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $wynik .= '<option value="'.$row['id'].'">'.$row['nazwa'].'</option>';
    }

    $wynik .= '</select><br /> <br />';
    $wynik .= '<input class="zapisz" type="submit" value="Dodaj"></form>';

    return $wynik;
}

function EdytujKategorie() {
    global $conn;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        echo "Brak kategorii z tym ID";
        exit;
    }

    $query = "SELECT nazwa, matka FROM categories WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0 && $result) {
        $row = mysqli_fetch_assoc($result);
        $nazwa = $row['nazwa'];
        $matka = $row['matka'];

        $wynik = '<h3>Edycja kategorii o ID: '.$id.'</h3>'.'<form method="POST" action="zapiszEdytowanaKategorie.php?id='.$id.'">';
        $wynik .= 'Nazwa kategorii: <input class="tytul" type="text" name="nazwa" value="'.$nazwa.'"><br /> <br />';

        $wynik .= 'Matka: <select class="matka" name="matka">';
        $wynik .= '<option value="0"'.($matka == 0 ? ' selected' : '').'>Brak</option>';

        $query = "SELECT id, nazwa FROM categories";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $selected = ($matka == $row['id']) ? ' selected' : '';
            $wynik .= '<option value="'.$row['id'].'"'.$selected.'>'.$row['nazwa'].'</option>';
        }
        $wynik .= '</select>';
        
        $wynik .= '<br /> <br />';
        $wynik .= '<input class="zapisz" type="submit" name="zapisz" value="Zapisz">';
        $wynik .= '</form>';

        return $wynik;
    }
}
function UsunKategorie() {
    global $conn;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        echo "Brak kategorii z tym ID";
        exit;
    }

    $query = "DELETE FROM categories WHERE id = $id OR matka = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Usunięto kategorię oraz powiązane podkategorie";
        header("Location: admin.php");
    } else {
        echo "Błąd usuwania kategorii";
        exit;
    }
}

function UsunPodstrone() {
    global $conn;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        echo "Brak podstrony z tym ID";
        exit;
    }


    $query = "DELETE FROM page_list WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Usunięto podstronę";
        header("Location: admin.php");
    } else {
        echo "Błąd usuwania podstrony";
        exit;
    }
}



if (isset($_POST['login_email']) && isset($_POST['login_pass'])) {
    $formLogin = $_POST['login_email'];
    $formPass = $_POST['login_pass'];

    if ($formLogin === $login && $formPass === $pass) {
        $_SESSION['admin_logged_in'] = true;
        header("Refresh:0");
    } else {
        echo 'Wpisz hasło lub login jeszcze raz';
        echo FormularzLogowania();
    }
}

function PobierzKategorieOpcje($selected_id = null) {
    global $conn;

    $query = "SELECT id, nazwa FROM categories";
    $result = mysqli_query($conn, $query);

    $opcje = '';
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $selected = ($selected_id == $row['id']) ? 'selected' : '';
            $opcje .= '<option value="'.$row['id'].'" '.$selected.'>'.$row['nazwa'].'</option>';
        }
    }

    return $opcje;
}
// funkcja pokaz produkt w formie listy
function ListaProduktow() {
    global $conn;

    $wynik = '<h3>Produkty:</h3>';
    $wynik .= '<table class="tabela_akcji"><tr><th>ID</th><th>Nazwa</th><th>Kategoria</th><th>Cena netto</th><th>Podatek VAT</th><th>Cena brutto</th><th>Status dostępności</th><th>Gabaryt</th><th>Ilość</th><th>Data utworzenia</th><th>Data modyfikacji</th><th>Data wygaśnięcia</th><th>Akcje</th></tr>';
    $wynik .= '<a href="'.$_SERVER['PHP_SELF'].'?action_produkt=dodaj">Dodaj produkt</a><br /><br />';

    $query = "SELECT p.id, p.tytul AS title, c.nazwa AS category, p.cena_netto AS price, p.podatek_vat AS vat, p.status_dostepnosci, 
                     p.gabaryt, p.ilosc, p.data_utworzenia, p.data_modyfikacji, p.data_wygasniecia
              FROM produkty p
              LEFT JOIN categories c ON p.category_id = c.id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $cena_brutto = $row['price'] * (1 + $row['vat'] / 100); // Obliczenie ceny brutto
            $status = $row['status_dostepnosci'] == 1 ? 'Dostępny' : 'Niedostępny';
            $data_utworzenia = $row['data_utworzenia'] ? $row['data_utworzenia'] : 'Brak';
            $data_modyfikacji = $row['data_modyfikacji'] ? $row['data_modyfikacji'] : 'Brak';
            $data_wygasniecia = $row['data_wygasniecia'] ? $row['data_wygasniecia'] : 'Brak';
            
            $wynik .= '<tr>';
            $wynik .= '<td>'.$row['id'].'</td>';
            $wynik .= '<td>'.$row['title'].'</td>';
            $wynik .= '<td>'.($row['category'] ?? 'Brak').'</td>';
            $wynik .= '<td>'.$row['price'].'</td>';
            $wynik .= '<td>'.$row['vat'].'%</td>';
            $wynik .= '<td>'.number_format($cena_brutto, 2).'</td>';
            $wynik .= '<td>'.$status.'</td>';
            $wynik .= '<td>'.$row['gabaryt'].'</td>';
            $wynik .= '<td>'.$row['ilosc'].'</td>';
            $wynik .= '<td>'.$data_utworzenia.'</td>';
            $wynik .= '<td>'.$data_modyfikacji.'</td>';
            $wynik .= '<td>'.$data_wygasniecia.'</td>';
            $wynik .= '<td>
                        <a href="'.$_SERVER['PHP_SELF'].'?action_produkt=edytuj&id='.$row['id'].'">Edytuj</a> |
                        <a href="'.$_SERVER['PHP_SELF'].'?action_produkt=usun&id='.$row['id'].'">Usuń</a>
                       </td>';
            $wynik .= '</tr>';
        }
    } else {
        $wynik .= '<tr><td colspan="12">Brak produktów do wyświetlenia.</td></tr>';
    }

    $wynik .= '</table>';
    return $wynik;
}
function DodajProdukt() {
    global $conn;

    if (isset($_POST['nazwa'], $_POST['kategoria'], $_POST['cena_netto'], $_POST['podatek_vat'], $_POST['opis'], $_POST['data_wygasniecia'], $_POST['ilosc'], $_POST['status_dostepnosci'], $_POST['gabaryt'], $_POST['zdjecie'])) {
        $nazwa = mysqli_real_escape_string($conn, $_POST['nazwa']);
        $kategoria = (int)$_POST['kategoria'];
        $cena_netto = (float)$_POST['cena_netto'];
        $podatek_vat = (int)$_POST['podatek_vat'];
        $opis = mysqli_real_escape_string($conn, $_POST['opis']);
        $data_wygasniecia = $_POST['data_wygasniecia'] ? $_POST['data_wygasniecia'] : NULL;
        $ilosc = (int)$_POST['ilosc'];
        $status_dostepnosci = (int)$_POST['status_dostepnosci'];
        $gabaryt = mysqli_real_escape_string($conn, $_POST['gabaryt']);
        $zdjecie = mysqli_real_escape_string($conn, $_POST['zdjecie']);
        $data_utworzenia = date('Y-m-d');
        $data_modyfikacji = date('Y-m-d');

        $query = "INSERT INTO produkty (tytul, category_id, cena_netto, podatek_vat, opis, data_utworzenia, data_modyfikacji, data_wygasniecia, ilosc, status_dostepnosci, gabaryt, zdjecie) 
                  VALUES ('$nazwa', $kategoria, $cena_netto, $podatek_vat, '$opis', '$data_utworzenia', '$data_modyfikacji', '$data_wygasniecia', $ilosc, $status_dostepnosci, '$gabaryt', '$zdjecie')";
        if (mysqli_query($conn, $query)) {
            header("Location: admin.php");
            exit;
        } else {
            echo "Błąd podczas dodawania produktu: " . mysqli_error($conn);
        }
    }

    echo '<h3>Dodaj Produkt</h3>';
    echo '<form method="POST" action="'.$_SERVER['PHP_SELF'].'?action_produkt=dodaj">';
    echo 'Nazwa: <input type="text" name="nazwa" required><br>';
    echo 'Kategoria: <select name="kategoria">'.PobierzKategorieOpcje().'</select><br>';
    echo 'Cena netto: <input type="number" step="0.01" name="cena_netto" required><br>';
    echo 'Podatek VAT (%): <input type="number" name="podatek_vat" value="23" required><br>';
    echo 'Opis: <textarea name="opis" rows="5"></textarea><br>';
    echo 'Data wygaśnięcia: <input type="date" name="data_wygasniecia"><br>';
    echo 'Ilość: <input type="number" name="ilosc" value="0" min="0"><br>';
    echo 'Status dostępności: <select name="status_dostepnosci">
            <option value="1" selected>Dostępny</option>
            <option value="0">Niedostępny</option>
          </select><br>';
    echo 'Gabaryt: <select name="gabaryt">
            <option value="mały">Mały</option>
            <option value="średni">Średni</option>
            <option value="duży">Duży</option>
            <option value="transport">Transport</option>
          </select><br>';
    echo 'Zdjęcie: <input type="text" name="zdjecie" placeholder="Link do zdjęcia"><br>';
    echo '<input type="submit" value="Dodaj">';
    echo '</form>';
}
function UsunProdukt() {
    global $conn;

    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $query = "DELETE FROM produkty WHERE id = $id";

        if (mysqli_query($conn, $query)) {
            header("Location: admin.php");
            exit;
        } else {
            echo "Błąd podczas usuwania produktu: " . mysqli_error($conn);
        }
    } else {
        echo "Nie podano ID produktu do usunięcia.";
    }
}

function EdytujProdukt() {
    global $conn;

    if (isset($_POST['id'], $_POST['nazwa'], $_POST['kategoria'], $_POST['cena_netto'], $_POST['podatek_vat'], $_POST['opis'], $_POST['data_wygasniecia'], $_POST['ilosc'], $_POST['status_dostepnosci'], $_POST['gabaryt'], $_POST['zdjecie'])) {
        $id = (int)$_POST['id'];
        $nazwa = mysqli_real_escape_string($conn, $_POST['nazwa']);
        $kategoria = (int)$_POST['kategoria'];
        $cena_netto = (float)$_POST['cena_netto'];
        $podatek_vat = (int)$_POST['podatek_vat'];
        $opis = mysqli_real_escape_string($conn, $_POST['opis']);
        $data_wygasniecia = $_POST['data_wygasniecia'] ? $_POST['data_wygasniecia'] : NULL;
        $ilosc = (int)$_POST['ilosc'];
        $status_dostepnosci = (int)$_POST['status_dostepnosci'];
        $gabaryt = mysqli_real_escape_string($conn, $_POST['gabaryt']);
        $zdjecie = mysqli_real_escape_string($conn, $_POST['zdjecie']);
        $data_modyfikacji = date('Y-m-d');

        $query = "UPDATE produkty SET tytul = '$nazwa', category_id = $kategoria, cena_netto = $cena_netto, podatek_vat = $podatek_vat, 
                  opis = '$opis', data_modyfikacji = '$data_modyfikacji', data_wygasniecia = '$data_wygasniecia', ilosc = $ilosc, 
                  status_dostepnosci = $status_dostepnosci, gabaryt = '$gabaryt', zdjecie = '$zdjecie' WHERE id = $id";

        if (mysqli_query($conn, $query)) {
            header("Location: admin.php");
            exit;
        } else {
            echo "Błąd podczas aktualizacji produktu: " . mysqli_error($conn);
        }
    } elseif (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $query = "SELECT * FROM produkty WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            echo '<h3>Edytuj Produkt</h3>';
            echo '<form method="POST" action="'.$_SERVER['PHP_SELF'].'?action_produkt=edytuj">';
            echo '<input type="hidden" name="id" value="'.$row['id'].'">';
            echo 'Nazwa: <input type="text" name="nazwa" value="'.$row['tytul'].'" required><br>';
            echo 'Kategoria: <select name="kategoria">'.PobierzKategorieOpcje($row['category_id']).'</select><br>';
            echo 'Cena netto: <input type="number" step="0.01" name="cena_netto" value="'.$row['cena_netto'].'" required><br>';
            echo 'Podatek VAT (%): <input type="number" name="podatek_vat" value="'.$row['podatek_vat'].'" required><br>';
            echo 'Opis: <textarea name="opis" rows="5">'.$row['opis'].'</textarea><br>';
            echo 'Data wygaśnięcia: <input type="date" name="data_wygasniecia" value="'.$row['data_wygasniecia'].'"><br>';
            echo 'Ilość: <input type="number" name="ilosc" value="'.$row['ilosc'].'" min="0"><br>';
            echo 'Status dostępności: <select name="status_dostepnosci">
                    <option value="1" '.($row['status_dostepnosci'] == 1 ? 'selected' : '').'>Dostępny</option>
                    <option value="0" '.($row['status_dostepnosci'] == 0 ? 'selected' : '').'>Niedostępny</option>
                  </select><br>';
            echo 'Gabaryt: <select name="gabaryt">
                    <option value="mały" '.($row['gabaryt'] == 'mały' ? 'selected' : '').'>Mały</option>
                    <option value="średni" '.($row['gabaryt'] == 'średni' ? 'selected' : '').'>Średni</option>
                    <option value="duży" '.($row['gabaryt'] == 'duży' ? 'selected' : '').'>Duży</option>
                    <option value="transport" '.($row['gabaryt'] == 'transport' ? 'selected' : '').'>Transport</option>
                  </select><br>';
            echo 'Zdjęcie: <input type="text" name="zdjecie" value="'.$row['zdjecie'].'" placeholder="Link do zdjęcia"><br>';
            echo '<input type="submit" value="Zapisz zmiany">';
            echo '</form>';
        } else {
            echo "Nie znaleziono produktu o podanym ID.";
        }
    } else {
        echo "Nie podano ID produktu do edycji.";
    }
}

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    echo '<h1>Witamy w panelu administratora</h1>';
    echo '<a href="wylogowanie.php" class="a_wyloguj"> Wyloguj </a>';
    echo ListaPodstron();
    echo ListaKategorii();
    echo ListaProduktow();
    if (isset($_GET['action_produkt'])) {
        switch ($_GET['action_produkt']) {
            case 'dodaj':
                DodajProdukt();
                exit; 
            case 'usun':
                UsunProdukt();
                exit;
            case 'edytuj':
                EdytujProdukt();
                exit;
        }
    }
} else {
    echo FormularzLogowania();
}
ob_end_flush();
?>
</div>
</body>
</html>