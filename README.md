# Praktikum 1-3 Pemrograman Web 2

```bash
Aldi Hermansyah - 312310200 - Ti.23.A2
```

---

## Daftar Praktikum

*   **Praktikum 1** 
    *   1.1. [Aktifkan Extensi](#11-aktifkan-extensi)
    *   1.2. [Buka Browser](#12-buka-browser)
    *   1.3. [Buka PowerShell/CMD](#13-buka-powershell-atau-cmd)
    *   1.4. [Jalankan Perintah](#14-jalankan-perintah)
    *   1.5. [Ubah Nama File](#15-ubah-nama-file)
    *   1.6. [Contoh Error](#16-contoh-error)
    *   1.7. [Menccoba Error](#17-mencoba-error)
    *   1.8. [Instalasi Prasyarat](#18-instalasi-prasyarat)
    *   1.9. [Langkah-Langkah Instalasi](#19-langkah-langkah-instalasi)
    *   1.10. [Konfigurasi Awal](#110-konfigurasi-awal)
    *   1.11. [Penggunaan Dasar](#111-penggunaan-dasar)
    *   1.12. [Contoh Penggunaan Sederhana](#112-contoh-penggunaan-sederhana)
    *   1.13. [Struktur Kode Proyek](#113-struktur-kode-proyek)
    *   1.14. [Kontribusi](#114-kontribusi)
    *   1.15. [Lisensi](#115-lisensi)
    *   1.16. [Ucapan Terima Kasih](#116-ucapan-terima-kasih)
    *   1.17. [Kontak](#117-kontak)
    *   1.18. [FAQ (Pertanyaan yang Sering Diajukan)](#118-faq-pertanyaan-yang-sering-diajukan)
    *   1.19. [Versi Proyek](#119-versi-proyek)
    *   1.20. [Roadmap Pengembangan](#120-roadmap-pengembangan)
    *   1.21. [Dokumentasi Tambahan](#121-dokumentasi-tambahan)
    *   1.22. [Dukungan Komunitas](#122-dukungan-komunitas)
    *   1.23. [Informasi Hak Cipta](#123-informasi-hak-cipta)
    *   1.24. [Disclaimer](#124-disclaimer)
    *   1.25. [Catatan Lainnya](#125-catatan-lainnya)

---

## Praktikum 1

### 1.1. Aktifkan Extensi

Buka xampp -> apache -> config -> php.ini

Hilangkan tanda `;` pada ekstensi yang akan diaktifkan. Kemudian simpan kembali filenya dan restart Apache web server.

<img src="file/1.png" width="max-content">

### 1.2. Buka Browser

Ketik http://localhost:8080/lab11_ci/ci4/public/ di browser. Akan muncul seperti gambar dibawah.

<img src="file/2.png" width="max-content">

Jika error:

```bash
The framework needs the following extension(s) installed and loaded: intl.
```

Pada baris di langkah 1, belum dihilangkan `;`

```bash
before: ;extension=intl
after: extension=intl
```

### 1.3. Buka PowerShell atau CMD

Arahkan ke direktori project `C:/xampp/htdocs/lab11_ci/ci4`. Codeigniter 4 menyediakan CLI untuk mempermudah proses development.

<img src="file/3.png" width="max-content">

### 1.4. Jalankan Perintah

Perintah yang dapat dijalankan untuk memanggil CLI Codeigniter:

```bash
php spark
```

<img src="file/4.png" width="max-content">

### 1.5. Ubah Nama File

File `env` menjadi `.env` dan mengubah nilai variabel `CI_ENVIRONTMENT` menjadi `development`

<img src="file/5.png" width="max-content">

### 1.6. Contoh Error

<img src="file/6.png" width="max-content">

### 1.7. Mencoba Error

Untuk mencoba error diatas, ubah kode pada file `app/Controllers/Home.php`, hilangkan `;` pada akhir kode.

<img src="file/7.png" width="max-content">

### 1.8. Struktur Direktori ci4

Fokus pada folder `app`, dimana folder tersebut adalah area kerja untuk membuat aplikasi. Folder `public` untuk menyimpan aset web seperti `css, gambar, javascript, dll.`

<img src="file/8.png" width="max-content">

### 1.9. Letak Route

Router terletak pada file `app/Config/Routes.php`. Tambahkan kode berikut:

```php
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
```

<img src="file/9.png" width="max-content">

### 1.10. Buka PowerShell

Jalankan perintah:

```bash
php spark routes
```

<img src="file/10.png" width="max-content">

### 1.11. Akses Route

Coba akses route di browser http://localhost:8080/lab11_ci/ci4/public/about dan lihat apa yang terjadi. Ketika diakses akan muncul tampilan error `404 file not found`, artinya file/page tersebut tidak ada.

<img src="file/11.png" width="max-content">

### 1.12. Membuat Controller

Buat file baru dengan nama `Page.php` pada direktori `Controllers` dan isi kodenya:

<img src="file/12.png" width="max-content">

### 1.13. Akses Kembali

Refresh kembali browser, maka halaman sudah dapat diakses.

<img src="file/13.png" width="max-content">

### 1.14 Method Baru

Pada `app/Controllers/Page.php` tambahkan kode berikut:

<img src="file/14.png" width="max-content">

### 1.15. Akses Method Baru

Akses dengan alamat http://localhost:8080/lab11_ci/ci4/public/tos

<img src="file/15.png" width="max-content">

### 1.16.

<img src="file/16.png" width="max-content">

### 1.17.

<img src="file/17.png" width="max-content">

### 1.18.

<img src="file/18.png" width="max-content">

### 1.19.

<img src="file/19.png" width="max-content">

### 1.20.

<img src="file/20.png" width="max-content">

### 1.21.

<img src="file/21.png" width="max-content">

### 1.22.

<img src="file/22.png" width="max-content">

---
