<?php
declare(strict_types=1);
#mencegah eror ketika salah input kode

# Mengimpor data dan fungsi logika
require_once 'data.php';#memanggil data
require_once 'functions.php';#memanggil fungsi logika

# Pemrosesan filter data menu via URL ($_GET)
$kategoriDipilih = $_GET['kategori'] ?? 'Semua';

# Memanggil fungsi logika
$filteredMenu = filterMenuPerKategori($menuItems, $kategoriDipilih);
$idMenuTermurah = cariIdMenuTermurah($menuItems);
$kategoriList = ['Semua', 'Kopi', 'Non-Kopi', 'Snack', 'Makanan'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopi Shop Cengklik - Katalog Menu</title>
    <!-- Menghubungkan file style CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
        .shop-location {
            font-size: 0.85em; /*mengubah ukuran teks lokasi*/
            color: #27ae60; /*memberikan warna hijau pada teks lokasi */
            margin-top: 4px;
        }
        .card-img {
            width: 100%; /*membuat gambar memenuhi card*/
            height: 160px; /*memberikan tinggi card */
            object-fit: cover; /*membuat gambar memenuhi card */
        }
        .nav-back {
            display: inline-block; /*membuat gambar memenuhi card*/
            margin-bottom: 15px;
            color: #2c3e50; /*memberikan warna hijau pada teks lokasi */
            text-decoration: none;
            font-weight: bold; /*memberikan warna hijau pada teks lokasi */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header & Navigasi -->
        <header>
            <a href="index.php" class="nav-back">⬅ Kembali ke Profil</a>
            <h1>☕ Kopi Shop Cengklik</h1>
            <p class="shop-location">📍 Waduk Cengklik, Boyolali, Jawa Tengah</p>
            <div class="student-info" style="margin-top: 10px;">
                <span><strong>Nama:</strong> Rizal Eka Kurniawan</span> | 
                <span><strong>NIM:</strong> 025A00200013</span>
            </div>
        </header>

        <!-- Tombol Filter Kategori -->
        <div class="filter-section">
            <?php foreach ($kategoriList as $kat): ?>
                <a href="?kategori=<?= urlencode($kat) ?>" class="filter-btn <?= $kategoriDipilih === $kat ? 'active' : '' ?>">
                    <?= htmlspecialchars($kat) ?>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Grid Katalog Menu -->
        <div class="menu-grid">
            <?php foreach ($filteredMenu as $item): ?>
                <?php 
                    $hargaEfektif = hitungHargaDiskon($item['harga'], $item['diskon_persen']);#menampilkan harga sesudah di diskon 
                    $isTermurah = ($item['id'] === $idMenuTermurah);#menampilkan harga termurah
                ?>
                <!--membuat card menu -->
                <div class="menu-card">
                    <div class="card-badges">
                        <?php if ($item['is_promo']): ?>
                            <span class="badge badge-promo">PROMO <?= $item['diskon_persen'] ?>%</span>
                        <?php endif; ?>
                        <?php if ($isTermurah): ?>
                            <span class="badge badge-cheapest">PALING TERJANGKAU</span>
                        <?php endif; ?>
                    </div>
                   <!-- Menggunakan Null Coalescing Operator (??) sebagai fallback gambar default -->
                    <img src="<?= htmlspecialchars($item['gambar'] ?? 'https://via.placeholder.com/400x250?text=Kopi+Shop+Cengklik') ?>" alt="<?= htmlspecialchars($item['nama']) ?>" class="card-img">
                    
                    <div class="card-body">
                        <span class="category-tag"><?= htmlspecialchars($item['kategori']) ?></span> <!--Menampilkan kategori-->
                        <h3 class="card-title"><?= htmlspecialchars($item['nama']) ?></h3><!--Menampilkan nama-->
                        <p class="card-desc"><?= htmlspecialchars($item['deskripsi']) ?></p> <!--Menampilkan deskripsi-->
                        
                        <div class="price-box">
                            <?php if ($item['is_promo']): ?>
                                <span class="original-price"><?= formatRupiah($item['harga']) ?></span>
                                <span class="final-price"><?= formatRupiah($hargaEfektif) ?></span>
                            <?php else: ?>
                                <span class="final-price"><?= formatRupiah($item['harga']) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <footer>
            <p>&copy; <?= date('Y') ?> Kopi Shop Cengklik x Rizal Eka Kurniawan - UTS Pemrograman Web</p>
        </footer>
    </div>
</body>
</html>