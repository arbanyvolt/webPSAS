<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];
$redirect = $_POST['redirect'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

if(mysqli_num_rows($query) > 0){

    $user = mysqli_fetch_assoc($query);

    if($password == $user['password']){

        $_SESSION['user'] = $user['name'];

        // redirect ke halaman sebelumnya
        header("Location: " . $redirect);
        exit;

    } else {

        echo "Password salah!";

    }

} else {

    echo "Email tidak ditemukan!";

}
?>