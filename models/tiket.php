<?php

abstract class Tiket {
    protected int $id_tiket;
    protected string $nama_film;
    protected string $jadwal_tayang;
    protected int $jumlah_kursi;
    protected int $hargaDasarTiket;
    protected static string $kategoriStudio = '';

    public function __construct(
        int $id_tiket, 
        string $nama_film, 
        string $jadwal_tayang, 
        int $jumlah_kursi, 
        int $hargaDasarTiket
    ) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->hargaDasarTiket = $hargaDasarTiket;
    }

    public function getIdTiket(): int {
        return $this->id_tiket;
    }

    public function getNamaFilm(): string {
        return $this->nama_film;
    }

    public function getJadwalTayang(): string {
        return $this->jadwal_tayang;
    }

    public function getJumlahKursi(): int {
        return $this->jumlah_kursi;
    }

    public function getHargaDasarTiket(): int {
        return $this->hargaDasarTiket;
    }

    public static function ambilSemuaData(PDO $pdo): array {
        $kategori = static::$kategoriStudio;
        $stmt = $pdo->prepare("SELECT * FROM tabel_tiket WHERE jenis_studio = :kategori");
        $stmt->execute(['kategori' => $kategori]);
        $rows = $stmt->fetchAll();
        $result = [];
        foreach ($rows as $row) {
            $result[] = static::rakitObjek($row);
        }
        return $result;
    }

    abstract protected static function rakitObjek(array $row);

    abstract public function hitungTotalHarga(): int;

    abstract public function tampilkanInfoFasilitas(): array;
}

?>