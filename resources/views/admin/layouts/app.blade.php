<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIBA Admin — @yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-w: 240px;
            --navbar-h: 60px;
            --bg: #0f1117;
            --bg-card: #1a1d27;
            --bg-sidebar: #161923;
            --bg-hover: #232736;
            --accent: #4f8cff;
            --accent-2: #7c5cfc;
            --success: #22c55e;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #06b6d4;
            --text: #e2e8f0;
            --muted: #8892a4;
            --border: #2a2e3d;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            margin: 0;
        }

        /* ── NAVBAR ── */
        .top-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--navbar-h);
            background: var(--bg-sidebar);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            padding: 0 20px;
            z-index: 300;
            gap: 12px;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
            width: var(--sidebar-w);
            flex-shrink: 0;
            text-decoration: none;
        }

        .nav-brand-icon {
            width: 32px;
            height: 32px;
            border-radius: 9px;
            background: linear-gradient(135deg, var(--accent), var(--accent-2));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            color: #fff;
        }

        .nav-spacer {
            flex: 1;
        }

        .nav-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-user-name {
            font-size: 0.82rem;
            color: var(--muted);
        }

        .nav-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent), var(--accent-2));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 0.85rem;
            font-weight: 700;
            flex-shrink: 0;
        }

        .btn-logout {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--muted);
            padding: 5px 14px;
            border-radius: 8px;
            font-size: 0.8rem;
            cursor: pointer;
            text-decoration: none;
            transition: all .2s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-logout:hover {
            background: #ff4d6d18;
            border-color: #ff4d6d60;
            color: #ff4d6d;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            position: fixed;
            top: var(--navbar-h);
            left: 0;
            width: var(--sidebar-w);
            height: calc(100vh - var(--navbar-h));
            background: var(--bg-sidebar);
            border-right: 1px solid var(--border);
            overflow-y: auto;
            padding: 16px 10px;
            z-index: 200;
        }

        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 4px;
        }

        .sidebar-label {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: .09em;
            color: var(--muted);
            text-transform: uppercase;
            padding: 0 8px;
            margin: 18px 0 5px;
        }

        .sidebar-label:first-child {
            margin-top: 4px;
        }

        .s-link {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 9px 10px;
            border-radius: 9px;
            color: var(--muted);
            font-size: 0.855rem;
            font-weight: 500;
            text-decoration: none;
            margin-bottom: 1px;
            transition: all .15s;
            border: 1px solid transparent;
        }

        .s-link i {
            width: 18px;
            text-align: center;
            font-size: 0.95rem;
        }

        .s-link:hover {
            background: var(--bg-hover);
            color: var(--text);
        }

        .s-link.active {
            background: linear-gradient(135deg, #4f8cff18, #7c5cfc18);
            color: var(--accent);
            font-weight: 600;
            border-color: #4f8cff28;
        }

        /* dropdown toggle arrow */
        .s-link .chev {
            margin-left: auto;
            font-size: .7rem;
            transition: transform .2s;
        }

        .s-link[aria-expanded="true"] .chev {
            transform: rotate(180deg);
        }

        /* sub links */
        .sub-nav {
            padding-left: 10px;
            margin-top: 2px;
        }

        .sub-nav .s-link {
            font-size: 0.82rem;
            padding: 7px 10px;
        }

        .sub-nav .s-link.active {
            background: #4f8cff12;
            border-color: #4f8cff22;
        }

        /* ── MAIN CONTENT ── */
        .main-wrap {
            margin-left: var(--sidebar-w);
            padding-top: var(--navbar-h);
            min-height: 100vh;
        }

        .page-body {
            padding: 26px 28px;
        }

        /* ── PAGE HEADER ── */
        .ph {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 22px;
            gap: 12px;
        }

        .ph h4 {
            font-size: 1.2rem;
            font-weight: 700;
            margin: 0 0 4px;
        }

        .breadcrumb {
            margin: 0;
            font-size: 0.78rem;
        }

        .breadcrumb-item a {
            color: var(--accent);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--muted);
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: var(--muted);
        }

        /* ── CARD ── */
        .card-admin {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 14px;
            color: var(--text);
            overflow: hidden;
        }

        .card-admin-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 18px;
            border-bottom: 1px solid var(--border);
            font-weight: 600;
            font-size: 0.9rem;
        }

        /* ── STAT CARD ── */
        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 18px 20px;
            transition: transform .2s, box-shadow .2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px #0005;
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 12px;
        }

        .stat-num {
            font-size: 1.8rem;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 3px;
        }

        .stat-lbl {
            color: var(--muted);
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* ── TABLE ── */
        .tbl {
            color: var(--text);
            width: 100%;
            font-size: 0.865rem;
            border-collapse: collapse;
        }

        .tbl thead th {
            background: #1d2030;
            color: var(--muted);
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .06em;
            padding: 11px 16px;
            white-space: nowrap;
            border-bottom: 1px solid var(--border);
        }

        .tbl tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background .12s;
        }

        .tbl tbody tr:last-child {
            border-bottom: none;
        }

        .tbl tbody tr:hover {
            background: #ffffff05;
        }

        .tbl td {
            padding: 12px 16px;
            vertical-align: middle;
        }

        /* ── FORM ── */
        .form-control,
        .form-select {
            background: #1e2232;
            border: 1px solid var(--border);
            color: var(--text);
            border-radius: 9px;
            padding: 9px 13px;
            font-size: 0.875rem;
            transition: border-color .2s, box-shadow .2s;
        }

        .form-control:focus,
        .form-select:focus {
            background: #1e2232;
            color: var(--text);
            border-color: var(--accent);
            box-shadow: 0 0 0 3px #4f8cff1a;
            outline: none;
        }

        .form-control::placeholder {
            color: var(--muted);
        }

        .form-control.is-invalid {
            border-color: var(--danger);
        }

        .form-label {
            font-weight: 500;
            color: var(--text);
            font-size: 0.84rem;
            margin-bottom: 5px;
            display: block;
        }

        .input-group-text {
            background: #252838;
            border: 1px solid var(--border);
            color: var(--muted);
            font-size: 0.95rem;
        }

        .input-group .form-control {
            border-left: none;
        }

        .input-group .form-control:focus {
            border-color: var(--accent);
        }

        .invalid-feedback {
            font-size: 0.78rem;
            color: var(--danger);
        }

        /* ── BUTTONS ── */
        .btn {
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.86rem;
            padding: 8px 18px;
            border: none;
            transition: all .15s;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-primary {
            background: var(--accent);
            color: #fff;
        }

        .btn-primary:hover {
            background: #3a7aff;
            color: #fff;
        }

        .btn-success {
            background: var(--success);
            color: #fff;
        }

        .btn-success:hover {
            background: #16a34a;
            color: #fff;
        }

        .btn-warning {
            background: var(--warning);
            color: #1a1d27;
        }

        .btn-warning:hover {
            background: #d97706;
        }

        .btn-danger {
            background: var(--danger);
            color: #fff;
        }

        .btn-danger:hover {
            background: #dc2626;
            color: #fff;
        }

        .btn-secondary {
            background: var(--bg-hover);
            border: 1px solid var(--border);
            color: var(--text);
        }

        .btn-secondary:hover {
            background: #2d3147;
            color: #fff;
        }

        .btn-sm {
            padding: 5px 12px;
            font-size: 0.8rem;
            border-radius: 7px;
        }

        .btn-icon {
            width: 30px;
            height: 30px;
            padding: 0;
            justify-content: center;
        }

        /* ── ALERT ── */
        .alert {
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.875rem;
        }

        .alert-success {
            background: #22c55e14;
            border: 1px solid #22c55e40;
            color: #4ade80;
        }

        .alert-danger {
            background: #ef444414;
            border: 1px solid #ef444440;
            color: #f87171;
        }

        /* ── BADGE ── */
        .badge {
            font-weight: 500;
            padding: 3px 9px;
            border-radius: 6px;
            font-size: 0.73rem;
        }

        /* ── PAGINATION ── */
        .pagination {
            margin: 0;
            gap: 4px;
        }

        .pagination .page-link {
            background: var(--bg-card);
            border: 1px solid var(--border);
            color: var(--muted);
            border-radius: 8px !important;
            font-size: 0.82rem;
            padding: 6px 12px;
            transition: all .15s;
            line-height: 1.4;
        }

        .pagination .page-link:hover {
            background: var(--bg-hover);
            color: var(--text);
            border-color: var(--border);
            z-index: 0;
        }

        .pagination .page-item.active .page-link {
            background: var(--accent);
            border-color: var(--accent);
            color: #fff;
            z-index: 0;
        }

        .pagination .page-item.disabled .page-link {
            background: var(--bg-card);
            color: var(--muted);
            opacity: 0.4;
            border-color: var(--border);
        }


        /* ── DIVIDER ── */
        .section-divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 20px 0;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform .3s;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-wrap {
                margin-left: 0;
            }

            .nav-brand {
                width: auto;
            }
        }
    </style>
    @stack('styles')
</head>

<body>

    {{-- NAVBAR --}}
    <header class="top-navbar">
        <a href="{{ route('admin.dashboard') }}" class="nav-brand">
            <div class="nav-brand-icon"><i class="bi bi-shield-lock-fill"></i></div>
            TIBA Admin
        </a>
        <div class="nav-spacer"></div>
        <div class="nav-user">
            <div class="nav-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</div>
            <span class="nav-user-name d-none d-md-inline">{{ auth()->user()->name ?? 'Admin' }}</span>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="bi bi-box-arrow-right"></i>
                    <span class="d-none d-sm-inline">Logout</span>
                </button>
            </form>
        </div>
    </header>

    {{-- SIDEBAR --}}
    @include('admin.components.sidebar')

    {{-- MAIN --}}
    <div class="main-wrap">
        <div class="page-body">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
