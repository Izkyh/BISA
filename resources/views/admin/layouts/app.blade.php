

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #181a20 0%, #23272f 100%);
            color: #e0e0e0;
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
        }
        .sidebar {
            background: #20232a;
            min-height: 100vh;
            width: 220px;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 24px;
            box-shadow: 2px 0 16px rgba(0,0,0,0.18);
            z-index: 100;
        }
        .sidebar .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.2rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 32px;
            padding-left: 8px;
        }
        .sidebar .brand i {
            font-size: 1.6rem;
            color: #4f8cff;
        }
        .sidebar .nav-link {
            color: #bfc9da;
            font-weight: 500;
            border-radius: 8px;
            margin-bottom: 10px;
            padding: 12px 18px;
            transition: background 0.2s, color 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background: #313543;
            color: #fff;
            box-shadow: 0 2px 8px rgba(79,140,255,0.08);
        }
        .main-content {
            margin-left: 220px;
            padding: 40px 32px;
            min-height: 100vh;
            background: rgba(24,26,32,0.98);
        }
        .navbar {
            background: #20232a;
            color: #e0e0e0;
            box-shadow: 0 2px 12px rgba(0,0,0,0.12);
            border-bottom: 1px solid #23272f;
            min-height: 56px;
        }
        .navbar .navbar-brand {
            font-size: 1.2rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: #fff;
        }
        .navbar .admin-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #4f8cff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.2rem;
            margin-right: 12px;
        }
        .navbar .btn {
            font-size: 0.95rem;
        }
        .card-dark {
            background: #23272f;
            color: #e0e0e0;
            border: none;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.18);
        }
        .btn-primary, .btn-success, .btn-warning, .btn-danger {
            border-radius: 8px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
        .table-dark {
            background: #23272f;
            color: #e0e0e0;
        }
        .table-dark th, .table-dark td {
            border-color: #313543;
        }
        @media (max-width: 991px) {
            .sidebar {
                width: 100%;
                min-height: auto;
                position: static;
                padding-top: 0;
            }
            .main-content {
                margin-left: 0;
                padding: 24px 8px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"><i class="bi bi-shield-lock"></i> TIBA Admin</span>
            <div class="d-flex align-items-center">
                <span class="admin-avatar"><i class="bi bi-person"></i></span>
                <a href="{{ route('admin.logout') }}" class="btn btn-outline-light btn-sm"><i class="bi bi-box-arrow-right"></i> Logout</a>
            </div>
        </div>
    </nav>
    @include('admin.components.sidebar')
    <main class="main-content">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
