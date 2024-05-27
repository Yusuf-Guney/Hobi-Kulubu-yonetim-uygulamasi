<?php
session_start(); // Oturumu başlatır
include 'db.php'; // Veritabanı bağlantısı dosyasını dahil eder

// POST isteği ile gönderilen verileri işler
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici_adi = $_POST['kullanici_adi']; // Kullanıcı adını alır
    $email = $_POST['email']; // E-posta adresini alır
    $isim = $_POST['isim']; // İsmi alır
    $soyisim = $_POST['soyisim']; // Soyismi alır
    $gsm = $_POST['gsm']; // GSM numarasını alır
    $dogum_tarihi = $_POST['dogum_tarihi']; // Doğum tarihini alır
    $sifre = password_hash($_POST['sifre'], PASSWORD_BCRYPT); // Şifreyi hashleyerek alır

    // Yeni kullanıcıyı veritabanına ekler
    $stmt = $mysqli->prepare("INSERT INTO USERS (User_Name, E_Mail, First_Name, Last_Name, GSM_No, Birth_Date, Password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $kullanici_adi, $email, $isim, $soyisim, $gsm, $dogum_tarihi, $sifre);

    // İşlem başarılıysa mesaj gösterir, değilse hata mesajı gösterir
    if ($stmt->execute()) {
        echo "Yeni kayıt başarıyla oluşturuldu";
    } else {
        echo "Hata: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kayıt Ol</title>
    <!-- Bootstrap CSS dosyasını dahil eder -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Kayıt Ol</h2>
        <form method="POST" action="kayit.php">
            <div class="form-group">
                <label for="kullanici_adi">Kullanıcı Adı:</label>
                <input type="text" class="form-control" id="kullanici_adi" name="kullanici_adi" required>
            </div>
            <div class="form-group">
                <label for="email">E-posta:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="isim">İsim:</label>
                <input type="text" class="form-control" id="isim" name="isim" required>
            </div>
            <div class="form-group">
                <label for="soyisim">Soyisim:</label>
                <input type="text" class="form-control" id="soyisim" name="soyisim" required>
            </div>
            <div class="form-group">
                <label for="gsm">GSM:</label>
                <input type="text" class="form-control" id="gsm" name="gsm" required>
            </div>
            <div class="form-group">
                <label for="dogum_tarihi">Doğum Tarihi:</label>
                <input type="date" class="form-control" id="dogum_tarihi" name="dogum_tarihi" required>
            </div>
            <div class="form-group">
                <label for="sifre">Şifre:</label>
                <input type="password" class="form-control" id="sifre" name="sifre" required>
            </div>
            <button type="submit" class="btn btn-primary">Kayıt Ol</button>
        </form>
        <a href="giris.php">Giriş Yap</a>
        <br>
        <a href="index.php" class="btn btn-secondary mt-3">Ana Sayfa</a>
    </div>
</body>
</html>
