<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => '10 Tips Efektif Mempelajari Bahasa Isyarat dengan Cepat',
                'excerpt' => 'Mempelajari bahasa isyarat adalah langkah penting untuk membuka komunikasi dengan komunitas Tuli. Berikut adalah 10 tips efektif untuk mempercepat pembelajaran Anda.',
                'body' => '<p>Mempelajari bahasa isyarat adalah langkah penting untuk membuka komunikasi dengan komunitas Tuli dan penyandang gangguan pendengaran. Bahasa isyarat bukan hanya sekadar gerakan tangan, melainkan bahasa yang kaya dan ekspresif yang memiliki struktur tata bahasa sendiri.</p>

<p>Dengan dedikasi dan metode yang tepat, Anda dapat menguasainya lebih cepat dari yang dibayangkan. Berikut adalah 10 tips efektif yang akan membantu Anda dalam perjalanan belajar bahasa isyarat.</p>

<h3>1. Mulai dengan Alfabet Jari</h3>
<p>Alfabet jari adalah fondasi dasar dalam bahasa isyarat. Pelajari dan praktikkan setiap hari hingga hafal.</p>

<h3>2. Praktik dengan Teman Tuli</h3>
<p>Tidak ada cara yang lebih baik untuk belajar selain praktik langsung dengan penutur asli bahasa isyarat.</p>

<h3>3. Gunakan Aplikasi Pembelajaran</h3>
<p>Manfaatkan teknologi dengan menggunakan aplikasi pembelajaran bahasa isyarat yang interaktif.</p>',
                'image_path' => null,
            ],
            [
                'title' => 'Memahami Budaya Tuli: Lebih dari Sekadar Bahasa Isyarat',
                'excerpt' => 'Menyelami perspektif dan keunikan budaya Tuli yang kaya akan nilai dan cara berekspresi yang khas.',
                'body' => '<p>Budaya Tuli adalah aspek yang sering terlupakan ketika kita belajar tentang bahasa isyarat. Memahami budaya ini sama pentingnya dengan menguasai bahasanya.</p>

<p>Komunitas Tuli memiliki nilai, norma, dan cara komunikasi yang unik. Mereka memandang diri mereka bukan sebagai orang yang memiliki kekurangan, melainkan sebagai komunitas dengan bahasa dan budaya yang berbeda.</p>

<h3>Identitas Budaya Tuli</h3>
<p>Bagi banyak orang Tuli, identitas mereka sangat terkait dengan bahasa isyarat dan komunitas Tuli. Ini bukan tentang kehilangan pendengaran, tetapi tentang memiliki cara komunikasi yang berbeda.</p>',
                'image_path' => null,
            ],
            [
                'title' => 'Peran Teknologi dalam Mendukung Aksesibilitas Tuli',
                'excerpt' => 'Menjelajahi bagaimana inovasi teknologi membantu memecah hambatan komunikasi bagi teman tuli.',
                'body' => '<p>Teknologi telah membawa perubahan signifikan dalam meningkatkan aksesibilitas bagi komunitas Tuli. Dari aplikasi penerjemah bahasa isyarat hingga alat komunikasi visual, inovasi teknologi terus berkembang.</p>

<h3>Aplikasi Video Call</h3>
<p>Aplikasi seperti Zoom, Google Meet, dan WhatsApp Video memungkinkan komunikasi tatap muka yang sangat penting untuk bahasa isyarat.</p>

<h3>Subtitle Otomatis</h3>
<p>Teknologi speech-to-text telah memungkinkan konten video memiliki subtitle otomatis, membuka akses ke berbagai konten edukatif dan hiburan.</p>',
                'image_path' => null,
            ],
            [
                'title' => 'Kegiatan Technical Meeting Bersama TIBA SURABAYA',
                'excerpt' => 'Kegiatan ini menjadi ajang koordinasi, berbagi ide, dan memastikan setiap detail acara berjalan lancar untuk pengabdian masyarakat tuli.',
                'body' => '<p>Technical Meeting merupakan momen penting dalam persiapan kegiatan pengabdian masyarakat. Dalam pertemuan ini, seluruh tim TIBA Surabaya berkumpul untuk membahas detail pelaksanaan kegiatan.</p>

<p>Agenda technical meeting mencakup pembahasan rundown acara, pembagian tugas, koordinasi dengan mitra, dan persiapan materi yang akan disampaikan kepada masyarakat.</p>

<h3>Tujuan Technical Meeting</h3>
<ul>
<li>Memastikan semua anggota tim memahami peran dan tanggung jawab masing-masing</li>
<li>Mengidentifikasi potensi kendala dan menyiapkan solusi</li>
<li>Menyamakan visi dan misi kegiatan</li>
<li>Membangun chemistry dan kerjasama tim</li>
</ul>',
                'image_path' => null,
            ],
            [
                'title' => 'Pentingnya Bahasa Isyarat di Lingkungan Kerja',
                'excerpt' => 'Menciptakan lingkungan kerja yang inklusif sangatlah penting untuk meningkatkan produktivitas dan kesetaraan bagi semua karyawan.',
                'body' => '<p>Inklusivitas di tempat kerja bukan hanya tentang kepatuhan terhadap regulasi, tetapi tentang menciptakan lingkungan yang menghargai keberagaman dan memaksimalkan potensi setiap individu.</p>

<p>Ketika perusahaan mengadopsi bahasa isyarat di lingkungan kerja, mereka membuka peluang bagi talenta-talenta terbaik dari komunitas Tuli.</p>

<h3>Manfaat Lingkungan Kerja Inklusif</h3>
<ul>
<li>Meningkatkan keberagaman perspektif dan inovasi</li>
<li>Memperluas pool talenta perusahaan</li>
<li>Meningkatkan reputasi perusahaan</li>
<li>Menciptakan budaya kerja yang lebih empati dan kolaboratif</li>
</ul>',
                'image_path' => null,
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
