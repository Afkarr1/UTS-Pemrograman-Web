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

// Query untuk mengambil data dari tabel admin (khusus 4 menu yang sudah ditentukan)
$sql = "SELECT id, keterangan FROM admin WHERE id IN (1, 2, 3, 4)";
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
    <title>Menu Utama</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet"> <!-- Font Poppins -->

    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-image: url('lego.png'); /* Background gambar lego.png */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Navbar */
        .navbar {
            background-color: #28a745; /* Navbar hijau */
            padding: 10px 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: fit-content; /* Hanya sebesar logo dan teks */
            margin: 20px auto; /* Navbar di tengah dan tidak menempel dengan bagian atas */
            border-radius: 50px; /* Membuat ujung navbar bulat */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Efek bayangan */
        }

        .navbar-brand {
            font-size: 1.8rem;
            color: white;
            font-weight: bold;
            display: flex;
            align-items: center;
            text-decoration: none; /* Hilangkan underline */
        }

        .navbar-brand img {
            height: 50px;
            margin-right: 10px;
        }

        /* Menghilangkan warna biru saat hover pada navbar */
        .navbar-brand:hover {
            color: white !important;
        }

        /* Tulisan Selamat Datang */
        .menu-title {
            text-align: center;
            font-size: 5rem;
            color: #28a745; /* Warna hijau */
            margin-top: 40px;
            opacity: 0;
            transform: translateY(50px); /* Posisi awal teks di bawah */
            animation: slideUp 1.5s forwards ease-in-out; /* Animasi muncul dari bawah */
            font-family: 'Poppins', sans-serif; /* Font Poppins untuk teks */
        }

        /* Keyframes untuk efek muncul dari bawah */
        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translateY(50px); /* Posisi awal di bawah */
            }
            100% {
                opacity: 1;
                transform: translateY(0); /* Muncul di posisi normal */
            }
        }

        /* Desain kartu sub-menu */
        .card {
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            padding: 30px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            position: relative;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.3);
        }

        .card i {
            font-size: 3.5rem;
            margin-bottom: 20px;
            color: #28a745;
        }

        .btn-custom {
            background-color: #28a745;
            color: white;
            padding: 10px 30px;
            border-radius: 30px;
            text-transform: uppercase;
            text-decoration: none;
            border: none;
            font-weight: bold;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        /* Animasi garis pada hover di bawah tombol */
        .btn-custom::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: white;
            transition: width .3s;
        }

        .btn-custom:hover::after {
            width: 100%;
        }

        /* Styling grid dan spacing */
        .row {
            margin-top: 60px;
        }

        @media (max-width: 768px) {
            .menu-title {
                font-size: 3.5rem;
            }

            .card i {
                font-size: 3rem;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <a class="navbar-brand" href="#">
        <img src="lego.png" alt="Logo"> <!-- Logo menggunakan lego.png -->
        Fotocopy Jakarta
    </a>
</nav>

<!-- Menu Utama Section -->
<div class="container mt-5">
    <h1 class="menu-title">Selamat Datang</h1>

    <div class="row g-4">
        <!-- Menampilkan kartu untuk sub menu -->
        <?php
        // Link untuk setiap sub-menu berdasarkan id
        $menu_links = [
            1 => ['icon' => 'fas fa-book', 'title' => 'Katalog', 'description' => 'Jelajahi produk dan layanan yang kami tawarkan.', 'link' => '/Katalog.php'],
            2 => ['icon' => 'fas fa-tools', 'title' => 'Service', 'description' => 'Layanan perbaikan dan dukungan teknis kami.', 'link' => '/Service.php'],
            3 => ['icon' => 'fas fa-envelope', 'title' => 'Kontak', 'description' => 'Hubungi kami untuk informasi lebih lanjut.', 'link' => '/Kontak.php'],
            4 => ['icon' => 'fas fa-info-circle', 'title' => 'Tentang Kami', 'description' => 'Pelajari lebih lanjut tentang perusahaan kami.', 'link' => '/Tentang.php']
        ];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Pastikan link dan data tersedia untuk id yang dipilih
                if (isset($menu_links[$row['id']])) {
                    $menu = $menu_links[$row['id']];
                    echo '
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <i class="' . $menu['icon'] . '"></i>
                            <h5>' . $menu['title'] . '</h5>
                            <p>' . $menu['description'] . '</p>
                            <a href="' . $menu['link'] . '" class="btn btn-custom">Lihat Detail</a>
                        </div>
                    </div>';
                }
            }
        } else {
            echo "<p class='text-center'>Tidak ada data yang ditemukan.</p>";
        }

        $conn->close();
        ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
