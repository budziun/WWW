<?php
//biblioteka do wysylania maili
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//folder vendor jest spakowany w zip w pliku z repozytorium
require 'vendor/autoload.php';
//funkcja do obslugi wysylki maili
if (!function_exists('smtp_send')) {
    function smtp_send($socket, $command) {
        fwrite($socket, $command . "\r\n");
        return fgets($socket, 512); 
    }
}
/**
 * Funkcja wysyłająca e-mail z formularza kontaktowego.
 *
 * @param string $odbiorca Adres e-mail odbiorcy wiadomości.
 */
function WyslijMailKontakt($odbiorca) {
    if (empty($_POST['x1_submit'])) {
        echo PokazKontakt();
        return;
    }
    else{
        if (isset($_POST['x1_submit'])) {
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $subject = isset($_POST['title']) ? $_POST['title'] : '';
            $message = isset($_POST['content']) ? $_POST['content'] : '';
    
            if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($subject) && !empty($message)) {
                $mail = new PHPMailer(true);
                $mail = new PHPMailer(true);
try {
    // Ustawienia serwera SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'jakubbudzichzst@gmail.com';  
    $mail->Password = 'xovu vlil xsdc yuzl';  
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;  
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    // Ustawienie nadawcy
    $mail->setFrom($email,$email);

    // Ustawienie odbiorcy
    $mail->addAddress($odbiorca);

    // Treść e-maila
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->Body .= "\n\n Wysłane przez: " . $email;

    // Wysyłanie e-maila
    $mail->send();
    echo '<div class="login-box">';
    echo '<p>E-mail wysłany!</p>';
    echo '</div>';
    exit;
} catch (Exception $e) {
    echo '<div class="login-box">';
    echo "<p>Wysłanie e-maila nie powiodło się. Mailer Error: {$mail->ErrorInfo}</p>";
    echo '</div>';
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}
        }
    }
}
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    WyslijMailKontakt('jakubbudzichzst@gmail.com'); // Zmienna odbiorca na adres docelowy
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
                    <input type="email" name="email" class="form_email" required />
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
/**
 * Funkcja wysyłająca e-mail z przypomnieniem hasła.
 *
 * @param string $odbiorca Adres e-mail odbiorcy wiadomości.
 */
function PrzypomnijHaslo($odbiorca) {
    if (empty($_POST['email_recov'])) {
        echo PokazKontaktHaslo();
        return;
    }

    $email = isset($_POST['email_recov']) ? htmlspecialchars($_POST['email_recov']) : '';

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mail = new PHPMailer(true);
        try {
            // Ustawienia serwera SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'jakubbudzichzst@gmail.com';  
            $mail->Password = 'xovu vlil xsdc yuzl';  
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';

            // Ustawienie nadawcy
            $mail->setFrom('jakubbudzichzst@gmail.com', 'Przywracanie hasła');
            // Ustawienie odbiorcy
            $mail->addAddress($email);

            $mail->Subject = "Przywracanie hasła";
            $mail->Body = "Witaj,\n\nTwoje hasło to: Admin\n\nPozdrawiamy,\nZespół Supportu";

            // Wysyłanie wiadomości
            $mail->send();
            echo '<div class="login-box">';
            echo '<p>Hasło wysłane!</p>';
            echo '</div>';
        } catch (Exception $e) {
            echo '<div class="login-box">';
            echo "<p>Wysłanie hasła nie powiodło się. Mailer Error: {$mail->ErrorInfo}</p>";
            echo '</div>';
        }
    } else {
        echo '<div class="login-box">';
        echo '<p>Nieprawidłowy adres e-mail. Upewnij się, że podany e-mail jest poprawny.</p>';
        echo '</div>';
    }
}
?>