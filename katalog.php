<?php
// Aktifkan tampilan error untuk debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Koneksi ke database
$servername = "localhost";
$dbusername = "u235672406_root";  // Pastikan tidak ada spasi yang tidak diinginkan
$dbpassword = "rootutsPemweb1";   // Password database
$dbname = "u235672406_website_menu"; // Nama database

// Membuat koneksi ke database
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data produk dari tabel Katalog
$sql = "SELECT id, nama_mesin, deskripsi_mesin FROM Katalog"; // Menggunakan tabel Katalog
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
    <title>Katalog Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #28a745;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
        }

        .navbar-brand:hover,
        .navbar-brand:focus,
        .navbar-brand:active {
            color: #fff !important;
            outline: none;
            text-decoration: none;
        }

        .navbar-brand img {
            height: 45px;
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: #fff;
            font-weight: 500;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus,
        .navbar-nav .nav-link:active {
            color: #ffffff;
            background-color: #218838;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
        .card img {
            height: 250px;
            object-fit: contain;
            width: 100%;
            border-bottom: 2px solid #28a745;
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
    </style>
</head>
<body>

<!-- Navbar Bootstrap 5 -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="lego.png" alt="Logo" style="height: 45px; margin-right: 10px;"> 
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

<!-- Katalog Section -->
<div class="container">
    <h1 class="menu-title">Produk Kami</h1>

    <div class="row g-4">
        <?php
        if ($result->num_rows > 0) {
            // Counter untuk menentukan gambar yang ditampilkan
            $imageCounter = 1;

            // Loop untuk menampilkan setiap produk dari hasil query
            while($row = $result->fetch_assoc()) {
                // Menggunakan gambar statis yang sudah ada (misalnya foto1.jpg, foto2.jpg, dll.)
                $imagePath = "foto" . $imageCounter . ".jpg";
                $imageCounter++;

                echo '
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="' . $imagePath . '" alt="' . $row["nama_mesin"] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . $row["nama_mesin"] . '</h5>
                            <p class="card-text">' . $row["deskripsi_mesin"] . '</p>
                        </div>
                        <a href="#" class="btn btn-custom">Lihat Detail</a>
                    </div>
                </div>
                ';
            }
        } else {
            echo "Tidak ada produk yang ditemukan.";
        }
        $conn->close();
        ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlRA3jy3Gzhn7/i70QlJBi+GJIMn6bWI28VfHR3gLrk0ckfPEAMpQrjIZ61" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGhv0C2B7gCRr2MJFpvT+n91L+l5x3aU8Qs4xuwc9gi4yjqD/tbOJZBsmg" crossorigin="anonymous"></script>
</body>
</html>
