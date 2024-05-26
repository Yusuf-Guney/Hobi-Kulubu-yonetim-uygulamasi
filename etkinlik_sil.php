<?php
session_start();
include 'db.php';

if (!isset($_SESSION['kullanici'])) {
    header("Location: giris.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_id = $_POST['event_id'];

    $stmt = $mysqli->prepare("DELETE FROM EVENTS WHERE Event_ID = ?");
    $stmt->bind_param("i", $event_id);

    if ($stmt->execute()) {
        echo "Etkinlik başarıyla silindi";
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
    <title>Etkinlik Sil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Etkinlik Sil</h2>
        <form method="POST" action="etkinlik_sil.php">
            <div class="form-group">
                <label for="event_id">Etkinlik ID:</label>
                <input type="number" class="form-control" id="event_id" name="event_id" required>
            </div>
            <button type="submit" class="btn btn-danger">Etkinlik Sil</button>
            <br>
        <a href="index.php" class="btn btn-secondary mt-3">Ana Sayfa</a>
        </form>
    </div>
</body>
</html>
