<?php
include 'db.php'; // Menghubungkan ke file koneksi database

// Query untuk mengambil semua data dari tabel Tentang
$sql = "SELECT id, nama_perusahaan, deskripsi, alamat_perusahan FROM Tentang";
$result = $conn->query($sql);

// Debug untuk cek apakah query berhasil
if (!$result) {
    die("Error pada query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    <!-- Bootstrap CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
            font-size: 1.5rem; /* Ukuran font sesuai gambar */
            color: #fff; /* Warna teks putih untuk kontras */
            font-weight: bold; /* Teks tebal */
            text-decoration: none; /* Hilangkan garis bawah */
        }

        /* Pastikan warna tetap putih dan tidak ada efek hover biru */
        .navbar-brand:hover,
        .navbar-brand:focus,
        .navbar-brand:active {
            color: #fff !important; /* Warna tetap putih saat hover atau fokus */
            outline: none; /* Hilangkan outline biru */
            box-shadow: none; /* Hilangkan shadow saat klik */
            text-decoration: none; /* Pastikan tidak ada garis bawah */
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
            background-color: #218838; /* Warna hijau tua saat di-hover */
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2); /* Efek timbul */
            border-radius: 5px; /* Membuat sudut tumpul agar tampak elegan */
            transition: all 0.3s ease; /* Transisi lembut */
        }

        .description {
            text-align: justify;
            font-size: 1.1rem;
            margin-bottom: 10px;
            line-height: 1.7;
            color: #343a40;
        }

        .company-address {
            margin-top: 20px;
            font-size: 1.1rem;
            color: #343a40;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #28a745;
            display: block;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .company-info {
            text-align: center;
            margin-bottom: 50px;
        }

        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 50px;
        }

        footer a {
            color: #28a745;
            text-decoration: none;
        }

        footer a:hover {
            color: white;
        }

        .section-divider {
            border-top: 2px solid #28a745;
            margin: 40px 0;
        }

        .carousel img {
            width: 100%;
            max-width: 600px;
            max-height: 300px;
            height: auto;
            object-fit: contain;
            border-radius: 10px;
            margin: 0 auto;
        }

        .carousel-caption {
            color: #000;
        }

        .carousel-description {
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }

        .carousel-indicators [data-bs-target] {
            background-color: #28a745;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo dan Nama Perusahaan -->
            <a class="navbar-brand" href="#">
                <img src="lego.png" alt="Logo"> <!-- Ganti dengan logo aktual -->
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

    <!-- Bagian ini dihilangkan, sesuai permintaan -->
    <!-- Main Content Section -->
    <div class="container mt-5">
        <?php
        include 'db.php';
        $sql = "SELECT id, nama_perusahaan, deskripsi, alamat_perusahan FROM Tentang";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="company-info">
                    <p class="lead description"><?= $row["deskripsi"]; ?></p>
                    <p class="company-address"><strong>Alamat Perusahaan:</strong> <?= $row["alamat_perusahan"]; ?></p>
                    <img src="owner.jpg" alt="Profile Image" class="profile-image">
                    <p class="mt-3">Rafi Afkar<br><span class="text-muted">CEO & Founder</span></p>
                </div>
        <?php
            }
        } else {
            echo "<p class='text-center'>Tidak ada informasi tentang kami.</p>";
        }
        $conn->close();
        ?>

        <hr class="section-divider">

        <h2 class="text-center mb-4">Pelanggan Terbaik Kami: </h2>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="pertamina.jpg" class="d-block w-100" alt="Pertamina">
                </div>
                <div class="carousel-item">
                    <img src="cifor.jpg" class="d-block w-100" alt="CIFOR">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="carousel-description">
            <p id="carouselCaption"></p>
        </div>

        <hr class="my-5">
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2024 Copyright: <a href="#">Fotocopy Jakarta</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>






