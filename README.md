# Praktikum 1 Pemrograman Web 2

``` Aldi Hermansyah - 312310200 - Ti.23.A2 ```

> Langkah-langkah praktikum 

---

### 1. Menghilangkan ; pada file xampp -> apache -> config -> php.ini

Hilangkan tanda ; (titik koma) pada ekstensi yang akan diaktifkan. Kemudian simpan kembali filenya dan restart Apache web server.

<img src="file/1.png" width="max-content">

---

### 2. Ketik http://localhost:8080/lab11_ci/ci4/public/

Akan muncul seperti gambar dibawah.

Jika error:

```bash
The framework needs the following extension(s) installed and loaded: intl.
```

Pada baris di langkah 1, belum dihilangkan `;`.

```bash
before: ;extension=intl
after: extension=intl
```

<img src="file/2.png" width="max-content">

---

### 3. 
