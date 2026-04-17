<?php
$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php';
?>

<form method="POST" action="proses_login.php">
    <input type="hidden" name="redirect" value="<?= $redirect; ?>">

    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>
    
    <button type="submit">Login</button>
    <a href="register.php">Belum punya akun? Daftar</a>
</form>