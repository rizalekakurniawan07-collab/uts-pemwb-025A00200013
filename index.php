<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa - UTS Pemrograman Web</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .profile-card {
            background: #ffffff;
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            text-align: center;
            border: 1px solid #e9ecef;
        }
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .btn-katalog {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 24px;
            background-color: #2c3e50;
            color: #ffffff;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: background 0.3s ease;
        }
        .btn-katalog:hover {
            background-color: #1a252f;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-card">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=300&q=80" alt="Foto Profil" class="profile-img">
            <h2>Rizal Eka Kurniawan</h2>
            <p style="color: #6c757d; margin-top: 5px;"><strong>NIM:</strong> 025A00200013</p>
            <p style="color: #6c757d;"><strong>Program Studi:</strong> Informatika</p>
            <hr style="margin: 20px 0; border: 0; border-top: 1px solid #eee;">
            <p>Selamat datang di Proyek UTS Pemrograman Web. Aplikasi ini menyajikan katalog menu interaktif untuk Kopi Shop Cengklik.</p>
            
            <a href="katalog.php" class="btn-katalog">☕ Lihat Katalog Menu</a>
        </div>
    </div>
</body>
</html>