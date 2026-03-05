<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'TIBA Surabaya - Tim Bisindo dan Aksesibilitas')</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    @stack('styles')
</head>
<body style="background-color: #f5f5f5;">

    <x-navbar />

    <main style="margin-top: 100px; padding-top: 1.5rem; padding-bottom: 4rem; background-color: #f5f5f5;">
        <div class="container" style="padding-left: 16px; padding-right: 16px;">
            <div class="row" style="--bs-gutter-x: 1.5rem;">

                <div class="col-lg-8" style="padding-left: 0; padding-right: 16px;">
                    <div style="margin-left:-150px;">
                        @yield('content')
                    </div>
                </div>

                <div class="col-lg-4" style="padding-left: 8px; padding-right: 0;">
                    <x-sidebar
                        :popularArticles="$popularArticles ?? []"
                        :upcomingEvents="$upcomingEvents ?? []"
                    />
                </div>

            </div>
        </div>
    </main>

    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('.navbar');
            const body = document.body;

            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                    body.classList.add('navbar-scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                    body.classList.remove('navbar-scrolled');
                }
            });

            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            const navbarCollapse = document.querySelector('.navbar-collapse');

            if (navLinks.length && navbarCollapse) {
                navLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        if (window.innerWidth < 992 && navbarCollapse.classList.contains('show')) {
                            const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                            if (bsCollapse) bsCollapse.hide();
                        }
                    });
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
