<footer class="footer">
    <div class="container">
        <div class="footer-content">
            {{-- Tentang Kami Section --}}
            <div class="footer-section">
                <h4>Tentang Kami</h4>
                <p>
                    TIBA (Tim Bisindo dan Aksesibilitas Surabaya) adalah komunitas yang berfokus pada edukasi dan
                    pemberdayaan dalam bidang Bahasa Isyarat Indonesia (BISINDO) serta peningkatan aksesibilitas bagi
                    penyandang disabilitas, khususnya teman tuli.
                </p>
            </div>

            {{-- Kontak Kami Section --}}
            <div class="footer-section">
                <h4>Kontak Kami</h4>
                <div class="contact-item">
                    <i class="fa-solid fa-phone"></i>
                    <span>No. Telp : +62 812456792380</span>
                </div>

                <div class="contact-item">
                    <i class="fa-solid fa-envelope"></i>
                    <a href="mailto:tibaofficialsurabaya@gmail.com">
                        Email : tibaofficialsurabaya@gmail.com
                    </a>
                </div>

                <div class="contact-item">
                    <i class="fa-brands fa-instagram"></i>
                    <a href="https://instagram.com/tibaofficialsurabaya" target="_blank">
                        Instagram : @tibaofficialsurabaya
                    </a>
                </div>

                <div class="contact-item">
                    <i class="fa-brands fa-tiktok"></i>
                    <a href="https://tiktok.com/@tibaofficialsurabaya" target="_blank">
                        Tiktok : @tibaofficialsurabaya
                    </a>
                </div>
            </div>

            {{-- Alamat Kami Section --}}
            <div class="footer-section">
                <h4>Alamat Kami</h4>
                <iframe
                    class="google-map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126646.25732162507!2d112.6326131494954!3d-7.275443781295371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf8381ac47f%3A0x3027e5a73f5f50!2sSurabaya%2C%20Kota%20Surabaya%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1695982636143!5m2!1sid!2sid"
                    width="100%"
                    height="200"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        {{-- Footer Bottom --}}
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} TIBA Surabaya. All Rights Reserved.</p>
        </div>
    </div>
</footer>
