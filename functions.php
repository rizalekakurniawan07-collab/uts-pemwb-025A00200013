<?php
declare(strict_types=1);
#mengubah angka polos menjadi mata uang rupiah
function formatRupiah(int|float $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
#menghitung harga sesudah di diskon
function hitungHargaDiskon(int|float $hargaAwal, int $diskonPersen): float
{#mengecek jika tidak ada diskon
    if ($diskonPersen <= 0) {
        return (float) $hargaAwal;
    }
    #menghitung harga sesudah di diskon
    return $hargaAwal - ($hargaAwal * ($diskonPersen / 100));
}
#mencari menu termurah
function cariIdMenuTermurah(array $items): ?int
{
    if (empty($items)) {return null;}
#menghitung harga akhir setelah diskon 
    $hargaEfektif = array_map(function ($item) {
        return hitungHargaDiskon($item['harga'], $item['diskon_persen']);
    }, $items);

#mengambil nilai harga terkecil 
    $hargaMin = min($hargaEfektif);

#mencari menu harga termurah 
    foreach ($items as $item) {
        $hargaAkhir = hitungHargaDiskon($item['harga'], $item['diskon_persen']);
        if ($hargaAkhir === $hargaMin) {
            return $item['id'];
        }
    }

    return null;
}
# menghitung rata-rata harga (fungsi berdiri sendiri di luar)
function hitungRataRataHarga(array $items): float
{
    if (empty($items)) {
        return 0.0;
    }

    $total = array_sum(array_column($items, 'harga'));
    return $total / count($items);
}
#menyaring data menu ketika tombol di klik 
function filterMenuPerKategori(array $items, string $kategori): array
{    #mengecek data apakah kosong atau tidak 
    if (empty($kategori) || $kategori === 'Semua') {
        return $items;
    }
    # jika yang dipilih kategori Promo
    if (strtolower($kategori) === 'promo') {
        return array_values(array_filter($items, function ($item) {
            return $item['is_promo'] === true;
        }));
    }
#memfilter data sesuai kategori 
    return array_values(array_filter($items, function ($item) use ($kategori) {
        return strtolower($item['kategori']) === strtolower($kategori);
    }));
}