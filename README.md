# Praktikum 1-3 Pemrograman Web 2

```bash
Aldi Hermansyah - 312310200 - Ti.23.A2
```

---

## Daftar Praktikum

*   **Praktikum 1** 
    *   1.1. [Aktifkan Extensi](#11-aktifkan-extensi)
    *   1.2. [Tujuan Proyek](#12-tujuan-proyek)
    *   1.3. [Ruang Lingkup Proyek](#13-ruang-lingkup-proyek)
    *   1.4. [Target Pengguna](#14-target-pengguna)
    *   1.5. [Fitur Utama](#15-fitur-utama)
    *   1.6. [Teknologi yang Digunakan](#16-teknologi-yang-digunakan)
    *   1.7. [Arsitektur Sistem (jika ada)](#17-arsitektur-sistem-jika-ada)
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

*   **Bab 2: Fitur dan Penggunaan Lanjutan**
    *   2.1. [Fitur Tingkat Lanjut 1](#21-fitur-tingkat-lanjut-1)
    *   2.2. [Fitur Tingkat Lanjut 2](#22-fitur-tingkat-lanjut-2)
    *   2.3. [Fitur Tingkat Lanjut 3](#23-fitur-tingkat-lanjut-3)
    *   2.4. [Fitur Tingkat Lanjut 4](#24-fitur-tingkat-lanjut-4)
    *   2.5. [Fitur Tingkat Lanjut 5](#25-fitur-tingkat-lanjut-5)
    *   2.6. [Konfigurasi Lanjutan 1](#26-konfigurasi-lanjutan-1)
    *   2.7. [Konfigurasi Lanjutan 2](#27-konfigurasi-lanjutan-2)
    *   2.8. [Konfigurasi Lanjutan 3](#28-konfigurasi-lanjutan-3)
    *   2.9. [Contoh Penggunaan Lanjutan 1](#29-contoh-penggunaan-lanjutan-1)
    *   2.10. [Contoh Penggunaan Lanjutan 2](#210-contoh-penggunaan-lanjutan-2)
    *   2.11. [Integrasi dengan Sistem Lain 1](#211-integrasi-dengan-sistem-lain-1)
    *   2.12. [Integrasi dengan Sistem Lain 2](#212-integrasi-dengan-sistem-lain-2)
    *   2.13. [API Reference (jika ada) 1](#213-api-reference-jika-ada-1)
    *   2.14. [API Reference (jika ada) 2](#214-api-reference-jika-ada-2)
    *   2.15. [Pemecahan Masalah Umum 1](#215-pemecahan-masalah-umum-1)
    *   2.16. [Pemecahan Masalah Umum 2](#216-pemecahan-masalah-umum-2)
    *   2.17. [Tips dan Trik Penggunaan 1](#217-tips-dan-trik-penggunaan-1)
    *   2.18. [Tips dan Trik Penggunaan 2](#218-tips-dan-trik-penggunaan-2)
    *   2.19. [Panduan Pengembangan Lebih Lanjut 1](#219-panduan-pengembangan-lebih-lanjut-1)
    *   2.20. [Panduan Pengembangan Lebih Lanjut 2](#220-panduan-pengembangan-lebih-lanjut-2)
    *   2.21. [Penyesuaian dan Kustomisasi 1](#221-penyesuaian-dan-kustomisasi-1)
    *   2.22. [Penyesuaian dan Kustomisasi 2](#222-penyesuaian-dan-kustomisasi-2)
    *   2.23. [Skalabilitas Proyek](#223-skalabilitas-proyek)
    *   2.24. [Keamanan Proyek](#224-keamanan-proyek)
    *   2.25. [Best Practices](#225-best-practices)

*   **Bab 3: Pengembangan dan Kontribusi**
    *   3.1. [Lingkungan Pengembangan](#31-lingkungan-pengembangan)
    *   3.2. [Dependencies Pengembangan](#32-dependencies-pengembangan)
    *   3.3. [Setup Lingkungan Pengembangan](#33-setup-lingkungan-pengembangan)
    *   3.4. [Panduan Gaya Penulisan Kode](#34-panduan-gaya-penulisan-kode)
    *   3.5. [Proses Pengujian (Unit Test, Integration Test, dll.)](#35-proses-pengujian-unit-test-integration-test-dll)
    *   3.6. [Menjalankan Pengujian](#36-menjalankan-pengujian)
    *   3.7. [Membuat Pull Request](#37-membuat-pull-request)
    *   3.8. [Alur Kerja Kontribusi](#38-alur-kerja-kontribusi)
    *   3.9. [Pedoman Kontribusi Kode](#39-pedoman-kontribusi-kode)
    *   3.10. [Pedoman Kontribusi Dokumentasi](#310-pedoman-kontribusi-dokumentasi)
    *   3.11. [Struktur Cabang Repository (Branching Strategy)](#311-struktur-cabang-repository-branching-strategy)
    *   3.12. [Aturan Commit Message](#312-aturan-commit-message)
    *   3.13. [Proses Code Review](#313-proses-code-review)
    *   3.14. [Mentoring dan Bimbingan Kontributor](#314-mentoring-dan-bimbingan-kontributor)
    *   3.15. [Komunikasi Tim Pengembang](#315-komunikasi-tim-pengembang)
    *   3.16. [Rapat dan Diskusi](#316-rapat-dan-diskusi)
    *   3.17. [Pelaporan Bug dan Masalah](#317-pelaporan-bug-dan-masalah)
    *   3.18. [Permintaan Fitur Baru](#318-permintaan-fitur-baru)
    *   3.19. [Daftar Kontributor](#319-daftar-kontributor)
    *   3.20. [Penghargaan dan Pengakuan](#320-penghargaan-dan-pengakuan)
    *   3.21. [Panduan untuk Maintainer](#321-panduan-untuk-maintainer)
    *   3.22. [Proses Rilis Proyek](#322-proses-rilis-proyek)
    *   3.23. [Manajemen Versi](#323-manajemen-versi)
    *   3.24. [Keamanan dalam Pengembangan](#324-keamanan-dalam-pengembangan)
    *   3.25. [Rencana Pengembangan Mendatang](#325-rencana-pengembangan-mendatang)

---

## Bab 1: Pengantar

### 1.1. Latar Belakang Proyek
(Jelaskan motivasi dan alasan di balik pembuatan proyek ini.)

### 1.2. Tujuan Proyek
(Sebutkan tujuan utama yang ingin dicapai oleh proyek ini.)

### 1.3. Ruang Lingkup Proyek
(Jelaskan batasan dan cakupan dari proyek ini. Apa yang termasuk dan tidak termasuk.)

### 1.4. Target Pengguna
(Sebutkan siapa saja yang menjadi target pengguna dari proyek ini.)

### 1.5. Fitur Utama
(Sebutkan fitur-fitur paling penting yang ditawarkan oleh proyek ini.)

### 1.6. Teknologi yang Digunakan
(Sebutkan bahasa pemrograman, framework, library, dan alat lain yang digunakan dalam proyek ini.)

### 1.7. Arsitektur Sistem (jika ada)
(Jika proyek Anda memiliki arsitektur yang kompleks, jelaskan di sini.)

### 1.8. Instalasi Prasyarat
(Sebutkan software atau library yang harus diinstal sebelum menggunakan proyek ini.)

### 1.9. Langkah-Langkah Instalasi
(Jelaskan langkah-langkah detail untuk menginstal proyek ini.)

### 1.10. Konfigurasi Awal
(Jelaskan konfigurasi awal yang mungkin perlu dilakukan setelah instalasi.)

### 1.11. Penggunaan Dasar
(Berikan contoh dasar penggunaan proyek ini.)

### 1.12. Contoh Penggunaan Sederhana
(Berikan satu atau dua contoh kode sederhana atau skenario penggunaan.)

### 1.13. Struktur Kode Proyek
(Jelaskan bagaimana kode proyek Anda disusun.)

### 1.14. Kontribusi
(Berikan informasi singkat tentang bagaimana orang lain dapat berkontribusi.)

### 1.15. Lisensi
(Sebutkan jenis lisensi yang digunakan proyek ini.)

### 1.16. Ucapan Terima Kasih
(Ucapkan terima kasih kepada pihak-pihak yang telah berkontribusi.)

### 1.17. Kontak
(Sertakan informasi kontak jika ada pertanyaan atau masalah.)

### 1.18. FAQ (Pertanyaan yang Sering Diajukan)
(Jawab beberapa pertanyaan umum tentang proyek ini.)

### 1.19. Versi Proyek
(Sebutkan versi proyek saat ini.)

### 1.20. Roadmap Pengembangan
(Jika ada rencana pengembangan ke depan, sebutkan di sini.)

### 1.21. Dokumentasi Tambahan
(Sebutkan jika ada dokumentasi lain yang relevan.)

### 1.22. Dukungan Komunitas
(Informasi tentang bagaimana pengguna dapat mendapatkan dukungan dari komunitas.)

### 1.23. Informasi Hak Cipta
(Informasi mengenai hak cipta proyek.)

### 1.24. Disclaimer
(Jika ada hal-hal yang perlu diperhatikan atau disangkal tanggung jawabnya.)

### 1.25. Catatan Lainnya
(Bagian untuk informasi tambahan yang tidak termasuk dalam kategori lain.)

---

## Bab 2: Fitur dan Penggunaan Lanjutan

### 2.1. Fitur Tingkat Lanjut 1
(Jelaskan fitur lanjutan pertama secara detail.)

### 2.2. Fitur Tingkat Lanjut 2
(Jelaskan fitur lanjutan kedua secara detail.)

### 2.3. Fitur Tingkat Lanjut 3
(Jelaskan fitur lanjutan ketiga secara detail.)

### 2.4. Fitur Tingkat Lanjut 4
(Jelaskan fitur lanjutan keempat secara detail.)

### 2.5. Fitur Tingkat Lanjut 5
(Jelaskan fitur lanjutan kelima secara detail.)

### 2.6. Konfigurasi Lanjutan 1
(Jelaskan opsi konfigurasi lanjutan pertama.)

### 2.7. Konfigurasi Lanjutan 2
(Jelaskan opsi konfigurasi lanjutan kedua.)

### 2.8. Konfigurasi Lanjutan 3
(Jelaskan opsi konfigurasi lanjutan ketiga.)

### 2.9. Contoh Penggunaan Lanjutan 1
(Berikan contoh skenario penggunaan fitur lanjutan pertama.)

### 2.10. Contoh Penggunaan Lanjutan 2
(Berikan contoh skenario penggunaan fitur lanjutan kedua.)

### 2.11. Integrasi dengan Sistem Lain 1
(Jelaskan bagaimana proyek ini dapat berintegrasi dengan sistem lain yang relevan.)

### 2.12. Integrasi dengan Sistem Lain 2
(Jelaskan integrasi lain dengan sistem yang berbeda.)

### 2.13. API Reference (jika ada) 1
(Jika proyek memiliki API, jelaskan bagian pertama dari referensinya.)

### 2.14. API Reference (jika ada) 2
(Lanjutkan penjelasan referensi API.)

### 2.15. Pemecahan Masalah Umum 1
(Berikan solusi untuk masalah umum pertama yang mungkin dihadapi pengguna.)

### 2.16. Pemecahan Masalah Umum 2
(Berikan solusi untuk masalah umum kedua.)

### 2.17. Tips dan Trik Penggunaan 1
(Bagikan tips dan trik berguna untuk menggunakan proyek ini secara efektif.)

### 2.18. Tips dan Trik Penggunaan 2
(Lanjutkan berbagi tips dan trik.)

### 2.19. Panduan Pengembangan Lebih Lanjut 1
(Berikan panduan untuk pengembang yang ingin memperluas atau memodifikasi proyek.)

### 2.20. Panduan Pengembangan Lebih Lanjut 2
(Lanjutkan panduan pengembangan.)

### 2.21. Penyesuaian dan Kustomisasi 1
(Jelaskan cara menyesuaikan atau mengkustomisasi proyek.)

### 2.22. Penyesuaian dan Kustomisasi 2
(Lanjutkan penjelasan kustomisasi.)

### 2.23. Skalabilitas Proyek
(Diskusikan bagaimana proyek ini dapat diskalakan.)

### 2.24. Keamanan Proyek
(Jelaskan langkah-langkah keamanan yang diterapkan dalam proyek.)

### 2.25. Best Practices
(Bagikan praktik terbaik untuk menggunakan atau mengembangkan proyek ini.)

---

## Bab 3: Pengembangan dan Kontribusi

### 3.1. Lingkungan Pengembangan
(Jelaskan lingkungan pengembangan yang direkomendasikan.)

### 3.2. Dependencies Pengembangan
(Sebutkan dependencies yang dibutuhkan untuk pengembangan.)

### 3.3. Setup Lingkungan Pengembangan
(Jelaskan langkah-langkah untuk menyiapkan lingkungan pengembangan.)

### 3.4. Panduan Gaya Penulisan Kode
(Sebutkan standar atau gaya penulisan kode yang harus diikuti.)

### 3.5. Proses Pengujian (Unit Test, Integration Test, dll.)
(Jelaskan jenis pengujian yang ada dan bagaimana cara kerjanya.)

### 3.6. Menjalankan Pengujian
(Jelaskan cara menjalankan pengujian.)

### 3.7. Membuat Pull Request
(Panduan langkah demi langkah untuk membuat pull request.)

### 3.8. Alur Kerja Kontribusi
(Jelaskan alur kerja kontribusi secara keseluruhan.)

### 3.9. Pedoman Kontribusi Kode
(Pedoman khusus untuk kontribusi kode.)

### 3.10. Pedoman Kontribusi Dokumentasi
(Pedoman khusus untuk kontribusi dokumentasi.)

### 3.11. Struktur Cabang Repository (Branching Strategy)
(Jelaskan strategi pencabangan yang digunakan dalam repository.)

### 3.12. Aturan Commit Message
(Jelaskan format dan aturan untuk pesan commit.)

### 3.13. Proses Code Review
(Jelaskan bagaimana code review dilakukan.)

### 3.14. Mentoring dan Bimbingan Kontributor
(Informasi tentang program mentoring atau bimbingan bagi kontributor baru.)

### 3.15. Komunikasi Tim Pengembang
(Jelaskan saluran komunikasi yang digunakan oleh tim pengembang.)

### 3.16. Rapat dan Diskusi
(Informasi tentang rapat atau diskusi rutin yang diadakan.)

### 3.17. Pelaporan Bug dan Masalah
(Jelaskan cara melaporkan bug atau masalah.)

### 3.18. Permintaan Fitur Baru
(Jelaskan cara mengajukan permintaan fitur baru.)

### 3.19. Daftar Kontributor
(Anda bisa secara otomatis memperbarui ini atau menyebutkan kontributor utama.)

### 3.20. Penghargaan dan Pengakuan
(Cara proyek menghargai kontributor.)

### 3.21. Panduan untuk Maintainer
(Panduan khusus untuk maintainer proyek.)

### 3.22. Proses Rilis Proyek
(Jelaskan bagaimana rilis proyek dilakukan.)

### 3.23. Manajemen Versi
(Jelaskan bagaimana proyek melakukan manajemen versi.)

### 3.24. Keamanan dalam Pengembangan
(Praktik keamanan yang harus diikuti selama pengembangan.)

### 3.25. Rencana Pengembangan Mendatang
(Rincian lebih lanjut tentang rencana pengembangan di masa depan.)

---

### 1.1. Aktifkan Extensi
Pada file xampp -> apache -> config -> php.ini. Hilangkan tanda `;` pada ekstensi yang akan diaktifkan. Kemudian simpan kembali filenya dan restart Apache web server.

<img src="file/1.png" width="max-content">

### 1.2. Ketik http://localhost:8080/lab11_ci/ci4/public/ di browser

Akan muncul seperti gambar dibawah.

Jika error:

```bash
The framework needs the following extension(s) installed and loaded: intl.
```

Pada baris di langkah 1, belum dihilangkan `;`

```bash
before: ;extension=intl
after: extension=intl
```

<img src="file/2.png" width="max-content">

### 1.3. Di PowerShell/CMD arahkan ke direktori project `C:/xampp/htdocs/lab11_ci/ci4`

Codeigniter 4 menyediakan CLI untuk mempermudah proses development.

<img src="file/3.png" width="max-content">

### 1.4. Jalankan perintah `php spark`

Perintah yang dapat dijalankan untuk memanggil CLI Codeigniter.

<img src="file/4.png" width="max-content">

### 1.5. Ubah nama file `env` menjadi `.env` dan mengubah nilai variabel `CI_ENVIRONTMENT` menjadi `development`

<img src="file/5.png" width="max-content">

### 1.6.

<img src="file/6.png" width="max-content">

### 1.7.

<img src="file/7.png" width="max-content">

### 1.8.

<img src="file/8.png" width="max-content">

### 1.9.

<img src="file/9.png" width="max-content">

### 1.10.

<img src="file/10.png" width="max-content">

### 1.11.

<img src="file/11.png" width="max-content">

### 1.12.

<img src="file/12.png" width="max-content">

### 1.13.

<img src="file/13.png" width="max-content">

### 1.14

<img src="file/14.png" width="max-content">

### 1.15.

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
