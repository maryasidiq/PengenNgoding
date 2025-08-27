<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\testimoniModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

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

    public function edit($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $testimoni = testimoniModel::findOrFail($id);
            return view('admin.testimoni.edit', compact('testimoni'));
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function update(Request $request, $encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $testimoni = testimoniModel::findOrFail($id);

            $validated = $request->validate([
                'nama' => 'required|string|max:100',
                'jabatan' => 'nullable|string|max:150',
                'instansi' => 'nullable|string|max:150',
                'pesan' => 'required|string',
            ]);

            $testimoni->update($validated);

            return redirect()->route('admin.testimoni.index')
                ->with('success', 'Testimoni berhasil diupdate!');
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function destroy($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $testimoni = testimoniModel::findOrFail($id);

            $testimoni->delete();

            return redirect()->route('admin.testimoni.index')
                ->with('success', 'Testimoni berhasil dihapus!');
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }
}
