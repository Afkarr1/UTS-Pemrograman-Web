<?php
// Menampilkan error untuk debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Mengecek apakah form sudah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : ''; // Mengambil pilihan gender
    $alamat = $_POST['alamat'];

    // Validasi sederhana (pastikan semua field terisi)
    if (!empty($username) && !empty($email) && !empty($gender) && !empty($alamat)) {
        // Koneksi ke database 'website_menu'
        $servername = "localhost";
        $dbusername = "u235672406_root";  // Pastikan tidak ada spasi yang tidak diinginkan
        $dbpassword = "rootutsPemweb1";   // Password database
        $dbname = "u235672406_website_menu"; // Nama database

        // Membuat koneksi ke database
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Cek koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Menggunakan prepared statement untuk menyimpan data ke tabel 'Kontak'
        $stmt = $conn->prepare("INSERT INTO Kontak (username, email, gender, alamat) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $gender, $alamat);

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
    <title>Official Kontak Kami</title>
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
            font-size: 1.5rem; /* Ukuran font sesuai gambar */
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

        .form-section {
            margin-top: 40px;
        }

        .form-title {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            color: #343a40;
        }

        .form-control {
            border-radius: 8px;
        }

        .form-label {
            font-weight: 600;
            color: #28a745;
        }

        .btn-custom {
            background-color: #28a745;
            color: white;
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 8px;
        }

        .btn-custom:hover {
            background-color: #218838;
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
            <img src="lego.png" alt="Logo"> <!-- Logo perusahaan -->
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
                </ul>
        </div>
    </div>
</nav>

<!-- Form Kontak -->
<div class="container form-section">
    <h1 class="form-title">Silahkan Isi Data</h1>
    <form method="POST" action="">
        <!-- Input Username -->
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" required>
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

        <!-- Input Alamat -->
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat:</label>
            <textarea id="alamat" name="alamat" class="form-control" rows="4" placeholder="Masukkan alamat Anda" required></textarea>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-custom">Submit</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlRA3jy3Gzhn7/i70QlJBi+GJIMn6bWI28VfHR3gLrk0ckfPEAMpQrjIZ61" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGhv0C2B7gCRr2MJFpvT+n91L+l5x3aU8Qs4xuwc9gi4yjqD/tbOJZBsmg" crossorigin="anonymous"></script>
</body>
</html>
