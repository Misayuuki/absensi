# Aplikasi Absensi Kelas

Aplikasi ini adalah sistem manajemen absensi kelas sederhana yang mengelola absensi, melihat laporan dari data siswa, dan mengatur pengguna di sini.

## Fitur
- CRUD siswa
- CRUD absensi

## Fitur Tambahan
- login
- signup
- laporan kehadiran siswa berdasarkan rentang tanggal tertentu
- user profile (untuk mengedit profil pengguna)

## Cara Instalasi

1. **Persiapan Lingkungan:**
   - Install XAMPP atau Appserv.
   - Buat database di MySQL dengan nama `absensi` (atau sesuai pilihan).

2. **Langkah Instalasi:**
   - Clone atau download file proyek ini.
   - Pindahkan folder proyek ke direktori `htdocs` di XAMPP atau disesuaikan.
   - Buat database MySQL dengan nama `absensi` atau disesuaikan.
   - Import file `absensi.sql` ke dalam database.
   - Ubah pengaturan koneksi database di file `koneksi.php` (username, password, dan nama database).
   - Akses aplikasi melalui browser: `http://localhost/absensi/`.

## Cara Menggunakan

1. **Login atau daftar akun pengguna**
   - Masuk Kehalaman login jika akun sudah dibuat, jika belum daftarkan akun dan masukan data sesuai form signup.

2. **Masuk kehalaman utama**
   - Masuk Kehalaman utama untuk mengelola absensi dan siswa.
   
3. **Input Siswa:**
   - Masukkan nama dan kelas melalui halaman "Input Siswa".

4. **Lihat Data Siswa:**
   - Lihat data siswa yang sudah di input melalui "Data Siswa".

5. **Input Absen:**
   - piliih siswa, masukan tanggal dan status kehadiran melalui halaman "Input absen".

6. **Lihat Rekap Absensi:**
   - Lihat rekap absensi keseluruhan yang sudah di input melalui "rekap absensi".

7. **Rentang tanggal:**
   - pilih rentang tanggal misalnya dari tanggal 07 januari 2024 sampai 08 januari 2024 untuk melihat data absensi periode tersebut melalui "rekap absensi".

8. **Update Profil akun :**
   - ubah username, email ataupun gambar profil sesuai keinginan.


## Kesulitan yang dihadapi Selama Mengerjakan Proyek

1. **Masalah Jalur File**
   - Awalnya beberapa file tidak bisa dimuat dengan benar karena kesalahan penulisan jalur file atau folder.

2. **Fitur Tambahan Rentang tanggal**
   - Menambahkan fitur seperti filter rentang tanggal atau pencarian memerlukan logika tambahan, yang awalnya cukup membingungkan. Namun, setelah mempelajari contohnya, saya berhasil menyelesaikannya.
