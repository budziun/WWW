<?php
$conn = mysqli_connect("localhost", "root", "", "moja_strona");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>