<?php
include 'koneksi.php';

// Check if user is allowed to access this page
if (!isset($_SESSION['otp_verified']) || $_SESSION['otp_verified'] !== true || !isset($_SESSION['reset_email'])) {
    header("Location: lupa_password.php");
    exit;
}

$error_message = '';
$show_success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $email = $_SESSION['reset_email'];
    
    if ($password !== $confirm_password) {
        $error_message = "Konfirmasi sandi tidak cocok!";
    } else {
        // Update password in database
        $update_query = mysqli_query($conn, "UPDATE users SET password='$password' WHERE email='$email'");
        
        if ($update_query) {
            $show_success = true;
            // Clear reset session variables
            unset($_SESSION['reset_email']);
            unset($_SESSION['reset_otp']);
            unset($_SESSION['otp_verified']);
            unset($_SESSION['reset_step']);
        } else {
            $error_message = "Gagal memperbarui kata sandi. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chroclock - Reset Sandi</title>
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
        
        /* Popup Success Design */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(247, 245, 240, 0.9);
            backdrop-filter: blur(8px);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10000;
            animation: fadeIn 0.4s ease;
        }

        .popup-box {
            background: #fff;
            border: 1px solid #1a1a1a;
            padding: 50px 40px;
            text-align: center;
            max-width: 380px;
            width: 90%;
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
            animation: slideUp 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .popup-icon {
            margin-bottom: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .popup-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            letter-spacing: 2px;
            font-weight: 400;
            color: #1a1a1a;
            margin-bottom: 10px;
        }

        .popup-subtitle {
            font-size: 0.85rem;
            color: #666;
            letter-spacing: 0.5px;
            text-transform: lowercase;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">Chroclock</div>
        <div class="burger-menu">☰</div>
    </header>

    <main class="login-wrapper">
        <h1 class="login-title">RESET SANDI</h1>
        <p class="login-subtitle">buat kata sandi baru anda</p>

        <?php if (!empty($error_message)): ?>
            <div class="error-msg"><?= htmlspecialchars($error_message); ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="input-group">
                <label>masukan sandi terbaru</label>
                <input type="password" name="password" placeholder="masukan sandi terbaru" required>
            </div>

            <div class="input-group">
                <label>konfirmasi sandi baru</label>
                <input type="password" name="confirm_password" placeholder="konfirmasi sandi baru" required>
            </div>

            <button type="submit" class="btn-login">ganti sandi</button>
        </form>
    </main>

    <?php if ($show_success): ?>
        <div class="popup-overlay">
            <div class="popup-box">
                <div class="popup-icon">
                    <svg viewBox="0 0 24 24" width="60" height="60" stroke="#000" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </div>
                <h2 class="popup-title">BERHASIL!</h2>
                <p class="popup-subtitle">sandi sudah terganti</p>
            </div>
        </div>
        <script>
            setTimeout(function() {
                window.location.href = 'login.php';
            }, 3000);
        </script>
    <?php endif; ?>

</body>
</html>
