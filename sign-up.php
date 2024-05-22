<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = $_POST['username'];
   $password = $_POST['password'];
   $confirm_password = $_POST['confirm_password'];

   $koneksi = mysqli_connect('localhost:8111', 'root', '', 'endorsement_db');

   // Cek apakah username sudah ada
   $check_username = "SELECT * FROM users WHERE usernamesid = '$username'";
   $result = mysqli_query($koneksi, $check_username);

   if (mysqli_num_rows($result) > 0) {
       echo "<script>alert('Username sudah terdaftar. Silakan login atau gunakan username lain.'); window.location.href='login.php';</script>";
   } else {
       if ($password == $confirm_password) {
           $insert_user = "INSERT INTO users (usernamesid, passwordss) VALUES ('$username', '$password')";
           if (mysqli_query($koneksi, $insert_user)) {
               echo "<script>alert('Pendaftaran berhasil. Silakan login.'); window.location.href='login.php';</script>";
           } else {
               echo "Error: " . $insert_user . "<br>" . mysqli_error($koneksi);
           }
       } else {
           echo "<script>alert('Password tidak cocok. Silakan coba lagi.'); window.location.href='sign-up.php';</script>";
       }
   }

   mysqli_close($koneksi);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sign Up - Aplikasi Endorsement</title>
   <link rel="stylesheet" href="style sign-up.css">
   <link rel="stylesheet" href="style login.css">
</head>
<body>
   <header>
       <nav>
           <ul>
                <li><a href="sign-up.php">Sign Up</a></li>
               <li><a href="pesanan.php">Pesanan</a></li>
           </ul>
       </nav>
   </header>

   <main>
   <section class="Judul-container">
    <h1>Selamat Datang Di Web Endorsement</h1>
       <section class="sign-up-container">
           <h1>Sign Up</h1>
           <form action="sign-up.php" method="post">
               <label for="username">Username</label>
               <input type="text" id="username" name="username" required>
               <label for="password">Password</label>
               <input type="password" id="password" name="password" required>
               <label for="confirm_password">Confirm Password</label>
               <input type="password" id="confirm_password" name="confirm_password" required>
               <button type="submit">Sign Up</button>
           </form>
           <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
       </section>
   </main>

   <footer>
       <p>&copy; 2024 Aplikasi Endorsement</p>
   </footer>
</body>
</html>