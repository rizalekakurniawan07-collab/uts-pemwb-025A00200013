<?php
declare(strict_types=1);

# Mengimpor data dan fungsi logika
require_once 'data.php';
require_once 'functions.php';

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
            font-size: 0.85em;
            color: #27ae60;
            margin-top: 4px;
        }
        .card-img {
            width: 100%;
            height: 160px;
            object-fit: cover;
        }
        .nav-back {
            display: inline-block;
            margin-bottom: 15px;
            color: #2c3e50;
            text-decoration: none;
            font-weight: bold;
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
                    $hargaEfektif = hitungHargaDiskon($item['harga'], $item['diskon_persen']);
                    $isTermurah = ($item['id'] === $idMenuTermurah);
                ?>
                <div class="menu-card">
                    <div class="card-badges">
                        <?php if ($item['is_promo']): ?>
                            <span class="badge badge-promo">PROMO <?= $item['diskon_persen'] ?>%</span>
                        <?php endif; ?>
                        <?php if ($isTermurah): ?>
                            <span class="badge badge-cheapest">PALING TERJANGKAU</span>
                        <?php endif; ?>
                    </div>
                    <!-- Foto Menu Produk -->
                    <img src="<?= htmlspecialchars($item['gambar']) ?>" alt="<?= htmlspecialchars($item['nama']) ?>" class="card-img">
                    
                    <div class="card-body">
                        <span class="category-tag"><?= htmlspecialchars($item['kategori']) ?></span>
                        <h3 class="card-title"><?= htmlspecialchars($item['nama']) ?></h3>
                        <p class="card-desc"><?= htmlspecialchars($item['deskripsi']) ?></p>
                        
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