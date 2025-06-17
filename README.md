# Praktikum 1-9 Pemrograman Web 2

```bash
Aldi Hermansyah - 312310200 - Ti.23.A2
```

---

# Daftar Praktikum

*   **[Praktikum 1](#praktikum-1)**
*   **[Praktikum 2](#praktikum-2)**
*   **[Praktikum 3](#praktikum-3)**
*   **[Praktikum 4](#praktikum-4)**
*   **[Praktikum 5](#praktikum-5)**
*   **[Praktikum 6](#praktikum-6)**
*   **[Praktikum 7](#praktikum-7)**
*   **[Praktikum 8](#praktikum-8)**
*   **[Praktikum 9](#praktikum-9)**

---

# Praktikum 1

### 1.1. Aktifkan Extensi

Buka `xampp -> apache -> config -> php.ini`

Hilangkan tanda `;` pada ekstensi yang akan diaktifkan. Kemudian simpan kembali filenya dan restart Apache web server.

<img src="file/1.png" width="max-content">

---

### 1.2. Buka Browser

Ketik http://localhost:8080/lab11_ci/ci4/public/ di browser. Akan muncul seperti gambar dibawah.

<img src="file/2.png" width="max-content">

Jika error:

```bash
The framework needs the following extension(s) installed and loaded: intl.
```

Pada baris di [Langkah 1](#11-aktifkan-extensi), belum dihilangkan `;`

```bash
before: ;extension=intl
after: extension=intl
```

---

### 1.3. Buka PowerShell atau CMD

Arahkan ke direktori project `C:/xampp/htdocs/lab11_ci/ci4`. Codeigniter 4 menyediakan CLI untuk mempermudah proses development.

<img src="file/3.png" width="max-content">

---

### 1.4. Jalankan Perintah

Perintah yang dapat dijalankan untuk memanggil CLI Codeigniter:

```bash
php spark
```

<img src="file/4.png" width="max-content">

---

### 1.5. Ubah Nama File

File `env` menjadi `.env` dan mengubah nilai variabel `CI_ENVIRONTMENT` menjadi `development`

<img src="file/5.png" width="max-content">

---

### 1.6. Contoh Error

<img src="file/6.png" width="max-content">

---

### 1.7. Mencoba Error

Untuk mencoba error diatas, ubah kode pada file `app/Controllers/Home.php`, hilangkan `;` pada akhir kode.

<img src="file/7.png" width="max-content">

---

### 1.8. Struktur Direktori ci4

Fokus pada folder `app`, dimana folder tersebut adalah area kerja untuk membuat aplikasi. Folder `public` untuk menyimpan aset web seperti `css, gambar, javascript, dll.`

<img src="file/8.png" width="max-content">

---

### 1.9. Letak Route

Router terletak pada file `app/Config/Routes.php`. Tambahkan kode berikut:

```php
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
```

<img src="file/9.png" width="max-content">

---

### 1.10. Buka PowerShell

Jalankan perintah:

```bash
php spark routes
```

<img src="file/10.png" width="max-content">

---

### 1.11. Akses Route

Coba akses route di browser http://localhost:8080/lab11_ci/ci4/public/about dan lihat apa yang terjadi. Ketika diakses akan muncul tampilan error `404 file not found`, artinya file/page tersebut tidak ada.

<img src="file/11.png" width="max-content">

---

### 1.12. Membuat Controller

Buat file baru dengan nama `Page.php` pada direktori `Controllers` dan isi kodenya:

```php
<?php
namespace App\Controllers;
class Page extends BaseController
{
   public function about()
   {
      echo "Ini halaman About";
   }
   public function contact()
   {
      echo "Ini halaman Contact";
   }
   public function faqs()
   {
      echo "Ini halaman FAQ";
   }
}
```

<img src="file/12.png" width="max-content">

---

### 1.13. Akses Kembali

Refresh kembali browser, maka halaman sudah dapat diakses.

<img src="file/13.png" width="max-content">

---

### 1.14 Method Baru

Pada `app/Controllers/Page.php` tambahkan kode berikut:

```php
public function tos()
{
   echo "ini halaman Term of Services";
}
```

<img src="file/14.png" width="max-content">

---

### 1.15. Akses Method Baru

Akses dengan alamat http://localhost:8080/lab11_ci/ci4/public/tos

<img src="file/15.png" width="max-content">

---

### 1.16. Membuat View

Pada direktori `app/Views` buat file baru dengan nama `about.php` dan tambahkan kode berikut:

```html
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title><?= $title; ?></title>
</head>
<body>
   <h1><?= $title; ?></h1>
   <hr>
   <p><?= $content; ?></p>
</body>
</html>

```

<img src="file/16.png" width="max-content">

---

### 1.17. Ubah Method About

Pada `app/Controllers/Page.php` ubah:

```php
public function about()
{
   echo "Ini halaman About";
}
```

Menjadi:

```php
public function about()
{
   return view('about', [
      'title' => 'Halaman About',
      'content' => 'Ini adalah halaman abaut yang menjelaskan tentang isi halaman ini.'
   ]);
}
```

<img src="file/17.png" width="max-content">

---

### 1.18. Refresh Halaman

<img src="file/18.png" width="max-content">

---

### 1.19. Membuat Layout CSS

Buat file `style.css` pada direktori `public`. Pada praktikum `lab4_layout` CSS sudah pernah dibuat, copy saja filenya ke direktori `public`.

<img src="file/19.png" width="max-content">

---

### 1.20. Buat Folder Template

Pada direktori `Views` buat folder `template`. Kemudia buat file `header.php`:

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
</head>

<body>
    <div id="container">
        <header>
            <h1>Layout Sederhana</h1>
        </header>
        <nav>
            <a href="<?= base_url('/'); ?>" class="active">Home</a>
            <a href="<?= base_url('/artikel'); ?>">Artikel</a>
            <a href="<?= base_url('/about'); ?>">About</a>
            <a href="<?= base_url('/contact'); ?>">Kontak</a>
        </nav>
        <section id="wrapper">
            <section id="main">
```

dan `footer.php`:

```html
         </section>
            <aside id="sidebar">
                <div class="widget-box">
                    <h3 class="title">Widget Header</h3>
                    <ul>
                        <li><a href="#">Widget Link</a></li>
                        <li><a href="#">Widget Link</a></li>
                    </ul>
                </div>
                <div class="widget-box">
                    <h3 class="title">Widget Text</h3>
                    <p>
                        Vestibulum lorem elit, iaculis in nisl volutpat, malesuada tincidunt arcu. Proin in leo fringilla, vestibulum mi porta,faucibus felis. Integer pharetra est nunc, nec pretium nunc pretium ac.
                    </p>
                </div>
            </aside>
        </section>
        <footer>
            <p>&copy; 2021 - Universitas Pelita Bangsa</p>
        </footer>
    </div>
</body>

</html>
```

<img src="file/20.png" width="max-content">

---

### 1.21. Ubah File About

Ubah file `app/Views/about.php` dari:

```php
<h1><?= $title; ?></h1>
<hr>
<p><?= $content; ?></p>
```

menjadi:

```php
<?= $this->include('template/header'); ?>

<h1><?= $title; ?></h1>
<hr>
<p><?= $content; ?></p>

<?= $this->include('template/footer'); ?>
```

<img src="file/21.png" width="max-content">

---

### 1.22. Refresh Halaman About

Refresh tampilan pada alamat http://localhost:8080/lab11_ci/ci4/public/about

<img src="file/22.png" width="max-content">

---

# Praktikum 2

### 2.1. Buat Database

<img src="file/2_1.png" width="max-content">

---

### 2.2. Buat Tabel

<img src="file/2_2.png" width="max-content">

---

### 2.3. Konfigurasi Menghubungkan Database Server

<img src="file/2_3.png" width="max-content">

---

### 2.4. Buat File `ArtikelModel.php`

<img src="file/2_4.png" width="max-content">

---

### 2.5. Buat File `Artikel.php`

<img src="file/2_5.png" width="max-content">

---

### 2.6. Akses `http://localhost:8080/lab11_ci/ci4/public/artikel`

<img src="file/2_6.png" width="max-content">

---

### 2.7. Refresh kembali `http://localhost:8080/lab11_ci/ci4/public/artikel`

<img src="file/2_7.png" width="max-content">

---

### 2.8. Buat Artikel Detail

<img src="file/2_8.png" width="max-content">

---

### 2.9. Akses `http://localhost:8080/lab11_ci/ci4/public/admin/artikel`

<img src="file/2_11.png" width="max-content">

---

### 2.10. Refresh kembali `http://localhost:8080/lab11_ci/ci4/public/artikel`

<img src="file/3_0.png" width="max-content">

---

# Praktikum 3

---

# Praktikum 4

---

# Praktikum 5

---

# Praktikum 6

---

# Praktikum 7

---

# Praktikum 8

---

# Praktikum 9

---
