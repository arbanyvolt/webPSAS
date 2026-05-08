<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chroclock - buat akun</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/register.css">
</head>
<body>

    <header>
        <div class="logo">Chroclock</div>
        <div class="burger-menu">☰</div>
    </header>

    <main class="login-wrapper">
        <h1 class="login-title">REGISTER</h1>
        <p class="login-subtitle">daftarkan diri anda</p>

        <form method="POST" action="proses_register.php">
            <div class="input-group">
                <label>USERNAME</label>
                <input type="text" name="username" placeholder="masukkan username" required>
            </div>

            <div class="input-group">
                <label>email</label>
                <input type="email" name="email" placeholder="contoh@gmail.com" required>
            </div>

            <div class="input-group">
                <label>kata sandi</label>
                <input type="password" name="password" placeholder="buat kata sandi" required>
            </div>

            <div class="input-group">
                <label>konfirmasi sandi</label>
                <input type="password" name="confirm_password" placeholder="ulangi kata sandi" required>
            </div>

            <button type="submit" class="btn-login">daftar sekarang</button>
        </form>

        <p class="footer-text">
            sudah punya akun? <a href="login.php">Masuk</a>
        </p>
    </main>

</body>
</html>