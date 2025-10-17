<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function kepengurusan()
    {
        // Nanti bisa tambahkan data dari database jika diperlukan
        return view('profil.kepengurusan');
    }

    public function keanggotaan()
    {
        return view('profil.keanggotaan');
    }

    public function struktur()
    {
        return view('profil.struktur');
    }
}
