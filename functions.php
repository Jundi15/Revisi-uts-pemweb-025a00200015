<?php

declare(strict_types=1);

function formatRupiah(int $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function statusStok(int $stok): string
{
    return match (true) {
        $stok === 0 => 'Habis',
        $stok <= 2 => 'Menipis',
        default => 'Tersedia',
    };
}

function kelasBadge(string $status): string
{
    return match ($status) {
        'Habis' => 'badge badge--habis',
        'Menipis' => 'badge badge--menipis',
        default => 'badge badge--aman',
    };
}

function hitungNilaiStok(array $produk): int
{
    $total = 0;

    foreach ($produk as $item) {
        $total += $item['harga'] * $item['stok'];
    }

    return $total;
}

function filterKondisi(array $produk, string $kondisi): array
{
    if ($kondisi === 'Semua') {
        return $produk;
    }

    return array_filter(
        $produk,
        fn(array $item): bool => $item['kondisi'] === $kondisi
    );
}

function e(string $teks): string
{
    return htmlspecialchars($teks, ENT_QUOTES, 'UTF-8');
}
