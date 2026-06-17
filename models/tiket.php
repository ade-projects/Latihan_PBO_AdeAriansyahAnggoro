<?php

abstract class Tiket {
    protected int $id_tiket;
    protected string $nama_film;
    protected string $jadwal_tayang;
    protected int $jumlah_kursi;
    protected int $hargaDasarTiket;

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

    abstract public function hitungTotalHarga(): int;

    abstract public function tampilkanInfoFasilitas(): string;
}

?>