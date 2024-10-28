<?php
// Menampilkan error untuk debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Koneksi ke database
$servername = "localhost";
$username = "u235672406_root";
$password = "rootutsPemweb1"; // Kosong karena tidak ada password
$dbname = "u235672406_website_menu"; // Nama database yang digunakan

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data layanan dari tabel 'Service'
$sql = "SELECT layanan_kami FROM Service";
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
    <title>Layanan Kami</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #28a745; /* Warna hijau tua */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            color: #fff; /* Warna teks putih untuk kontras */
            font-weight: bold; /* Teks tebal */
            text-decoration: none; /* Hilangkan garis bawah */
        }

        /* Menghilangkan efek hover warna biru */
        .navbar-brand:hover,
        .navbar-brand:focus,
        .navbar-brand:active {
            color: #fff !important; /* Warna tetap putih saat di-hover atau difokuskan */
            outline: none; /* Hilangkan outline */
            text-decoration: none; /* Hilangkan underline */
        }

        .navbar-brand img {
            height: 45px;
            margin-right: 10px;
        }

        /* Styling untuk navbar links */
        .navbar-nav .nav-link {
            color: #fff; /* Warna putih untuk link navbar */
            font-weight: 500;
            padding: 10px;
            transition: all 0.3s ease; /* Transisi lembut untuk perubahan efek */
        }

        /* Efek hover dan klik */
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus,
        .navbar-nav .nav-link:active {
            color: #ffffff; /* Tetap putih saat di-hover atau diklik */
            background-color: #218838; /* Warna hijau lebih gelap saat di-hover */
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2); /* Efek timbul */
            border-radius: 5px; /* Membuat sudut tumpul agar tampak elegan */
        }

        .menu-title {
            margin: 30px 0;
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .card-title {
            color: #343a40;
            font-weight: 600;
            text-align: center;
        }
        .card-text {
            text-align: center;
            font-size: 1rem;
            color: #6c757d;
        }
        .card i {
            font-size: 3rem;
            color: #28a745;
            text-align: center;
            display: block;
            margin-bottom: 15px;
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
            width: 100%;
            border-radius: 0 0 10px 10px;
            padding: 10px;
            text-align: center;
        }
        .btn-custom:hover {
            background-color: #218838;
            color: white;
        }
        footer {
            margin-top: 40px;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Navbar Bootstrap 5 -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="lego.png" alt="Logo"> <!-- Gambar logo di navbar -->
            Fotocopy Jakarta
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Katalog.php">Katalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Service.php">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Kontak.php">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Tentang.php">Tentang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Layanan Section -->
<div class="container">
    <h1 class="menu-title">Layanan Kami</h1>

    <div class="row g-4">
        <?php
        // Cek apakah ada layanan yang ditemukan
        if ($result->num_rows > 0) {
            // Loop melalui data layanan dan menampilkannya
            while($row = $result->fetch_assoc()) {
                echo '<div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <i class="fas fa-cog"></i>
                                <h5 class="card-title">Layanan Kami</h5>
                                <p class="card-text">' . $row["layanan_kami"] . '</p>
                            </div>
                        </div>
                    </div>';
            }
        } else {
            echo "<p class='text-center'>Tidak ada layanan yang tersedia.</p>";
        }
        ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlRA3jy3Gzhn7/i70QlJBi+GJIMn6bWI28VfHR3gLrk0ckfPEAMpQrjIZ61" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGhv0C2B7gCRr2MJFpvT+n91L+l5x3aU8Qs4xuwc9gi4yjqD/tbOJZBsmg" crossorigin="anonymous"></script>
</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>
