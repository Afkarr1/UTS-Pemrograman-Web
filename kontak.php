<?php
// Menampilkan error untuk debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Mengecek apakah form sudah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : ''; // Mengambil pilihan gender

    // Validasi sederhana (pastikan semua field terisi)
    if (!empty($nama) && !empty($email) && !empty($gender)) {
        // Koneksi ke database
        $servername = "localhost";
        $dbusername = "u235672406_portofolio";  // Username yang diberikan
        $dbpassword = "rootutsPemweb1";         // Password database yang diberikan
        $dbname = "u235672406_root1";           // Nama database yang diberikan

        // Membuat koneksi ke database
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Cek koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Menggunakan prepared statement untuk menyimpan data ke tabel 'kontak'
        $stmt = $conn->prepare("INSERT INTO kontak (nama, email, gender) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $email, $gender);

        // Eksekusi query dan cek hasilnya
        if ($stmt->execute()) {
            // Tampilkan pesan sukses
            echo "<div class='alert alert-success'>Data telah diterima. Mengarahkan ke halaman utama...</div>";

            // Tunggu selama 3 detik sebelum redirect
            header("refresh:3; url=/index.php"); // Redirect ke halaman Home setelah 3 detik
            exit(); // Menghentikan eksekusi script setelah header redirect
        } else {
            echo "Error: " . $stmt->error;
        }

        // Tutup koneksi database
        $stmt->close();
        $conn->close();
    } else {
        echo "<div class='alert alert-danger'>Silakan isi semua field!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - Rafiafkar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #00796b;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 1.2rem;
            color: white;
            font-weight: bold;
            text-decoration: none;
        }

        .navbar-brand:hover {
            color: white;
        }

        .nav-link {
            color: white;
            font-weight: 500;
            padding: 5px 15px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .nav-link:hover {
            color: #80cbc4;
            transform: translateY(-3px);
        }

        /* Separator Line Styling */
        .nav-divider {
            display: flex;
            align-items: center;
        }

        .nav-separator {
            color: white;
            font-size: 1.2rem;
            padding: 0 10px;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .nav-separator:hover {
            opacity: 1;
        }

        /* Layout Form */
        .form-section {
            margin-top: 100px;
            display: flex;
            justify-content: center;
        }

        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        .form-title {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            color: #00796b;
            margin-bottom: 30px;
        }

        .form-control {
            border-radius: 8px;
        }

        .form-label {
            font-weight: 600;
            color: #00796b;
        }

        .btn-custom {
            background-color: #00796b;
            color: white;
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 8px;
            margin-top: 15px;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        footer {
            margin-top: 40px;
            text-align: center;
            padding: 20px;
            background-color: #00796b;
            color: white;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar fixed-top">
    <a class="navbar-brand" href="index.php">Rafiafkar Portfolio</a>
    <ul class="navbar-nav flex-row">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Menu Utama</a>
        </li>
        <li class="nav-item nav-divider">
            <span class="nav-separator">|</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="keahlian.php">Keahlian</a>
        </li>
        <li class="nav-item nav-divider">
            <span class="nav-separator">|</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pengalaman.php">Pengalaman</a>
        </li>
        <li class="nav-item nav-divider">
            <span class="nav-separator">|</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="kontak.php">Kontak</a>
        </li>
        <li class="nav-item nav-divider">
            <span class="nav-separator">|</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="tentang.php">Tentang</a>
        </li>
    </ul>
</nav>

<!-- Form Kontak -->
<div class="form-section">
    <div class="form-container">
        <h1 class="form-title">Silahkan isi data: </h1>
        <form method="POST" action="">
            <!-- Input Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama" required>
            </div>

            <!-- Input Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email Anda" required>
            </div>

            <!-- Pilihan Jenis Kelamin (Radio Button) -->
            <div class="mb-3">
                <label class="form-label">Pilih Jenis Kelamin:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="Laki-Laki" id="gender_laki" required>
                    <label class="form-check-label" for="gender_laki">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="Perempuan" id="gender_perempuan" required>
                    <label class="form-check-label" for="gender_perempuan">Perempuan</label>
                </div>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-custom">Submit</button>
        </form>
    </div>
</div>

<!-- Footer -->
<footer>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
