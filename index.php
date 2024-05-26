<?php
session_start(); // Oturumu başlatır
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hobi Kulübü Yönetimi</title>
    <!-- Bootstrap CSS dosyasını dahil eder -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Hobi Kulübü Yönetim Paneli</h2>
        <!-- Kullanıcının çeşitli işlemleri yapabileceği butonlar -->
        <a href="etkinlik_ekle.php" class="btn btn-primary">Etkinlik Ekle</a>
        <a href="etkinlik_listele.php" class="btn btn-primary">Etkinlikleri Listele</a>
        <a href="etkinlik_duzenle.php" class="btn btn-primary">Etkinlik Düzenle</a>
        <a href="etkinlik_sil.php" class="btn btn-danger">Etkinlik Sil</a>
        <a href="profil.php" class="btn btn-secondary">Profil</a>
        <a href="cikis.php" class="btn btn-secondary">Çıkış Yap</a>
        <footer>
    <p>Projeyi GitHub'da incelemek için <a href="https://github.com/Yusuf-Guney/Hobi-Kulubu-yonetim-uygulamasi">buraya</a> tıklayabilirsiniz.</p>
</footer>

    </div>
</body>
</html>
