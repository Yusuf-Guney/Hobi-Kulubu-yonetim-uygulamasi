<?php
session_start(); // Oturumu başlatır
session_unset(); // Oturum değişkenlerini temizler
session_destroy(); // Oturumu sonlandırır
header("Location: giris.php"); // Giriş sayfasına yönlendirir
?>
