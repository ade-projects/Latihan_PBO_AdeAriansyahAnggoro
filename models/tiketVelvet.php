<?php
require_once __DIR__ . '/tiket.php';

class TiketVelvet extends Tiket {
    private ?bool $bantalSelimutPack;
    private ?bool $layananButler;
    protected static string $kategoriStudio = 'Velvet';

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

    public function getBantalSelimutPack(): ?bool {
        return $this->bantalSelimutPack;
    }

    public function getLayananButler(): ?bool {
        return $this->layananButler;
    }

    public function hitungTotalHarga(): int {
        return (int) (($this->jumlah_kursi * $this->hargaDasarTiket) * 1.50);
    }

    public function tampilkanInfoFasilitas(): array {
        $statusBantal = $this->bantalSelimutPack ? "Disediakan" : "Tidak Disediakan";
        $statusButler = $this->layananButler ? "Tersedia" : "Tidak Tersedia";
        
        return [
            'Paket Bantal & Selimut' => $statusBantal,
            'Layanan Butler'         => $statusButler
        ];
    }

    protected static function rakitObjek(array $row): self {
        return new self(
            $row['id_tiket'],
            $row['nama_film'],
            $row['jadwal_tayang'],
            $row['jumlah_kursi'],
            $row['harga_dasar_tiket'],
            $row['bantal_selimut_pack'] !== null ? (bool)$row['bantal_selimut_pack'] : null,
            $row['layanan_butler'] !== null ? (bool)$row['layanan_butler'] : null
        );
    }
}
?>