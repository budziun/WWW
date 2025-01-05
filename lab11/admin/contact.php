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
            echo '<div class="login-box">';
            echo '<p>Mail wysłany!</p>';
            echo '</div>';
        } else {
            echo '<div class="login-box">';
            echo '<p>Błąd wysyłania wiadomości</p>';
            echo '</div>';
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
            echo '<div class="login-box">';
            echo '<p>Hasło wysłane!</p>';
            echo '</div>';
        } else {
            echo '<div class="login-box">';
            echo '<p>Błąd wysyłania wiadomości</p>';
            echo '</div>';
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
        <div class="login-box">
        <h1 class="heading">Wyślij wiadomość</h1>
            <form method="post" enctype="multipart/form-data" action="' . htmlspecialchars($_SERVER['REQUEST_URI']) . '">
                <div class="user-box">
                    <input type="email"  name="email" class="form_email" required />
                    <label>Email</label>
                </div>
                <div class="user-box">
                    <input type="text" name="title" class="form_email" required />
                    <label>Tytuł</label>
                </div>
                <div class="user-box">
                    <textarea name="content" class="big_one" required></textarea>
                    <label>Zawartość wiadomości</label>
                </div>
                <div>
                    <input type="submit" name="x1_submit" value="Wyślij" class="logowanie1"/>
                </div>
            </form>
        </div>';
}
/**
 * Funkcja generująca formularz odzyskiwania hasła.
 *
 * @return string HTML formularza odzyskiwania hasła.
 */
function PokazKontaktHaslo() {
    return '
        <div class="login-box">
        <h1 class="heading">Odzyskaj hasło</h1>
            <form method="post" enctype="multipart/form-data" action="' . htmlspecialchars($_SERVER['REQUEST_URI']) . '">
                <div class="user-box">
                    <input type="email" autocomplete="off" id="email_recov" name="email_recov" required />
                    <label>Email</label>
                </div>
                <div>
                    <input type="submit" name="x1_submit" value="Odzyskaj" class="logowanie1" />
                </div>
            </form>
        </div>';
}

?>