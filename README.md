# psik_dan_sistem
### Site Linki
http://95.130.171.20/~st22360859015/
# Danışmanlık Sistemi

Bu proje, bir danışmanlık sistemi için PHP ve MySQL kullanılarak geliştirilmiştir. Proje, randevu ekleme, yorum ekleme, silme, düzenleme gibi özellikler içerir.

## Gereksinimler

- XAMPP veya benzeri bir yerel sunucu
- Web tarayıcısı

## Kurulum

### 1. XAMPP'ı İndirin ve Kurun

XAMPP'ı [buradan](https://www.apachefriends.org/index.html) indirip kurabilirsiniz.

### 2. Veritabanını Oluşturma

1. XAMPP Kontrol Panelini açın ve MySQL servisini başlatın.
2. [phpMyAdmin](http://localhost/phpmyadmin) üzerinden yeni bir veritabanı oluşturun. Örneğin: `pastane`.
3. `psychology_db(1).sql` dosyasını phpMyAdmin üzerinden veritabanınıza içe aktarın.

### 3. Dosyaları XAMPP'a Kopyalama

1. Tüm PHP dosyalarını ve diğer gerekli dosyaları XAMPP'ın `htdocs` dizinine kopyalayın. Örneğin: `C:\xampp\htdocs\psik_dan_sistem`.

### 4. Veritabanı Bağlantısını Ayarlama

`db.php` dosyasını açın ve veritabanı bağlantı ayarlarını güncelleyin:

```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "psychology_db"; // Veritabanınızın adı

// Bağlantı oluşturma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}
?>





