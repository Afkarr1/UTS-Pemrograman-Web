<?php
// Aktifkan tampilan error untuk debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Koneksi ke database
$servername = "localhost";
$dbusername = "u235672406_portofolio";
$dbpassword = "rootutsPemweb1";
$dbname = "u235672406_root1";

// Membuat koneksi ke database
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel tentang_saya
$sql = "SELECT deskripsi FROM tentang_saya";
$result = $conn->query($sql);

// Memeriksa apakah query berhasil
if (!$result) {
    die("Error in query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Rafiafkar</title>
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

        /* Layout Container */
        .container {
            margin-top: 80px;
            padding: 40px 20px;
            max-width: 900px;
        }

        .description {
            font-size: 1.1rem;
            color: #333;
            text-align: justify;
            margin-bottom: 30px;
        }

        /* Styling untuk gambar dan animasi */
        .profile-image {
            width: 200px;
            height: 200px;
            border-radius: 10px;
            object-fit: cover;
            margin: 0 auto 30px;
            display: block;
            animation: zoomIn 1.5s ease-in-out;
        }

        @keyframes zoomIn {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Garis Pemisah */
        .section-divider {
            border-top: 3px solid #00796b;
            margin: 40px 0;
        }

        /* Styling untuk penutup */
        .closing {
            text-align: center;
            font-size: 1.5rem;
            color: #00796b;
            font-weight: bold;
            margin-top: 20px;
            animation: fadeInUp 1.5s ease-in-out;
        }

        @keyframes fadeInUp {
            0% {
                transform: translateY(30px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        footer {
            margin-top: 50px;
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
            <a class="nav-link" href="tentang_saya.php">Tentang</a>
        </li>
    </ul>
</nav>

<!-- Tentang Section -->
<div class="container">
    <img src="fotoaja.jpg" alt="Foto Owner" class="profile-image">

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="description">' . $row["deskripsi"] . '</div>';
        }
    } else {
        echo "<p class='text-center'>Tidak ada data tentang yang ditemukan.</p>";
    }
    ?>
    
    <hr class="section-divider">

    <!-- Penutup -->
    <div class="closing">
        Sekian dan Terimakasih
    </div>
</div>

<!-- Footer -->
<footer>
    © 2024 Rafiafkar. All rights reserved.
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
