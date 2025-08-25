<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\clientModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminClientController extends Controller
{
    public function index(Request $request)
    {
        $query = clientModel::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%");
        }

        $clients = $query->latest()->paginate(10)->withQueryString();

        return view('admin.client.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.client.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle gambar upload
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('clients/logos', 'public');
            $validated['gambar'] = $gambarPath;
        }

        clientModel::create($validated);

        return redirect()->route('admin.client.index')
            ->with('success', 'Client berhasil ditambahkan!');
    }

    public function edit(clientModel $client)
    {
        return view('admin.client.edit', compact('client'));
    }

    public function update(Request $request, clientModel $client)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle gambar update
        if ($request->hasFile('gambar')) {
            // Delete old gambar
            if ($client->gambar) {
                Storage::disk('public')->delete($client->gambar);
            }
            $gambarPath = $request->file('gambar')->store('clients/logos', 'public');
            $validated['gambar'] = $gambarPath;
        }

        $client->update($validated);

        return redirect()->route('admin.client.index')
            ->with('success', 'Client berhasil diupdate!');
    }

    public function destroy(clientModel $client)
    {
        // Delete gambar
        if ($client->gambar) {
            Storage::disk('public')->delete($client->gambar);
        }

        $client->delete();

        return redirect()->route('admin.client.index')
            ->with('success', 'Client berhasil dihapus!');
    }
}
