<?php
// Menampilkan error untuk debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php'; // Menyertakan koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender']; // Mengambil pilihan gender (hanya satu, bukan array)
    $alamat = $_POST['alamat'];

    // Validasi input untuk memastikan tidak ada data yang kosong
    if (!empty($username) && !empty($email) && !empty($gender) && !empty($alamat)) {
        // Menggunakan prepared statement untuk memasukkan data ke tabel Kontak
        $stmt = $conn->prepare("INSERT INTO Kontak (username, email, gender, alamat) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $gender, $alamat); // Menggunakan bind_param untuk mencegah SQL injection

        // Mengeksekusi query dan memeriksa apakah berhasil
        if ($stmt->execute()) {
            echo "Data berhasil disimpan!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Menutup statement dan koneksi
        $stmt->close();
        $conn->close();
    } else {
        echo "Semua field harus diisi!";
    }
}
?>
