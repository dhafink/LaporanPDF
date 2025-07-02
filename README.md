# 📑 Pendaftaran Kelas 10 RKA

Aplikasi web sederhana untuk **mendaftar siswa kelas 10 RKA** dengan fitur CRUD (Create, Read, Update, Delete) dan cetak bukti pendaftaran dalam format PDF menggunakan Dompdf.

---

## 📋 Daftar Isi

- [Fitur](#-fitur)  
- [Struktur Proyek](#-struktur-proyek)  
- [Setup & Instalasi](#-setup--instalasi)  
- [Penggunaan](#-penggunaan)  
- [Database](#-database)  
- [File & Deskripsi](#-file--deskripsi)  
- [Catatan Pengembang](#-catatan-pengembang)  

---

## 🚀 Fitur

- **List Pendaftar**  
- **Tambah Pendaftar** (NRP, Nama, Email, Telepon)  
- **Edit & Hapus** data pendaftar  
- **Cetak Bukti Terakhir** pendaftaran dalam PDF  
- Tampilan responsif dan mudah digunakan  

---

## 🗂️ Struktur Proyek
pendaftaran-rka/
├── create_database.sql # Skrip SQL membuat database & tabel
├── composer.json # (Opsional) dependency Dompdf
├── vendor/ # folder hasil composer install
├── koneksi.php # koneksi MySQL
├── style.css # styling halaman
├── index.php # halaman utama (tabel & tombol)
├── tambah.php # form tambah pendaftar
├── simpan.php # proses insert & update
├── edit.php # form edit pendaftar
├── hapus.php # proses hapus pendaftar
└── generate_pdf.php # generate PDF bukti pendaftaran

---

## ⚙️ Setup & Instalasi

1. **Start XAMPP**  
   - Jalankan **Apache** & **MySQL** di XAMPP Control Panel.

2. **Buat Database**  
   - Buka `http://localhost/phpmyadmin` → **New** → isi nama `pendaftaran_rka` → **Create**.  
   - Pilih database `pendaftaran_rka` → tab **Import** → upload `create_database.sql` → **Go**.

3. **Copy Proyek**  
   - Ekstrak seluruh folder `pendaftaran-rka/` ke `C:\xampp\htdocs\`.

4. **Install Dependency PDF**  
   - **Dengan Composer** (direkomendasikan):  
     ```bash
     cd C:\xampp\htdocs\pendaftaran-rka
     composer install
     ```  
     Pastikan PHP CLI sudah mengaktifkan ekstensi `zip` dan `git` tersedia di PATH.  
   - **Tanpa Composer**:  
     - Download Dompdf dari https://github.com/dompdf/dompdf/releases  
     - Extract ke `dompdf/` → ubah `generate_pdf.php` jadi:
       ```php
       require 'dompdf/autoload.inc.php';
       use Dompdf\Dompdf;
       ```
5. **Akses Aplikasi**  
   Buka browser dan pergi ke:  https://localhost/pendaftaran-rka/index.php


---

## 🖥️ Penggunaan

1. **Tambah Pendaftar**  
Klik **Tambah Pendaftar**, isi form, kemudian **Simpan**.  
2. **Edit / Hapus**  
Klik **Edit** atau **Hapus** pada baris pendaftar.  
3. **Cetak Bukti Terakhir**  
Klik **Cetak Bukti Terakhir** untuk mengunduh PDF berisi data pendaftar terbaru.

---

## 🗄️ Database

Terlampir `create_database.sql`:

```sql
CREATE DATABASE IF NOT EXISTS pendaftaran_rka;
USE pendaftaran_rka;

CREATE TABLE pendaftar (
id INT AUTO_INCREMENT PRIMARY KEY,
nrp VARCHAR(20) NOT NULL,
nama VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
telepon VARCHAR(15) NOT NULL,
tanggal_daftar TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

📁 File & Deskripsi
create_database.sql
Skrip pembuatan database & tabel pendaftar.

koneksi.php
Inisiasi koneksi MySQL:
<?php
$mysqli = new mysqli('localhost','root','','pendaftaran_rka');
if ($mysqli->connect_error) {
  die('Koneksi gagal: '.$mysqli->connect_error);
}
?>
style.css
Styling antarmuka (container, tabel, tombol).

index.php
Tampilkan daftar pendaftar dalam tabel, plus tombol CRUD & PDF.

tambah.php / edit.php
Form input untuk tambah atau edit data.

simpan.php
Proses insert (jika nrp_lama kosong) atau update (jika ada nrp_lama).

hapus.php
Proses hapus baris berdasarkan nrp.

generate_pdf.php
Mengambil data pendaftar terbaru → render PDF → stream ke browser.

## 📷 Contoh Tampilan

Letakkan file gambar (PNG/JPG) ke dalam folder `assets/` di dalam proyek, lalu referensikan di README seperti ini:

### Halaman Utama  
![Halaman Utama]![image](https://github.com/user-attachments/assets/a8b86f3d-a4e1-4fe7-92c9-bf658b29cd30)


### Form Tambah Pendaftar  
![Form Tambah Pendaftar]![image](https://github.com/user-attachments/assets/0726e2ad-5c18-4cfc-bf97-1fa0da137a14)


### Form Edit Pendaftar  
![Form Edit Pendaftar]![image](https://github.com/user-attachments/assets/dabbb893-919a-4b0d-97f8-899005bb9c57)


### Bukti Pendaftaran (PDF)  
![Bukti Pendaftaran PDF]![image](https://github.com/user-attachments/assets/01ef45cc-e757-4665-97f1-dd6b03756adc)

