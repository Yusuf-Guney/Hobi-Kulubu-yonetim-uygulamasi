<?php
session_start();
include 'db.php';

if (!isset($_SESSION['kullanici'])) {
    header("Location: giris.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_description = $_POST['event_description'];
    $organizer_id = $_SESSION['kullanici']['User_ID'];

    $stmt = $mysqli->prepare("INSERT INTO EVENTS (Event_Name, Event_Date, Event_Description, Organizer_ID) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $event_name, $event_date, $event_description, $organizer_id);

    if ($stmt->execute()) {
        echo "Etkinlik başarıyla oluşturuldu";
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
    <title>Etkinlik Ekle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Etkinlik Ekle</h2>
        <form method="POST" action="etkinlik_ekle.php">
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
            <button type="submit" class="btn btn-primary">Etkinlik Ekle</button>
            <br>
        <a href="index.php" class="btn btn-secondary mt-3">Ana Sayfa</a>
        </form>
    </div>
</body>
</html>
