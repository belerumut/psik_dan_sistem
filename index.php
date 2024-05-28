<?php
include 'psik_dan_sistem/db.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Anasayfa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #e0f7fa, #b2ebf2);
            color: #333;
        }
        .hero-section {
            background: rgba(255, 255, 255, 0.9);
            padding: 50px 0;
            margin-bottom: 30px;
            text-align: center;
            color: #00796b;
            border-radius: 10px;
        }
        .navbar {
            background-color: #80cbc4;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #fff !important;
        }
        .card {
            margin: 20px 0;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            border: none;
        }
        .card h5 {
            color: #00796b;
        }
        .content-section {
            padding: 20px 0;
        }
        .info-section {
            padding: 40px 20px;
            background-color: rgba(183, 229, 206, 0.8);
            border-radius: 10px;
            margin-top: 20px;
        }
        .info-section h3, .info-section p, .info-section ul {
            color: #00796b;
        }
        .info-section h3 {
            text-align: center;
        }
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
        .comment-section {
            margin-top: 50px;
        }
        .comment {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .comment .actions {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #80cbc4;">
    <a class="navbar-brand" href="#">Borderline Psikolojik Danışmanlık</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['userid'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="psik_dan_sistem/cikis.php">Çıkış Yap</a>  
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="psik_dan_sistem/giris.php">Giriş Yap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="psik_dan_sistem/kayit.php">Kayıt Ol</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="hero-section">
        <h1>Borderline Psikolojik Danışmanlık Sitesine Hoş Geldiniz</h1>
        <p>Mental sağlığınız her zaman önceliğimizdir.</p>
    </div>

    <div class="info-section">
        <h3>Psikolojiye Dair Kavramlar ve Gerçekler</h3>
        <ul>
            <li>Baader-Meinhof Fenomeni: Bir konuya odaklandığınızda, daha sonra o konunun sık sık karşınıza çıkması. Örneğin, yeni öğrendiğiniz bir kelimeyi sürekli duymaya başlamanız gibi.</li>
            <li>Stendhal Sendromu: Sanat eserleri karşısında aşırı duygusal tepkiler verme durumu. Bu, bazı insanlarda özellikle sanat eserlerini gördüklerinde baş dönmesi, kalp çarpıntısı gibi fiziksel tepkilere yol açabilir.</li>
            <li>Bystander Etkisi: İnsanların bir acil durumda yardım etmek yerine, etraflarında başka insanların da olduğunu düşünerek yardım etmekten kaçınması durumu. Ne kadar çok insan varsa, yardım etme olasılığı da o kadar azalır.</li>
            <li>Stockholm Sendromu: Bir rehine ya da mağdur, kaçıran kişi ya da kişilerle duygusal bir bağ kurar. Bu, genellikle rehine durumunda olan kişilerin, kaçıranlara karşı sempati duyması veya onları savunmasıyla ortaya çıkar.</li>
            <li>İkinci Kişilik Sendromu (Dissosiyatif Kimlik Bozukluğu): Kişinin birden fazla farklı kişilik kimliği veya benlik hissi yaşaması durumu. Bu farklı kişilikler, bazen birbirlerinden tamamen farklı davranışlar sergileyebilir.</li>
            <li>Dunning-Kruger Etkisi: Kişilerin, aslında çok az bilgi sahibi oldukları bir konuda kendilerini uzman olarak görmeleri ve bu konuda gerçekten uzman olan kişilerin bilgi düzeylerini yanlış değerlendirmeleri durumu.</li>
            <li>İzafiyet İllüzyonu: Kendimizi genellikle diğer insanlardan daha iyi, daha başarılı ve daha adil olarak algıladığımız yanılsaması. Bu, özellikle karşılaştırma yaparken ortaya çıkar.</li>
            <li>Zeigarnik Etkisi: İnsanların tamamlanmamış görevlere veya alışılmamış durumlara daha fazla odaklandığı ve bunları hatırlama eğiliminde olduğu durum. Tamamlanmamış bir işin, beynin sürekli dikkatini çektiği düşünülüyor.</li>
            <li>Birinci Etki: İnsanların diğer insanları ilk karşılaşmada olumlu izlenimlerle değerlendirdiği ve bu izlenimin daha sonraki ilişkileri belirlediği eğilimi.</li>
            <li>Rorschach Testi: Bir psikolojik test yöntemi olan bu testte, kişilere mürekkep lekeleri gösterilir ve lekelerin neyi hatırlattığı hakkında düşünceleri sorulur. Bu testin sonuçları, kişinin kişilik özellikleri hakkında ipuçları verebilir.</li>
            <li>Başkalarının Onayı Etkisi: Bir insanın, bir grup içindeki tutumunu, davranışını ya da inancını başkalarının onayına göre belirleme eğilimi. Bu, sosyal uyum sağlamak için sıkça görülen bir davranıştır.</li>
            <li>Depersonalizasyon/Derealizasyon Bozukluğu: Kişinin kendisini veya çevresini gerçek dışı, yabancı, ya da rüya gibi hissetmesi durumu. Bu, sıklıkla yoğun stres veya travmatik deneyimler sonrasında ortaya çıkabilir.</li>
            <li>Misofoni: Belirli seslere karşı aşırı tepki verme durumu. Misofonik insanlar, özellikle çatalın tabakta tıkır tıkır ses çıkarması gibi belirli seslerden rahatsızlık duyabilirler.</li>
            <li>Placebo Etkisi: Bir tedavi veya müdahalenin, aslında aktif bir ilaç veya prosedür olmadığı halde, sadece inanç veya beklentiler nedeniyle iyileşmeye veya semptomların azalmasına neden olması durumu.</li>
        </ul>
    </div>

    <!-- Randevu Ekleme Bölümü -->
    <div class="appointment-section">
        <h3>Randevu Al</h3>
        <form method="POST" action="psik_dan_sistem/appointments.php">
            <div class="form-group">
                <label for="date">Tarih:</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="time">Zaman:</label>
                <input type="time" class="form-control" id="time" name="time">
            </div>
            <button type="submit" class="btn btn-primary">Randevu Al</button>
        </form>
    </div>

    <!-- Randevular Bölümü -->
    <div class="appointment-section">
        <h3>Randevular</h3>
        <?php

        $sql = "SELECT * FROM appointments";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='appointment'>";
                echo "<p><strong>Kullanıcı Adı:</strong> " . $row['user_id'] . "</p>";
                echo "<p><strong>Tarih:</strong> " . $row['date'] . "</p>";
                echo "<p><strong>Zaman:</strong> " . $row['time'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Randevu bulunmamaktadır.</p>";
        }
        ?>
    </div>
    
    <!-- Yorum Ekleme Bölümü -->
    <div class="comment-section">
        <?php if (isset($_SESSION['userid'])): ?>
            <h3>Yorum Yap</h3>
            <form action="psik_dan_sistem/comments.php" method="post">
                <div class="form-group">
                    <label for="comment">Yorumunuz:</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                </div>
                <input type="hidden" name="action" value="add">
                <button type="submit" class="btn btn-primary">Yorum Ekle</button>
            </form>
        <?php else: ?>
            <p>Yorum yapabilmek için <a href="psik_dan_sistem/giris.php">giriş yapın</a> veya <a href="psik_dan_sistem/kayit.php">kayıt olun</a>.</p>
        <?php endif; ?>
    </div>

    <!-- Yorumlar Bölümü -->
    <div class="comment-section">
        <h3>Yorumlar</h3>
        <?php
        $sql = "SELECT comments.id, comments.comment, comments.date, users.username FROM comments INNER JOIN users ON comments.user_id = users.id ORDER BY comments.date DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='comment'>";
                echo "<p><strong>" . $row['username'] . "</strong> - " . $row['date'] . "</p>";
                echo "<p>" . $row['comment'] . "</p>";
                if (isset($_SESSION['kullanici_adi']) && $_SESSION['kullanici_adi'] === $row['username']) {
                    echo "<div class='actions'>";
                    echo "<form action='psik_dan_sistem/comments.php' method='post' style='display:inline-block;'>";
                    echo "<input type='hidden' name='comment_id' value='" . $row['id'] . "'>";
                    echo "<input type='hidden' name='action' value='edit'>";
                    echo "<input type='text' name='comment' value='" . $row['comment'] . "' required>";
                    echo "<button type='submit' class='btn btn-secondary btn-sm'>Düzenle</button>";
                    echo "</form> ";
                    echo "<form action='psik_dan_sistem/comments.php' method='post' style='display:inline-block;'>";
                    echo "<input type='hidden' name='comment_id' value='" . $row['id'] . "'>";
                    echo "<input type='hidden' name='action' value='delete'>";
                    echo "<button type='submit' class='btn btn-danger btn-sm'>Sil</button>";
                    echo "</form>";
                    echo "</div>";
                }
                echo "</div>";
            }
        } else {
            echo "<p>Henüz yorum yok.</p>";
        }
        ?>
    </div>

    <!-- Hakkımızda ve Neden Bizi Seçmelisiniz Bölümleri -->
    <div class="row align-items-center" style="background-color: rgba(255, 255, 255, 0.9);">
        <div class="col-md-2">
            <img src="psik_dan_sistem/resimler/resim1.png" class="img-fluid" alt="resim1">
        </div>
        <div class="col-md-8">
            <h3>Hizmetlerimiz Hakkında</h3>
            <p>Mental refahınıza ulaşmanıza yardımcı olmak için profesyonel psikoloji danışmanlık hizmetleri sunuyoruz. Alanında uzman psikolojik danışmanlarımız bilişsel yolculuğunuz boyunca size destek olmak için buradalar.</p>
        </div>
    </div>
    <hr>
    <div class="row align-items-center" style="background-color: rgba(255, 255, 255, 0.9);">
        <div class="col-md-2">
            <img src="psik_dan_sistem/resimler/resim2.png" class="img-fluid" alt="resim2">
        </div>
        <div class="col-md-8">
            <h3>Neden Bizi Seçmelisiniz?</h3>
            <p>Kendi alanlarında deneyimli psikolojik danışmanlardan oluşan ekibimiz kişiselleştirilmiş seanslara kendini adamıştır. Zorlukların üstesinden gelmenize ve sağlıklı bir zihin yapısına sahip olmanız için bilime dayalı teknikler kullanıyoruz. Her şeyden önemlisi size ve sağlınıza değer veriyoruz. Siz de kendinize değer verildiğini hissetmek istiyorsanız seanslarımıza katılmalısınız.</p>
        </div>
    </div>
    <hr>
</div>

<p style="text-align:center;">Github proje <a href="https://github.com/belerumut/psik_dan_sistem">linki.</a></p>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
