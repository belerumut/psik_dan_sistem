<?php
include 'db.php';
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: giris.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['userid'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    
    // Veritabanına ekleme işlemi öncesi hata kontrolü
    if (empty($date) || empty($time)) {
        echo "Tarih ve saat alanları boş bırakılamaz.";
    } else {
        $sql = "INSERT INTO appointments (user_id, date, time) VALUES ('$user_id', '$date', '$time')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "Randevu eklenirken bir hata oluştu: " . $conn->error;
        }
    }
}
?>
