<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return Client::all();
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'phone' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'birth_date' => 'date'
        ]);

        return Client::create($request->all());
    }

    public function show($id)
    {
        return Client::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'phone' => 'required',
            'address' => 'required',
            'zip' => 'required',
        ]);

        $client = Client::find($id);

        $client->update($request->all());

        return $client;
    }

    public function destroy($id)
    {
        $client = Client::find($id);

        return $client->delete();
    }
}
