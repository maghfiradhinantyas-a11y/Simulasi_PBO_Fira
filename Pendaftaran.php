<?php
// Pendaftaran.php

abstract class Pendaftaran {
    // 3. Properti Terenkapsulasi (protected)
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar; // Mapping dari kolom biaya_pendaftaran_dasar

    // Constructor untuk memetakan data dari database ke properti objek
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar) {
        $this->id_pendaftaran = $id_pendaftaran;
        $this->nama_calon = $nama_calon;
        $this->asal_sekolah = $asal_sekolah;
        $this->nilai_ujian = $nilai_ujian;
        $this->biayaPendaftaranDasar = $biayaPendaftaranDasar;
    }

    // Getter (Opsional, berguna agar kelas luar atau file utama bisa membaca properti protected ini)
    public function getIdPendaftaran() { return $this->id_pendaftaran; }
    public function getNamaCalon() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilaiUjian() { return $this->nilai_ujian; }
    public function getBiayaPendaftaranDasar() { return $this->biayaPendaftaranDasar; }

    // 4. Metode Abstrak (Wajib diimplementasikan oleh kelas anak nantinya)
    abstract public function hitungTotalBiaya();
    abstract public function tampilkanInfoJalur();
}
?>