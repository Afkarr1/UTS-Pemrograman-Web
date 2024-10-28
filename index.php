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

// Query untuk mengambil data dari tabel keahlian
$sql = "SELECT keterangan FROM home";
$result = $conn->query($sql);

// Memeriksa apakah query berhasil
if (!$result) {
    die("Error in query: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Rafiafkar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #80deea);
            height: 100%;
            overflow-x: hidden;
        }

        .container {
            text-align: center;
            padding-top: 80px;
        }

        h1 {
            font-size: 4rem;
            color: #00796b;
            opacity: 0;
            animation: fadeInDown 1.5s forwards ease-in-out;
        }

        .description {
            font-size: 1.5rem;
            color: #004d40;
            margin-bottom: 20px;
            opacity: 0;
            animation: fadeIn 2s forwards ease-in-out;
        }

        /* Styling for the owner image */
        .owner-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #00796b;
            margin: 20px auto;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            opacity: 0;
            animation: fadeIn 2.5s forwards ease-in-out;
        }

        .nav-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .nav-buttons a {
            background-color: #004d40;
            color: white;
            padding: 15px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-size: 1.2rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .nav-buttons a::before {
            content: "";
            position: absolute;
            width: 300%;
            height: 300%;
            top: 100%;
            left: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: all 0.4s ease;
            transform: rotate(-45deg);
        }

        .nav-buttons a:hover::before {
            top: -100%;
            left: -100%;
        }

        .nav-buttons a:hover {
            background-color: #00695c;
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.3);
        }

        footer {
            margin-top: 50px;
            text-align: center;
            padding: 20px;
            background-color: #00796b;
            color: white;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .nav-buttons {
                flex-direction: column;
            }

            .nav-buttons a {
                width: 100%;
                max-width: 300px;
            }

            h1 {
                font-size: 3rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Owner image -->
        <img src="owner.jpg" alt="Rafiafkar" class="owner-image">
        <h1>Hello, I'm Rafiafkar</h1>
        <p class="description">Selamat datang di portofolio pribadi saya!</p>

        <div class="nav-buttons">
            <a href="/keahlian.php">Keahlian</a>
            <a href="/pengalaman.php">Pengalaman</a>
            <a href="/kontak.php">Kontak</a>
            <a href="/tentang.php">Tentang</a>
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
