## ☕ Kopi Shop Cengklik - Katalog Menu Dinamis

Repositori ini berisi proyek katalog menu interaktif berbasis PHP Native untuk **Kopi Shop Cengklik** yang berlokasi di area Waduk Cengklik, Boyolali, Jawa Tengah. Dibuat khusus untuk memenuhi tugas Ujian Tengah Semester (UTS) Pemrograman Web.

##  Identitas Pembuat
- **Nama**: Rizal Eka Kurniawan
- **NIM**: 025A00200013
- **Program Studi**: Informatika
- **Mata Kuliah**: Pemrograman Web

##  Deskripsi Proyek
Aplikasi web katalog dinamis tanpa *database* (*array-driven structure*) yang dirancang untuk menampilkan menu makanan, minuman, dan makanan ringan di Kopi Shop Cengklik. 

Website ini mengimplementasikan logika program untuk menghitung harga potongan promo secara otomatis, menyaring menu berdasarkan kategori, mendeteksi menu termurah, serta menampilkan tampilan visual menu yang modern dan responsif.



##  Fitur Utama
1. **Penyaringan Kategori Dinamis**: Pengguna dapat memfilter daftar menu berdasarkan kategori (*Kopi, Non-Kopi, Snack, Makanan*) dengan pemrosesan parameter URL (`$_GET`).
2. **Perhitungan Diskon Otomatis**: Menghitung besaran potongan harga berdasarkan persentase promo yang berlaku menggunakan fungsi `hitungHargaDiskon()`.
3. **Pendeteksi Menu Termurah**: Secara otomatis mendeteksi harga efektif terendah dari seluruh data menu menggunakan fungsi `cariIdMenuTermurah()` dan memberikan badge khusus **PALING TERJANGKAU**.
4. **Tampilan Kartu Visual**: Setiap menu dilengkapi foto pratinjau, badge status promo, harga asli (dicoret jika promo), dan harga akhir.



## Teknologi yang Digunakan
- **Bahasa Pemrograman**: PHP (Strict Types enabled)
- **Desain & Styling**: Custom CSS3 (Flexbox & Grid Layout)
- **Manajemen Data**: PHP Array Multidimensi



## Struktur Proyek
```text
uts-pemwb-025A00200013/
├── index.php         # Antarmuka utama dan rendering katalog menu
├── data.php          # Penyimpanan data array multidimensi menu kedai
├── functions.php     # Fungsi logika bisnis (diskon, filter, harga termurah)
├── style.css         # Styling UI responsif dan layout grid
├── .gitignore        # Berkas pengecualian Git
└── README.md         # Dokumentasi resmi proyek