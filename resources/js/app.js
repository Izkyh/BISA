import './bootstrap';
import '../scss/app.scss';

// Import Bootstrap JS
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

// Navbar Scroll Control
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');
    let lastScrollTop = 0;
    let isScrolling;

    window.addEventListener('scroll', function() {
        clearTimeout(isScrolling);

        // Throttle scroll events
        isScrolling = setTimeout(function() {
            let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

            // Add scrolled class when scrolling down
            if (currentScroll > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            // Show/hide navbar based on scroll direction
            if (currentScroll > lastScrollTop && currentScroll > 100) {
                // Scrolling down & past threshold
                navbar.classList.add('navbar-hidden');
            } else {
                // Scrolling up or at top
                navbar.classList.remove('navbar-hidden');
            }

            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
        }, 10);
    }, { passive: true });
});
