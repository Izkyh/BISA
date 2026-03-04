<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BoardMember;
use Carbon\Carbon;

class BoardMemberSeeder extends Seeder
{
    public function run(): void
    {
        // ── FOUNDER / PEMBINA ──────────────────────────────────────
        $founders = [
            [
                'name'         => 'I Gede Made Rony Dwipayana',
                'position'     => 'Founder & Pembina',
                'type'         => 'founder',
                'birth_date'   => Carbon::parse('1990-01-15'),
                'gender'       => 'L',
                'occupation'   => 'Aktivis Sosial',
                'address'      => 'Surabaya, Jawa Timur',
                'phone'        => '081234567890',
                'social_media' => '@ronydwipayana',
                'order'        => 0,
                'is_active'    => true,
            ],
            [
                'name'         => 'Sri Wahyuni',
                'position'     => 'Pembina',
                'type'         => 'founder',
                'birth_date'   => Carbon::parse('1985-06-20'),
                'gender'       => 'P',
                'occupation'   => 'Pendidik Luar Biasa',
                'address'      => 'Surabaya, Jawa Timur',
                'phone'        => '081298765432',
                'social_media' => '@sriwahyuni_slb',
                'order'        => 1,
                'is_active'    => true,
            ],
        ];

        foreach ($founders as $founder) {
            BoardMember::firstOrCreate(['name' => $founder['name']], $founder);
        }

        // ── KEPENGURUSAN (BOARD) ────────────────────────────────────
        $boards = [
            [
                'name'         => 'Arung Admaja',
                'position'     => 'Ketua Harian',
                'type'         => 'board',
                'birth_date'   => Carbon::parse('2004-12-28'),
                'gender'       => 'L',
                'occupation'   => 'Mahasiswa',
                'address'      => 'Jl. Raya Keputih, Surabaya',
                'phone'        => '082176894624',
                'social_media' => '@Arungg245',
                'order'        => 1,
                'is_active'    => true,
            ],
            [
                'name'         => 'Pramaswari Dewi',
                'position'     => 'Admin Media Sosial',
                'type'         => 'board',
                'birth_date'   => Carbon::parse('2002-03-11'),
                'gender'       => 'P',
                'occupation'   => 'Content Creator',
                'address'      => 'Surabaya, Jawa Timur',
                'phone'        => '085712345678',
                'social_media' => '@pramaswari_d',
                'order'        => 2,
                'is_active'    => true,
            ],
            [
                'name'         => 'Doni Saputra',
                'position'     => 'Sekretaris',
                'type'         => 'board',
                'birth_date'   => Carbon::parse('2003-07-05'),
                'gender'       => 'L',
                'occupation'   => 'Mahasiswa',
                'address'      => 'Jl. Semolowaru, Surabaya',
                'phone'        => '083187654321',
                'social_media' => '@doni_sptr',
                'order'        => 3,
                'is_active'    => true,
            ],
            [
                'name'         => 'Rina Kusumawati',
                'position'     => 'Bendahara',
                'type'         => 'board',
                'birth_date'   => Carbon::parse('2001-11-30'),
                'gender'       => 'P',
                'occupation'   => 'Karyawan Swasta',
                'address'      => 'Jl. Manyar Kertoarjo, Surabaya',
                'phone'        => '081356789012',
                'social_media' => '@rina_kusuma',
                'order'        => 4,
                'is_active'    => true,
            ],
            [
                'name'         => 'Budi Santoso',
                'position'     => 'Koordinator Pelatihan',
                'type'         => 'board',
                'birth_date'   => Carbon::parse('1999-04-18'),
                'gender'       => 'L',
                'occupation'   => 'Interpreter Bahasa Isyarat',
                'address'      => 'Jl. Rungkut Asri, Surabaya',
                'phone'        => '087823456789',
                'social_media' => '@budi_sibi',
                'order'        => 5,
                'is_active'    => true,
            ],
            [
                'name'         => 'Dewi Anggraini',
                'position'     => 'Koordinator Humas',
                'type'         => 'board',
                'birth_date'   => Carbon::parse('2000-09-25'),
                'gender'       => 'P',
                'occupation'   => 'Mahasiswi',
                'address'      => 'Surabaya, Jawa Timur',
                'phone'        => '082234567890',
                'social_media' => '@dewi_anggraini',
                'order'        => 6,
                'is_active'    => true,
            ],
            [
                'name'         => 'Fajar Rahmanto',
                'position'     => 'Koordinator Dokumentasi',
                'type'         => 'board',
                'birth_date'   => Carbon::parse('2003-02-14'),
                'gender'       => 'L',
                'occupation'   => 'Fotografer Freelance',
                'address'      => 'Jl. Gubeng, Surabaya',
                'phone'        => '081765432109',
                'social_media' => '@fajar_foto',
                'order'        => 7,
                'is_active'    => true,
            ],
        ];

        foreach ($boards as $board) {
            BoardMember::firstOrCreate(['name' => $board['name']], $board);
        }

        // ── KEANGGOTAAN (MEMBER) ────────────────────────────────────
        $members = [
            [
                'name'         => 'Ahmad Fauzi',
                'position'     => 'Anggota',
                'type'         => 'member',
                'birth_date'   => Carbon::parse('2000-05-12'),
                'gender'       => 'L',
                'occupation'   => 'Mahasiswa',
                'address'      => 'Jl. Mulyosari, Surabaya',
                'phone'        => '082111222333',
                'social_media' => '@ahmadfauzi',
                'order'        => 1,
                'is_active'    => true,
            ],
            [
                'name'         => 'Siti Rahayu',
                'position'     => 'Anggota',
                'type'         => 'member',
                'birth_date'   => Carbon::parse('2001-08-23'),
                'gender'       => 'P',
                'occupation'   => 'Karyawan Swasta',
                'address'      => 'Jl. Dharmahusada, Surabaya',
                'phone'        => '083344455566',
                'social_media' => '@siti_rahayu',
                'order'        => 2,
                'is_active'    => true,
            ],
            [
                'name'         => 'Hendra Gunawan',
                'position'     => 'Anggota',
                'type'         => 'member',
                'birth_date'   => Carbon::parse('1998-12-01'),
                'gender'       => 'L',
                'occupation'   => 'Wirausaha',
                'address'      => 'Jl. Kenjeran, Surabaya',
                'phone'        => '085677788899',
                'social_media' => null,
                'order'        => 3,
                'is_active'    => true,
            ],
            [
                'name'         => 'Nurul Hidayah',
                'position'     => 'Anggota',
                'type'         => 'member',
                'birth_date'   => Carbon::parse('2002-04-17'),
                'gender'       => 'P',
                'occupation'   => 'Mahasiswi',
                'address'      => 'Jl. Kertajaya, Surabaya',
                'phone'        => '081234509876',
                'social_media' => '@nurul_hdy',
                'order'        => 4,
                'is_active'    => true,
            ],
            [
                'name'         => 'Rizky Pratama',
                'position'     => 'Anggota',
                'type'         => 'member',
                'birth_date'   => Carbon::parse('2003-10-08'),
                'gender'       => 'L',
                'occupation'   => 'Pelajar',
                'address'      => 'Surabaya, Jawa Timur',
                'phone'        => '087800011122',
                'social_media' => '@rizky_prtm',
                'order'        => 5,
                'is_active'    => true,
            ],
            [
                'name'         => 'Laila Fitriani',
                'position'     => 'Anggota',
                'type'         => 'member',
                'birth_date'   => Carbon::parse('1999-06-30'),
                'gender'       => 'P',
                'occupation'   => 'Guru',
                'address'      => 'Jl. Kupang Jaya, Surabaya',
                'phone'        => '082233344455',
                'social_media' => '@laila_guru',
                'order'        => 6,
                'is_active'    => true,
            ],
            [
                'name'         => 'Wahyu Hidayat',
                'position'     => 'Anggota',
                'type'         => 'member',
                'birth_date'   => Carbon::parse('2000-01-20'),
                'gender'       => 'L',
                'occupation'   => 'Mahasiswa',
                'address'      => 'Jl. Gubeng Jaya, Surabaya',
                'phone'        => '085666777888',
                'social_media' => null,
                'order'        => 7,
                'is_active'    => true,
            ],
            [
                'name'         => 'Indah Permatasari',
                'position'     => 'Anggota',
                'type'         => 'member',
                'birth_date'   => Carbon::parse('2001-03-05'),
                'gender'       => 'P',
                'occupation'   => 'Karyawan Swasta',
                'address'      => 'Jl. Kalidami, Surabaya',
                'phone'        => '083399988877',
                'social_media' => '@indah_ps',
                'order'        => 8,
                'is_active'    => true,
            ],
        ];

        foreach ($members as $member) {
            BoardMember::firstOrCreate(['name' => $member['name']], $member);
        }
    }
}
