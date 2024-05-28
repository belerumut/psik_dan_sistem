<?php
include 'db.php';
session_start();


if (!isset($_SESSION['userid'])) {
    header("Location: giris.php"); 
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Yorum ekleme işlemi
    if (isset($_POST['comment']) && isset($_POST['action']) && $_POST['action'] == 'add') {
        $comment = htmlspecialchars($_POST['comment']);
        $user_id = $_SESSION['userid'];
        $date = date("Y-m-d H:i:s");

        $sql = "INSERT INTO comments (user_id, comment, date) VALUES ('$user_id', '$comment', '$date')";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../index.php"); 
            exit();
        } else {
            echo "Yorum eklenirken bir hata oluştu: " . $conn->error;
        }
    }

    // Yorum düzenleme işlemi
    if (isset($_POST['comment_id']) && isset($_POST['comment']) && isset($_POST['action']) && $_POST['action'] == 'edit') {
        $comment_id = $_POST['comment_id'];
        $comment = htmlspecialchars($_POST['comment']);
        $user_id = $_SESSION['userid'];

        $sql = "UPDATE comments SET comment='$comment' WHERE id='$comment_id' AND user_id='$user_id'";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../index.php"); 
            exit();
        } else {
            echo "Yorum düzenlenirken bir hata oluştu: " . $conn->error;
        }
    }

    // Yorum silme işlemi
    if (isset($_POST['comment_id']) && isset($_POST['action']) && $_POST['action'] == 'delete') {
        $comment_id = $_POST['comment_id'];
        $user_id = $_SESSION['userid'];

        $sql = "DELETE FROM comments WHERE id='$comment_id' AND user_id='$user_id'";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../index.php"); 
            exit();
        } else {
            echo "Yorum silinirken bir hata oluştu: " . $conn->error;
        }
    }
}
?>
