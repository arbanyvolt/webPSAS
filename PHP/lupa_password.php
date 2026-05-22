<?php
include 'koneksi.php';

$error_message = '';
$success_message = '';

// Check step of forget password. Default is 1.
$step = isset($_SESSION['reset_step']) ? $_SESSION['reset_step'] : 1;

// Cancel or reset reset session
if (isset($_GET['cancel'])) {
    unset($_SESSION['reset_step']);
    unset($_SESSION['reset_email']);
    unset($_SESSION['reset_otp']);
    unset($_SESSION['otp_verified']);
    header("Location: lupa_password.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action_email'])) {
        $email = mysqli_real_escape_string($conn, trim($_POST['email']));
        
        // Check if email exists in database
        $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        
        if (mysqli_num_rows($query) > 0) {
            // Generate a 6-digit OTP
            $otp = sprintf("%06d", mt_rand(100000, 999999));
            
            $_SESSION['reset_email'] = $email;
            $_SESSION['reset_otp'] = $otp;
            $_SESSION['reset_step'] = 2;
            $step = 2;
            
            // Try to send email
            $to = $email;
            $subject = "Kode OTP Reset Sandi - Chroclock";
            $message = "Halo, berikut adalah kode OTP untuk melakukan reset kata sandi Anda: " . $otp . "\n\nKode ini berlaku sekali pakai.";
            $headers = "From: no-reply@chroclock.com";
            
            @mail($to, $subject, $message, $headers);
            
        } else {
            $error_message = "email tidak terdaftar";
        }
    } elseif (isset($_POST['action_otp'])) {
        $user_otp = trim($_POST['otp']);
        
        if (isset($_SESSION['reset_otp']) && $user_otp === $_SESSION['reset_otp']) {
            $_SESSION['otp_verified'] = true;
            unset($_SESSION['reset_step']);
            header("Location: reset_password.php");
            exit;
        } else {
            $error_message = "Kode OTP salah!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chroclock - Lupa Sandi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/login.css">
    <style>
        .error-msg {
            color: #e74c3c;
            font-size: 0.85rem;
            text-align: center;
            margin-bottom: 20px;
            text-transform: lowercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .demo-otp-box {
            background: #f7f5f0;
            border: 1px solid #1a1a1a;
            color: #1a1a1a;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 0.85rem;
            text-align: center;
            letter-spacing: 0.5px;
        }
        .demo-otp-box strong {
            text-transform: uppercase;
            font-weight: 600;
        }
        .btn-cancel {
            display: inline-block;
            margin-top: 15px;
            color: #666;
            text-decoration: none;
            font-size: 0.85rem;
            transition: 0.3s;
        }
        .btn-cancel:hover {
            color: #000;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">Chroclock</div>
        <div class="burger-menu">☰</div>
    </header>

    <main class="login-wrapper">
        <h1 class="login-title">LUPA SANDI</h1>
        
        <?php if ($step == 1): ?>
            <p class="login-subtitle">silakan masukkan email terdaftar anda</p>

            <?php if (!empty($error_message)): ?>
                <div class="error-msg"><?= htmlspecialchars($error_message); ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="input-group">
                    <label>masukan email</label>
                    <input type="email" name="email" placeholder="masukan email" required value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                </div>

                <button type="submit" name="action_email" class="btn-login">kirim OTP</button>
            </form>
            
            <p class="footer-text">
                Kembali ke <a href="login.php">Login.</a>
            </p>
            
        <?php else: ?>
            <p class="login-subtitle">silakan masukkan kode OTP yang telah dikirim</p>

            <?php if (!empty($error_message)): ?>
                <div class="error-msg"><?= htmlspecialchars($error_message); ?></div>
            <?php endif; ?>

            <!-- Demo Mode OTP Box to help developer test easily -->
            <?php if (isset($_SESSION['reset_otp'])): ?>
                <div class="demo-otp-box">
                    <strong>[DEMO] Kode OTP:</strong> 
                    <span style="font-size: 1.1rem; font-weight: 600; font-family: monospace; letter-spacing: 3px;"><?= $_SESSION['reset_otp'] ?></span>
                    <div style="font-size: 0.75rem; margin-top: 5px; color: #666;">
                        dikirim ke: <?= htmlspecialchars($_SESSION['reset_email']) ?>
                    </div>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="input-group">
                    <label>KODE OTP (6 DIGIT)</label>
                    <input type="text" name="otp" placeholder="******" pattern="\d{6}" maxlength="6" required autocomplete="off" style="text-align: center; letter-spacing: 8px; font-family: monospace; font-size: 1.2rem;">
                </div>

                <button type="submit" name="action_otp" class="btn-login">verifikasi</button>
                <div style="text-align: center;">
                    <a href="lupa_password.php?cancel=1" class="btn-cancel">kembali / ganti email</a>
                </div>
            </form>
        <?php endif; ?>
    </main>

</body>
</html>
