<?php
session_start(); // Oturumu başlatır
include 'db.php'; // Veritabanı bağlantısı dosyasını dahil eder

// Kullanıcı oturumu yoksa giriş sayfasına yönlendirir
if (!isset($_SESSION['kullanici'])) {
    header("Location: giris.php");
    exit();
}

$kullanici = $_SESSION['kullanici']; // Oturumdaki kullanıcı bilgilerini alır
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <!-- Bootstrap CSS dosyasını dahil eder -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Profil</h2>
        <table class="table table-bordered">
            <tr>
                <th>Kullanıcı Adı</th>
                <td><?php echo htmlspecialchars($kullanici['User_Name']); ?></td>
            </tr>
            <tr>
                <th>E-posta</th>
                <td><?php echo htmlspecialchars($kullanici['E_Mail']); ?></td>
            </tr>
            <tr>
                <th>İsim</th>
                <td><?php echo htmlspecialchars($kullanici['First_Name']); ?></td>
            </tr>
            <tr>
                <th>Soyisim</th>
                <td><?php echo htmlspecialchars($kullanici['Last_Name']); ?></td>
            </tr>
            <tr>
                <th>GSM</th>
                <td><?php echo htmlspecialchars($kullanici['GSM_No']); ?></td>
            </tr>
            <tr>
                <th>Doğum Tarihi</th>
                <td><?php echo htmlspecialchars($kullanici['Birth_Date']); ?></td>
            </tr>
        </table>
        <!-- Çıkış yapma ve ana sayfaya yönlendirme butonları -->
        <a href="cikis.php" class="btn btn-secondary">Çıkış Yap</a>
        <a href="index.php" class="btn btn-primary">Ana Sayfa</a>
    </div>
</body>
</html>

