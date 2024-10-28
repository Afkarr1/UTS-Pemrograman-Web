<?php
// Menampilkan error untuk debugging
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

// Query untuk mengambil data dari tabel 'pengalaman'
$sql = "SELECT cerita FROM pengalaman";
$result = $conn->query($sql);

if (!$result) {
    die("Query gagal: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengalaman - Rafiafkar</title>
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
            display: flex;
            justify-content: center;
        }

        .row-equal {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Card Styling */
        .card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 30px;
            width: 45%;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 220px;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.2);
        }

        /* Adding an overlay effect */
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 150, 136, 0.05); /* Slight overlay color */
            z-index: -1;
            transition: all 0.3s ease-in-out;
        }

        .card:hover::before {
            background: rgba(0, 150, 136, 0.15);
        }

        /* Animating text color and transform on hover */
        .card p {
            font-size: 1rem;
            color: #555;
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .card:hover p {
            color: #00796b;
            transform: translateY(-5px);
        }

        /* Footer Styling */
        footer {
            margin-top: 50px;
            text-align: center;
            padding: 20px;
            background-color: #00796b;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .card {
                width: 100%;
                margin: 10px 0;
            }
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

<!-- Pengalaman Section -->
<div class="container">
    <div class="row-equal">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="card">
                    <p>' . $row["cerita"] . '</p>
                </div>';
            }
        } else {
            echo "<p class='text-center'>Tidak ada data pengalaman yang ditemukan.</p>";
        }
        $conn->close();
        ?>
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



