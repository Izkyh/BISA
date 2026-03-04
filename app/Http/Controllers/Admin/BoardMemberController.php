<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoardMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BoardMemberController extends Controller
{
    private array $typeConfig = [
        'board'   => ['label' => 'Kepengurusan',        'icon' => 'bi-people-fill'],
        'member'  => ['label' => 'Keanggotaan',          'icon' => 'bi-person-lines-fill'],
        'founder' => ['label' => 'Struktur Organisasi',  'icon' => 'bi-diagram-3-fill'],
    ];

    public function index(Request $request)
    {
        $type = $request->get('type', 'board');
        $boardMembers = BoardMember::where('type', $type)->ordered()->paginate(10);
        $typeConfig = $this->typeConfig[$type] ?? $this->typeConfig['board'];

        return view('admin.board_members.index', compact('boardMembers', 'type', 'typeConfig'));
    }

    public function create(Request $request)
    {
        $type = $request->get('type', 'board');
        $typeConfig = $this->typeConfig[$type] ?? $this->typeConfig['board'];

        return view('admin.board_members.create', compact('type', 'typeConfig'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'position'   => 'required|string|max:255',
            'type'       => 'required|in:founder,board,member',
            'photo_path' => 'nullable|file|image|max:10240',
        ]);

        $data = $request->except('photo_path');

        if ($request->hasFile('photo_path')) {
            $filename = time() . '_' . $request->file('photo_path')->getClientOriginalName();
            $request->file('photo_path')->storeAs('public/board_members', $filename);
            $data['photo_path'] = 'board_members/' . $filename;
        }

        BoardMember::create($data);
        return redirect()
            ->route('admin.board_members.index', ['type' => $request->type])
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(BoardMember $boardMember)
    {
        $type = $boardMember->type;
        $typeConfig = $this->typeConfig[$type] ?? $this->typeConfig['board'];

        return view('admin.board_members.edit', compact('boardMember', 'type', 'typeConfig'));
    }

    public function update(Request $request, BoardMember $boardMember)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'type'     => 'required|in:founder,board,member',
        ]);

        $data = $request->except('photo_path');

        // ✅ fix: edit sekarang bisa update foto
        if ($request->hasFile('photo_path')) {
            if ($boardMember->photo_path) {
                Storage::delete('public/' . $boardMember->photo_path);
            }
            $filename = time() . '_' . $request->file('photo_path')->getClientOriginalName();
            $request->file('photo_path')->storeAs('public/board_members', $filename);
            $data['photo_path'] = 'board_members/' . $filename;
        }

        $boardMember->update($data);
        return redirect()
            ->route('admin.board_members.index', ['type' => $boardMember->type])
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(BoardMember $boardMember)
    {
        $type = $boardMember->type;
        if ($boardMember->photo_path) {
            Storage::delete('public/' . $boardMember->photo_path);
        }
        $boardMember->delete();
        return redirect()
            ->route('admin.board_members.index', ['type' => $type])
            ->with('success', 'Data berhasil dihapus');
    }
}
