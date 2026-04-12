<?php
namespace App\Http\Controllers;

use App\Models\BoardMember;


class ProfileController extends Controller
{
    public function kepengurusan()
    {
        $boardMembers = BoardMember::active()
            ->board()
            ->ordered()
            ->get();

        return view('profil.kepengurusan', compact('boardMembers'));
    }

    public function keanggotaan()
    {
        $teachers = BoardMember::active()
            ->member()
            ->ordered()
            ->paginate(12);

        return view('profil.keanggotaan', compact('teachers'));
    }

    public function struktur()
    {
        $founder = BoardMember::active()
            ->founder()
            ->first();

        $teamMembers = BoardMember::active()
            ->board()
            ->ordered()
            ->get();

        return view('profil.struktur', compact('founder', 'teamMembers'));
    }
}
