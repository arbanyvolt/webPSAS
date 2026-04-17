<?php
session_start();
session_destroy();

// balik ke halaman sebelumnya
if(isset($_SERVER['HTTP_REFERER'])){
  header("Location: " . $_SERVER['HTTP_REFERER']);
} else {
  header("Location: index.php");
}
exit;