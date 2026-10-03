<?php
session_start();
require_once '../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama       = trim($_POST['nama']);
    $no_anggota = trim($_POST['no_anggota']);
    $alamat     = trim($_POST['alamat']);
    $no_hp      = trim($_POST['no_hp']);

    try {
        $sql  = "INSERT INTO anggota (nama, no_anggota, alamat, no_hp) VALUES (:nama, :no_anggota, :alamat, :no_hp)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nama'       => $nama,
            ':no_anggota' => $no_anggota,
            ':alamat'     => $alamat,
            ':no_hp'      => $no_hp
        ]);

        $_SESSION['flash'] = [
            'type'    => 'success',
            'message' => 'Anggota berhasil ditambahkan!'
        ];
        header("Location: list.php");
        exit;

    } catch (PDOException $e) {
        // Kode SQLSTATE 23505 adalah pelanggaran aturan UNIQUE di PostgreSQL
        if ($e->getCode() == '23505') {
            $_SESSION['flash'] = [
                'type'    => 'danger',
                'message' => "No. Anggota '$no_anggota' sudah dipakai, gunakan nomor lain."
            ];
        } else {
            $_SESSION['flash'] = [
                'type'    => 'danger',
                'message' => "Gagal menambahkan anggota: " . $e->getMessage()
            ];
        }
        // Kembalikan pengguna ke form tambah
        header("Location: tambah.php");
        exit;
    }
}