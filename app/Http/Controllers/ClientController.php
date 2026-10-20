<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $clients = Client::when($search, function ($query) use ($search) {
            return $query->where('nama', 'like', "%{$search}%")
                         ->orWhere('nik', 'like', "%{$search}%");
        })->get();                 

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:clients',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        Client::create($request->all());

        return redirect()->route('clients.index')
            ->with('success', 'Data klien berhasil ditambahkan.');
    }

    public function edit(Client $client)
    {
    return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
    $request->validate([
        'nama' => 'required',
        'nik' => 'required|unique:clients,nik,' . $client->id,
        'telepon' => 'required',
        'alamat' => 'required',
    ]);

    $client->update($request->all());

    return redirect()->route('clients.index')
        ->with('success', 'Data klien berhasil diperbarui.');
    }    

    public function destroy(Client $client)
    {
    $client->delete();

    return redirect()->route('clients.index')
        ->with('success', 'Data klien berhasil dihapus.');
    }
}