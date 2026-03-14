document.addEventListener('DOMContentLoaded', function () {
    let lastScrollTop = 0;
    const navbar = document.querySelector('.navbar');
    const scrollThreshold = 50;

    window.addEventListener('scroll', function () {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > scrollThreshold) {
            navbar.classList.add('scrolled');
            document.body.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
            document.body.classList.remove('scrolled');
        }

        if (scrollTop > lastScrollTop && scrollTop > 100) {
            navbar.classList.add('navbar-hidden');
        } else {
            navbar.classList.remove('navbar-hidden');
        }

        lastScrollTop = scrollTop;
    });

    const LG_BREAKPOINT = 992;

    document.querySelectorAll('.navbar .dropdown').forEach(function (dropdown) {
        let hideTimeout = null;

        function showDropdown() {
            clearTimeout(hideTimeout);
            const menu = dropdown.querySelector('.dropdown-menu');
            const toggle = dropdown.querySelector('.dropdown-toggle');
            if (menu && toggle) {
                menu.classList.add('show');
                toggle.setAttribute('aria-expanded', 'true');
            }
        }

        function hideDropdown() {
            hideTimeout = setTimeout(function () {
                const menu = dropdown.querySelector('.dropdown-menu');
                const toggle = dropdown.querySelector('.dropdown-toggle');
                if (menu && toggle) {
                    menu.classList.remove('show');
                    toggle.setAttribute('aria-expanded', 'false');
                }
            }, 100);
        }

        dropdown.addEventListener('mouseenter', function () {
            if (window.innerWidth >= LG_BREAKPOINT) {
                showDropdown();
            }
        });

        dropdown.addEventListener('mouseleave', function () {
            if (window.innerWidth >= LG_BREAKPOINT) {
                hideDropdown();
            }
        });

        dropdown.querySelector('.dropdown-toggle')?.addEventListener('click', function (e) {
            if (window.innerWidth < LG_BREAKPOINT) {
                e.preventDefault();
                const menu = dropdown.querySelector('.dropdown-menu');
                const isShown = menu.classList.contains('show');

                document.querySelectorAll('.navbar .dropdown-menu.show').forEach(function (openMenu) {
                    openMenu.classList.remove('show');
                    openMenu.closest('.dropdown')
                        ?.querySelector('.dropdown-toggle')
                        ?.setAttribute('aria-expanded', 'false');
                });

                if (!isShown) {
                    menu.classList.add('show');
                    this.setAttribute('aria-expanded', 'true');
                }
            }
        });
    });

    document.addEventListener('click', function (e) {
        if (window.innerWidth < LG_BREAKPOINT) {
            if (!e.target.closest('.navbar .dropdown')) {
                document.querySelectorAll('.navbar .dropdown-menu.show').forEach(function (menu) {
                    menu.classList.remove('show');
                    menu.closest('.dropdown')
                        ?.querySelector('.dropdown-toggle')
                        ?.setAttribute('aria-expanded', 'false');
                });
            }
        }
    });
});
