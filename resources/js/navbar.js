document.addEventListener('DOMContentLoaded', function() {
    let lastScrollTop = 0;
    const navbar = document.querySelector('.navbar');
    const scrollThreshold = 50;

    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        // Menambah/menghapus kelas scrolled berdasarkan posisi scroll
        if (scrollTop > scrollThreshold) {
            navbar.classList.add('scrolled');
            document.body.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
            document.body.classList.remove('scrolled');
        }

        // Auto hide/show navbar saat scroll naik/turun
        if (scrollTop > lastScrollTop && scrollTop > 100) {
            navbar.classList.add('navbar-hidden');
        } else {
            navbar.classList.remove('navbar-hidden');
        }

        lastScrollTop = scrollTop;
    });
});
