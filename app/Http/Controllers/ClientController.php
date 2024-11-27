<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
	
    public function index()
    {
        return response()->json(Client::all());
    }

    public function show($id)
    {
        $client = Client::find($id);
        return $client
            ? response()->json($client)
            : response()->json(['error' => 'Client not found'], 404);
    }

    public function store(Request $request)
    {
        $client = Client::create($request->only('name', 'email'));
        return response()->json($client, 201);
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        if (!$client) {
            return response()->json(['error' => 'Client not found'], 404);
        }
        $client->update($request->only('name', 'email'));
        return response()->json($client);
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        if (!$client) {
            return response()->json(['error' => 'Client not found'], 404);
        }
        $client->delete();
        return response()->json(['message' => 'Client deleted']);
    }
}

