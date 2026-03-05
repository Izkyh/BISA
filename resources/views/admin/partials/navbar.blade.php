<nav class="navbar navbar-dark navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1"><i class="bi bi-shield-lock"></i> TIBA Admin</span>
        <div class="d-flex align-items-center">
            <span class="admin-avatar"><i class="bi bi-person"></i></span>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
        </div>
    </div>
</nav>
