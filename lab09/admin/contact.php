<?php
/**
 * Funkcja wysyłająca e-mail z formularza kontaktowego.
 *
 * @param string $odbiorca Adres e-mail odbiorcy wiadomości.
 */
function WyslijMailKontakt($odbiorca) {
    // Sprawdzenie, czy wszystkie wymagane pola zostały wypełnione
    if (empty($_POST['email']) || empty($_POST['title']) || empty($_POST['content'])) {
        echo PokazKontakt();
    } else {
        // Sanitacja danych wejściowych
        $mail['sender'] = htmlspecialchars($_POST['email']);
        $mail['subject'] = htmlspecialchars($_POST['title']);
        $mail['body'] = htmlspecialchars($_POST['content']);
        $mail['recipient'] = htmlspecialchars($odbiorca);

        // Przygotowanie nagłówków wiadomości
        $header  = "From: Forumularz kontaktowy <" . $mail['sender'] . ">\n";
        $header .= "MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\n";
        $header .= "X-Sender: <" . $mail['sender'] . ">\n";
        $header .= "X-Mailer: PHP/" . phpversion() . "\n";
        $header .= "X-Priority: 3\n";
        $header .= "Return-Path: <" . $mail['sender'] . ">\n";

        // Wysłanie e-maila
        if (mail($mail['recipient'], $mail['subject'], $mail['body'], $header)) {
            echo '[wiadomosc_wyslana]';
        } else {
            echo '[blad_wysylania_wiadomosci]';
        }
    }
}

/**
 * Funkcja wysyłająca e-mail z przypomnieniem hasła.
 *
 * @param string $odbiorca Adres e-mail odbiorcy wiadomości.
 */
function PrzypomnijHaslo($odbiorca) {
    // Sprawdzenie, czy pole e-mail zostało wypełnione
    if (empty($_POST['email_recov'])) {
        echo PokazKontaktHaslo();
    } else {
        // Sanitacja danych wejściowych
        $mail['sender'] = htmlspecialchars($_POST['email_recov']);
        $mail['subject'] = "Password Recovery";
        $mail['body'] = "Password = Admin"; // W środowisku produkcyjnym należy zmienić logikę przechowywania hasła.
        $mail['recipient'] = htmlspecialchars($odbiorca);

        // Przygotowanie nagłówków wiadomości
        $header  = "From: Forumularz kontaktowy <" . $mail['sender'] . ">\n";
        $header .= "MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\n";
        $header .= "X-Sender: <" . $mail['sender'] . ">\n";
        $header .= "X-Mailer: PHP/" . phpversion() . "\n";
        $header .= "X-Priority: 3\n";
        $header .= "Return-Path: <" . $mail['sender'] . ">\n";

        // Wysłanie e-maila
        if (mail($mail['recipient'], $mail['subject'], $mail['body'], $header)) {
            echo '[haslo_wyslane]';
        } else {
            echo '[blad_wysylania_wiadomosci]';
        }
    }
}

/**
 * Funkcja generująca formularz kontaktowy.
 *
 * @return string HTML formularza kontaktowego.
 */
function PokazKontakt() {
    return '
    <div class="main">
        <div class="form_email">
            <form method="post" enctype="multipart/form-data" action="' . htmlspecialchars($_SERVER['REQUEST_URI']) . '">
                <table class="form_email">
                    <tr><td class="log4_t">Email: </td><td><input type="email" name="email" class="form_email" required /></td></tr>
                    <tr><td class="log4_t">Tytuł: </td><td><input type="text" name="title" class="form_email" required /></td></tr>
                    <tr><td class="log4_t">Zawartość: </td><td><textarea name="content" class="form_email" required></textarea></td></tr>
                    <tr><td></td><td><input type="submit" name="x1_submit" class="form_email" value="Wyślij" /></td></tr>
                </table>
            </form>
        </div>
    </div>';
}

/**
 * Funkcja generująca formularz odzyskiwania hasła.
 *
 * @return string HTML formularza odzyskiwania hasła.
 */
function PokazKontaktHaslo() {
    return '
    <div class="main">
        <div class="form_passrecov">
            <form method="post" enctype="multipart/form-data" action="' . htmlspecialchars($_SERVER['REQUEST_URI']) . '">
                <table class="form_passrecov">
                    <tr><td class="log4_t">Email: </td><td><input type="email" name="email_recov" class="form_passrecov" required /></td></tr>
                    <tr><td></td><td><input type="submit" name="x1_submit" class="form_passrecov" value="Odzyskaj" /></td></tr>
                </table>
            </form>
        </div>
    </div>';
}
?>
