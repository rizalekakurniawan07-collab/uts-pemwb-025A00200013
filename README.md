## Kopi Shop Cengklik - Katalog Menu Dinamis

Repositori ini berisi proyek web katalog menu interaktif berbasis PHP Native untuk Kopi Shop Cengklik yang berlokasi di area Waduk Cengklik, Boyolali, Jawa Tengah. Dibuat khusus untuk memenuhi tugas Ujian Tengah Semester (UTS) Pemrograman Web.

---

## Identitas Pembuat
- **Nama**: Rizal Eka Kurniawan
- **NIM**: 025A00200013
- **Program Studi**: Informatika
- **Mata Kuliah**: Pemrograman Web

---

## Deskripsi Proyek
Aplikasi web berbasis PHP tanpa database (*array-driven structure*) yang terbagi menjadi dua bagian utama:
1. **Halaman Profil (`index.php`)**: Menampilkan identitas mahasiswa, foto profil, dan tombol navigasi menuju halaman katalog.
2. **Halaman Katalog (`katalog.php`)**: Menampilkan daftar menu makanan, minuman, dan snack secara dinamis lengkap dengan logika perhitungan promo dan filter kategori.

---

## Fitur Utama
1. **Halaman Profil & Navigasi**: Halaman landas (`index.php`) interaktif sebagai pintu masuk ke aplikasi katalog.
2. **Penyaringan Kategori Dinamis**: Fitur memfilter daftar menu berdasarkan kategori (Kopi, Non-Kopi, Snack, Makanan) dengan pemrosesan parameter URL (`$_GET`).
3. **Perhitungan Diskon Otomatis**: Menghitung harga promo menggunakan fungsi `hitungHargaDiskon()`.
4. **Pendeteksi Menu Termurah**: Mendeteksi harga terendah dari seluruh menu menggunakan fungsi `cariIdMenuTermurah()` dan memberikan badge khusus **PALING TERJANGKAU**.
5. **Tampilan Kartu Visual**: Tampilan menu modern dengan foto, badge promo, harga asli (dicoret jika promo), dan harga akhir.

---

## Teknologi yang Digunakan
- **Bahasa Pemrograman**: PHP (Strict Types enabled)
- **Desain & Styling**: Custom CSS3 (Flexbox & Grid Layout)
- **Manajemen Data**: PHP Array Multidimensi

---

## Struktur Proyek
```text
uts-pemwb-025A00200013/
├── index.php         # Halaman profil mahasiswa dan pintu masuk navigasi
├── katalog.php       # Halaman utama rendering katalog menu dinamis
├── data.php          # Penyimpanan data array multidimensi menu kedai
├── functions.php     # Fungsi logika bisnis (diskon, filter, harga termurah)
├── style.css         # Styling UI responsif dan layout grid
├── .gitignore        # Berkas pengecualian Git
└── README.md         # Dokumentasi resmi proyek