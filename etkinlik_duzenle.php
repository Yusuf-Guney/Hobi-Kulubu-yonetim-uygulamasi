<?php
session_start();
include 'db.php';

if (!isset($_SESSION['kullanici'])) {
    header("Location: giris.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_description = $_POST['event_description'];

    $stmt = $mysqli->prepare("UPDATE EVENTS SET Event_Name = ?, Event_Date = ?, Event_Description = ? WHERE Event_ID = ?");
    $stmt->bind_param("sssi", $event_name, $event_date, $event_description, $event_id);

    if ($stmt->execute()) {
        echo "Etkinlik başarıyla güncellendi";
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
    <title>Etkinlik Düzenle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Etkinlik Düzenle</h2>
        <form method="POST" action="etkinlik_duzenle.php">
            <div class="form-group">
                <label for="event_id">Etkinlik ID:</label>
                <input type="number" class="form-control" id="event_id" name="event_id" required>
            </div>
            <div class="form-group">
                <label for="event_name">Etkinlik Adı:</label>
                <input type="text" class="form-control" id="event_name" name="event_name" required>
            </div>
            <div class="form-group">
                <label for="event_date">Etkinlik Tarihi:</label>
                <input type="date" class="form-control" id="event_date" name="event_date" required>
            </div>
            <div class="form-group">
                <label for="event_description">Etkinlik Açıklaması:</label>
                <textarea class="form-control" id="event_description" name="event_description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Etkinliği Güncelle</button>
            <br>
        <a href="index.php" class="btn btn-secondary mt-3">Ana Sayfa</a>
        </form>
    </div>
</body>
</html>
