<?php

namespace App\Http\Controllers;

use App\Models\Network;
use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servers = Server::with('network')->get();
        return view('servers.index', compact('servers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $networks = Network::all();
        return view('servers.create', compact('networks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ip_address' => 'required|ip',
            'type' => 'required|string',
            'os' => 'required|string',
            'network_id' => 'required|exists:networks,id',
        ]);

        Server::create($validated);

        return redirect()->route('servers.index')->with('success', __('Server created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Server $server)
    {
        return view('servers.show', compact('server'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Server $server)
    {
        $networks = Network::all();
        return view('servers.edit', compact('server', 'networks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Server $server)
    {
        $validated = $request->validate([
            'ip_address' => 'required|ip',
            'type' => 'required|string',
            'os' => 'required|string',
            'network_id' => 'required|exists:networks,id',
        ]);

        $server->update($validated);

        return redirect()->route('servers.index')->with('success', __('Server updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Server $server)
    {
        $server->delete();
        return redirect()->route('servers.index')->with('success', __('Server deleted successfully.'));
    }
}
