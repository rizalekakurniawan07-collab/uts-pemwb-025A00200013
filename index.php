<?php
declare(strict_types=1);

require_once 'data.php';
require_once 'functions.php';

$kategoriDipilih = $_GET['kategori'] ?? 'Semua';
$filteredMenu = filterMenuPerKategori($menuItems, $kategoriDipilih);
$idMenuTermurah = cariIdMenuTermurah($menuItems);
$kategoriList = ['Semua', 'Kopi', 'Non-Kopi', 'Pastry', 'Makanan'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Menu Kafe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Katalog Menu Kafe</h1>
            <div class="student-info">
                <span><strong>Nama:</strong> Rizal Eka Kurniawan</span> | 
                <span><strong>NIM:</strong> 025A00200013</span>
            </div>
        </header>

        <div class="filter-section">
            <?php foreach ($kategoriList as $kat): ?>
                <a href="?kategori=<?= urlencode($kat) ?>" class="filter-btn <?= $kategoriDipilih === $kat ? 'active' : '' ?>">
                    <?= htmlspecialchars($kat) ?>
                </a>
            <?php endforeach; ?>
        </div>

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
            <p>&copy; <?= date('Y') ?> Rizal Eka Kurniawan - UTS Pemrograman Web</p>
        </footer>
    </div>
</body>
</html>