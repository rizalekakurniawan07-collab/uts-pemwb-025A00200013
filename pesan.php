<?php
declare(strict_types=1);

require_once 'data.php';
require_once 'functions.php';

$totalBayar = 0;
$rincianPesanan = [];

# Memproses data saat tombol diklik (Metode POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pesananInput = [
        ['id' => (int)($_POST['id_menu_1'] ?? 0), 'porsi' => max(0, (int)($_POST['jumlah_1'] ?? 0))],
        ['id' => (int)($_POST['id_menu_2'] ?? 0), 'porsi' => max(0, (int)($_POST['jumlah_2'] ?? 0))]
    ];

    foreach ($pesananInput as $pesan) {#perulangan untuk memproses pesanan
        if ($pesan['id'] > 0 && $pesan['porsi'] > 0) {#memeriksa apakah id > 0 dan jumlah porsi > 0
            foreach ($menuItems as $item) {#perulangan untuk memproses menu items
                if ($item['id'] === $pesan['id']) {#memeriksa apakah id sama dengan id item
                    $subtotal = hitungHargaDiskon($item['harga'], $item['diskon_persen']) * $pesan['porsi'];#menghitung harga diskon dan dikalikan dengan jumlah porsi
                    $totalBayar += $subtotal;#menambahkan subtotal ke total bayar
                    $rincianPesanan[] = ['nama' => $item['nama'], 'porsi' => $pesan['porsi'], 'subtotal' => $subtotal];
                    break;
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"> <!--membuat halaman pesan-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--menampilkan halaman pesan di berbagai perangkat-->
    <title>Kasir Pemesanan - Kopi Shop Cengklik</title> <!--judul halaman pesan-->
    <link rel="stylesheet" href="style.css"> <!--menampilkan style css-->
</head>
<body>
    <div class="container"> <!--wadah utama halaman pesan-->
        <header>
            <a href="katalog.php" class="nav-back">⬅ Kembali ke Katalog</a>
            <h1>Kasir & Pemesanan Online</h1>
        </header>

        <main>
            <section class="order-card">
                <form action="pesan.php" method="POST">
                    <!-- Dropdown 1: Khusus Minuman -->
                    <div class="form-group">
                        <label for="id_menu_1">Pilih Minuman (Kopi / Non-Kopi):</label>
                        <select name="id_menu_1" id="id_menu_1">
                            <option value="0">--Pilih Nama Minuman--</option>
                            <?php foreach ($menuItems as $item): ?>
                                <?php if (in_array($item['kategori'], ['Kopi', 'Non-Kopi'])): ?>
                                    <option value="<?= $item['id'] ?>">
                                        <?= htmlspecialchars($item['nama']) ?> - <?= formatRupiah(hitungHargaDiskon($item['harga'], $item['diskon_persen'])) ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <input type="number" name="jumlah_1" value="1" min="0" placeholder="Porsi">
                    </div>

                    <!-- Dropdown 2: Khusus Makanan & Snack -->
                    <div class="form-group">
                        <label for="id_menu_2">Pilih Makanan / Snack:</label>
                        <select name="id_menu_2" id="id_menu_2">
                            <option value="0">--Pilih Nama Makanan--</option>
                            <?php foreach ($menuItems as $item): ?>
                                <?php if (in_array($item['kategori'], ['Makanan', 'Snack'])): ?>
                                    <option value="<?= $item['id'] ?>">
                                        <?= htmlspecialchars($item['nama']) ?> - <?= formatRupiah(hitungHargaDiskon($item['harga'], $item['diskon_persen'])) ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <input type="number" name="jumlah_2" value="1" min="0" placeholder="Porsi"> <!--input untuk jumlah porsi-->
                    </div>

                    <button type="submit" class="btn-pesan" style="width: 100%; border: none; cursor: pointer; padding: 12px;">
                        Hitung & Bayar
                    </button> <!--tombol untuk menghitung dan membayar-->
                </form>

                <!-- Tampilan Pembayaran QRIS Dinamis -->
                <?php if (!empty($rincianPesanan)): ?>
                    <div class="qris-box">
                        <h3>Total Pembayaran: <?= formatRupiah($totalBayar) ?></h3>
                        <p style="font-size: 0.85em; color: #555; margin-bottom: 10px;">
                            <?php foreach ($rincianPesanan as $r): ?>
                                [<?= htmlspecialchars($r['nama']) ?> x<?= $r['porsi'] ?>] 
                            <?php endforeach; ?>
                        </p>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=Bayar+Kopi+Cengklik+<?= $totalBayar ?>" alt="QRIS" style="width: 160px; height: 160px;">
                        <p style="font-size: 0.8em; color: #888; margin-top: 5px;">Scan QRIS untuk menyelesaikan pesanan</p>
                    </div>
                <?php endif; ?>
            </section>
        </main>
    </div>
</body>
</html>