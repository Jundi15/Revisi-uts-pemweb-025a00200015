<?php

declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - MJAPHONESTORE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <a class="brand" href="index.php" aria-label="Halaman profil MJAPHONESTORE">
                <img
                    src="assets/logo.png"
                    alt="Logo MJAPHONESTORE"
                    class="logo"
                    onerror="this.style.display='none'"
                >
                <span>MJAPHONESTORE</span>
            </a>

            <nav class="nav-utama" aria-label="Navigasi utama">
                <a href="index.php" class="aktif">Profil</a>
                <a href="katalog.php">Katalog</a>
            </nav>
        </div>
    </header>

    <main class="container profil-page">
        <section class="profil-intro">
            <p class="eyebrow">Profil Toko</p>
            <h1>Smartphone pilihan untuk kebutuhan harianmu.</h1>
            <p class="intro-text">
                MJAPHONESTORE melayani jual beli dan tukar tambah smartphone Android maupun iPhone,
                dengan pilihan unit baru dan bekas.
            </p>
            <a class="tombol-utama" href="katalog.php">Lihat katalog</a>
        </section>

        <section class="profil-detail" aria-labelledby="tentang-kami">
            <article class="panel-profil">
                <h2 id="tentang-kami">Tentang Kami</h2>
                <p>
                     Kami Melayani Jual/Beli, Tukar Tambah, dan Tukar Turah Android ataupun iPhone Kamu. Kami memastikan setiap perangkat, mulai dari unit baru hingga unit bekas, melewati tahap <em>Quality Control</em> yang ketat.
                </p>
            </article>

            <article class="panel-profil">
                <h2>Profil Pengembang</h2>
                <dl class="biodata">
                    <div>
                        <dt>Nama</dt>
                        <dd>Muhammad Jundi Assalam</dd>
                    </div>
                    <div>
                        <dt>NIM</dt>
                        <dd>025A00200015</dd>
                    </div>
                    <div>
                        <dt>Program Studi</dt>
                        <dd>Informatika</dd>
                    </div>
                    <div>
                        <dt>Fakultas</dt>
                        <dd>Teknik</dd>
                    </div>
                </dl>
            </article>
        </section>
    </main>

    <footer class="site-footer">
        <p>&copy; <?= htmlspecialchars(date('Y'), ENT_QUOTES, 'UTF-8') ?> MJAPHONESTORE.</p>
    </footer>
</body>
</html>
