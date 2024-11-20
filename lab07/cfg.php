<?php
$conn = mysqli_connect("localhost", "root", "", "moja_strona");
$login = 'admin';
$pass = 'admin';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>