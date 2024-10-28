<?php
$servername = "localhost";  // Sesuaikan dengan host database kamu
$username = "u235672406_root";  // Username database kamu
$password = "rootutsPemweb1";  // Ganti dengan password database kamu
$dbname = "u235672406_website_menu";  // Nama database yang kamu berikan

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
