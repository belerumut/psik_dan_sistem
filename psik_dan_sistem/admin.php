<?php
include 'db.php';
session_start();

// Kullanıcı giriş yapmış mı ve admin mi kontrol et
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}


if (isset($_GET['logout'])) {
    session_destroy(); 
    header("Location: ../index.php"); 
    exit();
}

// Yorum silme işlemi
if (isset($_GET['delete_comment']) && isset($_GET['comment_id'])) {
    $comment_id = $_GET['comment_id'];
    $sql = "DELETE FROM comments WHERE id=$comment_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Yorum silinirken bir hata oluştu: " . $conn->error;
    }
}

// Randevu silme işlemi
if (isset($_GET['delete_appointment']) && isset($_GET['appointment_id'])) {
    $appointment_id = $_GET['appointment_id'];
    $sql = "DELETE FROM appointments WHERE id=$appointment_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Randevu silinirken bir hata oluştu: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Admin Panel</h2>
    <a href="?logout" class="btn btn-danger">Çıkış</a>
    <hr>
    <h3>Randevu Yönetimi</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kullanıcı ID</th>
                <th>Tarih</th>
                <th>Zaman</th>
                <th>Durum</th>
                <th>İşlem</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM appointments";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['user_id'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['time'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td><a href='?delete_appointment&appointment_id=" . $row['id'] . "' class='btn btn-danger'>Sil</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Hiç randevu bulunmamaktadır.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <hr>
    <h3>Yorumlar Yönetimi</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kullanıcı ID</th>
                <th>Yorum</th>
                <th>Tarih</th>
                <th>İşlem</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM comments";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['user_id'] . "</td>";
                    echo "<td>" . $row['comment'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td><a href='?delete_comment&comment_id=" . $row['id'] . "' class='btn btn-danger'>Sil</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Hiç yorum bulunmamaktadır.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
