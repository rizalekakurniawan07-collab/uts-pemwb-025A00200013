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
$kategoriList = ['Semua', 'Promo', 'Kopi', 'Non-Kopi', 'Snack', 'Makanan'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopi Shop Cengklik - Katalog Menu</title>
    <!-- Menghubungkan file style CSS eksternal -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Header & Navigasi -->
        <header>
            <a href="index.php" class="nav-back">⬅ Kembali ke Profil</a>
            <h1>☕ Kopi Shop Cengklik</h1>
            <p class="shop-location">📍 Waduk Cengklik, Boyolali, Jawa Tengah</p>
            <div class="student-info" style="margin-top: 10px;">

            </div>
        </header>

        <!-- Ringkasan Statistik Menu -->
        <p style="text-align: center; margin-bottom: 20px; color: #555;">
            Total Menu: <strong><?= count($menuItems) ?></strong> | 
            Rata-rata Harga: <strong><?= formatRupiah(hitungRataRataHarga($menuItems)) ?></strong>
        </p>

        <!-- Tombol Filter Kategori -->
        <nav class="filter-section">
            <?php foreach ($kategoriList as $kat): ?>
                <a href="?kategori=<?= urlencode($kat) ?>" class="filter-btn <?= $kategoriDipilih === $kat ? 'active' : '' ?>">
                    <?= htmlspecialchars($kat) ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <!-- Grid Katalog Menu -->
        <main class="menu-grid">
            <?php foreach ($filteredMenu as $item): ?>
                <?php 
                    $hargaEfektif = hitungHargaDiskon($item['harga'], $item['diskon_persen']);
                    $isTermurah = ($item['id'] === $idMenuTermurah);
                ?>
                <article class="menu-card">
                    <div class="card-badges">
                        <?php if ($item['is_promo']): ?>
                            <span class="badge badge-promo">PROMO <?= $item['diskon_persen'] ?>%</span>
                        <?php endif; ?>
                        <?php if ($isTermurah): ?>
                            <span class="badge badge-cheapest">PALING TERJANGKAU</span>
                        <?php endif; ?>
                    </div>
                    <!-- menampilkan gambar item menu -->
                    <img src="<?= htmlspecialchars($item['gambar'] ?? 'https://via.placeholder.com/400x250?text=Kopi+Shop+Cengklik') ?>" alt="<?= htmlspecialchars($item['nama']) ?>" class="card-img">
                    
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

                        <!-- Tombol Menuju Kasir Pemesanan -->
                        <a href="pesan.php" class="btn-pesan">
                            🛒 Pesan Sekarang
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </main>

        <footer>
            <p>&copy; <?= date('Y') ?> Kopi Shop Cengklik x Rizal Eka Kurniawan - UTS Pemrograman Web</p>
        </footer>
    </div>
</body>
</html>