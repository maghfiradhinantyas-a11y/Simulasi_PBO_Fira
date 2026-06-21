<?php
// PendaftaranKedinasan.php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // --- ATAS: Tetap Menggunakan Codingan Tahap 4 ---
    private $skIkatanDinas;
    private $instansiSponsor;

    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $skIkatanDinas = null, $instansiSponsor = null) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->skIkatanDinas = $skIkatanDinas;
        $this->instansiSponsor = $instansiSponsor;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Kedinasan | Sponsor: " . $this->instansiSponsor;
    }

    public static function getDaftarKedinasan($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, sk_ikatan_dinas, instansi_sponsor 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Kedinasan'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // --- BAWAH: Tahap 5 - Method Overriding ---
    public function hitungTotalBiaya() {
        // Aturan 3: Dikenakan surcharge tambahan sebesar 25% dari biaya dasar
        return $this->biayaPendaftaranDasar * 1.25;
    }
}
?>