<?php
require 'functions.php';
$seleb = query("SELECT * FROM jasa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Selebgram</title>
    <link rel="stylesheet" href="style data-selebgram.css">
    <link rel="stylesheet" href="style login.css">
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
        <h1>DATA SELEBGRAM</h1>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Cari Nama Selebgram">
            <input type="button" value="Cari" onclick="search()">
        </div>
        <script>
            function search() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("searchInput");
                filter = input.value.toUpperCase();
                table = document.querySelector("table");
                tr = table.getElementsByTagName("tr");
                for (i = 1; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
        <table>
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>ID SELEBGRAM</th>
                <th>ID ENDORSEMENT</th>
                <th>JUMLAH FOLLOWERS</th>
            </tr>

            <?php foreach($seleb as $row): ?>
            <tr>
                <td><?= $row["id_artis"]; ?></td>
                <td><?= $row["nama_artis"]; ?></td>
                <td><?= $row["id_selebgram"]; ?></td>
                <td><?= $row["id_endorsement"]; ?></td>
                <td><?= $row["jumlah_followers"]; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="button-container">
            <a href="jenis-endorse.php"><button>Kembali Ke Jenis Endorse</button></a>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Aplikasi Endorsement</p>
    </footer>
</body>
</html>
