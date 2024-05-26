<?php
session_start();
include 'db.php';

if (!isset($_SESSION['kullanici'])) {
    header("Location: giris.php");
    exit();
}

$stmt = $mysqli->prepare("SELECT * FROM EVENTS");
$stmt->execute();
$sonuc = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Etkinlikler</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Etkinlikler</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Etkinlik Adı</th>
                    <th>Etkinlik Tarihi</th>
                    <th>Etkinlik Açıklaması</th>
                    <th>Organizatör</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($etkinlik = $sonuc->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($etkinlik['Event_Name']); ?></td>
                    <td><?php echo htmlspecialchars($etkinlik['Event_Date']); ?></td>
                    <td><?php echo htmlspecialchars($etkinlik['Event_Description']); ?></td>
                    <td><?php echo htmlspecialchars($etkinlik['Organizer_ID']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <br>
        <a href="index.php" class="btn btn-secondary mt-3">Ana Sayfa</a>
    </div>
</body>
</html>

<?php
$stmt->close();
$mysqli->close();
?>
