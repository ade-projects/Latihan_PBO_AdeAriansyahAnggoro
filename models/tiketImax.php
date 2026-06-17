<?php
require_once __DIR__ . '/tiket.php';

class TiketIMAX extends Tiket {
    private ?string $kacamata3dId;
    private ?bool $efekGerakFitur;
    protected static string $kategoriStudio = 'IMAX';

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

    public function getKacamata3dId(): ?string {
        return $this->kacamata3dId;
    }

    public function getEfekGerakFitur(): ?bool {
        return $this->efekGerakFitur;
    }

    public function hitungTotalHarga(): int {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) + 35000;
    }

    public function tampilkanInfoFasilitas(): array {
        $statusKacamata = $this->kacamata3dId ? "Disediakan (ID: " . $this->kacamata3dId . ")" : "Tidak Disediakan";
        $statusEfek = $this->efekGerakFitur ? "Aktif" : "Tidak Aktif";
        
        return [
            'Kacamata 3D' => $statusKacamata,
            'Efek Gerak'  => $statusEfek
        ];
    }

    protected static function rakitObjek(array $row): self {
        return new self(
            $row['id_tiket'],
            $row['nama_film'],
            $row['jadwal_tayang'],
            $row['jumlah_kursi'],
            $row['harga_dasar_tiket'],
            $row['kacamata_3d_id'],
            $row['efek_gerak_fitur'] !== null ? (bool)$row['efek_gerak_fitur'] : null
        );
    }
}
?>