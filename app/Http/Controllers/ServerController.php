<?php

namespace App\Http\Controllers;

use App\Models\Network;
use App\Models\Server;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $servers = Server::with('network')->get();

        return view('servers.index', compact('servers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $networks = Network::all();

        return view('servers.create', compact('networks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
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
    public function show(Server $server): View
    {
        /** @phpstan-ignore argument.type */
        return view('servers.show', compact('server'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Server $server): View
    {
        $networks = Network::all();

        return view('servers.edit', compact('server', 'networks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Server $server): RedirectResponse
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
    public function destroy(Server $server): RedirectResponse
    {
        $server->delete();

        return redirect()->route('servers.index')->with('success', __('Server deleted successfully.'));
    }
}
