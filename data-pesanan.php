<?php
session_start();

$valid_username = "KELOMPOK23";
$valid_password = "23";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $valid_username && $password == $valid_password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: data-pesanan.php");
        exit();
    } else {
        echo "<script>alert('Username atau Password salah!'); window.location.href='pesanan.php';</script>";
    }
}


?>
<?php
            require 'functions.php';
             $sqli = ("SELECT pesanan.id_pesanan, customer.nama_customer, customer.email_customer, customer.telp_customer, 
                    pesanan.selebgram_id, pesanan.jenis_postingan, pesanan.kategori, pesanan.tanggal, pesanan.status
                    FROM pesanan 
                    JOIN customer");
                    $result = $conn->query($sqli);

                    $pesanan = [];
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $pesanan[] = $row;
                        }
                    }
                    $conn->close();
            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan</title>
    <link rel="stylesheet" href="style-pesanan.css">
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

    <main>
        <h1>Daftar Pesanan</h1>
        <table>
            <tr>
                <th>ID Pesanan</th>
                <th>Nama Customer</th>
                <th>Email Customer</th>
                <th>No. Telp Customer</th>
                <th>ID Selebgram</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
            <?php foreach($pesanan as $row): ?>
                <tr>
                <td><?= $row["id_pesanan"]; ?></td>
                <td><?= $row["nama_customer"]; ?></td>
                <td><?= $row["email_customer"]; ?></td>
                <td><?= $row["telp_customer"]; ?></td>
                <td><?= $row["selebgram_id"]; ?></td>

                <td><?= $row["jenis_postingan"]; ?></td>
                <td><?= $row["tanggal"]; ?></td>
                <td><?= $row["status"]; ?></td>
                </tr>
                <?php endforeach; ?>            
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Aplikasi Endorsement</p>
    </footer>
</body>
</html>
