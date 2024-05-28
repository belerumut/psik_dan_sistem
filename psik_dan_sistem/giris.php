<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kullanici_adi = $_POST['kullanici_adi'];
    $sifre = $_POST['sifre'];
    
    $sql = "SELECT * FROM users WHERE username='$kullanici_adi'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($sifre, $row['password'])) {
            $_SESSION['userid'] = $row['id'];
            $_SESSION['kullanici_adi'] = $row['username'];
            $_SESSION['rol'] = $row['role'];
            header("Location: ../index.php"); 
            exit(); 
        } else {
            $hata_mesaji = "Geçersiz şifre!";
        }
    } else {
        $hata_mesaji = "Kullanıcı bulunamadı!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #e0f7fa, #b2ebf2); 
            color: #333;
        }
        .container {
            margin-top: 50px;
        }
        .login-form {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: rgba(183, 229, 206, 0.8);
            border: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 login-form">
            <h2 class="text-center mb-4">Giriş Yap</h2>
            <?php if(isset($hata_mesaji)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $hata_mesaji; ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="giris.php">
                <div class="form-group">
                    <label for="kullanici_adi">Kullanıcı Adı:</label>
                    <input type="text" class="form-control" id="kullanici_adi" name="kullanici_adi" required>
                </div>
                <div class="form-group">
                    <label for="sifre">Şifre:</label>
                    <input type="password" class="form-control" id="sifre" name="sifre" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
            </form>
            <p class="mt-3 text-center">Hesabınız yok mu? <a href="kayit.php">Buradan kayıt olun</a>.</p>
        </div>
    </div>
</div>
</body>
</html>
