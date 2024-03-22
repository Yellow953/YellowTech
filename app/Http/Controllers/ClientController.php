<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Log;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $clients = Client::select('id', 'name', 'email', 'client', 'address', 'created_at')->get();
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
            'address' => 'required|string',
            'phone' => 'required|string',
            'city' => 'required|string',
        ]);

        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' =>  $request->address,
            'phone' => $request->phone,
            'city' => $request->city,
        ]);

        Log::create([
            'text' => auth()->user()->name . ' created client ' . $request->name . ', datetime: ' . now(),
        ]);

        return redirect()->route('clients')->with('success', 'Client created successfully.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => 'required|string',
            'city' => 'required|string',
        ]);

        $client->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'city' => $request->city,
        ]);

        Log::create([
            'text' => auth()->user()->name . ' updated client ' . $request->name . ', datetime: ' . now(),
        ]);

        return redirect()->route('clients')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        Log::create([
            'text' => auth()->user()->name . ' deleted client ' . $client->name . ', datetime: ' . now(),
        ]);

        $client->delete();

        return redirect()->back()->with('success', 'Client deleted successfully.');
    }
}
