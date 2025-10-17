// navbar-scroll.js - Handle navbar scroll behavior
(function() {
    'use strict';

    const navbar = document.querySelector('.navbar');
    const body = document.body;
    let lastScrollTop = 0;
    let scrollTimeout;

    // Throttle scroll event untuk performance
    function throttle(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    function handleScroll() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        // Add scrolled class when scrolled > 50px
        if (scrollTop > 50) {
            navbar.classList.add('scrolled');
            body.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('scrolled');
            body.classList.remove('navbar-scrolled');
        }

        // Hide/show navbar on scroll (optional)
        // Uncomment if you want navbar to hide when scrolling down
        /*
        if (scrollTop > lastScrollTop && scrollTop > 100) {
            // Scrolling down
            navbar.classList.add('navbar-hidden');
        } else {
            // Scrolling up
            navbar.classList.remove('navbar-hidden');
        }
        */

        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    }

    // Attach scroll event with throttle
    window.addEventListener('scroll', throttle(handleScroll, 100));

    // Initial check
    handleScroll();

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdowns = document.querySelectorAll('.dropdown-menu.show');
        const isClickInsideDropdown = event.target.closest('.dropdown');

        if (!isClickInsideDropdown) {
            dropdowns.forEach(dropdown => {
                const bsDropdown = bootstrap.Dropdown.getInstance(dropdown.previousElementSibling);
                if (bsDropdown) {
                    bsDropdown.hide();
                }
            });
        }
    });

    // Smooth scroll untuk anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');

            if (href !== '#' && document.querySelector(href)) {
                e.preventDefault();
                const target = document.querySelector(href);
                const navbarHeight = navbar.offsetHeight;
                const targetPosition = target.offsetTop - navbarHeight - 20;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Close mobile menu when clicking nav link
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    const navbarCollapse = document.querySelector('.navbar-collapse');

    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 992 && navbarCollapse.classList.contains('show')) {
                const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                if (bsCollapse) {
                    bsCollapse.hide();
                }
            }
        });
    });
})();
