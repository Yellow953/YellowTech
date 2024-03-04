<?php
// app/Http/Controllers/ClientController.php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    public function new()
    {
        return view('admin.clients.new');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients',
            'address' => 'nullable|string',
            'status' => 'in:done,pending,ongoing',
        ]);

        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' =>  $request->address,
            'status' => $request->status,
        ]);

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'address' => 'nullable|string',
            'status' => 'in:done,pending,ongoing',
        ]);

        $client->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'status' => $request->status,
        ]);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
