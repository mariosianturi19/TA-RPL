<?php 
require 'functions.php';

if( isset($_POST["submit"]) ) {



    if( tambah($_POST) >0 ) {
        echo "
            <script>
                alert('data berhasil'); 
                document.ocation.href = 'jenis-endorse.php';
            </scipt>    
        ";
    } else {
        echo "
            <script>
                alert('data gagal'); 
                document.ocation.href = 'jenis-endorse.php';
            </scipt>    
    ";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Aplikasi Endorsement</title>
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

  <main>
    <section class="Judul-container">
      <h1>Admin</h1>
    </section>
    <section class="login-container">
      <h1>Login</h1>
      <form action="data-pesanan.php" method="post">
        <label for="username">USERNAME</label>
        <input type="text" id="username" name="username" required>
        <label for="password">PASSWORD</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">LOG IN</button>
      </form>
    </section>
  </main>
  <footer>
    <p>&copy; 2024 Aplikasi Endorsement</p>
  </footer>
</body>
</html>
