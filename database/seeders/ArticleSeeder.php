<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title'   => '10 Tips Efektif Mempelajari Bahasa Isyarat dengan Cepat',
                'excerpt' => 'Mempelajari bahasa isyarat adalah langkah penting untuk membuka komunikasi dengan komunitas Tuli. Berikut adalah 10 tips efektif untuk mempercepat pembelajaran Anda.',
                'body'    => '<p>Mempelajari bahasa isyarat adalah langkah penting untuk membuka komunikasi dengan komunitas Tuli dan penyandang gangguan pendengaran. Bahasa isyarat bukan hanya sekadar gerakan tangan, melainkan bahasa yang kaya dan ekspresif yang memiliki struktur tata bahasa sendiri.</p>
<p>Dengan dedikasi dan metode yang tepat, Anda dapat menguasainya lebih cepat dari yang dibayangkan.</p>
<h3>1. Mulai dengan Alfabet Jari</h3>
<p>Alfabet jari adalah fondasi dasar dalam bahasa isyarat. Pelajari dan praktikkan setiap hari hingga hafal dan lancar.</p>
<h3>2. Praktik dengan Teman Tuli</h3>
<p>Tidak ada cara yang lebih baik untuk belajar selain praktik langsung dengan penutur asli bahasa isyarat.</p>
<h3>3. Gunakan Aplikasi Pembelajaran</h3>
<p>Manfaatkan teknologi dengan menggunakan aplikasi pembelajaran bahasa isyarat yang interaktif dan mudah diakses kapan saja.</p>
<h3>4. Konsisten Latihan Setiap Hari</h3>
<p>Luangkan minimal 15-30 menit setiap hari untuk berlatih. Konsistensi jauh lebih penting daripada intensitas sesekali.</p>
<h3>5. Tonton Video Bahasa Isyarat</h3>
<p>Banyak konten edukatif di YouTube yang bisa membantu Anda belajar secara visual dan interaktif.</p>',
                'image_path' => null,
            ],
            [
                'title'   => 'Memahami Budaya Tuli: Lebih dari Sekadar Bahasa Isyarat',
                'excerpt' => 'Menyelami perspektif dan keunikan budaya Tuli yang kaya akan nilai dan cara berekspresi yang khas.',
                'body'    => '<p>Budaya Tuli adalah aspek yang sering terlupakan ketika kita belajar tentang bahasa isyarat. Memahami budaya ini sama pentingnya dengan menguasai bahasanya.</p>
<p>Komunitas Tuli memiliki nilai, norma, dan cara komunikasi yang unik. Mereka memandang diri mereka bukan sebagai orang yang memiliki kekurangan, melainkan sebagai komunitas dengan bahasa dan budaya yang berbeda.</p>
<h3>Identitas Budaya Tuli</h3>
<p>Bagi banyak orang Tuli, identitas mereka sangat terkait dengan bahasa isyarat dan komunitas Tuli. Ini bukan tentang kehilangan pendengaran, tetapi tentang memiliki cara komunikasi yang berbeda dan kaya.</p>
<h3>Menghormati Komunitas Tuli</h3>
<p>Saat berinteraksi dengan orang Tuli, penting untuk memahami etiket yang tepat — seperti menatap wajah saat berbicara, tidak berbicara dari belakang, dan menghargai bahasa isyarat mereka.</p>',
                'image_path' => null,
            ],
            [
                'title'   => 'Peran Teknologi dalam Mendukung Aksesibilitas Tuli',
                'excerpt' => 'Menjelajahi bagaimana inovasi teknologi membantu memecah hambatan komunikasi bagi teman tuli.',
                'body'    => '<p>Teknologi telah membawa perubahan signifikan dalam meningkatkan aksesibilitas bagi komunitas Tuli. Dari aplikasi penerjemah bahasa isyarat hingga alat komunikasi visual, inovasi teknologi terus berkembang.</p>
<h3>Aplikasi Video Call</h3>
<p>Aplikasi seperti Zoom, Google Meet, dan WhatsApp Video memungkinkan komunikasi tatap muka yang sangat penting untuk bahasa isyarat.</p>
<h3>Subtitle Otomatis</h3>
<p>Teknologi speech-to-text telah memungkinkan konten video memiliki subtitle otomatis, membuka akses ke berbagai konten edukatif dan hiburan.</p>
<h3>Aplikasi Penerjemah BISINDO</h3>
<p>Beberapa startup Indonesia kini mengembangkan aplikasi yang dapat menerjemahkan bahasa isyarat secara real-time menggunakan kecerdasan buatan.</p>',
                'image_path' => null,
            ],
            [
                'title'   => 'Kegiatan Technical Meeting Bersama TIBA SURABAYA',
                'excerpt' => 'Kegiatan ini menjadi ajang koordinasi, berbagi ide, dan memastikan setiap detail acara berjalan lancar untuk pengabdian masyarakat tuli.',
                'body'    => '<p>Technical Meeting merupakan momen penting dalam persiapan kegiatan pengabdian masyarakat. Dalam pertemuan ini, seluruh tim TIBA Surabaya berkumpul untuk membahas detail pelaksanaan kegiatan.</p>
<p>Agenda technical meeting mencakup pembahasan rundown acara, pembagian tugas, koordinasi dengan mitra, dan persiapan materi yang akan disampaikan kepada masyarakat.</p>
<h3>Tujuan Technical Meeting</h3>
<ul>
<li>Memastikan semua anggota tim memahami peran dan tanggung jawab masing-masing</li>
<li>Mengidentifikasi potensi kendala dan menyiapkan solusi cadangan</li>
<li>Menyamakan visi dan misi kegiatan</li>
<li>Membangun chemistry dan kerjasama tim yang solid</li>
</ul>',
                'image_path' => null,
            ],
            [
                'title'   => 'Pentingnya Bahasa Isyarat di Lingkungan Kerja',
                'excerpt' => 'Menciptakan lingkungan kerja yang inklusif sangatlah penting untuk meningkatkan produktivitas dan kesetaraan bagi semua karyawan.',
                'body'    => '<p>Inklusivitas di tempat kerja bukan hanya tentang kepatuhan terhadap regulasi, tetapi tentang menciptakan lingkungan yang menghargai keberagaman dan memaksimalkan potensi setiap individu.</p>
<h3>Manfaat Lingkungan Kerja Inklusif</h3>
<ul>
<li>Meningkatkan keberagaman perspektif dan mendorong inovasi</li>
<li>Memperluas pool talenta perusahaan</li>
<li>Meningkatkan reputasi dan citra perusahaan di mata publik</li>
<li>Menciptakan budaya kerja yang lebih empati dan kolaboratif</li>
</ul>
<p>Ketika perusahaan mengadopsi bahasa isyarat di lingkungan kerja, mereka membuka peluang bagi talenta-talenta terbaik dari komunitas Tuli.</p>',
                'image_path' => null,
            ],
            [
                'title'   => 'TIBA Surabaya Gelar Pelatihan BISINDO Gratis',
                'excerpt' => 'TIBA Surabaya kembali mengadakan program pelatihan bahasa isyarat Indonesia secara gratis untuk masyarakat umum.',
                'body'    => '<p>TIBA (Teman Inklusif Bahasa Isyarat) Surabaya kembali hadir dengan program pelatihan BISINDO gratis yang terbuka untuk seluruh lapisan masyarakat. Program ini merupakan bagian dari komitmen TIBA dalam mendorong inklusivitas di Kota Surabaya.</p>
<h3>Tentang Program Pelatihan</h3>
<p>Pelatihan ini dirancang untuk pemula yang belum pernah belajar bahasa isyarat sebelumnya. Materi mencakup alfabet jari, kosakata sehari-hari, dan dasar-dasar tata bahasa BISINDO.</p>
<h3>Cara Mendaftar</h3>
<p>Pendaftaran dapat dilakukan secara online melalui Google Form yang tersedia di media sosial TIBA Surabaya. Kuota terbatas untuk memastikan kualitas pembelajaran yang optimal.</p>',
                'image_path' => null,
            ],
            [
                'title'   => 'Mengenal BISINDO: Bahasa Isyarat Indonesia',
                'excerpt' => 'BISINDO adalah bahasa isyarat yang berkembang secara alami di komunitas Tuli Indonesia, berbeda dengan SIBI yang berbasis oral.',
                'body'    => '<p>BISINDO (Bahasa Isyarat Indonesia) adalah bahasa isyarat yang tumbuh dan berkembang secara alami dalam komunitas Tuli di Indonesia. Berbeda dengan SIBI (Sistem Isyarat Bahasa Indonesia) yang dibuat untuk mendampingi bahasa lisan, BISINDO adalah bahasa asli yang digunakan sehari-hari oleh komunitas Tuli.</p>
<h3>Perbedaan BISINDO dan SIBI</h3>
<p>BISINDO memiliki tata bahasa dan struktur kalimat yang unik dan berbeda dari bahasa Indonesia lisan. Sementara SIBI dibuat dengan mengikuti struktur bahasa Indonesia dan diperkenalkan di sekolah-sekolah.</p>
<h3>Mengapa Belajar BISINDO?</h3>
<p>Jika tujuan Anda adalah berkomunikasi dengan komunitas Tuli secara alami dan setara, BISINDO adalah pilihan yang lebih tepat karena inilah bahasa yang mereka gunakan dalam kehidupan sehari-hari.</p>',
                'image_path' => null,
            ],
            [
                'title'   => 'Inklusi Sosial: Hak Penyandang Disabilitas dalam Masyarakat',
                'excerpt' => 'Setiap warga negara berhak mendapatkan akses yang sama dalam kehidupan bermasyarakat, termasuk teman-teman Tuli.',
                'body'    => '<p>Inklusi sosial bukan sekadar slogan — ini adalah hak dasar setiap manusia. Undang-Undang No. 8 Tahun 2016 tentang Penyandang Disabilitas menegaskan bahwa negara wajib memastikan setiap warga mendapatkan kesempatan yang sama.</p>
<h3>Apa Itu Inklusi Sosial?</h3>
<p>Inklusi sosial adalah proses memastikan bahwa setiap orang, terlepas dari latar belakang atau kondisi apapun, memiliki kesempatan yang sama untuk berpartisipasi penuh dalam kehidupan masyarakat.</p>
<h3>Peran Kita Semua</h3>
<p>Inklusi bukan hanya tanggung jawab pemerintah. Setiap individu dapat berkontribusi dengan cara sederhana seperti belajar dasar-dasar bahasa isyarat, menggunakan bahasa yang menghormati, dan menjadi advokat untuk teman-teman Tuli di sekitar kita.</p>',
                'image_path' => null,
            ],
        ];

        foreach ($articles as $article) {
            // ✅ firstOrCreate berdasarkan title untuk hindari duplikat
            Article::firstOrCreate(
                ['title' => $article['title']],
                $article
            );
        }
    }
}
