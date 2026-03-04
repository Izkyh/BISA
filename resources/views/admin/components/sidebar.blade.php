<div class="sidebar d-flex flex-column p-3">
    <div class="brand"><i class="bi bi-shield-lock"></i> TIBA Admin</div>
    <ul class="nav nav-pills flex-column mb-auto">
        <li><a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="bi bi-house-door"></i> <span>Dashboard</span></a></li>
        <li><a href="{{ route('admin.articles.index') }}" class="nav-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}"><i class="bi bi-file-earmark-text"></i> <span>Artikel</span></a></li>
        <li><a href="{{ route('admin.events.index') }}" class="nav-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}"><i class="bi bi-calendar-event"></i> <span>Event</span></a></li>
        <li><a href="{{ route('admin.videos.index') }}" class="nav-link {{ request()->routeIs('admin.videos.*') ? 'active' : '' }}"><i class="bi bi-camera-video"></i> <span>Video</span></a></li>
        <li><a href="{{ route('admin.board_members.index') }}" class="nav-link {{ request()->routeIs('admin.board_members.*') ? 'active' : '' }}"><i class="bi bi-people"></i> <span>Board Member</span></a></li>
        <li><a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"><i class="bi bi-person"></i> <span>User</span></a></li>
    </ul>
</div>
