<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'db.php'; // Menyertakan koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = implode(", ", $_POST['gender']); // Menggabungkan jika lebih dari satu
    $alamat = $_POST['alamat'];

    // Query untuk memasukkan data ke tabel Kontak
    $sql = "INSERT INTO Kontak (username, email, gender, alamat) 
            VALUES ('$username', '$email', '$gender', '$alamat')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Menutup koneksi
    $conn->close();
}
?>
