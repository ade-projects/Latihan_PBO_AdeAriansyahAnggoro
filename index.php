<?php
require_once 'koneksi/database.php';

$database = new Database();
$pdo = $database->getConnection();

try {
    $stmtTotal = $pdo->query("SELECT COUNT(*) as total FROM tabel_tiket");
    $totalTiket = $stmtTotal->fetch()['total'];

    $stmtRegular = $pdo->query("SELECT COUNT(*) as total FROM tabel_tiket WHERE jenis_studio = 'Regular'");
    $totalRegular = $stmtRegular->fetch()['total'];

    $stmtImax = $pdo->query("SELECT COUNT(*) as total FROM tabel_tiket WHERE jenis_studio = 'IMAX'");
    $totalImax = $stmtImax->fetch()['total'];

    $stmtVelvet = $pdo->query("SELECT COUNT(*) as total FROM tabel_tiket WHERE jenis_studio = 'Velvet'");
    $totalVelvet = $stmtVelvet->fetch()['total'];

} catch (PDOException $e) {
    die("Gagal mengambil statistik: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumina - Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --bg-main: #f4f6f9; 
            --bg-sidebar: #ffffff; 
            --card-bg: #ffffff; 
            --accent-primary: #2563eb; 
            --accent-primary-glow: rgba(37, 99, 235, 0.2);
            --text-dark: #1e293b; 
            --text-muted: #64748b; 
            --border-light: #e2e8f0; 
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-main);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade {
            animation: fadeIn 0.5s ease-out forwards;
        }

        .sidebar {
            min-width: 260px;
            max-width: 260px;
            min-height: 100vh;
            background-color: var(--bg-sidebar);
            border-right: 1px solid var(--border-light);
            z-index: 10;
            box-shadow: 4px 0 24px rgba(0,0,0,0.02); 
        }
        .brand-logo {
            color: var(--accent-primary);
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }
        .sidebar .nav-link {
            color: var(--text-muted);
            border-radius: 8px;
            margin-bottom: 8px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            font-weight: 500;
        }
        .sidebar .nav-link:hover {
            color: var(--accent-primary);
            background-color: #f8fafc;
            transform: translateX(6px);
        }
        .sidebar .nav-link.active {
            background-color: var(--accent-primary);
            color: #fff;
            box-shadow: 0 4px 12px var(--accent-primary-glow);
        }

        .content-wrapper {
            flex-grow: 1;
            background-color: var(--bg-main);
        }
        .header-title {
            border-bottom: 1px solid var(--border-light);
        }
        .stat-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-light);
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
            position: relative;
            overflow: hidden;
        }
        
        .card-total { border-left: 4px solid var(--accent-primary); }
        .card-regular { border-left: 4px solid #0dcaf0; }
        .card-imax { border-left: 4px solid #198754; }
        .card-velvet { border-left: 4px solid #f59e0b; }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 20px rgba(0,0,0,0.08);
        }
        .stat-card h3 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
        }
        .icon-box {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            border-radius: 12px;
            font-size: 1.8rem;
            transition: all 0.4s ease;
        }
        
        .icon-total { background: #eff6ff; color: var(--accent-primary); }
        .icon-regular { background: #e0f8fd; color: #0dcaf0; }
        .icon-imax { background: #e8f5e9; color: #198754; }
        .icon-velvet { background: #fef3c7; color: #f59e0b; }

        .stat-card:hover .icon-box {
            transform: scale(1.1) rotate(5deg);
        }

        .welcome-card {
            background: linear-gradient(135deg, #ffffff 0%, #eff6ff 100%);
            border: 1px solid #bfdbfe;
            border-radius: 16px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(37, 99, 235, 0.08);
        }
        .welcome-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 6px; height: 100%;
            background-color: var(--accent-primary);
        }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar p-4 d-flex flex-column">
        <div class="text-center mb-5 pb-3 border-bottom border-light">
            <h3 class="brand-logo mb-0"><i class="bi bi-camera-reels-fill me-2"></i>Lumina</h3>
        </div>
        
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="index.php" class="nav-link active py-3">
                    <i class="bi bi-grid-1x2-fill me-3"></i> Dashboard
                </a>
            </li>
            <h6 class="text-uppercase mt-4 mb-3 ps-3" style="font-size: 0.75rem; letter-spacing: 1px; font-weight: 600; color: #94a3b8;">Manajemen Studio</h6>
            <li class="nav-item">
                <a href="views/regular.php" class="nav-link py-3">
                    <i class="bi bi-person-video me-3"></i> Studio Regular
                </a>
            </li>
            <li class="nav-item">
                <a href="views/imax.php" class="nav-link py-3">
                    <i class="bi bi-badge-hd-fill me-3"></i> Studio IMAX
                </a>
            </li>
            <li class="nav-item">
                <a href="views/velvet.php" class="nav-link py-3">
                    <i class="bi bi-gem me-3"></i> Studio Velvet 
                </a>
            </li>
        </ul>
    </div>

    <div class="content-wrapper p-5">
        <div class="header-title d-flex justify-content-between align-items-end mb-5 pb-3 animate-fade" style="animation-delay: 0.1s;">
            <div>
                <h2 class="fw-bold mb-1" style="color: var(--text-dark);">Dashboard Penjualan Tiket</h2>
                <p class="mb-0" style="color: var(--text-muted);">Pantau aktivitas penjualan tiket bioskop secara real-time.</p>
            </div>
            <div class="text-end">
                <div class="px-3 py-2 rounded shadow-sm" style="background: var(--card-bg); border: 1px solid var(--border-light);">
                    <i class="bi bi-calendar3 me-2" style="color: var(--accent-primary);"></i>
                    <span class="fw-medium" style="color: var(--text-dark);"><?= date('d F Y'); ?></span>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-12 col-md-6 col-lg-3 animate-fade" style="animation-delay: 0.2s;">
                <div class="stat-card card-total h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-uppercase mb-1" style="font-size: 0.8rem; letter-spacing: 1px; font-weight: 600; color: var(--text-muted);">Total Penjualan</p>
                            <h3 class="mb-0"><?= $totalTiket; ?> <span style="font-size: 1rem; color: var(--text-muted); font-weight: 500;">Tiket</span></h3>
                        </div>
                        <div class="icon-box icon-total">
                            <i class="bi bi-ticket-detailed-fill"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3 animate-fade" style="animation-delay: 0.3s;">
                <div class="stat-card card-regular h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-uppercase mb-1" style="font-size: 0.8rem; letter-spacing: 1px; font-weight: 600; color: var(--text-muted);">Studio Regular</p>
                            <h3 class="mb-0"><?= $totalRegular; ?></h3>
                        </div>
                        <div class="icon-box icon-regular">
                            <i class="bi bi-collection-play-fill"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3 animate-fade" style="animation-delay: 0.4s;">
                <div class="stat-card card-imax h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-uppercase mb-1" style="font-size: 0.8rem; letter-spacing: 1px; font-weight: 600; color: var(--text-muted);">Studio IMAX</p>
                            <h3 class="mb-0"><?= $totalImax; ?></h3>
                        </div>
                        <div class="icon-box icon-imax">
                            <i class="bi bi-display-fill"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3 animate-fade" style="animation-delay: 0.5s;">
                <div class="stat-card card-velvet h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-uppercase mb-1" style="font-size: 0.8rem; letter-spacing: 1px; font-weight: 600; color: #d97706;">Velvet Class</p>
                            <h3 class="mb-0"><?= $totalVelvet; ?></h3>
                        </div>
                        <div class="icon-box icon-velvet">
                            <i class="bi bi-stars"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>