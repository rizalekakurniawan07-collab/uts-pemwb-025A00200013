<?php
declare(strict_types=1);

function formatRupiah(int|float $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function hitungHargaDiskon(int|float $hargaAwal, int $diskonPersen): float
{
    if ($diskonPersen <= 0) {
        return (float) $hargaAwal;
    }
    return $hargaAwal - ($hargaAwal * ($diskonPersen / 100));
}

function cariIdMenuTermurah(array $items): ?int
{
    if (empty($items)) {
        return null;
    }

    $hargaEfektif = array_map(function ($item) {
        return hitungHargaDiskon($item['harga'], $item['diskon_persen']);
    }, $items);

    $hargaMin = min($hargaEfektif);

    foreach ($items as $item) {
        $hargaAkhir = hitungHargaDiskon($item['harga'], $item['diskon_persen']);
        if ($hargaAkhir === $hargaMin) {
            return $item['id'];
        }
    }

    return null;
}

function filterMenuPerKategori(array $items, string $kategori): array
{
    if (empty($kategori) || $kategori === 'Semua') {
        return $items;
    }

    return array_values(array_filter($items, function ($item) use ($kategori) {
        return strtolower($item['kategori']) === strtolower($kategori);
    }));
}