<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        $error_message = "Şifreler eşleşmiyor!";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $check_user = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $result = $conn->query($check_user);

        if ($result->num_rows > 0) {
            $error_message = "Kullanıcı adı veya E-posta zaten mevcut!";
        } else {
            $sql = "INSERT INTO users (username, password, email, name, surname, role) VALUES ('$username', '$hashed_password', '$email', '$name', '$surname', 'user')";
            
            if ($conn->query($sql) === TRUE) {
                header("Location: ../index.php"); 
                exit(); 
            } else {
                $error_message = "Kayıt başarısız!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #e0f7fa, #b2ebf2); /* Pastel tonlarda arka plan */
            color: #333;
        }
        .container {
            margin-top: 50px;
        }
        .registration-form {
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
        <div class="col-md-6 registration-form">
            <h2 class="text-center mb-4">Kayıt Ol</h2>
            <?php if(isset($error_message)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="kayit.php">
                <div class="form-group">
                    <label for="username">Kullanıcı Adı:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="name">Ad:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="surname">Soyad:</label>
                    <input type="text" class="form-control" id="surname" name="surname" required>
                </div>
                <div class="form-group">
                    <label for="email">E-posta:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Şifre:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Şifreyi Onayla:</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Kayıt Ol</button>
            </form>
            <p class="mt-3 text-center">Zaten bir hesabınız mı var? <a href="giris.php">Buradan giriş yapın</a>.</p>
        </div>
    </div>
</div>
</body>
</html>
