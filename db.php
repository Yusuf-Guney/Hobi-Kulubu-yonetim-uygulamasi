<?php
$sunucu_adi = "localhost"; // Veritabanı sunucusu
$kullanici_adi = "root"; // Veritabanı kullanıcı adı
$sifre = ""; // Veritabanı şifresi
$veritabani = "kullanici_kayit"; // Veritabanı adı

// Bağlantı oluşturur
$mysqli = new mysqli($sunucu_adi, $kullanici_adi, $sifre, $veritabani);

// Bağlantıyı kontrol eder
if ($mysqli->connect_error) {
    die("Bağlantı hatası: " . $mysqli->connect_error);
}
?>
