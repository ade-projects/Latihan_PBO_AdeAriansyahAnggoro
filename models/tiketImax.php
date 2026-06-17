<?php
require_once 'tiket.php';

class TiketIMAX extends Tiket {
    private ?string $kacamata3dId;
    private ?bool $efekGerakFitur;

    public function __construct(
        int $id_tiket, 
        string $nama_film, 
        string $jadwal_tayang, 
        int $jumlah_kursi, 
        int $hargaDasarTiket,
        ?string $kacamata3dId,    
        ?bool $efekGerakFitur     
    ) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }
    
}
?>