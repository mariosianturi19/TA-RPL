<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['no_pesanan'], $_POST['nama'], $_POST['email'], $_POST['no_telefon'])) {
    $no_pesanan = $_POST['no_pesanan'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telefon = $_POST['no_telefon'];
                    
    $koneksi = mysqli_connect('localhost:8111', 'root', '', 'endorsement_db');
    
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "INSERT INTO customer (no_pesanan, nama_customer, email_customer, telp_customer) VALUES ('$no_pesanan', '$nama', '$email', '$no_telefon')";
    if(mysqli_query($koneksi, $query)) {
        echo "Data customer berhasil dimasukkan";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['seleBgram'], $_POST['endorsement'], $_POST['jenisProduk'], $_POST['kategori'])) {
    $seleBgram = $_POST['seleBgram'];
    $endorsement = $_POST['endorsement'];
    $jenisProduk = $_POST['jenisProduk'];
    $kategori = $_POST['kategori'];

    $koneksi = mysqli_connect('localhost:8111', 'root', '', 'endorsement_db');
    
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO pesanan (selebgram_id, nomor_pesan, jenis_postingan, kategori) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 'isss', $seleBgram, $endorsement, $jenisProduk, $kategori);

    if (mysqli_stmt_execute($stmt)) {
        echo "Data pesanan berhasil dimasukkan";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
}
?>
<?php
require 'functions.php';
$seleb = query("SELECT * FROM customer");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Isi Jenis Endorsment</title>
    <link rel="stylesheet" href="style jenis-endorse.css">
    <link rel="stylesheet" href="style login.css">
    <link rel="stylesheet" href="style data-selebgram.css">
</head>
<body>
<header>
    <nav>
      <ul>
      <li><a href="sign-up.php">Sign Up</a></li>
        <li><a href="login.php">Home</a></li>
        <li><a href="data-selebgram.php">Data Selebgram</a></li>
        <li><a href="pesanan.php">Pesanan</a></li>
      </ul>
    </nav>
</header>
<div class="container">
    <h2>Isi Jenis Endorsment</h2>
    <form id="endorsementForm" method="POST" action="jenis-endorse.php">
        <label for="seleBgram">ID SeleBgram:</label> <br>
        <input type="number" id="seleBgram" name="seleBgram" required><br>

        <label for="endorsement">Nomor Pesan:</label><br>
        <input type="number" id="endorsement" name="endorsement" required><br>

        <label for="jenisProduk">Jenis Postingan:</label>
        <select id="jenisProduk" name="jenisProduk" required>
            <option value="foto">Foto</option>
            <option value="video">Video</option>
        </select><br>

        <label for="kategori">Kategori:</label>
        <select id="kategori" name="kategori" required>
            <option value="produk">Produk</option>
            <option value="makanan">Makanan</option>
            <option value="fashion">Fashion</option>
            <option value="skincare">Skincare</option>
        </select><br>

        <button type="submit">Save</button>
    </form>
</div>

<div class="button-container">
    <a href="data-selebgram.php"><button>Lihat List Selebgram</button></a>
</div>
<footer>
    <p>&copy; 2024 Aplikasi Endorsement</p>
</footer>
</body>
</html>
