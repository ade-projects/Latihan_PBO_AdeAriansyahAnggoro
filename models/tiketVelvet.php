<?php
require_once 'tiket.php';

class TiketVelvet extends Tiket {
    private ?bool $bantalSelimutPack;
    private ?bool $layananButler;

    public function __construct(
        int $id_tiket, 
        string $nama_film, 
        string $jadwal_tayang, 
        int $jumlah_kursi, 
        int $hargaDasarTiket,
        ?bool $bantalSelimutPack, 
        ?bool $layananButler      
    ) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }
    
}
?>