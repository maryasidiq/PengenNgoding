<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\testimoniModel;
use Illuminate\Http\Request;

class AdminTestimoniController extends Controller
{
    public function index(Request $request)
    {
        $query = testimoniModel::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('jabatan', 'like', "%{$search}%")
                ->orWhere('instansi', 'like', "%{$search}%")
                ->orWhere('pesan', 'like', "%{$search}%");
        }

        $testimonis = $query->latest()->paginate(10)->withQueryString();

        return view('admin.testimoni.index', compact('testimonis'));
    }

    public function create()
    {
        return view('admin.testimoni.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'nullable|string|max:150',
            'instansi' => 'nullable|string|max:150',
            'pesan' => 'required|string',
        ]);

        testimoniModel::create($validated);

        return redirect()->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function edit(testimoniModel $testimoni)
    {
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, testimoniModel $testimoni)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'nullable|string|max:150',
            'instansi' => 'nullable|string|max:150',
            'pesan' => 'required|string',
        ]);

        $testimoni->update($validated);

        return redirect()->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil diupdate!');
    }

    public function destroy(testimoniModel $testimoni)
    {
        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil dihapus!');
    }
}
