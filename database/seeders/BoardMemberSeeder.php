<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BoardMember;
use Carbon\Carbon;

class BoardMemberSeeder extends Seeder
{
    public function run(): void
    {
        // Founder/Pembina
        BoardMember::create([
            'name' => 'I Gede Made Rony Dwipayana',
            'position' => 'Founder & Pembina',
            'type' => 'founder',
            'birth_date' => Carbon::parse('1990-01-15'),
            'gender' => 'L',
            'occupation' => 'Aktivis Sosial',
            'address' => 'Surabaya',
            'phone' => '081234567890',
            'social_media' => '@ronydwipayana',
            'order' => 0,
            'is_active' => true,
        ]);

        // Kepengurusan
        $boardMembers = [
            [
                'name' => 'Arung Admaja',
                'position' => 'Ketua Harian',
                'type' => 'board',
                'birth_date' => Carbon::parse('2004-12-28'),
                'gender' => 'L',
                'occupation' => 'Mahasiswa',
                'address' => 'Jl. Raya Keputih',
                'phone' => '082176894624',
                'social_media' => '@Arungg245',
                'order' => 1,
            ],
            [
                'name' => 'Pramaswari',
                'position' => 'Admin Sosmed',
                'type' => 'board',
                'gender' => 'P',
                'occupation' => 'Content Creator',
                'order' => 2,
            ],
            [
                'name' => 'Doni Saputra',
                'position' => 'Sekretaris',
                'type' => 'board',
                'gender' => 'L',
                'occupation' => 'Mahasiswa',
                'order' => 3,
            ],
            // Add more as needed
        ];

        foreach ($boardMembers as $member) {
            BoardMember::create($member);
        }

        // Anggota biasa (members)
        $members = [
            [
                'name' => 'Anggota 1',
                'position' => 'Anggota',
                'type' => 'member',
                'gender' => 'L',
                'occupation' => 'Mahasiswa',
                'order' => 1,
            ],
            [
                'name' => 'Anggota 2',
                'position' => 'Anggota',
                'type' => 'member',
                'gender' => 'P',
                'occupation' => 'Karyawan Swasta',
                'order' => 2,
            ],
            // Add more members as needed
        ];

        foreach ($members as $member) {
            BoardMember::create($member);
        }
    }
}
