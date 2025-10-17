<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'TIBA Surabaya - Tim Bisindo dan Aksesibilitas')</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    {{-- Custom SCSS --}}
    @vite(['resources/scss/app.scss'])

    @stack('styles')
</head>
<body>
    {{-- Navbar Component --}}
    <x-navbar />

    {{-- Main Content with Sidebar --}}
    <div class="container main-content">
        <div class="row">
            {{-- Main Content Area --}}
            <div class="col-lg-8">
                @yield('content')
            </div>

            {{-- Sidebar Area --}}
            <div class="col-lg-4">
                <x-sidebar
                    :popularArticles="$popularArticles ?? []"
                    :upcomingEvents="$upcomingEvents ?? []"
                />
            </div>
        </div>
    </div>

    {{-- Footer Component --}}
    <x-footer />

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Navbar Scroll Script --}}
    <script>
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) navbar.classList.add('scrolled');
        window.onscroll = () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        };
    </script>

    @stack('scripts')
</body>
</html>
