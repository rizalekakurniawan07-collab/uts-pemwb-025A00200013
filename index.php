<?php
declare(strict_types=1);#php menjaga tipe data secara ketat
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- CSS style untuk mengatur tampilan halaman -->
    <title>Profil Mahasiswa - UTS Pemrograman Web</title>
    <link rel="stylesheet" href="style.css"> <!-- CSS style untuk mengatur tampilan halaman -->
    <style>
        .profile-card {
            background: #ffffff;
            max-width: 500px;
            margin: 40px auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            text-align: center;
        }
        /* Mengatur gambar kafe agar lebarnya pas 100% dan tingginya rapi */
        .cafe-hero-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        /* Mengatur tombol link */
        .btn-katalog, .btn-promo-nav {
            display: inline-block;
            margin: 5px;
            padding: 10px 18px;
            color: #ffffff;
            text-decoration: none;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.9em;
        }
        .btn-katalog { background-color: #2c3e50; }
        .btn-promo-nav { background-color: #e74c3c; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Profil Kafe -->
        <header>
            <h1> Kopi Shop Cengklik</h1>
            <p class="tagline">Menikmati Kopi Hangat dengan Pesona Sunset Waduk Cengklik</p>
        </header>

        <main>
            <!-- Card Profil Kafe -->
            <section class="profile-card">
                <!-- Foto Suasana Kafe -->
                <img src="assets/Outdoor-cenklik.jpg" alt="Suasana Kopi Shop Cengklik" class="cafe-hero-img">
                
                <h2>Tentang Kopi Shop Cengklik</h2>
                <p class="cafe-desc">
                    Kopi Shop Cengklik hadir sebagai ruang bersantai terbaik di Boyolali. Kami menyajikan seduhan kopi lokal pilihan, racikan minuman segar non-kopi, serta aneka camilan lezat dengan latar pemandangan Waduk Cengklik yang menenangkan.
                </p>

                <!-- Informasi Operasional & Kontak -->
                <div class="info-box">
                    <p>📍 <strong>Lokasi:</strong> Tepi Waduk Cengklik, Ngemplak, Boyolali</p>
                    <p>⏰ <strong>Jam Buka:</strong> 08.00 – 22.00 WIB (Setiap Hari)</p>
                </div>

                <!-- Tombol Navigasi Menuju Katalog -->
                <nav class="action-buttons">
                    <a href="katalog.php" class="btn-katalog">📖 Lihat Semua Menu</a>
                    <a href="katalog.php?kategori=Promo" class="btn-promo-nav">🔥 Lihat Menu Promo</a>
                </nav>
            </section>
        </main>

        <!-- Footer Semantik Memuat Identitas Mahasiswa -->
        <footer>
            <div class="student-info">
                <p><strong>Pengembang Sistem:</strong> Rizal Eka Kurniawan | <strong>NIM:</strong> 025A00200013</p>
                <p>&copy; <?= date('Y') ?> UTS Pemrograman Web - Kopi Shop Cengklik</p>
            </div>
        </footer>
    </div>
</body>