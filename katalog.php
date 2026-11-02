<?php

declare(strict_types=1);

require __DIR__ . '/data.php';
require __DIR__ . '/functions.php';

$daftarKondisi = ['Semua', 'Baru', 'Bekas'];
$kondisiDipilih = $_GET['kondisi'] ?? 'Semua';

if (!in_array($kondisiDipilih, $daftarKondisi, true)) {
    $kondisiDipilih = 'Semua';
}

$produkTampil = filterKondisi($daftarProduk, $kondisiDipilih);

$jumlahProduk = count($daftarProduk);

$produkHabis = array_filter(
    $daftarProduk,
    function (array $produk): bool {
        return $produk['stok'] === 0;
    }
);

$jumlahHabis = count($produkHabis);

$nilaiStok = hitungNilaiStok($daftarProduk);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Katalog - <?= e($namaToko) ?></title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header class="site-header">
        <div class="header-inner">

            <a
                class="brand"
                href="index.php"
                aria-label="Halaman profil MJAPHONESTORE"
            >
                <img
                    src="assets/logo.png"
                    alt="Logo MJAPHONESTORE"
                    class="logo"
                    onerror="this.style.display='none'"
                >

                <span><?= e($namaToko) ?></span>
            </a>

            <nav class="nav-utama" aria-label="Navigasi utama">
                <a href="index.php">Profil</a>
                <a href="katalog.php" class="aktif">Katalog</a>
            </nav>

        </div>
    </header>


    <main class="container katalog-page">

        <section
            class="katalog-section"
            aria-labelledby="judul-katalog"
        >

            <div class="katalog-heading">

                <div>
                    <p class="eyebrow">Katalog Smartphone</p>

                    <h1 id="judul-katalog">
                        Pilih perangkat yang sesuai kebutuhanmu.
                    </h1>
                </div>

            <a class="tombol-kembali" href="index.php">
                    Kembali ke profil
                </a>

            </div>


            <div
                class="ringkasan-katalog"
                aria-label="Ringkasan katalog"
            >

                <div class="ringkasan-item">
                    <span class="ringkasan-label">
                        Total produk
                    </span>

                    <strong>
                        <?= e((string) $jumlahProduk) ?>
                    </strong>
                </div>


                <div class="ringkasan-item">
                    <span class="ringkasan-label">
                        Stok habis
                    </span>

                    <strong>
                        <?= e((string) $jumlahHabis) ?>
                    </strong>
                </div>


                <div class="ringkasan-item ringkasan-item--lebar">
                    <span class="ringkasan-label">
                        Nilai aset stok
                    </span>

                    <strong>
                        <?= e(formatRupiah($nilaiStok)) ?>
                    </strong>
                </div>

            </div>


            <div class="filter-bar">

                <span class="filter-label">
                    Kondisi:
                </span>

                <nav
                    class="filter-kondisi"
                    aria-label="Filter kondisi produk"
                >

                    <?php
                    foreach ($daftarKondisi as $kondisi) {
                        $kelasAktif = '';

                        if ($kondisi === $kondisiDipilih) {
                            $kelasAktif = 'aktif';
                        }
                    ?>

                        <a
                            href="?kondisi=<?= e(urlencode($kondisi)) ?>"
                            class="<?= e($kelasAktif) ?>"
                        >
                            <?= e($kondisi) ?>
                        </a>

                    <?php
                    }
                    ?>

                </nav>

            </div>


            <?php
            if (count($produkTampil) === 0) {
            ?>

                <div class="pesan-kosong">
                    <p>
                        Belum ada smartphone untuk kondisi yang dipilih.
                    </p>
                </div>

            <?php
            } else {
            ?>

                <div class="grid-produk">

                    <?php
                    foreach ($produkTampil as $produk) {
                        $statusStok = statusStok($produk['stok']);
                    ?>

                        <article class="kartu-produk">

                            <div class="produk-meta">

                                <span class="<?= e(kelasBadge($statusStok)) ?>">
                                    <?= e($statusStok) ?>
                                </span>

                                <span class="kode-produk">
                                    #<?= e($produk['kode']) ?>
                                </span>

                            </div>


                            <div class="gambar-wrap">

                                <img
                                    src="<?= e($produk['gambar']) ?>"
                                    alt="<?= e(
                                        $produk['merk']
                                        . ' '
                                        . $produk['tipe']
                                    ) ?>"
                                    class="gambar-produk"
                                    onerror="this.onerror=null; this.src='assets/placeholder.svg'"
                                >

                            </div>


                            <div class="produk-isi">

                                <p class="merk-produk">
                                    <?= e($produk['merk']) ?>
                                </p>

                                <h2>
                                    <?= e(
                                        $produk['merk']
                                        . ' '
                                        . $produk['tipe']
                                    ) ?>
                                </h2>


                                <dl class="detail-produk">

                                    <div>
                                        <dt>Kondisi</dt>

                                        <dd>
                                            <?= e($produk['kondisi']) ?>
                                        </dd>
                                    </div>


                                    <div>
                                        <dt>Status unit</dt>

                                        <dd>
                                            <?= e($produk['status']) ?>
                                        </dd>
                                    </div>

                                </dl>


                                <p class="harga">
                                    <?= e(
                                        formatRupiah(
                                            $produk['harga']
                                        )
                                    ) ?>
                                </p>


                                <div class="stok-produk">

                                    <span>
                                        Stok tersedia
                                    </span>

                                    <strong>
                                        <?= e(
                                            (string) $produk['stok']
                                        ) ?>
                                        unit
                                    </strong>

                                </div>

                            </div>

                        </article>

                    <?php
                    }
                    ?>

                </div>

            <?php
            }
            ?>

        </section>

    </main>


    <footer class="site-footer">

        <p>
            &copy;
            <?= e(date('Y')) ?>
            <?= e($namaToko) ?>.
        </p>

    </footer>

</body>
</html>