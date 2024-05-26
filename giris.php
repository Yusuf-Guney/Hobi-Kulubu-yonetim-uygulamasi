<?php
session_start(); // Oturumu başlatır
include 'db.php'; // Veritabanı bağlantısı dosyasını dahil eder

// POST isteği ile gönderilen verileri işler
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici_adi = $_POST['kullanici_adi']; // Kullanıcı adını alır
    $sifre = $_POST['sifre']; // Şifreyi alır

    // Kullanıcıyı veritabanında arar
    $stmt = $mysqli->prepare("SELECT * FROM USERS WHERE User_Name = ?");
    $stmt->bind_param("s", $kullanici_adi);
    $stmt->execute();
    $sonuc = $stmt->get_result();

    // Kullanıcı bulunursa şifreyi doğrular
    if ($sonuc->num_rows === 1) {
        $kullanici = $sonuc->fetch_assoc();
        if (password_verify($sifre, $kullanici['Password'])) {
            $_SESSION['kullanici'] = $kullanici; // Kullanıcıyı oturuma ekler
            header("Location: profil.php"); // Profil sayfasına yönlendirir
        } else {
            echo "Geçersiz şifre."; // Şifre yanlışsa hata mesajı gösterir
        }
    } else {
        echo "Kullanıcı bulunamadı."; // Kullanıcı bulunamazsa hata mesajı gösterir
    }

    $stmt->close();
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Giriş Yap</title>
    <!-- Bootstrap CSS dosyasını dahil eder -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Giriş Yap</h2>
        <form method="POST" action="giris.php">
            <div class="form-group">
                <label for="kullanici_adi">Kullanıcı Adı:</label>
                <input type="text" class="form-control" id="kullanici_adi" name="kullanici_adi" required>
            </div>
            <div class="form-group">
                <label for="sifre">Şifre:</label>
                <input type="password" class="form-control" id="sifre" name="sifre" required>
            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
        <a href="kayit.php">Kayıt Ol</a>
    </div>
</body>
</html>
