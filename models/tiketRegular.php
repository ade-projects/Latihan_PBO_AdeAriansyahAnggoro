<?php
require_once 'tiket.php';

class TiketRegular extends Tiket {
    private string $tipeAudio;
    private string $lokasiBaris;

    public function __construct(
        int $id_tiket, 
        string $nama_film, 
        string $jadwal_tayang, 
        int $jumlah_kursi, 
        int $hargaDasarTiket,
        string $tipeAudio,      
        string $lokasiBaris     
    ) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    public function getTipeAudio(): string {
        return $this->tipeAudio;
    }

    public function getLokasiBaris(): string {
        return $this->lokasiBaris;
    }

    public function hitungTotalHarga(): int {
        return $this->jumlah_kursi * $this->hargaDasarTiket;
    }

    public function tampilkanInfoFasilitas(): string {
        return "Tipe Audio: " . $this->tipeAudio . ", Lokasi Baris: " . $this->lokasiBaris;
    }
}
?>