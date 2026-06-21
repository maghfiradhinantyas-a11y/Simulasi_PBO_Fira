<?php
// index.php

// 1. Import semua file yang dibutuhkan
require_once 'koneksi.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// 2. Inisialisasi Koneksi Database
$database = new Database();
$db = $database->getConnection();

// 3. Ambil data menggunakan Metode Query Spesifik (Tahap 4)
$dataReguler   = PendaftaranReguler::getDaftarReguler($db);
$dataPrestasi  = PendaftaranPrestasi::getDaftarPrestasi($db);
$dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pendaftaran Mahasiswa Baru</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-color: #f0f4f8;
            --card-bg: #ffffff;
            --primary: #0076ff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --reguler-color: #e0f2fe;
            --reguler-text: #0369a1;
            --prestasi-color: #f0fdf4;
            --prestasi-text: #166534;
            --kedinasan-color: #fff7ed;
            --kedinasan-text: #c2410c;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            padding: 40px 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        header {
            margin-bottom: 40px;
            text-align: center;
        }

        header h1 {
            font-size: 2rem;
            color: var(--text-main);
            margin-bottom: 8px;
        }

        header p {
            color: var(--text-muted);
            font-size: 1rem;
        }

        /* Styling Section & Tabel */
        .section-card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 32px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid #e2e8f0;
        }

        .section-title {
            font-size: 1.25rem;
            margin-bottom: 20px;
            display: inline-block;
            padding: 6px 16px;
            border-radius: 20px;
            font-weight: 600;
        }

        .title-reguler { background-color: var(--reguler-color); color: var(--reguler-text); }
        .title-prestasi { background-color: var(--prestasi-color); color: var(--prestasi-text); }
        .title-kedinasan { background-color: var(--kedinasan-color); color: var(--kedinasan-text); }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.95rem;
        }

        th {
            background-color: #f8fafc;
            color: var(--text-muted);
            padding: 14px 16px;
            font-weight: 600;
            border-bottom: 2px solid #edf2f7;
        }

        td {
            padding: 14px 16px;
            border-bottom: 1px solid #edf2f7;
            color: #334155;
        }

        tr:hover {
            background-color: #f8fafc;
        }

        .price-tag {
            font-weight: 600;
            color: var(--primary);
        }

        .info-badge {
            font-size: 0.85rem;
            color: #475569;
            background-color: #f1f5f9;
            padding: 4px 8px;
            border-radius: 6px;
            display: inline-block;
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h1>Simulasi Dashboard Pendaftaran</h1>
        <p>Sistem Informasi Akademik Mahasiswa Baru Berbasis Objek (OOP)</p>
    </header>

    <div class="section-card">
        <div class="section-title title-reguler">Jalur Reguler</div>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Calon</th>
                        <th>Asal Sekolah</th>
                        <th>Nilai Ujian</th>
                        <th>Info Jalur (Polimorfik)</th>
                        <th>Total Biaya (Polimorfik)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataReguler as $row): 
                        // Instansiasi Objek Secara Dinamis dari DB
                        $obj = new PendaftaranReguler(
                            $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                            $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                            $row['pilihan_prodi'], $row['lokasi_kampus']
                        );
                    ?>
                    <tr>
                        <td><?= $obj->getIdPendaftaran(); ?></td>
                        <td><strong><?= $obj->getNamaCalon(); ?></strong></td>
                        <td><?= $obj->getAsalSekolah(); ?></td>
                        <td><?= $obj->getNilaiUjian(); ?></td>
                        <td><span class="info-badge"><?= $obj->tampilkanInfoJalur(); ?></span></td>
                        <td><span class="price-tag">Rp <?= number_format($obj->hitungTotalBiaya(), 2, ',', '.'); ?></span></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="section-card">
        <div class="section-title title-prestasi">Jalur Prestasi</div>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Calon</th>
                        <th>Asal Sekolah</th>
                        <th>Nilai Ujian</th>
                        <th>Info Jalur (Polimorfik)</th>
                        <th>Total Biaya (Polimorfik)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataPrestasi as $row): 
                        $obj = new PendaftaranPrestasi(
                            $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                            $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                            $row['jenis_prestasi'], $row['tingkat_prestasi']
                        );
                    ?>
                    <tr>
                        <td><?= $obj->getIdPendaftaran(); ?></td>
                        <td><strong><?= $obj->getNamaCalon(); ?></strong></td>
                        <td><?= $obj->getAsalSekolah(); ?></td>
                        <td><?= $obj->getNilaiUjian(); ?></td>
                        <td><span class="info-badge"><?= $obj->tampilkanInfoJalur(); ?></span></td>
                        <td><span class="price-tag">Rp <?= number_format($obj->hitungTotalBiaya(), 2, ',', '.'); ?></span></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="section-card">
        <div class="section-title title-kedinasan">Jalur Kedinasan</div>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Calon</th>
                        <th>Asal Sekolah</th>
                        <th>Nilai Ujian</th>
                        <th>Info Jalur (Polimorfik)</th>
                        <th>Total Biaya (Polimorfik)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataKedinasan as $row): 
                        $obj = new PendaftaranKedinasan(
                            $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                            $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                            $row['sk_ikatan_dinas'], $row['instansi_sponsor']
                        );
                    ?>
                    <tr>
                        <td><?= $obj->getIdPendaftaran(); ?></td>
                        <td><strong><?= $obj->getNamaCalon(); ?></strong></td>
                        <td><?= $obj->getAsalSekolah(); ?></td>
                        <td><?= $obj->getNilaiUjian(); ?></td>
                        <td><span class="info-badge"><?= $obj->tampilkanInfoJalur(); ?></span></td>
                        <td><span class="price-tag">Rp <?= number_format($obj->hitungTotalBiaya(), 2, ',', '.'); ?></span></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>