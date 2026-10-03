<?php
require_once __DIR__ . '/includes/koneksi.php';

// Jalur ke file JSON dari Jobsheet 6
$jsonFile = __DIR__ . '/data/buku.json';

// 1. Cek apakah file JSON ada
if (!file_exists($jsonFile)) {
    die("Error: File $jsonFile tidak ditemukan! Pastikan file buku.json berada di folder data/.");
}

// 2. Baca isi file JSON dan ubah menjadi array PHP
$jsonContent = file_get_contents($jsonFile);
$dataBuku    = json_decode($jsonContent, true);

if (empty($dataBuku)) {
    die("Error: Data JSON kosong atau format tidak valid.");
}

$successCount = 0;
$failCount    = 0;

// 3. Siapkan Query SQL INSERT menggunakan Prepared Statement
$sql = "INSERT INTO buku (judul, pengarang, tahun, stok) 
        VALUES (:judul, :pengarang, :tahun, :stok)";
$stmt = $pdo->prepare($sql);

echo "<h2>Proses Migrasi Data Buku dari JSON ke PostgreSQL</h2>";

// 4. Looping data dari JSON dan masukkan ke PostgreSQL
foreach ($dataBuku as $buku) {
    try {
        $stmt->execute([
            ':judul'     => $buku['judul'] ?? 'Tanpa Judul',
            ':pengarang' => $buku['pengarang'] ?? 'Anonim',
            ':tahun'     => $buku['tahun'] ?? 2024,
            ':stok'      => $buku['stok'] ?? 0
        ]);
        $successCount++;
    } catch (PDOException $e) {
        $failCount++;
        echo "<p style='color:red;'>Gagal mengimpor: " . htmlspecialchars($buku['judul'] ?? 'Unknown') . " - Error: " . $e->getMessage() . "</p>";
    }
}

// 5. Tampilkan Ringkasan Migrasi
echo "<hr>";
echo "<p style='color:green; font-weight:bold;'>Migrasi Selesai!</p>";
echo "<p>Berhasil ditambahkan: <strong>$successCount</strong> buku.</p>";
if ($failCount > 0) {
    echo "<p>Gagal ditambahkan: <strong>$failCount</strong> buku.</p>";
}

echo "<br><a href='buku/list.php'>-> Lihat Daftar Buku di SIMPUS-Mini</a>";