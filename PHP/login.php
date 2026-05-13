<?php
$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'Web.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chroclock - masuk</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>

    <header>
        <div class="logo">Chroclock</div>
        <div class="burger-menu">☰</div>
    </header>

    <main class="login-wrapper">
        <h1 class="login-title">LOGIN</h1>
        <p class="login-subtitle">silakan masukkan detail akun anda</p>

        <form method="POST" action="proses_login.php">
            <input type="hidden" name="redirect" value="<?= $redirect; ?>">

            <div class="input-group">
                <label>email</label>
                <input type="email" name="email" placeholder="contoh@gmail.com" required>
            </div>

            <div class="input-group">
                <label>kata sandi</label>
                <input type="password" name="password" placeholder="********" required>
                <a href="#" class="forgot">Lupa sandi?</a>
            </div>

            <button type="submit" class="btn-login">Masuk</button>
        </form>

        <p class="footer-text">
            Belum punya akun? <a href="register.php">Register.</a>
        </p>
    </main>

</body>
</html>