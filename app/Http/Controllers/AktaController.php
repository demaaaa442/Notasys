<?php

namespace App\Http\Controllers;

use App\Models\Akta;
use App\Models\Client;
use Illuminate\Http\Request;

class AktaController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->search;

        $aktas = Akta::with('client')
            ->when($search, function ($query) use ($search) {
                $query->where('nomor_akta', 'like', "%{$search}%")
                      ->orWhere('jenis_akta', 'like', "%{$search}%")
                      ->orWhereHas('client', function ($q) use ($search) {
                          $q->where('nama', 'like', "%{$search}%");
                      });
            })
            ->get();

        return view('aktas.index', compact('aktas', 'search'));
    }

    public function create()
    {
        $clients = Client::all();

        return view('aktas.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'nomor_akta' => 'required|unique:aktas',
            'jenis_akta' => 'required',
            'tanggal_akta' => 'required',
            'status' => 'required',
        ]);

        Akta::create($request->all());

        return redirect()->route('aktas.index')
            ->with('success', 'Data akta berhasil ditambahkan.');
    }

    public function edit(Akta $akta)
    {
        $clients = Client::all();

        return view('aktas.edit', compact('akta', 'clients'));
    }

    public function update(Request $request, Akta $akta)
    {
        $request->validate([
            'client_id' => 'required',
            'nomor_akta' => 'required|unique:aktas,nomor_akta,' . $akta->id,
            'jenis_akta' => 'required',
            'tanggal_akta' => 'required',
            'status' => 'required',
        ]);

        $akta->update($request->all());

        return redirect()->route('aktas.index')
            ->with('success', 'Data akta berhasil diperbarui.');
    }

    public function destroy(Akta $akta)
    {
        $akta->delete();

        return redirect()->route('aktas.index')
            ->with('success', 'Data akta berhasil dihapus.');
    }

}