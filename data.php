<?php
declare(strict_types=1);#php menjaga tipe data secara ketat 
#mengambil data dari file data.php
# Data utama katalog Kopi Shop Cengklik (8 menu)
$menuItems = [
    [
        'id'            => 1,#mengidentifikasi data/ID
        'nama'          => 'Espresso Double Shot',#nama menu 
        'kategori'      => 'Kopi',#kategori menu
        'harga'         => 22000,#harga menu
        'is_promo'      => false,#menentukan apakah menu sedang promo
        'diskon_persen' => 0,#persentase diskon
        'deskripsi'     => 'Ekstraksi biji kopi arabika pilihan dengan rasa yang kuat dan mantap.',#deskripsi menu
        'gambar'        => 'https://images.unsplash.com/photo-1510591509098-f4fdc6d0ff04?w=400&q=80'#gambar menu
    ],
    [
        'id'            => 2,#mengidentifikasi data/ID
        'nama'          => 'Berry Kissme',#nama menu 
        'kategori'      => 'non-kopi',#kategori menu
        'harga'         => 25000,#harga menu
        'is_promo'      => true,#menentukan apakah menu sedang promo
        'diskon_persen' => 15,#persentase diskon
        'deskripsi'     => 'Minuman segar perpaduan sari buah beri manis dengan foam lembut di atasnya.',#deskripsi menu
        'gambar'        => 'assets/berry-kissme.jpg'#gambar menu
    ],
    [
        'id'            => 3,
        'nama'          => 'Cenkklik Pride',
        'kategori'      => 'Kopi',
        'harga'         => 23000,
        'is_promo'      => false,
        'diskon_persen' => 0,
        'deskripsi'     => 'Signature es kopi susu spesial Kopi Shop Cengklik pemikat sunset.',
        'gambar'        => 'assets/cengklik-pride.jpg'
    ],
    [
        'id'            => 4,
        'nama'          => 'Golden Sunset',
        'kategori'      => 'Non-Kopi',
        'harga'         => 25000,
        'is_promo'      => true,
        'diskon_persen' => 10,
        'deskripsi'     => 'Minuman mocktail dingin segar dengan perasan jeruk dan daun mint tepi waduk.',
        'gambar'        => 'assets/golden-sunset.jpg'
    ],
    [
        'id'            => 5,
        'nama'          => 'Burger Beef Classic',
        'kategori'      => 'Snack',
        'harga'         => 33000,
        'is_promo'      => true,
        'diskon_persen' => 10,
        'deskripsi'     => 'Burger daging sapi gurih lembut dilengkapi seporsi kentang goreng renyah.',
        'gambar'        => 'assets/Burger-beef.jpg'
    ],
    [
        'id'            => 6,
        'nama'          => 'Burger Cengklik',
        'kategori'      => 'Snack',
        'harga'         => 30000,
        'is_promo'      => false,
        'diskon_persen' => 0,
        'deskripsi'     => 'Burger spesial telur dan keju khas Cengklik disajikan bersama french fries.',
        'gambar'        => 'assets/Burger-cenklik.jpg'
    ],
    [
        'id'            => 7,
        'nama'          => 'BBQ Pride',
        'kategori'      => 'Makanan',
        'harga'         => 39000,
        'is_promo'      => false,
        'diskon_persen' => 0,
        'deskripsi'     => 'Daging tenderloin panggang saus BBQ premium disajikan dengan kentang dan salad.',
        'gambar'        => 'assets/BBQ_pride.jpg'
    ],
    [
        'id'            => 8,
        'nama'          => 'Chicken Blackpaper',
        'kategori'      => 'Makanan',
        'harga'         => 27000,
        'is_promo'      => true,
        'diskon_persen' => 10,
        'deskripsi'     => 'Nasi hangat dengan ayam crispy saus lada hitam pedas, paprika, dan salad segar.',
        'gambar'        => 'assets/black-paper.jpg'
    ],
];