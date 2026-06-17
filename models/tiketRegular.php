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
}
?>