<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../koneksi/database.php';
require_once '../models/tiketImax.php';

$database = new Database();
$pdo = $database->getConnection();

$daftarTiket = TiketIMAX::ambilSemuaData($pdo);

// LOGIKA PAGINATION
$perPage = 10;
$totalData = count($daftarTiket);
$totalPages = ceil($totalData / $perPage);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
if ($page > $totalPages && $totalPages > 0) $page = $totalPages;
$offset = ($page - 1) * $perPage;
$dataHalamanIni = array_slice($daftarTiket, $offset, $perPage);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tiket Studio IMAX - Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --bg-main: #f4f6f9;
            --card-bg: #ffffff;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --border-light: #e2e8f0;
            --accent-imax: #198754;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-main);
            color: var(--text-dark);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade {
            animation: fadeIn 0.5s ease-out forwards;
        }
        .premium-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-light);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            overflow: hidden;
        }
        .card-header-custom {
            background-color: transparent;
            border-bottom: 1px solid var(--border-light);
            padding: 1.5rem;
            border-top: 4px solid var(--accent-imax);
        }
        .btn-back {
            background-color: #ffffff;
            color: var(--text-muted);
            border: 1px solid var(--border-light);
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-back:hover {
            background-color: #f8fafc;
            color: var(--text-dark);
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            transform: translateX(-4px);
        }
        .table {
            margin-bottom: 0;
            color: var(--text-dark);
        }
        .table > thead > tr > th {
            background-color: #f8fafc;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--border-light);
            padding: 1rem;
        }
        .table > tbody > tr > td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-light);
        }
        .list-unstyled li {
            margin-bottom: 0.25rem;
            font-size: 0.95rem;
        }
        .pagination .page-link {
            color: var(--text-muted);
            border-color: var(--border-light);
            box-shadow: none;
        }
        .pagination .page-item.active .page-link {
            background-color: var(--accent-imax);
            border-color: var(--accent-imax);
            color: #fff;
        }
        .pagination .page-link:hover {
            color: var(--accent-imax);
            background-color: #f8fafc;
        }
    </style>
</head>
<body>

<div class="container py-5 animate-fade">
    <div class="mb-4">
        <a href="../index.php" class="btn-back text-decoration-none d-inline-flex align-items-center">
            <i class="bi bi-arrow-left me-2"></i> Kembali ke Dashboard
        </a>
    </div>

    <div class="premium-card">
        <div class="card-header-custom d-flex align-items-center">
            <div class="p-2 rounded me-3" style="background-color: #e8f5e9; color: var(--accent-imax);">
                <i class="bi bi-display-fill fs-4"></i>
            </div>
            <div>
                <h4 class="mb-0 fw-bold">Studio IMAX</h4>
                <p class="text-muted mb-0 small">Daftar riwayat penjualan tiket dengan proyeksi layar lebar khusus.</p>
            </div>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>Nama Film</th>
                            <th>Jadwal Tayang</th>
                            <th class="text-center">Kursi</th>
                            <th>Total Harga</th>
                            <th>Detail Fasilitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($totalData > 0): ?>
                            <?php foreach ($dataHalamanIni as $tiket): ?>
                                <tr>
                                    <td class="text-center fw-medium text-muted">#<?= $tiket->getIdTiket(); ?></td>
                                    <td class="fw-semibold"><?= $tiket->getNamaFilm(); ?></td>
                                    <td><i class="bi bi-calendar-event me-2 text-muted"></i><?= $tiket->getJadwalTayang(); ?></td>
                                    <td class="text-center"><span class="badge bg-light text-dark border"><?= $tiket->getJumlahKursi(); ?></span></td>
                                    <td class="fw-bold" style="color: var(--accent-imax);">
                                        Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled mb-0 text-muted">
                                            <?php foreach ($tiket->tampilkanInfoFasilitas() as $fitur => $status): ?>
                                                <li><span class="fw-medium text-dark"><?= $fitur; ?>:</span> <?= $status; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-2 d-block mb-2 opacity-50"></i>
                                    Belum ada data tiket untuk studio IMAX.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if ($totalData > 0): ?>
            <div class="p-3 border-top border-light d-flex justify-content-between align-items-center bg-white">
                <span class="text-muted small">
                    Menampilkan <?= $offset + 1 ?> sampai <?= min($offset + $perPage, $totalData) ?> dari <?= $totalData ?> data
                </span>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
                        </li>
                        
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html> 