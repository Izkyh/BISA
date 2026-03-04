<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoardMember;
use Illuminate\Http\Request;

class BoardMemberController extends Controller
{
    public function index()
    {
        $boardMembers = BoardMember::latest()->paginate(10);
        return view('admin.board_members.index', compact('boardMembers'));
    }

    public function create()
    {
        return view('admin.board_members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'photo_path' => 'nullable|file|image|max:10240', // 10MB
        ]);
        $data = $request->except('photo_path');
        if ($request->hasFile('photo_path')) {
            $filename = time() . '_' . $request->file('photo_path')->getClientOriginalName();
            $request->file('photo_path')->storeAs('public/board_members', $filename);
            $data['photo_path'] = $filename;
        }
        BoardMember::create($data);
        return redirect()->route('admin.board_members.index')->with('success', 'Board member berhasil ditambahkan');
    }

    public function edit(BoardMember $boardMember)
    {
        return view('admin.board_members.edit', compact('boardMember'));
    }

    public function update(Request $request, BoardMember $boardMember)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
        ]);
        $boardMember->update($request->all());
        return redirect()->route('admin.board_members.index')->with('success', 'Board member berhasil diupdate');
    }

    public function destroy(BoardMember $boardMember)
    {
        $boardMember->delete();
        return redirect()->route('admin.board_members.index')->with('success', 'Board member berhasil dihapus');
    }
}
