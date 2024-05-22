<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}


function validasi_username($username) {
    $pattern = '/^[a-zA-Z0-9]+@students.undip.ac.id$/';
    return preg_match($pattern, $username);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $koneksi = mysqli_connect('localhost:8111', 'root', '', 'endorsement_db');

    $check_user = "SELECT * FROM users WHERE usernamesid = '$username' AND passwordss = '$password'";
    $result = mysqli_query($koneksi, $check_user);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: data-diri.php");
        exit();
    } else {
        echo "<script>alert('Username atau Password salah!'); window.location.href='login.php';</script>";
    }

    mysqli_close($koneksi);
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Diri - Aplikasi Endorsement</title>
    <link rel="stylesheet" href="style data-diri.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="login.php">Home</a></li>
                <li><a href="data-selebgram.php">Data Selebgram</a></li>
                <li><a href="pesanan.php">Pesanan</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="data-diri-container">
            <h1>Isi Data Diri Anda</h1>
            <form action="jenis-endorse.php" method="post">
                <label for="no_pesanan">No. Pesan</label>
                <input type="text" id="no_pesanan" name="no_pesanan" required>

                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required>

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>

                <label for="no_telefon">No. Telepon</label>
                <input type="tel" id="no_telefon" name="no_telefon" required>

                <button type="submit">SAVE</button>

            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Aplikasi Endorsement</p>
    </footer>
</body>
</html>